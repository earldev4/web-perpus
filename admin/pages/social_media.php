<?php
require_once __DIR__ . "/../../config/db.php";
require_once __DIR__ . "/../../config/class.php";
require_once __DIR__ . "/../config/class.php";

$conn = getConnection();
$perpustakaan = new Perpustakaan($conn);

if (isset($_SESSION["is_login"]) == false) {
    header("location: ../../pages/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['logout'])) {
        $response = $perpustakaan->handleLogout("/../../pages/login.php");
        echo json_encode($response);
        exit();
    }
    if (isset($_POST["old_password"])){
        $redirect = "social_media.php";
        $response = $perpustakaan->changePassword($_POST, $redirect);
        echo json_encode($response);
        exit();
    }
    if (isset($_POST["instagram"])){
        $response = $perpustakaan->editSocialMedia($_POST);
        echo json_encode($response);
        exit();
    }
}

$result = $perpustakaan->getHomeHero();
$heroText = $result['hero'];

$socialMedia = $perpustakaan->displaySocialMedia()["social"];

$routing = new Routing("../home.php", "profile.php", "add_book.php", "social_media.php", "lend_page.php", "../../index.php", "social_media.php", "social_media.php");


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
    <title>Admin - Social Media</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-md-2 col-12 bg-primary">
            <?php include 'nav.php'; ?>
            </div>
            <div class="col-md-10 col-12 bg-success">
                <div>
                    <h1>EDIT SOCIAL MEDIA</h1>
                    <form action="social_media.php" method="POST" id="form_social_media" name="form_social_media" >
                        <label for="instagram" class="form-label">Instagram</label><br>
                        <input class="form-control" autocomplete="off" name="instagram" id="instagram" required placeholder="cth: www.instagram.com/..." value="<?= isset($socialMedia["instagram"]) ? htmlspecialchars($socialMedia["instagram"]) : "" ?>"><br>
                        <p class="text-danger" id="instagram_error"></p>
                        <label for="youtube" class="form-label">Youtube</label><br>
                        <input class="form-control" autocomplete="off" name="youtube" id="youtube" required placeholder="cth: www.youtube.com/..." value="<?= isset($socialMedia["youtube"]) ? htmlspecialchars($socialMedia["youtube"]) : "" ?>"><br>
                        <p class="text-danger" id="youtube_error"></p>
                        <label for="tiktok" class="form-label">Tiktok</label><br>
                        <input class="form-control" autocomplete="off" name="tiktok" id="tiktok" required placeholder="cth: www.tiktok.com/..." value="<?= isset($socialMedia["tiktok"]) ? htmlspecialchars($socialMedia["tiktok"]) : "" ?>"><br>
                        <p class="text-danger" id="tiktok_error"></p>
                        <label for="x" class="form-label">X</label><br>
                        <input class="form-control" autocomplete="off" name="x" id="x" required placeholder="cth: www.x.com/..." value="<?= isset($socialMedia["x"]) ? htmlspecialchars($socialMedia["x"]) : "" ?>"><br>
                        <p class="text-danger" id="x_error"></p>
                        <label for="facebook" class="form-label">Facebook</label><br>
                        <input class="form-control" autocomplete="off" name="facebook" id="facebook" required placeholder="cth: www.facebook.com/..." value="<?= isset($socialMedia["facebook"]) ? htmlspecialchars($socialMedia["facebook"]) : "" ?>"><br>
                        <p class="text-danger" id="facebook_error"></p>
                        <button class="btn btn-primary w-100" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'modal_changepw.php'; ?>
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
        $('.passwordMenu').on('submit', '#changePassword', function(e){
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
        $(document).ready(function(){
            $('#form_social_media').submit(function(e){
                e.preventDefault();

                const instagram = document.forms["form_social_media"]["instagram"].value.trim();  
                const youtube = document.forms["form_social_media"]["youtube"].value.trim();  
                const tiktok = document.forms["form_social_media"]["tiktok"].value.trim();  
                const x = document.forms["form_social_media"]["x"].value.trim();  
                const facebook = document.forms["form_social_media"]["facebook"].value.trim();

                let instagram_error = document.getElementById("instagram_error");
                let youtube_error = document.getElementById("youtube_error");
                let tiktok_error = document.getElementById("tiktok_error");
                let x_error = document.getElementById("x_error");
                let facebook_error = document.getElementById("facebook_error");

                if (!instagram || instagram.length < 10 || instagram.length > 200){
                    instagram_error.textContent = "Instagram harus lebih dari 10 karakter dan kurang dari 200 karakter";
                    return;
                } else {
                    instagram_error.textContent = "";
                }
                if (!youtube || youtube.length < 10 || youtube.length > 200){
                    youtube_error.textContent = "Youtube harus lebih dari 10 karakter dan kurang dari 200 karakter";
                    return;
                } else {
                    youtube_error.textContent = "";
                }
                if (!tiktok || tiktok.length < 10 || tiktok.length > 200){
                    tiktok_error.textContent = "Tiktok harus lebih dari 10 karakter dan kurang dari 200 karakter";
                    return;
                } else {
                    tiktok_error.textContent = "";
                }
                if (!x || x.length < 10 || x.length > 200){
                    x_error.textContent = "X harus lebih dari 10 karakter dan kurang dari 200 karakter";
                    return;
                } else {
                    x_error.textContent = "";
                }
                if (!facebook || facebook.length < 10 || facebook.length > 200){
                    facebook_error.textContent = "Facebook harus lebih dari 10 karakter dan kurang dari 200 karakter";
                    return;
                } else {
                    facebook_error.textContent = "";
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
    </script>
</body>
</html>