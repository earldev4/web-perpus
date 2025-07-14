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
    if (isset($_POST["old_password"])){
        $redirect = "lend_page.php";
        $response = $perpustakaan->changePassword($_POST, $redirect);
        echo json_encode($response);
        exit();
    } 
    if (isset($_POST["ubah_status"])){
        $response = $perpustakaan->updateLendStatus($_POST);
        echo json_encode($response);
        exit();
    }
} 
if($_SERVER['REQUEST_METHOD'] == "GET"){
    if (isset($_GET['id'])) {
        $id_peminjaman = $_GET['id'];
        $result = $perpustakaan->viewLendDetail($id_peminjaman);
        $peminjam = $result['peminjam'];
    }
}
$no_peminjaman = $_GET["no"];

$routing = new Routing("../home.php", "profile.php", "add_book.php", "social_media.php", "lend_page.php",  "../../index.php", "detail_peminjaman.php", "detail_peminjaman.php");

if (isset($_SESSION["is_login"]) == false) {
    header("location: ../../pages/login.php");
    exit();
}
function formatTanggalIndonesia($tanggal) {
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    $timestamp = strtotime($tanggal);
    $tgl = date('j', $timestamp); 
    $bln = (int)date('n', $timestamp); 
    $thn = date('Y', $timestamp);

    return "$tgl {$bulan[$bln]} $thn"; 
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../../assets/style/admin_home.css">
    <title>Admin - Peminjaman oleh <?= $peminjam['nama_peminjam'] ?></title>
</head>
<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-md-2 col-12 bg-primary">
            <?php include 'nav.php'; ?>
            </div>
            <div class="col-md-10 col-12 bg-success">
                <div>
                    <h1>DETAIL PEMINJAM BUKU</h1>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nomor Peminjaman</th>
                                <td><?= isset($no_peminjaman) ?  htmlspecialchars($no_peminjaman) : "" ?></td>
                            </tr>
                            <tr>
                                <th>Nama Peminjam</th>
                                <td><?= isset($peminjam["nama_peminjam"]) ?  htmlspecialchars($peminjam["nama_peminjam"]) : "" ?></td>
                            </tr>
                            <tr>
                                <th>NIP Peminjaman</th>
                                <td><?= isset($peminjam["nip_peminjam"]) ?  htmlspecialchars($peminjam["nip_peminjam"]) : "" ?></td>
                            </tr>
                            <tr>
                                <th>Jabatan Peminjaman</th>
                                <td><?= isset($peminjam["jabatan_peminjam"]) ?  htmlspecialchars($peminjam["jabatan_peminjam"]) : "" ?></td>
                            </tr>
                            <tr>
                                <th>Bidang Peminjaman</th>
                                <td><?= isset($peminjam["bidang_peminjam"]) ?  htmlspecialchars($peminjam["bidang_peminjam"]) : "" ?></td>
                            </tr>
                            <tr>
                                <th>Judul Buku</th>
                                <td><?= isset($peminjam["judul_buku"]) ?  htmlspecialchars($peminjam["judul_buku"]) : "" ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Peminjaman</th>
                                <td><?= isset($peminjam["tanggal_peminjaman"]) ? formatTanggalIndonesia(htmlspecialchars($peminjam["tanggal_peminjaman"])) : "" ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengembalian</th>
                                <td><?= isset($peminjam["tanggal_pengembalian"]) ? formatTanggalIndonesia(htmlspecialchars($peminjam["tanggal_pengembalian"])) : "" ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Telephone</th>
                                <td><?= isset($peminjam["no_telp"]) ?  htmlspecialchars($peminjam["no_telp"]) : "" ?></td>
                            </tr>
                            <tr>
                                <th>Status Peminjaman</th>
                                <td class="d-flex"><?= isset($peminjam["status_peminjaman"]) ? ($peminjam["status_peminjaman"] == "DIPINJAM" ? "<span class='badge bg-success p-2 me-2'>Dipinjam</span>" : "<span class='badge bg-danger p-2 me-2'>Dikembalikan</span>") : "" ?>   
                                    <?php if ($peminjam["status_peminjaman"] == "DIPINJAM") { ?>
                                        <form action="detail_peminjaman.php" method="POST" id="ubah_status">
                                            <input type="hidden" name="ubah_status" value="<?= isset($peminjam["id_peminjaman"]) ?  htmlspecialchars($peminjam["id_peminjaman"]) : "" ?>">
                                            <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;"><i class="fa-solid fa-pen-to-square"></i></button>
                                        </form>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'modal_changepw.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
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
        $('#ubah_status').submit(function(e){
            e.preventDefault();
            let form = $(this);

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Status Peminjaman Akan Diubah Secara Permanent.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Ubah!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = form.attr('action');
                    let method = form.attr('method');
                    let data = new FormData(form[0]);

                    $.ajax({
                        url: url,
                        type: method,
                        processData: false,
                        contentType: false,
                        data: data,
                        dataType: 'JSON',
                        success: function(response) {
                            if(response.status === "success") {
                                toastr.success(response.message, "Success !", {
                                    closeButton: true,
                                    progressBar: true,
                                    timeOut: 1500
                                });
                                setTimeout(function(){
                                    if (response.redirect !== "") {
                                        window.location.href = response.redirect;
                                    } else {
                                        window.location.reload();
                                    }
                                }, 1800);
                            } else {
                                toastr.error(response.message, "Error !", {
                                    closeButton: true,
                                    progressBar: true,
                                    timeOut: 1500
                                });
                            }
                        }
                    });
                }
            });
        })
    </script>
</body>
</html>