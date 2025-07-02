<?php
require_once __DIR__ . "/../config/db.php";
require_once __DIR__ . "/../config/class.php";
require_once __DIR__ . "/config/class.php";

$conn = getConnection();
$perpustakaan = new Perpustakaan($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['logout'])) {
        $response = $perpustakaan->handleLogout("../pages/login.php");
        echo json_encode($response);
        exit();
    }
    if (isset($_POST['hero_title'])) {
        $response = $perpustakaan->editHeroText($_POST);
        echo json_encode($response);
        exit();
    }
    if (isset($_POST["edit_click"])){
        $response = $perpustakaan->editLinkClicks($_POST);
        echo json_encode($response);
        exit();
    }
    if (isset($_POST["footer_text"])){
        $response = $perpustakaan->setDisplayFooter($_POST);
        echo json_encode($response);
        exit();
    }
}


$result = $perpustakaan->getHomeHero();
$heroText = $result['hero'];

$result = $perpustakaan->getClicks();
$clicks = intval($result['clicks']['clicks']);

$result = $perpustakaan->displayFooter();
$footerInfo = $result['footer'];

$routing = new Routing("home.php", "./pages/profile.php", "./pages/add_book.php", "./pages/social_media.php", "./pages/lend_page.php", "../index.php", "home.php");

if (isset($_SESSION["is_login"]) == false) {
    header("location: ../pages/login.php");
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
    <link rel="stylesheet" href="../assets/style/admin_home.css">
    <title>Admin - Home</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-md-2 col-12 bg-primary">
                <?php include 'pages/nav.php'; ?>
            </div>
            <div class="col-md-10 col-12 bg-success">
                <div>
                    <h1>EDIT TEKS BANNER HOMEPAGE</h1>
                    <form action="home.php" method="POST" id="form_hero" name="form_hero" >
                        <label for="hero_title" class="form-label">Deskripsi Hero</label><br>
                        <textarea class="form-control" name="hero_title" id="hero_title" rows="4" cols="50" required placeholder="cth: Selamat Datang di Perpustakaan..." autocomplete="off"><?= htmlspecialchars($heroText["hero_desc"]) ?></textarea><br>
                        <p class="text-danger" id="hero_error"></p>
                        <button class="btn btn-primary w-100" type="submit">Simpan</button>
                    </form>
                </div>
                <div>
                    <h1>EDIT TEKS JUMLAH CLICK</h1>
                    <form action="home.php" method="POST" id="form_click" name="form_click">
                        <label for="clicks" class="form-label">Deskripsi Hero</label><br>
                        <input class="form-control" type="text" name="edit_click" id="clicks" autocomplete="off" value="<?= htmlspecialchars($clicks)?>" required placeholder="Masukan jumlah pengunjung">
                        <p class="text-danger" id="click_error"></p>
                        <button class="btn btn-primary w-100" type="submit">Simpan</button>
                    </form>
                </div>
                <div class="p-3">
                    <h1>EDIT INFORMASI FOOTER</h1>
                    <form action="home.php" method="POST" id="form_footer" name="form_footer">
                        <label for="footer_text" class="form-label" >Deskripsi footer</label><br>
                        <textarea  class="form-control" name="footer_text" id="footer_text" rows="4" autocomplete="off" cols="50" required placeholder="cth: Bandar Lampung merupakan..."><?= htmlspecialchars($footerInfo["footer_text"]) ?></textarea><br>
                        <p class="text-danger" id="footer_text_error"></p>
                        <label for="footer_kontak" class="form-label">Footer kontak</label><br>
                        <input class="form-control" type="text" name="footer_kontak" autocomplete="off" id="footer_kontak" value="<?= htmlspecialchars($footerInfo["kontak"]) ?>" required placeholder="cth: 0821..."><br>
                        <p class="text-danger" id="footer_kontak_error"></p>
                        <label class="form-label" for="footer_email">Footer email</label><br>
                        <input class="form-control" type="text" name="footer_email" autocomplete="off" id="footer_email" value="<?= htmlspecialchars($footerInfo["email"]) ?>" required placeholder="cth: example@gmail.com"><br>
                        <p class="text-danger" id="footer_email_error"></p>
                        <label class="form-label" for="footer_hari">Footer Hari</label><br>
                        <input class="form-control" type="text" name="footer_hari" autocomplete="off" id="footer_hari" value="<?= htmlspecialchars($footerInfo["hari"]) ?>" required placeholder="cth: Senin - Sabtu"><br>
                        <p class="text-danger" id="footer_hari_error"></p>
                        <label class="form-label" for="footer_jam">Footer Jam</label><br>
                        <input class="form-control" type="text" name="footer_jam" autocomplete="off" id="footer_jam" value="<?= htmlspecialchars($footerInfo["jam"]) ?>" required placeholder="cth: 08:00 - 17:00"><br>
                        <p class="text-danger" id="footer_jam_error"></p>
                        <label class="form-label" for="footer_lokasi">Footer lokasi</label><br>
                        <textarea class="form-control" rows="4" cols="50" name="footer_lokasi" autocomplete="off" id="footer_lokasi" required placeholder="cth: Jl. Sukamakan No 1..."><?= htmlspecialchars($footerInfo["lokasi"]) ?></textarea><br>
                        <p class="text-danger" id="footer_lokasi_error"></p>
                        <button class="btn btn-primary w-100" type="submit">Simpan</button>
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
            $('#form_hero').submit(function(e){
                e.preventDefault();
                const home_hero = document.forms["form_hero"]["hero_title"].value.trim();
                const hero_error = document.getElementById("hero_error");

                if(!home_hero || home_hero.length < 30 || home_hero.length > 200){
                    hero_error.textContent = "Deskripsi harus lebih dari 30 karakter dan kurang dari 200 karakter";
                    return;
                } else {
                    hero_error.textContent = "";
                }

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
            $('#form_click').submit(function(e){
                e.preventDefault();
                const clickEdit = document.forms["form_click"]["edit_click"].value.trim();
                const click_error = document.getElementById("click_error");

                if(!clickEdit || clickEdit <= 0){
                    click_error.textContent = "Klik harus lebih dari 0";
                    return;
                } else {
                    click_error.textContent = "";
                }

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
            $('#form_footer').submit(function(e){
                e.preventDefault();

                const phoneRegex = /^[0-9]+$/;
                const form_footer = document.forms["form_footer"]["footer_text"].value.trim();
                const footer_kontak = document.forms["form_footer"]["footer_kontak"].value.trim();
                const footer_email = document.forms["form_footer"]["footer_email"].value.trim();
                const footer_hari = document.forms["form_footer"]["footer_hari"].value.trim();
                const footer_jam = document.forms["form_footer"]["footer_jam"].value.trim();
                const footer_lokasi = document.forms["form_footer"]["footer_lokasi"].value.trim();

                const footer_text_error = document.getElementById("footer_text_error");
                const footer_kontak_error = document.getElementById("footer_kontak_error");
                const footer_email_error = document.getElementById("footer_email_error");
                const footer_hari_error = document.getElementById("footer_hari_error");
                const footer_jam_error = document.getElementById("footer_jam_error");
                const footer_lokasi_error = document.getElementById("footer_lokasi_error");

                if(!form_footer || form_footer.length < 30 || form_footer.length > 350){
                    footer_text_error.textContent = "Deskripsi harus lebih dari 30 karakter dan kurang dari 350 karakter";
                    return;
                } else {
                    footer_text_error.textContent = "";
                }
                if (!footer_kontak) {
                    footer_kontak_error.textContent = "Nomor telepon tidak boleh kosong";
                    return;
                } else if (!phoneRegex.test(footer_kontak)) {
                    footer_kontak_error.textContent = "Nomor telepon harus berupa angka";
                    return;
                } else if (footer_kontak.length < 10 || footer_kontak.length > 15) {
                    footer_kontak_error.textContent = "Nomor telepon harus terdiri dari 10–15 digit";
                    return;
                } else {
                    footer_kontak_error.textContent = "";
                }
                if(!footer_email || footer_email.length < 5 || footer_email.length > 50){
                    footer_email_error.textContent = "Email harus lebih dari 5 karakter dan kurang dari 50 karakter";
                    return;
                } else {
                    footer_email_error.textContent = "";
                }
                if(!footer_hari || footer_hari.length < 5 || footer_hari.length > 45){
                    footer_hari_error.textContent = "Isi hari harus lebih dari 5 karakter dan kurang dari 45 karakter";
                    return;
                } else {
                    footer_hari_error.textContent = "";
                }
                if(!footer_jam || footer_jam.length < 5 || footer_jam.length > 45){
                    footer_jam_error.textContent = "Jam harus lebih dari 5 karakter dan kurang dari 45 karakter";
                    return;
                } else {
                    footer_jam_error.textContent = "";
                }
                if(!footer_lokasi || footer_lokasi.length < 30 || footer_lokasi.length > 200){
                    footer_lokasi_error.textContent = "Lokasi harus lebih dari 30 karakter dan kurang dari 200 karakter";
                    return;
                } else {
                    footer_lokasi_error.textContent = "";
                }

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
    </script>
</body>
</html>