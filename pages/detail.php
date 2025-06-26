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
    <title>Perpustakaan - Detail<?php echo $judul_buku; ?></title>
</head>
<body>
    
    <?php include '../components/navbar.php'; ?>

    
    <div class="container">
        <header class="book-header d-flex">
            <h1 class="book-title"><?= $book['judul_buku']; ?></h1>
            <p class="text-muted fs-4 px-2"> - <?= $book['kategori_buku'];?>
        </header>

        <div class="book-image">
            <img src="/assets/img/buku/<?= $book['gambar_buku']; ?>" alt="<?= $book['judul_buku']; ?>" class="img-fluid rounded"></p>
        </div>

        <h2>Deskripsi Singkat</h2>
        <section class="book-description">
            <p><?= $book['deskripsi_buku']; ?></p>
        </section>

        <section class="detail-section">
            <h2>Informasi Detail</h2>
            <div class="detail-list">
                <div><strong>Penerbit:</strong> <?= $book['penerbit_buku']; ?></div>
                <div><strong>Jumlah Buku:</strong> <?= $book['jumlah_buku']; ?></div>
                <div><strong>Jumlah Halaman:</strong> <?= $book['jumlah_halaman']; ?></div>
                <div><strong>Deskripsi Buku:</strong> <?= $book['deskripsi_buku']; ?></div>
                <div><strong>Bahasa:</strong> <?= $book['bahasa_buku']; ?></div>
                <div><strong>ISBN/ISSN:</strong><?= $book['isbn_buku']; ?></div>
            </div>
        </section>
    </div>

    <?php include '../components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
