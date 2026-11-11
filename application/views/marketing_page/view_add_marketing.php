<div class="modal fade" id="addSellingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="<?= base_url('marketing/add_content') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Title</label>
                                <input id="titleContent" name="titleContent" type="text" class="form-control"
                                    placeholder="Insert Title Content" autocomplete="off" value="Testing Content Blog Ini mah" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Img Content</label>
                                <input id="imgContent" name="imgProduct[]" type="file" multiple accept="image/*"
                                    class="form-control" placeholder="Insert image content" autocomplete="off"
                                    onchange="previewImages()">
                            </div>
                        </div>
                        <div id="imagePreview" class="d-flex flex-wrap gap-2 mt-2"></div>
                        <script>
                            function previewImages() {
                                var preview = document.getElementById('imagePreview');
                                preview.innerHTML = ''; // Clear previous previews
                                var files = document.getElementById('imgContent').files;

                                if (files.length > 1) {
                                    alert("Maksimal 1 gambar!");
                                    return;
                                }

                                if (files) {
                                    Array.from(files).forEach(file => {
                                        var reader = new FileReader();
                                        reader.onload = function (event) {
                                            var imgElement = document.createElement("img");
                                            imgElement.src = event.target.result;
                                            imgElement.style.width = "100px";
                                            imgElement.style.height = "100px";
                                            imgElement.style.objectFit = "cover";
                                            imgElement.style.borderRadius = "8px";
                                            imgElement.style.marginRight = "10px";
                                            preview.appendChild(imgElement);
                                        };
                                        reader.readAsDataURL(file);
                                    });
                                }
                            }
                        </script>
                        <!-- Sertakan TinyMCE (jika menggunakan TinyMCE sebagai contoh) -->
                        <script src="public/js/tinymce/js/tinymce/tinymce.min.js"></script>                        

                        <script>
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
                        </script>



                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Content</label>
                                <textarea id="editor" name="content"><?= isset($content) ? $content : '' ?></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>

        </div>

    </div>
</div>

<script>

    function autoSubmitScan() {
        var createDate = $('#createDate').val();
        var barcodeProduct = $('#barcodeSellingProduct').val();

        $.ajax({
            url: '<?= base_url("stock/get_product") ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                barcodeProduct: barcodeProduct
            },
            success: function (response) {
                $('#nameSellingProduct').val(response.nameProduct);
                $('#idStockProduct').val(response.idProduct);
                $('#priceSellingProduct').val(response.priceSelling);
                $('#stock').val(response.stock);

            },
            error: function (xhr, status, error) {
                console.error("Ajax error:", status, error);
            }
        });
    }
    $('#barcodeSellingProduct').on('keypress', function (e) {
        if (e.which === 13) { // Key code 13 adalah Enter
            e.preventDefault(); // Mencegah form submit default
            autoSubmitScan(); // Panggil fungsi autoSubmitScan
        }
    });

    $('#searchIcon').on('click', function () {
        // Panggil fungsi yang sama saat menekan Enter
        autoSubmitScan();  // Panggil fungsi autoSubmitScan
    });
</script>