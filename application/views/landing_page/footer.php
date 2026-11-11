<style>
        .container-footer {
            border-top: 3px solid #e85839;
            /* Ganti dengan warna atau ketebalan border yang diinginkan */
        }
    </style>
<!-- Dynamic Carousel Script -->
<script>
        document.addEventListener("DOMContentLoaded", function () {
            let images = [
                "https://via.placeholder.com/1200x500?text=Slide+1",
                "https://via.placeholder.com/1200x500?text=Slide+2",
                "https://via.placeholder.com/1200x500?text=Slide+3"
            ];
            let carouselContent = document.getElementById("carousel-content");
            images.forEach((img, index) => {
                let activeClass = index === 0 ? "active" : "";
                carouselContent.innerHTML += `<div class="carousel-item ${activeClass}"><img src="${img}" class="d-block w-100"></div>`;
            });
        });
    </script>
    <!-- Reset Scroll Position -->
    <script>
        window.onload = function () {
            window.scrollTo(0, 0);  // Mengatur posisi scroll ke bagian atas halaman
        };
    </script>

<div class="container-footer p-2">
        <footer class="row m-4">
            <div class="col-sm-6 mb-3">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <img src="<?= base_url("public/img/supaneko_mini.png") ?>"
                            style="height: auto; width: 100px; max-width:100%; display:block;">
                    </li>
                    <li class="nav-item mb-2">
                        <h5>Service</h5>
                    </li>
                    <li class="nav-item mb-2">
                        Working Hours dan Days
                    </li>
                    <li class="nav-item mb-2">
                        09:00 - 17:00
                    </li>
                    <li class="nav-item mb-2">
                        (Monday and Sunday)
                    </li>
                </ul>
            </div>
            <div class="col mb-3">
           
            </div>
            <div class="col mb-3">
                <h5>Information</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Tentang kami</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Cara Belanja</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Kontak kami</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Login</a></li>
                </ul>
            </div>
            <div class="col mb-3">
                <h5>Customer Service</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Payment Method</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pengiriman</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Terms & Condition</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Privacy Policy</a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>