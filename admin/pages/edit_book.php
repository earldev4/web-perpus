<?php

require_once __DIR__ . "/../../config/db.php";
require_once __DIR__ . "/../../config/class.php";
require_once __DIR__ . "/../config/class.php";

$conn = getConnection();
$perpustakaan = new Perpustakaan($conn);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['logout'])) {
        $response = $perpustakaan->handleLogout("/../../pages/login.php");
        echo json_encode($response);
        exit();
    }
    if (isset($_POST['judul_buku'])) {
        $response = $perpustakaan->editBook($_POST);
        echo json_encode($response);
        exit();
    }  
} 
if($_SERVER['REQUEST_METHOD'] == "GET"){
    if (isset($_GET['id'])) {
        $id_berita = $_GET['id'];
        $result = $perpustakaan->viewBookDetail($id_berita);
        $book = $result['book'];
    }
}

$routing = new Routing("../home.php", "profile.php", "add_book.php", "social_media.php", "lend_page.php",  "../../index.php", "edit_book.php");

if (isset($_SESSION["is_login"]) == false) {
    header("location: ../../pages/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="../../assets/style/admin_home.css">
    <title>Admin - Edit Buku <?= $book['judul_buku'] ?></title>
</head>
<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-md-2 col-12 bg-primary">
            <?php include 'nav.php'; ?>
            </div>
            <div class="col-md-10 col-12 bg-success">
                <div>
                    <h1>EDIT DATA BUKU</h1>
                    <form action="edit_book.php" id="edit_book" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_buku" value="<?= $book['id_buku']?>">
                        <input type="hidden" name="id_informasi" value="<?= $book['id_informasi']?>">

                        <label class="form-label" for="judul_buku">Judul Buku:</label><br>
                        <input class="form-control" type="text" name="judul_buku" id="judul_buku" autocomplete="off" required value="<?= $book['judul_buku'] ?>"><br>
                        
                        <label class="form-label" for="lampiran_buku">Lampirkan Buku (pdf, doc, docx):</label><br>
                        <input class="form-control" type="file" name="lampiran_buku" accept=".pdf,.doc,.docx" id="lampiran_buku" value="<?= $book['lampiran_buku'] ?>" autocomplete="off" placeholder="Lampirkan file pdf, doc, docx"><br>
                        
                        <label class="form-label" for="kategori_buku">Kategori Buku:</label><br>
                        <input class="form-control" type="text" name="kategori_buku" id="kategori_buku" value="<?= $book['kategori_buku'] ?>" autocomplete="off"><br>
                        
                        <label class="form-label" for="pengarang_buku">Pengarang Buku:</label><br>
                        <input class="form-control" type="text" name="pengarang_buku" id="pengarang_buku" value="<?= $book['pengarang_buku'] ?>" autocomplete="off"><br>

                        <label class="form-label" for="penerbit_buku">Penerbit Buku:</label><br>
                        <input class="form-control" type="text" name="penerbit_buku" id="penerbit_buku" value="<?= $book['penerbit_buku'] ?>" autocomplete="off"><br>

                        <label class="form-label" for="jumlah_buku">Jumlah Buku:</label><br>
                        <input class="form-control" type="number" name="jumlah_buku" id="jumlah_buku" value="<?= $book['jumlah_buku'] ?>" autocomplete="off" required><br>

                        <label class="form-label" for="jumlah_halaman">Jumlah Halaman:</label><br>
                        <input class="form-control" type="number" name="jumlah_halaman" id="jumlah_halaman" value="<?= $book['jumlah_halaman'] ?>" autocomplete="off" required><br>
                        
                        <label class="form-label" for="bahasa_buku">Bahasa Buku:</label><br>
                        <input class="form-control" type="text" name="bahasa_buku" id="bahasa_buku" value="<?= $book['bahasa_buku'] ?>" autocomplete="off" required><br>
                        
                        <label class="form-label" for="isbn_buku">ISBN Buku:</label><br>
                        <input class="form-control" type="text" name="isbn_buku" id="isbn_buku" value="<?= $book['isbn_buku'] ?>" autocomplete="off" required><br>

                        <label class="form-label" for="deskripsi_buku">Deskripsi Buku:</label><br>
                        <textarea name="deskripsi_buku" id="deskripsi_buku" class="form-control" rows="4" cols="50" autocomplete="off" ><?= $book['deskripsi_buku'] ?></textarea><br>
                            
                        <button class="btn btn-save w-100" type="submit" name="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#form_logout').submit(function(e){
                e.preventDefault();
                let form = $(this);
                let url = form.attr('action');
                let method = form.attr('method');
                let data = new FormData(form[0]);
                console.log("Coba")
                $.ajax({
                    url: url,
                    type: method,
                    processData: false,
                    contentType: false,
                    data: data,
                    dataType: 'JSON',
                    success: function(response){
                        if(response.status == "success"){
                            toastr.success(response.message, "Success !",{
                                closeButton: true,
                                progressBar: true,
                                timeOut: 1500
                            });
                            setTimeout(function(){
                                if (response.redirect != "") {
                                    location.href = response.redirect
                                }
                            }, 1800);
                        } else{
                            toastr.error(response.message, "Error !",{
                                closeButton: true,
                                progressBar: true,
                                timeOut: 1500
                            });
                        }
                    }
                })
            })
        })
        $(document).ready(function(){
            $('#edit_book').submit(function(e){
                e.preventDefault();
                let form = $(this);
                let url = form.attr('action');
                let method = form.attr('method');
                let data = new FormData(form[0]);
                console.log("Coba")
                $.ajax({
                    url: url,
                    type: method,
                    processData: false,
                    contentType: false,
                    data: data,
                    dataType: 'JSON',
                    success: function(response){
                        if(response.status == "success"){
                            toastr.success(response.message, "Success !",{
                                closeButton: true,
                                progressBar: true,
                                timeOut: 1500
                            });
                            setTimeout(function(){
                                if (response.redirect != "") {
                                    location.href = response.redirect
                                }
                            }, 1800);
                        } else{
                            toastr.error(response.message, "Error !",{
                                closeButton: true,
                                progressBar: true,
                                timeOut: 1500
                            });
                        }
                    }
                })
            })
        })
    </script>
</body>
</html>