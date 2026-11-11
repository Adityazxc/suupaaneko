<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    $(document).ready(function () {
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            width: 150,
            height: 150
        });

        $("#qrProduct").on("input", function () {
            var qrValue = $(this).val().trim();
            if (qrValue !== "") {
                qrcode.clear(); // Hapus QR sebelumnya
                qrcode.makeCode(qrValue); // Buat QR baru
            }
        });

        // Trigger QR saat halaman pertama kali dimuat
        var initialQR = $("#qrProduct").val().trim();
        if (initialQR !== "") {
            qrcode.makeCode(initialQR);
        }
    });
</script>


<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="<?= base_url('product/add_product') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Name Product</label>
                                <input id="nameProduct" name="nameProduct" type="text" class="form-control"
                                    placeholder="Insert Name Product" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Img Product</label>
                                <input id="imgProduct" name="imgProduct[]" type="file" multiple accept="image/*"
                                    class="form-control" placeholder="Insert image product" autocomplete="off" required
                                    onchange="previewImages()">
                            </div>
                        </div>
                        <div id="imagePreview" class="d-flex flex-wrap gap-2 mt-2"></div>
                        <script>
                            function previewImages() {
                                var preview = document.getElementById('imagePreview');
                                preview.innerHTML = ''; // Clear previous previews
                                var files = document.getElementById('imgProduct').files;

                                if (files.length < 3) {
                                    alert("Minimal harus mengunggah 3 gambar!");
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

                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>QR code</label>
                                <input id="qrProduct" name="qrProduct" type="text" class="form-control"
                                    placeholder="Insert Barcode Product" autocomplete="off" required readonly>
                            </div>
                        </div>

                        <!-- <div class="col-sm-12">
                            <div id="qrcode"></div>
                        </div> -->

                        <script>
                            document.getElementById("nameProduct").addEventListener("input", changeNameProductToQR);
                            function changeNameProductToQR() {
                                const judul = document.getElementById("nameProduct").value; // Ambil nilai dari input judul
                                const qrCode = judul
                                    .toLowerCase() // Ubah ke huruf kecil
                                    .replace(/ /g, "_") // Ganti spasi dengan _
                                    .replace(/[^a-z0-9_]/g, ""); // Hapus karakter non-alfanumerik

                                // if ($('#product_sizeTmp').val() != null) {
                                //     size = $('#product_sizeTmp').val();
                                //     document.getElementById("qrProduct").value = qrCode + size; // Tetapkan nilai ke input QR code
                                //     document.getElementById("qrProductTmp").value = qrCode + size; // Tetapkan nilai ke input QR code
                                // } else {

                                //     document.getElementById("qrProduct").value = qrCode; // Tetapkan nilai ke input QR code
                                //     document.getElementById("qrProductTmp").value = qrCode; // Tetapkan nilai ke input QR code
                                // }
                                document.getElementById("qrProduct").value = qrCode; // Tetapkan nilai ke input QR code

                            }
                        </script>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Category</label>
                                <input id="categoryProduct" name="categoryProduct" type="text" class="form-control"
                                    placeholder="Insert Category Product" autocomplete="off"
                                    style="text-transform: uppercase" required value="Nature">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Size</label>
                                <div id="button-group" role="group" aria-label="Basic example">
                                    <button class="btn btn-outline-primary m-2 select-btn" data-id="S">S</button>
                                    <button class="btn btn-outline-primary m-2 select-btn" data-id="M">M</button>
                                    <button class="btn btn-outline-primary m-2 select-btn" data-id="L">L</button>
                                    <button class="btn btn-outline-primary m-2 select-btn" data-id="XL">XL</button>
                                </div>
                                <input type="hidden" name="sizePrinting" id="sizePrinting">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Price Product</label>
                                <input id="priceProduct" name="priceProduct" type="number" min="0" class="form-control"
                                    placeholder="Price Product" autocomplete="off" required value="50000">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Price Packing</label>
                                <input id="pricePacking" name="pricePacking" type="number" min="0" class="form-control"
                                    placeholder="Price Packing" autocomplete="off" required value="10000">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Price Printing</label>
                                <input id="pricePrinting" name="pricePrinting" type="number" min="0"
                                    class="form-control" placeholder="Price Printing" autocomplete="off" required
                                    value="10000">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Price Press</label>
                                <input id="pricePress" name="pricePress" type="number" min="0" class="form-control"
                                    placeholder="Price Press" autocomplete="off" required value="10000">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Price Marketing </label>
                                <input id="priceMarketing" name="priceMarketing" type="number" min="0"
                                    class="form-control" placeholder="Input Price Marketing" autocomplete="off" required
                                    value="10000">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Price Production</label>
                                <input id="priceProduction" name="priceProduction" type="text" class="form-control"
                                    placeholder="Total" readonly autocomplete="off" required value="10000">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Persentase Margin</label>
                                <input id="persentaseMargin" name="persentaseMargin" type="number" min="0"
                                    class="form-control" placeholder="input 10 for 10%" autocomplete="off" required
                                    value="40">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Price Selling </label>
                                <input id="priceSelling" name="priceSelling" type="number" class="form-control"
                                    placeholder="Input Price Selling" readonly autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Price Display </label>
                                <input id="priceDisplay" name="priceDisplay" type="number" class="form-control"
                                    placeholder="Input Price Display" readonly value="160000" autocomplete="off"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Link Tokopedia </label>
                                <input id="linkTokopedia" name="linkTokopedia" type="text" class="form-control"
                                    placeholder="Input Link Tokopedia" value="https://tokopedia.com" autocomplete="off"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Link Shopee </label>
                                <input id="linkShopee" name="linkShopee" type="text" class="form-control"
                                    placeholder="Input Link Shopee" value="https://shopee.co.id" autocomplete="off"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Link Tiktok Shop </label>
                                <input id="linkTiktok" name="linkTiktok" type="text" class="form-control"
                                    placeholder="Input Link Tiktok" value="https://tiktok.com" autocomplete="off"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Persentase Admin</label>
                                <input id="persentaseAdmin" name="persentaseAdmin" type="number" min="0"
                                    class="form-control" placeholder="input 10 for 10%" autocomplete="off" required
                                    value="10">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Price Admin </label>
                                <input id="priceAdmin" name="priceAdmin" type="text" class="form-control"
                                    placeholder="Input Price Admin" readonly autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Profit</label>
                                <input id="profit" name="profit" type="text" class="form-control" placeholder="Total"
                                    readonly autocomplete="off" required>
                            </div>
                        </div>
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
                                <label>Deskripsi</label>
                                <textarea id="editor" name="desc"><?= isset($desc) ? $desc : '' ?></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>"
                        value="<?= $this->security->get_csrf_hash() ?>">

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

    // Function to calculate the total
    function calculateTotal() {
        var priceProduct = parseFloat($('#priceProduct').val()) || 0;
        var pricePacking = parseFloat($('#pricePacking').val()) || 0;
        var pricePrinting = parseFloat($('#pricePrinting').val()) || 0;
        var pricePress = parseFloat($('#pricePress').val()) || 0;
        var persentaseMargin = parseFloat($('#persentaseMargin').val()) || 0;
        var persentaseAdmin = parseFloat($('#persentaseAdmin').val()) || 0;
        var priceMarketing = parseFloat($('#priceMarketing').val()) || 0;


        // Sum up the values
        var price_production = priceProduct + pricePacking + pricePrinting + pricePress + priceMarketing;
        var priceSelling = price_production * (1 + persentaseMargin / 100);
        var priceAdmin = priceSelling * (persentaseAdmin / 100);
        var profit = priceSelling - price_production - priceAdmin;




        // Set the total to the "Total" field
        $('#priceProduction').val(price_production.toFixed(2));  // Using toFixed(2) to display as a decimal
        $('#priceSelling').val(priceSelling.toFixed(2));  // Using toFixed(2) to display as a decimal
        $('#priceAdmin').val(priceAdmin.toFixed(2));  // Using toFixed(2) to display as a decimal
        $('#profit').val(profit.toFixed(2));  // Using toFixed(2) to display as a decimal

    }

    // Bind change event to recalculate total whenever any price input changes
    $(document).ready(function () {
        $('#priceProduct, #pricePacking, #pricePrinting, #pricePress,#persentaseMargin,#persentaseAdmin,#priceMarketing').on('input', function () {
            calculateTotal();  // Recalculate total on input change
        });

        // Initial calculation (in case values are pre-filled)
        calculateTotal();
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    $(document).ready(function () {
        $(".select-btn").on("click", function () {
            var buttonId = $(this).data('id');


            // Toggle 'active' class to manage selection
            $(this).toggleClass("active");

            if ($(this).hasClass("active")) {


                // Add the selected button value to hidden input field
                var selectedValues = $("#sizePrinting").val();
                selectedValues = selectedValues ? selectedValues + "," + buttonId : buttonId;
                $("#sizePrinting").val(selectedValues);
            } else {
                // Remove the selection from the list
                $("#selected-buttons li").each(function () {
                    if ($(this).text().includes('Tombol ' + buttonId)) {
                        $(this).remove();
                    }
                });

                // Remove the selected button value from hidden input field
                var selectedValues = $("#sizePrinting").val().split(",");
                selectedValues = selectedValues.filter(function (value) {
                    return value !== buttonId;
                });
                $("#sizePrinting").val(selectedValues.join(","));
            }
        });
    });

</script>