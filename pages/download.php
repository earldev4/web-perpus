<?php
require_once __DIR__ . "/../config/db.php";
require_once __DIR__ . "/../config/class.php";

$conn = getConnection();
$perpustakaan = new Perpustakaan($conn);

if (isset($_GET["id_buku"])) {
    $id_buku = $_GET["id_buku"];

    $sql = "UPDATE buku SET download = download + 1 WHERE id_buku = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id_buku);
    $stmt->execute();

    $sql = "SELECT lampiran_buku FROM buku WHERE id_buku = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id_buku);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && isset($row["lampiran_buku"])) {
        $file = $row["lampiran_buku"];
        header("Location: ../assets/img/buku/" . urlencode($file));
        exit();
    } else {
        echo "File tidak ditemukan.";
    }
} else {
    echo "ID buku tidak valid.";
}
?>
