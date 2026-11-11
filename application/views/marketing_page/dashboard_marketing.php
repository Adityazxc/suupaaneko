<div class="card card-raised">
    <div class="card-header  text-white px-4">
        <div class="d-flex justify-content-between align-item-center">
            <div class="me-4">
                <h2 class="card-title text-primary mb-0 ">Marketing</h2>
            </div>

        </div>
    </div>
    <div class="card-body p-4">
        <div class="d-flex">
            <button class="btn btn-primary btn-round ms-auto mb-3" data-bs-toggle="modal"
                data-bs-target="#addSellingModal">
                <i class="fa fa-plus"></i>
                Add Content
            </button>
        </div>

        <div class="table-responsive">
            <table id="table_Marketing" class="display table table-striped table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>IMG</th>
                        <th>Content</th>
                        <th>Create Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->load->view('Marketing_page/view_add_Marketing') ?>
<script src="public/js/tinymce/js/tinymce/tinymce.min.js"></script>                        
<script>

    function editMarketing(id_product, img, content, title) {
        // Set pesan konfirmasi
        $('#message-warning').text('Apakah anda yakin mengubah konten blog?');

        // Set nilai form
        $('#idBlogEdit').val(id_product);
        $('#tittleEdit').val(title);


        console.log("hehe");

        // Set konten ke TinyMCE
        tinymce.get('editor').setContent(content);

        // Set nama file gambar yang ada (jika ingin menampilkannya)
        $('#currentImage').val(img); // Tambahkan input hidden untuk menyimpan nama gambar lama

        // Tampilkan preview gambar yang ada
        if (img) {
            $('#imagePreview').html('<img src="<?= base_url('uploads/products/') ?>' + img + '" class="img-thumbnail" style="max-height: 150px; margin-top: 10px;">');
        } else {
            $('#imagePreview').html('<small>No Image</small>');
        }
    }

    // Inisialisasi TinyMCE
    tinymce.init({
        selector: '#editor',
        height: 400,
        menubar: false,
        toolbar: 'undo redo | formatselect | fontselect fontsizeselect | ' +
            'bold italic underline strikethrough | forecolor backcolor | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image table | removeformat preview fullscreen',
        content_style: 'body { font-family:Arial,sans-serif; font-size:14px }'

    });
    $(document).ready(function () {
        $('#table_Marketing').DataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 10,  // Nilai default yang ditampilkan
            "lengthMenu": [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],  // Menentukan pilihan jumlah baris per halaman
            "ajax": {
                "url": "<?= base_url('Marketing/getdatatables_Marketing') ?>",
                "type": "POST",
                "data": function (data) {


                }
            },
            "columnDefs": [
                {
                    "targets": [0],
                    "orderable": false
                },
                {
                    "targets": [0],
                    "className": 'text-center'
                },
            ],
            "layout": {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        });
    });

</script>

<!-- modal edit Marketing -->
<div class="modal fade" id="ModalEditMarketing" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="ModalLabel">Edit Marketing Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('Marketing/edit_Marketing') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <p id="message-warning" class="text-warning"></p>
                    <input id="idBlogEdit" name="idBlogEdit" type="hidden">
                    <input id="currentImage" name="currentImage" type="hidden">

                    <div class="col-sm-12 mb-3">
                        <div class="form-group form-group-default">
                            <label>Title</label>
                            <input id="tittleEdit" name="tittleEdit" type="text" class="form-control"
                                placeholder="Insert Title Content" required>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <div class="form-group form-group-default">
                            <label>Image Content</label>
                            <input id="imgEdit" name="imgProduct" type="file" accept="image/*" class="form-control">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                            <div id="imagePreview" class="mt-2"></div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <div class="form-group form-group-default">
                            <label>Content</label>
                            <textarea id="editor" name="contentEdit"></textarea>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>"
                    value="<?= $this->security->get_csrf_hash() ?>" />

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End modal edit Marketing -->


<script>
    function removeContent(){
        
    }
</script>

<!-- Modal Remove Content -->
<div class="modal fade" id="ModalRemoveContent" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="ModalLabel">Assign Ticket</h5>
                <!-- Tombol Close -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">                   
                </button>
            </div>
            <form action="<?= base_url('product/delete_product') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <p id="message-warning"></p>
                    <input type="hidden" class="form-control" name="idProductDelete" id="idProductDelete"
                        autocomplete="off">
                    <input type="hidden" name="new_password" id="newPasswordInput" style="display: none;"
                        autocomplete="off" required>
                </div>
                <input type="hidden" id="ModalEditPassword_csrf" name="<?= $this->security->get_csrf_token_name() ?>"
                    value="<?= $this->security->get_csrf_hash() ?>" />
                <div class="modal-footer">
                    <!-- Tombol Close (Footer) -->
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <!-- Tombol Reset -->
                    <button type="submit" class="btn btn-primary col-md-3">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>