<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/style/style.css">
    <script src="./assets/script/script.js"></script>
    <title>Bappeda - Perpustakaan</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light p-3" id="mainNavbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" >
                <img src="./assets/img/Lampung_coa.png" alt="" class="img-fluid lampung-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ps-5 me-auto mb-2 mb-lg-0 gap-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Catalog</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link text-dark d-flex align-items-center gap-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                        Profil <i class="bi bi-chevron-down" style="text-shadow: 0 0 1px currentColor;"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Kelembagaan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Sejarah</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark d-flex align-items-center gap-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Social Media <i class="bi bi-chevron-down" style="text-shadow: 0 0 1px currentColor;"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Instagram</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">YouTube</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Login</a>
                    </li>
                </ul>
                <a class="borrow-book p-2">
                    <button class="btn btn-primary p-0">
                        Pinjam Buku
                    </button>
                </a>
            </div>
        </div>
    </nav>
    <h1 class="text-center my-3 py-1"> Datang Di Website Perpustakaan <br>Bappeda Lampung</h1>
    <div id="carouselExampleIndicators" class="carousel slide mx-auto" style="max-width: 1200px;" data-bs-ride="carousel" data-bs-touch="true">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row justify-content-center gx-3 gy-3">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="./assets/img/buku/buku1.jpg" class="card-img-top" alt="Book 1" style="height: 220px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <p class="text-muted small mb-0">Pemerintahan</p>
                                    <h6 class="fw-bold mb-1">Buku 1</h6>
                                    <p class="text-muted small mb-1">Alexander</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Pinjam Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="./assets/img/buku/buku2.jpg" class="card-img-top" alt="Book 1" style="height: 220px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <p class="text-muted small mb-0">Politik</p>
                                    <h6 class="fw-bold mb-1">Buku2</h6>
                                    <p class="text-muted small mb-1">Michael</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Pinjam Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="./assets/img/buku/buku3.jpg" class="card-img-top" alt="Book 1" style="height: 220px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <p class="text-muted small mb-0">Hewan</p>
                                    <h6 class="fw-bold mb-1">Buku3</h6>
                                    <p class="text-muted small mb-1">Alexander</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Pinjam Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="./assets/img/buku/buku3.jpg" class="card-img-top" alt="Book 1" style="height: 220px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <p class="text-muted small mb-0">Hewan</p>
                                    <h6 class="fw-bold mb-1">Buku3</h6>
                                    <p class="text-muted small mb-1">Alexander</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Pinjam Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item ">
                <div class="container">
                    <div class="row justify-content-center gx-2 gy-3">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="./assets/img/buku/buku4.jpg" class="card-img-top" alt="Book 1" style="height: 220px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <p class="text-muted small mb-0">Teknologi</p>
                                    <h6 class="fw-bold mb-1">Buku 4</h6>
                                    <p class="text-muted small mb-1">Alexander</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Pinjam Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="./assets/img/buku/buku5.jpg" class="card-img-top" alt="Book 1" style="height: 220px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <p class="text-muted small mb-0">Sosial</p>
                                    <h6 class="fw-bold mb-1">Buku 5</h6>
                                    <p class="text-muted small mb-1">Alexander</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Pinjam Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="./assets/img/buku/buku1.jpg" class="card-img-top" alt="Book 1" style="height: 220px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <p class="text-muted small mb-0">Politik</p>
                                    <h6 class="fw-bold mb-1">Buku6</h6>
                                    <p class="text-muted small mb-1">Alexander</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Pinjam Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="./assets/img/buku/buku1.jpg" class="card-img-top" alt="Book 1" style="height: 220px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <p class="text-muted small mb-0">Politik</p>
                                    <h6 class="fw-bold mb-1">Buku6</h6>
                                    <p class="text-muted small mb-1">Alexander</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Pinjam Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit minima illo nemo hic earum laborum eius fugiat, quasi optio magnam minus? Consectetur eos consequatur dolorem! Tenetur voluptatum illo aut eum.
    Quam, magnam. Officia atque voluptatum dolorum quos eaque quis veniam amet iusto eum consequuntur odio natus nemo, dicta repudiandae repellat quidem quia sed numquam, ut, distinctio reprehenderit sequi sit reiciendis.
    In temporibus cum, tempora fuga dolor tempore nihil maiores sequi eveniet tenetur placeat sit nam cupiditate quod neque magni! Veniam accusantium quos id, quam ea velit sed excepturi totam modi.
    Nihil laboriosam, iure mollitia rerum corrupti ut tenetur consequuntur velit animi id, maiores enim. Praesentium, distinctio aut facilis minima molestiae, veniam omnis quas cumque iure rerum at alias error reprehenderit!
    Quia, laborum? Facilis consequatur autem voluptatibus excepturi voluptate, porro quae odit cumque quidem nesciunt id. Facilis commodi nisi doloribus impedit corrupti. Unde ducimus veniam rerum minus enim mollitia sint dolor.
    Quis sunt sit similique blanditiis impedit sequi optio. Amet nam voluptatibus aliquid, consectetur, sit ipsam excepturi at possimus consequatur itaque optio provident veritatis laborum eum quos eos aut unde eveniet?
    Iste debitis architecto fugit voluptate tempora suscipit veniam omnis neque cum. Saepe natus porro dolores sit corrupti a nobis cumque enim sequi ex? Nobis odit adipisci non, incidunt blanditiis at.
    Necessitatibus consequuntur suscipit porro dolores cum asperiores, laboriosam eaque illo voluptates recusandae nam obcaecati vero officiis fugit corporis unde quibusdam nesciunt nostrum odit beatae quam. Veniam laudantium pariatur ad libero!
    Quas odio expedita minima tenetur et? Quisquam odio, dolorum quibusdam magni magnam delectus, accusamus doloremque nesciunt iste dolore voluptates, fuga id error nulla neque. Officiis dolor distinctio animi error neque.
    Ratione distinctio autem, accusamus magni aspernatur, laborum nemo debitis nam error corporis magnam rem dicta cum aut consequatur eveniet adipisci similique deleniti nulla a possimus tenetur ducimus? Doloribus, repudiandae soluta.
    Sint obcaecati rerum modi numquam incidunt deserunt ex culpa tempora, ipsam magni nobis mollitia quas ullam eum! Provident quo eaque, numquam neque amet dolor, quisquam voluptatum omnis veniam consectetur quia?
    Totam inventore, sit quas autem praesentium dolores magnam alias minima pariatur reiciendis maiores nulla non cum odio incidunt tempore? Amet reiciendis cupiditate aliquam deserunt eaque beatae aliquid, quae vitae cumque.
    Sit, consequatur sed incidunt voluptas nemo libero voluptatum nesciunt eveniet cum doloribus aliquid repellat! Corporis quo sapiente esse reprehenderit, fugiat quisquam, animi cupiditate et sint necessitatibus asperiores. Tempore, nostrum suscipit!
    Vitae facere voluptate omnis tempore obcaecati molestias magnam necessitatibus perspiciatis et? Natus optio consequatur quaerat quia, necessitatibus ad quo asperiores accusamus velit, expedita hic voluptatem? Consequatur natus dolore sit. Perferendis!
    Distinctio neque ea in tenetur sequi! Vitae sit qui minus quasi perferendis dolorum porro labore blanditiis deleniti suscipit quis quod, id quisquam sint accusamus aliquam ex eius minima a beatae.
    Sequi, qui earum dolorum esse explicabo inventore perferendis, harum odio atque nobis dolore, omnis dolorem beatae corrupti quae dolor neque enim? Dolorum nulla, cumque nostrum corporis tempora ratione enim error.
    Temporibus odio nobis aperiam! Aliquid, eligendi in repellat, veritatis debitis ipsam porro amet quis consequatur pariatur ipsum expedita quos quasi autem voluptate. Numquam, molestiae voluptates. Earum quibusdam aspernatur incidunt delectus.
    Enim, tempora officiis. Cum amet debitis quis nam vero? Quis nisi dolores quas quae. Architecto placeat necessitatibus veritatis ullam, totam, reiciendis consectetur autem doloremque, possimus eius consequuntur odio quasi molestias.
    Possimus laborum dolore rerum facilis cum suscipit quibusdam. Doloribus magnam incidunt cum, expedita numquam eius autem odit neque eligendi. Sapiente odit tempore libero sed deleniti natus reprehenderit doloribus! Itaque, numquam!
    Nesciunt, consectetur numquam et tenetur, minima laudantium alias ex pariatur nemo nam saepe aut, quia eius illum neque! Nisi sunt officia totam voluptatem, eaque aspernatur molestiae eligendi. Eligendi, quia inventore?</h3>
    <footer>
    <div class="container-fluid p-5 footer-color">
        <div>
            <div class="row">
                <div class="col-6 footer-content">
                    <div class="logo-section">
                        <img src="./assets/img/Lampung_coa.png" alt="Logo" class="footer-logo">
                    </div>
                    <div class="footer-text">
                        <p>Bappeda Provinsi Lampung merupakan lembaga perencana pembangunan daerah yang membantu Gubernur dalam perumusan kebijakan pembangunan. Sejak dibentuk tahun 1980, struktur dan tugasnya telah beberapa kali mengalami penyesuaian sesuai peraturan perundang-undangan, terakhir melalui Pergub No. 88 Tahun 2016.</p>
                    </div>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="mailto:example@example.com"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row contact-info">
                        <div class="col-12 d-flex align-items-center mb-3">
                            <i class="fas fa-phone-alt contact-icon"></i>
                            <div class="contact-details">
                                <span class="contact-label">Kontak</span>
                                <span class="contact-value">(0721) 485458</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row contact-info">
                        <div class="col-12 d-flex align-items-center mb-3">
                            <i class="fas fa-envelope contact-icon"></i>
                            <div class="contact-details">
                                <span class="contact-label">E-Mail</span>
                                <span class="contact-value">example@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row contact-info">
                        <div class="col-12 d-flex align-items-center mb-3">
                            <i class="fas fa-clock contact-icon"></i>
                            <div class="contact-details">
                                <span class="contact-label">Jam Kerja</span>
                                <span class="contact-value">Monday - Fri: 7.30 am - 4.00 pm</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row contact-info">
                        <div class="col-12 d-flex align-items-center mb-3">
                            <i class="fas fa-map-marker-alt contact-icon"></i>
                            <div class="contact-details">
                                <span class="contact-label">Lokasi</span>
                                <span class="contact-value">Jalan Robert Wolter Monginsidi No. 223</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>