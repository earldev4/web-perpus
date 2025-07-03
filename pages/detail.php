<?php
require_once __DIR__ . "/../config/db.php";
require_once __DIR__ . "/../config/class.php";

$conn = getConnection();
$perpustakaan = new Perpustakaan($conn);

if($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $id_berita = $_GET['id'];
        $result = $perpustakaan->viewBookDetail($id_berita);
        $book = $result['book'];
    }
}

$footer = $perpustakaan->displayFooter();
$footerResult = $footer['footer'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/style/style.css">
    <link rel="stylesheet" href="../assets/style/detail.css">
    <script src="../assets/script/script.js"></script>   
    <title>Perpustakaan - Detail <?= htmlspecialchars($book['judul_buku']) ?></title>
</head>
<body>
    
    <?php include '../components/navbar.php'; ?>

    
    <div class="container">
        <div class="row">
            <header class="book-header d-flex justify-content-between">
                <h1 class="book-title"><?= htmlspecialchars($book['judul_buku']) ?></h1>
                <hr>
            </header>
        </div>
        <div class="row">
            <img src="/assets/img/buku/<?= htmlspecialchars($book['gambar_buku']); ?>" alt="<?= htmlspecialchars($book['judul_buku']); ?>" class="img-fluid rounded"></p>
        </div>
        <div class="row">
            <div class="col-md-5 col-12">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span class="fw-bold">Kategori: </span><?= htmlspecialchars($book['kategori_buku']); ?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Pengarang: </span><?= htmlspecialchars($book['pengarang_buku']); ?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Penerbit: </span><?= htmlspecialchars($book['penerbit_buku']); ?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Jumlah Buku: </span> <?= htmlspecialchars($book['jumlah_buku']); ?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Jumlah Halaman: </span> <?= htmlspecialchars($book['jumlah_halaman']); ?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Bahasa: </span> <?= htmlspecialchars($book['bahasa_buku']); ?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">ISBN Buku: </span> <?= htmlspecialchars($book['isbn_buku']); ?>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 col-12">
                <p style="text-align: justify"><?=  htmlspecialchars($book['deskripsi_buku']); ?></p>
            </div>
        </div>
    </div>

    <?php include '../components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
