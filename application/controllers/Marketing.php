<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;

class Marketing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('Marketing_model');
        $this->load->model('Scan_product_model');
        $this->load->library('session');
        $this->session->set_userdata('pages', 'marketing_page');
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
        $user_role = $this->session->userdata('role');
        $password = $this->session->userdata('password');
        if ($password == "e10adc3949ba59abbe56e057f20f883e") {
            redirect('reset_password/input_password');
        } else if ($this->session->userdata('logged_in') && ($user_role == 'Upper' || $user_role == 'Marketing')) {
            $data['title'] = 'Dashboard Marketing';
            $data['page_name'] = 'dashboard_marketing';
            $data['role'] = $user_role;
            $this->load->view('dashboard', $data);
        } else {
            redirect('auth');
        }

    }

    public function generate($code = '123456789')
    {
        header('Content-Type: image/png');
        echo $this->barcode->generate($code);
    }
    public function getdatatables_Marketing()
    {
        $list = $this->Marketing_model->getdatatables_Marketing();
        $data = array();
        $no = $this->input->post('start', true);
    
        foreach ($list as $item) {
            $no++;
            $image_path = base_url('uploads/products/' . $item->img);
            $image_tag = $item->img ? '<img src="' . $image_path . '" class="img-thumbnail" style="object-fit: cover; cursor: pointer;" onclick="showProductImages(' . $item->id_blog . ')">' : '<small>No Image</small>';
            
            $row = array();
            $row[] = '<small style="font-size:12px">' . $no . '</small>';
            $row[] = '<small style="font-size:12px">' . htmlspecialchars($item->title) . '</small>';
            $row[] = $image_tag;            
            $row[] = '<small style="font-size:12px">' . substr(strip_tags($item->content), 0, 100) . '...</small>';
            $row[] = '<small style="font-size:12px">' . htmlspecialchars($item->create_date) . '</small>';
    
            $row[] = '<div class="form-button-action"> 
                <button class="btn btn-link btn-simple-primary btn-lg" onclick="editMarketing(
                    ' . $item->id_blog . ',
                    \'' . htmlspecialchars($item->img, ENT_QUOTES) . '\',
                    `' . str_replace('`', '\`', $item->content) . '`,
                    `' . str_replace('`', '\`', $item->title) . '`
                )"
                data-bs-toggle="modal" data-bs-target="#ModalEditMarketing">
                <i class="fa fa-edit"></i>
                </button>             
             <button class="btn btn-link btn-danger btn-lg" onclick="removeContent(
                        ' . htmlspecialchars($item->id_blog) . ', \'' . htmlspecialchars($item->content) . '\')"
                        data-bs-toggle="modal" data-bs-target="#ModalRemoveContent">
                        <i class="fa fa-times"></i>
                        </button>
                        </div>';
    
            $data[] = $row;
        }
    
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Marketing_model->count_all_Marketing(),
            "recordsFiltered" => $this->Marketing_model->count_filtered_Marketing(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    function get_product()
    {
        $product = $this->input->post('barcodeProduct');
        if ($result = $this->Scan_product_model->_getDetails($product)) {

            $response = [
                'nameProduct' => $result->name_product,
                'idProduct' => $result->id_product,
                'amount' => 1,
                'priceSelling' => $result->selling_price,
                'subTotal' => $result->name_product,
                'Marketing' => $result->Marketing,
                'source' => 'Shopee',
            ];
        } else {
            $response = [
                'nameProduct' => "Produk tidak ditemukan periksa kembali!",

            ];
        }
        ;

        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    function rupiah($angka)
    {

        $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;

    }
    public function add_content()
    {


        $img_array = $this->upload_images();
        $img = implode(',', $img_array);
        $content = array(
            'title' => $this->input->post("titleContent"),
            'img' => $img,
            'content' => $this->input->post("content"),
            'create_date' => date('Y-m-d H:i:s'),
        );
        if ($this->Marketing_model->_add_content($content)) {
            // Jika berhasil, set flashdata untuk notifikasi sukses
            $this->session->set_flashdata('notify', [
                'message' => 'Content berhasil ditambahkan!',
                'type' => 'success'
            ]);
        } else {
            // Jika gagal, set flashdata untuk notifikasi error
            $this->session->set_flashdata('notify', [
                'message' => 'Gagal menambahkan Content!',
                'type' => 'danger'
            ]);
        }



        redirect("marketing");


        // var_dump($content);
    }

    public function upload_images()
    {
        $config['upload_path'] = './uploads/products/'; // Folder penyimpanan
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp'; // Jenis file yang diperbolehkan
        $config['max_size'] = 50048; // Maks 2MB
        $this->load->library('upload', $config);

        // Periksa apakah ada file yang diunggah
        if (empty($_FILES['imgProduct']['name'][0])) {
            echo "Tidak ada file yang diunggah.";
            return;
        }

        $uploaded_files = [];

        foreach ($_FILES['imgProduct']['name'] as $key => $name) {
            $_FILES['file']['name'] = $_FILES['imgProduct']['name'][$key];
            $_FILES['file']['type'] = $_FILES['imgProduct']['type'][$key];
            $_FILES['file']['tmp_name'] = $_FILES['imgProduct']['tmp_name'][$key];
            $_FILES['file']['error'] = $_FILES['imgProduct']['error'][$key];
            $_FILES['file']['size'] = $_FILES['imgProduct']['size'][$key];

            $config['file_name'] = time() . '_' . $name;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $upload_data = $this->upload->data();
                $uploaded_files[] = $upload_data['file_name'];
            } else {
                echo "Upload gagal untuk file: " . $name . "<br>";
                echo $this->upload->display_errors();
            }
        }

        // Debug output
        // var_dump($uploaded_files);
        // Simpan ke database
        return $uploaded_files;
    }
    public function edit_Marketing()
    {
        $id_product = $this->input->post('id_product_add_Marketing', TRUE);
        $user_data = array(
            'Marketing' => $this->input->post('Marketing_pro', TRUE),
        );

        if ($this->Marketing_model->_edit_Marketing($id_product, $user_data)) {
            // Jika berhasil, set flashdata untuk notifikasi sukses
            $this->session->set_flashdata('notify', [
                'message' => 'Stok berhasil di ubah!',
                'type' => 'success'
            ]);
        } else {
            // Jika gagal, set flashdata untuk notifikasi error
            $this->session->set_flashdata('notify', [
                'message' => 'Gagal menambahkan Stok!',
                'type' => 'danger'
            ]);
        }
        redirect("Marketing");
    }




    public function get_csrf()
    {
        //
        echo $this->security->get_csrf_hash();
    }

    public function get_csrf_json()
    {
        //
        $data['status'] = "Success";
        $data['get_csrf_hash'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

}