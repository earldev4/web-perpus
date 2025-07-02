<?php
require_once __DIR__ . "/../../config/db.php";
require_once __DIR__ . "/../../config/class.php";
require_once __DIR__ . "/../config/class.php";

$conn = getConnection();
$perpustakaan = new Perpustakaan($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['logout'])) {
        $response = $perpustakaan->handleLogout("/../../pages/login.php");
        echo json_encode($response);
        exit();
    }
    if (isset($_POST['profile'])) {
        $response = $perpustakaan->editProfile($_POST);
        echo json_encode($response);
        exit();
    }
}

$result = $perpustakaan->getProfile();
$profile = $result['profile'];

$routing = new Routing("../home.php", "profile.php", "add_book.php", "social_media.php", "../../index.php", "profile.php");

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
    <title>Admin - Profile</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-md-2 col-12 bg-primary">
            <?php include 'nav.php'; ?>
            </div>
            <div class="col-md-10 col-12 bg-success">
                <div class="px-lg-5 px-2">
                    <h1>EDIT PROFILE</h1>
                    <form action="profile.php" method="POST" id="form_profile" name="form_profile" enctype="multipart/form-data" >
                        <label for="profile" class="form-label fs-4">Deskripsi Profile</label><br>
                        <p class="text-danger" id="profile_error"></p>
                        <textarea class="form-control" autocomplete="off" name="profile" id="profile" rows="25" cols="50" required placeholder="cth: Bappeda Provinsi Lampung pada awalnya..."><?= htmlspecialchars($profile['profile_desk']) ?></textarea><br>
                        <label class="form-label fs-4" for="profile_picture">Pilih Gambar Struktur Organisasi</label>
                        <div class="">
                            <img src="../../assets/img/<?= htmlspecialchars($profile['profile_picture'])?>" alt="" class="img-fluid">
                        </div>
                        <p class="text-muted">Gambar harus berukuran 1600 x 700 atau rasio 16:7</p>
                        <input type="file" name="profile_picture" id="profile_picture" class="form-control">
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
            $('#form_profile').submit(function(e){
                e.preventDefault();

                const profile_text = document.forms["form_profile"]["profile"].value.trim();

                let profile_error = document.getElementById("profile_error");

                if(!profile_text || profile_text.length < 500 ){
                    profile_error.textContent = "Deskripsi harus lebih dari 500 karakter";
                    return;
                } else {
                    profile_error.textContent = "";
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