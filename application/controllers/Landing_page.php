<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Landing_page extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('User_model');
        $this->load->model('Product_model');
        // $this->session->set_userdata('pages', 'dashboard_page');
    }

    public function index()
    {        
        $products=$this->Product_model->getGroupedProducts();
        $blog=$this->Product_model->getGroupedBlog();
        $data['title'] = 'Dashboard Admin';
        $data['page_name'] = 'dashboard_admin';      
        $data['products'] =  $products;
        $data['blogs'] =  $blog;
        // var_dump($products);     
        $this->load->view('landing_page/home', $data);
            
    }

    public function detail($id_product)
    {
        $data['product'] = $this->Product_model->getProductById($id_product);
        
        if (!$data['product']) {
            show_404();
        }

        
        $this->load->view('landing_page/product_detail', $data);
        
    }
    
}