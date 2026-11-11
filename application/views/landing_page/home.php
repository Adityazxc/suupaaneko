<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Carousell -->
    <style>
        .navbar-nav {
            margin: auto;
        }

        .carousel-item img {
            height: 500px;
            object-fit: cover;
        }

        section {
            padding: 80px 0;
        }
    </style>
    <!-- End Carousell -->
</head>

<body>
    <!-- Navbar -->
    <!-- <style>
        /* Custom navbar background and text color */
        .navbar-custom {
            background-color: #e85839;
            /* Ganti warna navbar */
        }

        .navbar-custom .navbar-nav .nav-link {
            color: white;
            /* Mengubah warna teks navbar menjadi putih */
        }

        .navbar-custom .navbar-nav .nav-link:hover {
            color: #f0f0f0;
            /* Warna teks navbar saat hover */
        }

        .navbar-custom .navbar-brand {
            color: white;
            /* Mengubah warna teks logo navbar menjadi putih */
        }

        .navbar-custom .navbar-brand:hover {
            color: #f0f0f0;
            /* Warna logo navbar saat hover */
        }
    </style> -->
    <!-- End Navbar -->

    <!-- Header Navigation -->
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

    <!-- Carousel -->


    <!-- Sections -->
    <section id="home" class="text-center bg-light pb-0">
        <div id="carouselExampleAutoplaying" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('public/img/banner3.jpg') ?>" class="carousel-img img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('public/img/banner3.jpg') ?>" class="carousel-img img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('public/img/banner3.jpg') ?>" class="carousel-img img-fluid" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- CSS Carousel-->
        <style>
            .carousel-inner {
                width: 100%;
                max-width: 1200px;
                /* Lebar maksimum untuk desktop */
                margin: 0 auto;
                /* Memusatkan carousel */
            }

            .carousel-item {
                text-align: center;
                /* Memusatkan gambar */
            }

            .carousel-img {
                width: 100%;
                height: auto;
                object-fit: contain;
                /* Pastikan seluruh gambar terlihat tanpa terpotong */
                max-width: 100%;
                /* Tidak melebihi lebar container */
            }

            /* Desktop: Lebar maksimum 1200px, tinggi proporsional */
            @media (min-width: 992px) {
                .carousel-img {
                    max-width: 996px;
                    /* Lebar maksimum untuk desktop */
                    max-height: 376px;
                    /* Tinggi proporsional (rasio 3:1) */
                }
            }

            /* Tablet: Lebar maksimum 80% dari layar */
            @media (max-width: 991px) {
                .carousel-img {
                    max-width: 80%;
                    max-height: 320px;
                    /* Tinggi proporsional */
                }
            }

            /* Mobile: Lebar maksimum 90% dari layar */
            @media (max-width: 576px) {
                .carousel-img {
                    max-width: 100%;
                    max-height: 160px;
                    /* Tinggi proporsional untuk mobile */
                }
            }
        </style>
    </section>


<!-- About -->
    <section id="about" class="text-center pt-30">
        <h2 style="color: #e85839;">About us</h2>
        <div class="container text-center">
            <div class="row d-flex align-items-stretch">
                <!-- Kolom Kiri -->
                <div class="col-sm-6 d-flex justify-content-center align-items-center">
                    <div>
                        <h2>About</h2>
                        <style>
                            .justify-indent {
                                text-align: justify;
                                text-indent: 30px;
                            }
                        </style>
                        <!-- Paragraf pertama ditampilkan secara default -->
                        <p class="justify-indent p-2" id="introText">
                            Suupaaneko adalah merek yang menggabungkan desain petualangan, ilustrasi kreatif, dan gaya
                            santai.
                            Didorong oleh karakter utama Ember, sosok bersemangat, pemberani, dan pantang menyerah,
                            Ember adalah
                            cerminan dari setiap jiwa muda yang ingin berani keluar dari zona nyaman, berani mencoba hal
                            baru,
                            dan menghadapi segala tantangan dengan percaya diri.
                        </p>

                        <!-- Paragraf lainnya disembunyikan secara default -->
                        <div id="fullText" style="display: none;">
                            <p class="justify-indent">
                                Setiap koleksi Suupaaneko menggabungkan elemen desain yang dinamis, penuh warna, dan
                                berani,
                                dengan ilustrasi yang menceritakan kisah petualangan Ember. Gaya desain ini
                                mengedepankan
                                estetika yang menyenangkan namun tetap tegas, mencerminkan karakter pemberani dan penuh
                                semangat. Ilustrasi pada pakaian kami tidak hanya sekadar gambar, tapi juga sebuah
                                narasi yang
                                mengajak para pemakainya untuk merasakan semangat petualangan dan kekuatan dari karakter
                                Ember.
                            </p>
                            <p class="justify-indent">
                                Kebebasan dalam berpakaian tak hanya soal gaya, tapi juga kenyamanan. Produk Suupaaneko
                                dirancang untuk memberikan kenyamanan maksimal dalam setiap aktivitas, dari petualangan
                                sehari-hari hingga momen bersantai dengan teman-teman. Desain yang santai dan fleksibel
                                memungkinkan para penggunanya bergerak bebas, tanpa mengorbankan gaya dan ekspresi.
                            </p>
                            <p class="justify-indent">
                                Bergabunglah bersama Suupaaneko, dan jadilah bagian dari kisah petualangan yang penuh
                                warna dan
                                makna.
                            </p>
                        </div>

                        <!-- Tombol untuk mengungkapkan lebih banyak teks -->
                        <button id="seeDetailBtn" class="btn btn-link"
                            style="  color: #e85839; text-decoration: none; ">See Detail</button>
                        <script>
                            document.getElementById('seeDetailBtn').addEventListener('click', function () {
                                var fullText = document.getElementById('fullText');
                                var introText = document.getElementById('introText');

                                if (fullText.style.display === 'none') {
                                    // Menampilkan teks lengkap
                                    fullText.style.display = 'block';
                                    introText.style.display = 'none';
                                    this.textContent = 'See Less'; // Ubah teks tombol menjadi "See Less"
                                } else {
                                    // Menyembunyikan teks lengkap
                                    fullText.style.display = 'none';
                                    introText.style.display = 'block';
                                    this.textContent = 'See Detail'; // Ubah teks tombol kembali menjadi "See Detail"
                                }
                            });

                        </script>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-sm-6 d-flex justify-content-center align-items-center">
                    <div>
                        <img src="public/img/Suupaaneko_Logogram.png"
                            style="height:auto; max-width:100%; display:block;">
                        <!-- Di sini Anda bisa menambahkan icon atau konten lainnya -->
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Product -->
    <section id="products" class="text-center bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 d-flex justify-content-start">
                    <h2 class="mb-4" style="color: #e85839;">Products</h2>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <a href="#" style="  color: #e85839; text-decoration: none; "> Lihat Semua ></a>
                </div>

            </div>
            <!-- If Products Are Less Than 4, Use Horizontal Scroll -->
            <div class="d-flex flex-nowrap overflow-auto">
                <?php foreach ($products as $product): ?>
                    <div class="p-2">
                        <div class="card product-card">
                            <img src="uploads/products/<?= $product->foto ?>" class="card-img-top img-fluid product-img"
                                alt="<?= $product->name_product ?>">
                            <div class="card-body">
                                <h4 class="card-title d-flex justify-content-start"><?= $product->name_product ?></h4>
                                <small class="card-text d-flex justify-content-start text-muted"><strong>Ukuran:</strong>
                                    <?= $product->sizes ?></small>
                                <div class="row mb-2 pt-2">
                                    <div class="col-md-6 d-flex justify-content-start align-self-center">
                                        <h5>Rp <?= number_format($product->selling_price, 0, ',', '.') ?></h5>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-start">
                                        <s>Rp<?= number_format($product->price_display, 0, ',', '.') ?></s>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col d-flex justify-content-star">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </div>
                                <a href="landing_page/detail/<?= $product->id_product ?>"
                                    class="btn btn-light rounded-pill view-details-btn">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <style>
                /* Default Card */
                .product-card {
                    width: 18rem;
                    border-bottom: 5px solid #e85839;
                }

                .product-img {
                    height: 200px;
                    object-fit: cover;
                }

                .view-details-btn {
                    background-color: #e85839;
                    color: white;
                }

                .checked {
                    color: orange;
                }

                /* Responsive untuk Mobile */
                @media (max-width: 576px) {
                    .product-card {
                        width: 12rem;
                        /* Lebih kecil di layar kecil */
                    }

                    .product-img {
                        height: 150px;
                        /* Ukuran gambar lebih kecil */
                    }

                    .card-title {
                        font-size: 1rem;
                        /* Font lebih kecil */
                    }

                    .card-body {
                        padding: 8px;
                        /* Padding lebih kecil */
                    }

                    .view-details-btn {
                        font-size: 0.8rem;
                        /* Ukuran tombol lebih kecil */
                        padding: 5px 10px;
                    }
                }
            </style>

            <style>
                /* Efek hover pada card */
                .card:hover {
                    transform: scale(1.05);
                    /* Membuat card sedikit membesar */
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                    /* Menambahkan bayangan pada card */
                    transition: all 0.3s ease-in-out;
                    /* Menambahkan animasi transisi */
                }

                /* Hover pada gambar card */
                .card-img-top:hover {
                    opacity: 0.8;
                    /* Menurunkan opacity gambar saat di-hover */
                    transition: opacity 0.3s ease-in-out;
                    /* Transisi pada opacity */
                }

                /* Hover pada tombol */
                .card a:hover {
                    background-color: #d84c2f;
                    /* Warna tombol sedikit lebih gelap saat di-hover */
                    color: white;
                }
            </style>

        </div>

        <script>
            function getDetailProduct() {

                $.ajax({
                    url: "<?= base_url('landing_page/get_detail') ?>",
                    type: "POST",
                    data:
                })
            }
            $(document).ready(function () {
                getDetailProduct();
                $
            })


        </script>
    </section>


    <!-- Link ke Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



    <section id="blog" class="text-center">        
        <div class="container">
            <div class="row">
                <div class="col-sm-6 d-flex justify-content-start">
                    <h2 class="mb-4" style="color: #e85839;">Latest Blog</h2>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <a href="#" style="  color: #e85839; text-decoration: none; "> Lihat Semua ></a>
                </div>

            </div>
            <!-- If Products Are Less Than 4, Use Horizontal Scroll -->
            <div class="d-flex flex-nowrap overflow-auto">
                <?php foreach ($blogs as $blog): ?>
                    <div class="p-2">

                        <img src="uploads/products/<?= $blog->img ?>" class="rounded card-img-top img-fluid blog-img"
                            alt="<?= $blog->title ?>" style="width:378px;">
                        
                            <h4 class=" d-flex justify-content-start pt-3"><?= $blog->title ?></h4>
                            <p class=" d-flex justify-content-start text-muted"><?= $blog->content ?></p>
                            
                                                                              
                       

                    </div>
                <?php endforeach; ?>
            </div>

            <style>
                /* Default Card */
                .product-card {
                    width: 18rem;
                    border-bottom: 5px solid #e85839;
                }

                .product-img {
                    height: 200px;
                    object-fit: cover;
                }

                .view-details-btn {
                    background-color: #e85839;
                    color: white;
                }

                .checked {
                    color: orange;
                }

                /* Responsive untuk Mobile */
                @media (max-width: 576px) {
                    .product-card {
                        width: 12rem;
                        /* Lebih kecil di layar kecil */
                    }

                    .product-img {
                        height: 150px;
                        /* Ukuran gambar lebih kecil */
                    }

                    .card-title {
                        font-size: 1rem;
                        /* Font lebih kecil */
                    }

                    .card-body {
                        padding: 8px;
                        /* Padding lebih kecil */
                    }

                    .view-details-btn {
                        font-size: 0.8rem;
                        /* Ukuran tombol lebih kecil */
                        padding: 5px 10px;
                    }
                }
            </style>

            <style>
                /* Efek hover pada card */
                .card:hover {
                    transform: scale(1.05);
                    /* Membuat card sedikit membesar */
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                    /* Menambahkan bayangan pada card */
                    transition: all 0.3s ease-in-out;
                    /* Menambahkan animasi transisi */
                }

                /* Hover pada gambar card */
                .card-img-top:hover {
                    opacity: 0.8;
                    /* Menurunkan opacity gambar saat di-hover */
                    transition: opacity 0.3s ease-in-out;
                    /* Transisi pada opacity */
                }

                /* Hover pada tombol */
                .card a:hover {
                    background-color: #d84c2f;
                    /* Warna tombol sedikit lebih gelap saat di-hover */
                    color: white;
                }
            </style>

        </div>

        <script>
            function getDetailProduct() {

                $.ajax({
                    url: "<?= base_url('landing_page/get_detail') ?>",
                    type: "POST",
                    data:
                })
            }
            $(document).ready(function () {
                getDetailProduct();
                $
            })


        </script>


    </section>


    <?php $this->load->view('landing_page/footer') ?>




</body>

</html>