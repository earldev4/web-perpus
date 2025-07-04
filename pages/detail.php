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
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["id_buku"])){
        $perpustakaan->downloadBook($_POST);
        exit();
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
    <title>Perpustakaan - Detail <?= isset($book['judul_buku']) ? htmlspecialchars($book['judul_buku']) : "Title" ?></title>
</head>
<body>
    
    <?php include '../components/navbar.php'; ?>

    
    <div class="container">
        <div class="row">
            <header class="book-header d-flex justify-content-between">
                <h1 class="book-title"><?= isset($book['judul_buku']) ? htmlspecialchars($book['judul_buku']) : "Tidak ada judul buku"  ?></h1>
                <hr>
            </header>
        </div>
        <div class="row">
            <img src="https://asset.kompas.com/crops/MDKtGB-Qbs2L0FBC7bOlWcb5VeY=/65x65:865x599/1200x800/data/photo/2017/06/28/1265845835.jpg" alt="Book in a library">
        </div>
        <div class="row pt-2">
            <div class="col-md-5 col-12">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span class="fw-bold">Kategori: </span><?= isset($book['kategori_buku']) ? htmlspecialchars($book['kategori_buku']) : "Tidak ada kategori buku" ?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Pengarang: </span><?= isset($book['pengarang_buku']) ? htmlspecialchars($book['pengarang_buku']) : "Tidak ada pengarang buku"; ?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Penerbit: </span><?= isset($book['penerbit_buku']) ? htmlspecialchars($book['penerbit_buku']) : "Tidak ada penerbit buku"; ?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Jumlah Buku: </span> <?= isset($book['jumlah_buku']) ? htmlspecialchars($book['jumlah_buku']) : "Tidak ada jumlah buku"; ?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Jumlah Halaman: </span> <?= isset($book['jumlah_halaman']) ? htmlspecialchars($book['jumlah_halaman']) : "Tidak ada jumlah halaman"; ?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Bahasa: </span> <?= isset($book['bahasa_buku']) ? htmlspecialchars($book['bahasa_buku']) : "Tidak ada bahasa buku";  ?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">ISBN Buku: </span> <?= isset($book['isbn_buku']) ? htmlspecialchars($book['isbn_buku']) : "Tidak ada ISBN buku"; ?>
                    </li>
                    <li class="list-group-item">
                        <form action="detail.php" method="POST">
                            <input type="hidden" name="id_buku" value="<?= $book['id_buku']; ?>">
                            <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-book"></i> Download Buku</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 col-12">
                <p style="text-align: justify"><?= isset($book['deskripsi_buku']) ? htmlspecialchars($book['deskripsi_buku']) : "Tidak ada deskripsi buku"; ?></p>
            </div>
        </div>
    </div>

    <?php include '../components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
