<?php
require_once "../config/db.php";

$conn = getConnection();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if($_POST["judul_buku"] && $_FILES["gambar_buku"] && $_POST["kategori_buku"] && $_POST["penerbit_buku"] && $_POST["jumlah_buku"] && $_POST["jumlah_halaman"] && $_POST["deskripsi_buku"] && $_POST["bahasa_buku"] && $_POST["isbn_buku"]){
            $judul_buku = $_POST["judul_buku"];
            $gambar_buku = $_FILES["gambar_buku"];
            $gambar_buku_name = $_FILES["gambar_buku"]["name"];
            $gambar_buku_temp = $_FILES["gambar_buku"]["tmp_name"];
            $gambar_buku_size = $_FILES["gambar_buku"]["size"];
            $gambar_buku_type = $_FILES["gambar_buku"]["type"];
            $kategori_buku = $_POST["kategori_buku"];
            $penerbit_buku = $_POST["penerbit_buku"];
            $jumlah_buku = $_POST["jumlah_buku"];
            $jumlah_halaman = $_POST["jumlah_halaman"];
            $deskripsi_buku = $_POST["deskripsi_buku"];
            $bahasa_buku = $_POST["bahasa_buku"];
            $isbn_buku = $_POST["isbn_buku"];
            $file_ext = explode('.', $gambar_buku_name);
            $file_ext_actual = strtolower(end($file_ext));
            $allowed = array('jpg', 'jpeg', 'png');

            if($judul_buku && $gambar_buku && $kategori_buku && $penerbit_buku && $jumlah_buku && $jumlah_halaman && $deskripsi_buku && $bahasa_buku && $isbn_buku){
                if (in_array($file_ext_actual, $allowed)) {
                    if($gambar_buku_size < 5000000){
                        $sql = <<<SQL
                            INSERT INTO informasi (jumlah_halaman, bahasa_buku, isbn_buku) VALUES (?, ?, ?);
                        SQL;
                        $sql = $conn->prepare($sql);
                        $sql->bindParam(1, $jumlah_halaman);
                        $sql->bindParam(2, $bahasa_buku);
                        $sql->bindParam(3, $isbn_buku);
                        $sql->execute();
                        $id_informasi = $conn->lastInsertId();

                        $gambar_name_new = uniqid('', true) . "." . $file_ext_actual;
                        $gambar_folder = __DIR__ . '/../assets/img/buku/' . $gambar_name_new;
                        move_uploaded_file($gambar_buku_temp, $gambar_folder);
                        $sql = <<<SQL
                            INSERT INTO buku (judul_buku, gambar_buku, kategori_buku, penerbit_buku, jumlah_buku, id_informasi, deskripsi_buku) VALUES (?, ?, ?, ?, ?, ?, ?);
                        SQL;
                        $sql = $conn->prepare($sql);
                        $sql->bindParam(1, $judul_buku);
                        $sql->bindParam(2, $gambar_name_new);
                        $sql->bindParam(3, $kategori_buku);
                        $sql->bindParam(4, $penerbit_buku);
                        $sql->bindParam(5, $jumlah_buku);
                        $sql->bindParam(6, $id_informasi);
                        $sql->bindParam(7, $deskripsi_buku);
                        $sql->execute();

                        echo "<script>alert('Buku berhasil ditambahkan!'); window.location.href='../pages/katalog.php';</script>";
                        exit();
                    } else {
                        echo "<script>alert('Gambar buku terlalu besar! Maksimal 5MB');</script>";
                        exit();
                    }
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="add_book.php" method="POST" enctype="multipart/form-data">
        <h3>Data Buku</h3>
        <label>Judul Buku:</label>
        <input type="text" name="judul_buku" id="judul_buku" required><br>
        
        <label>Gambar Buku:</label>
        <input type="file" name="gambar_buku" id="gambar_buku"><br>
        
        <label>Kategori Buku:</label>
        <input type="text" name="kategori_buku" id="kategori_buku"><br>
        
        <label>Penerbit Buku:</label>
        <input type="text" name="penerbit_buku" id="penerbit_buku"><br>

        <label>Jumlah Buku:</label>
        <input type="number" name="jumlah_buku" id="jumlah_buku" required><br>

        <label>Jumlah Halaman:</label>
        <input type="number" name="jumlah_halaman" id="jumlah_halaman" required><br>
        
        <label>Bahasa Buku:</label>
        <input type="text" name="bahasa_buku" id="bahasa_buku" required><br>
        
        <label>ISBN Buku:</label>
        <input type="text" name="isbn_buku" id="isbn_buku" required><br>

        <label>Deskripsi Buku:</label>
        <input type="text" name="deskripsi_buku" id="deskripsi_buku" required><br>
            
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>