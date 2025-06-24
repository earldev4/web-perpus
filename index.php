<?php
    require_once __DIR__ . '/config/db.php';

    $conn = getConnection();

    $stmt = $conn->prepare("SELECT * FROM buku");
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="./assets/style/style.css">
    <link rel="stylesheet" href="./assets/style/carousel.css">
    <script src="./assets/script/script.js"></script>   
    <title>Bappeda - Perpustakaan</title>
</head>
<body>
    <?php include 'components/navbar.php'; ?>
    
    <div class="hero-section rounded-end-circle">
        <div class="container">
            <h1 class="hero-title">Selamat Datang Di Website Perpustakaan <br>Bappeda Lampung</h1>
            <p class="hero-subtitle">Temukan koleksi buku terbaik untuk menambah wawasan dan pengetahuan Anda</p>
        </div>
        <a href="#" class="borrow-book p-5 mt-3">
            <button class="btn btn-primary px-3 py-2 rounded mt-3 w-50" id="daftar">
                Daftar Sekarang!
            </button>
        </a>
    </div>
    <div class="bg-light p-5">
        <?php include 'components/carousel.php'; ?>
    </div>
    <?php include 'components/stats.php'; ?>

    <?php include 'components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 4,
                },
            },
        });
    </script>
</body>
</html>
