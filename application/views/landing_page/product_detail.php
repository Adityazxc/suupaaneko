<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Lightbox2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">

    <!-- Lightbox2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <!-- Carousell -->
    <style>
        .navbar-nav {
            margin: auto;
        }

       
    

        /* star */
        .checked {
            color: orange;
        }
    </style>
    <!-- End Carousell -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white navbar-custom fixed-top"
        style="border-bottom: 1px solid rgb(235, 237, 238);">
        <div class="container">
            <a class="navbar-brand" href="#home"><img src="<?= base_url("public/img/supaneko_mini.png") ?>"
                    style="height: auto; width: 100px; max-width:100%; display:block;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#products">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5 mt-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('landing_page') ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('landing_page') ?>">Katalog</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $product->name_product ?></li>
            </ol>
        </nav>


        <?php $this->load->view('template/header.php') ?>
        <?php $this->load->view('template/bottom.php') ?>

        <div class="row detail-product">
            <!-- Gambar Produk -->
            <div class="col-md-6">
                <div id="productCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php $active = 'active'; ?>
                        <?php foreach ($product->photos as $photo): ?>
                            <div class="carousel-item <?= $active ?>">
                                <a href="<?= base_url('uploads/products/') . $photo ?>" data-lightbox="product-gallery">
                                    <img src="<?= base_url('uploads/products/') . $photo ?>" class="d-block w-100 rounded">
                                </a>
                            </div>
                            <?php $active = ''; ?>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <!-- Thumbnail Image -->
                <div class="d-flex mt-3">
                    <?php foreach ($product->photos as $photo): ?>
                        <div class="p-1">
                            <a href="<?= base_url('uploads/products/') . $photo ?>" data-lightbox="product-gallery">
                                <img src="<?= base_url('uploads/products/') . $photo ?>" class="img-thumbnail" width="75">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>



            <!-- Informasi Produk -->
            <div class="col-md-6 p-4">
                <h2><?= $product->name_product ?></h2>
                <div class="mb-2">
                    <span class="badge bg-primary me-4">Produk Unggulan</span>

                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>

                </div>
                <p class="text-muted text-decoration-line-through">Rp
                    <?= number_format($product->price_display, 0, ',', '.') ?>
                </p>
                <h4 class="text-danger">Rp <?= number_format($product->selling_price, 0, ',', '.') ?></h4>
                <p><?= $product->description ?></p>

                <!-- Ukuran Produk -->
                <p><strong>Ukuran Tersedia:</strong> <?= implode(', ', $product->sizes) ?></p>

                <div class="alert alert-warning">Stok produk ini akan segera habis, segera checkout sebelum kehabisan.
                </div>

                <!-- Pilihan Jumlah dan Tombol Beli -->
                <div class="d-flex align-items-center mb-3">

                    <p class="pe-4 mt-3 align-self-center">Sisa Stock</p>
                    <input type="number" class="form-control w-25 me-2" value="1" min="1" readonly>
                    <!-- <a href="#" class="btn btn-primary me-2">Beli Langsung</a>
                    <button class="btn btn-outline-secondary">Add To Cart</button> -->
                </div>

                <p><strong>Kategori:</strong> <?= $product->category ?></p>
                <strong>
                    <h5>Cek Ketersedian produk di </h5>
                </strong>
                <ul class="list-group list-group-horizontal bg-transparent border-0">
                    <li class="list-group-item bg-transparent"><a href="<?= $product->link_tiktok ?>" target="_blank">
                            <img src="<?= base_url('public/img/tiktok_shop.png') ?>" height="50"></a></li>
                    <li class="list-group-item bg-transparent"><a href="<?= $product->link_tokopedia ?>"
                            target="_blank">
                            <img src="<?= base_url('public/img/tokopedia.png') ?>" height="50"></a></li>
                    <li class="list-group-item bg-transparent"><a href="<?= $product->link_shopee ?>" target="_blank">
                            <img src="<?= base_url('public/img/shopee.png') ?>" height="50"></a></li>
                </ul>
            </div>
        </div>
        <!-- Deskripsi -->
        <div class="card m-4 pt-3 px-5">
            <div class="card-body">
                <?= $product->description ?>
            </div>
        </div>
        <!-- End Deskripsi -->
    </div>

    <?php $this->load->view('landing_page/footer') ?>
</body>

</html>