<?php
require_once __DIR__ . "/../config/db.php";
require_once __DIR__ . "/../config/class.php";

$conn = getConnection();
$perpustakaan = new Perpustakaan($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nama_peminjam'])) {
        $response = $perpustakaan->lenderRegistration($_POST);
        echo json_encode($response);
        exit();
    }
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="../assets/style/style.css">
    <link rel="stylesheet" href="../assets/style/admin_home.css">
    <link rel="stylesheet" href="../assets/style/detail.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/script/script.js"></script>   
    <title>Perpustakaan - Form Peminjaman</title>
</head>
<body>
    
    <?php include '../components/navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div>
                <h1>PINJAM BUKU</h1>
                <hr>
                <form action="form_peminjaman.php" id="form_peminjaman" method="POST">
                    <label class="form-label" for="nama_peminjam">Nama Peminjam</label><br>
                    <input class="form-control" type="text" name="nama_peminjam" id="nama_peminjam" autocomplete="off" required><br>
                    <p class="text-danger" id="nama_peminjam_error"></p>
                    
                    <label class="form-label" for="nip_peminjam">NIP Peminjam</label><br>
                    <input class="form-control" type="text" name="nip_peminjam" id="nip_peminjam" autocomplete="off"><br>
                    <p class="text-danger" id="nip_peminjam_error"></p>

                    <label class="form-label" for="jabatan_peminjam">Jabatan Peminjam</label><br>
                    <input class="form-control" type="text" name="jabatan_peminjam" id="jabatan_peminjam" autocomplete="off"><br>
                    <p class="text-danger" id="jabatan_peminjam_error"></p>

                    <label class="form-label" for="bidang_peminjam">Bidang Peminjam</label><br>
                    <input class="form-control" type="text" name="bidang_peminjam" id="bidang_peminjam" autocomplete="off" required><br>
                    <p class="text-danger" id="bidang_peminjam_error"></p>

                    <label class="form-label" for="judul_buku_display">Judul Buku</label><br>
                    <input class="form-control" type="text" name="judul_buku_display" id="judul_buku_display" value="<?= $book['judul_buku']; ?>" readonly>
                    <input type="hidden" name="judul_buku" value="<?= $book['judul_buku']; ?>">
                    
                    <label class="form-label" for="tanggal_pengembalian">Tanggal Pengembalian</label><br>
                    <input class="form-control" type="date" name="tanggal_pengembalian" id="tanggal_pengembalian"  required><br>

                    <label class="form-label" for="no_telp">Nomor Telephone</label><br>
                    <input type="text" placeholder="cth: 0812-3456-7890" class="form-control" name="no_telp" id="no_telp" autocomplete="off">
                    <p class="text-danger" id="no_telp_error"></p>
                        
                    <button class="btn btn-save w-100" type="submit" name="submit">PINJAM BUKU</button>
                </form>
            </div>
        </div>
    </div>

    <?php include '../components/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            const today = new Date().toISOString().split('T')[0];
            $('#tanggal_pengembalian').attr('min', today).val(today);

            $('#form_peminjaman').submit(function(e){
                e.preventDefault();

                let form = $(this);

                const nama_peminjam = document.forms["form_peminjaman"]["nama_peminjam"].value.trim();
                const nip_peminjam = document.forms["form_peminjaman"]["nip_peminjam"].value.trim();
                const jabatan_peminjam = document.forms["form_peminjaman"]["jabatan_peminjam"].value.trim();
                const bidang_peminjam = document.forms["form_peminjaman"]["bidang_peminjam"].value.trim();
                const no_telp = document.forms["form_peminjaman"]["no_telp"].value.trim();

                const nama_peminjam_error = document.getElementById("nama_peminjam_error");
                const nip_peminjam_error = document.getElementById("nip_peminjam_error");
                const jabatan_peminjam_error = document.getElementById("jabatan_peminjam_error");
                const bidang_peminjam_error = document.getElementById("bidang_peminjam_error");
                const no_telp_error = document.getElementById("no_telp_error");


                if (!nama_peminjam || nama_peminjam.length < 5 || nama_peminjam.length > 50) {
                    nama_peminjam_error.textContent = "Nama Peminjam Tidak boleh kurang dari 5 karakter dan lebih dari 50 karakter !";
                    return;
                } else {
                    nama_peminjam_error.textContent = "";
                }
                if (!nip_peminjam || nip_peminjam.length < 5 || nip_peminjam.length > 20) {
                    nip_peminjam_error.textContent = "NIP Peminjam Tidak boleh kurang dari 5 karakter dan lebih dari 20 karakter !";
                    return;
                } else {
                    nip_peminjam_error.textContent = "";
                }
                if (!jabatan_peminjam || jabatan_peminjam.length < 5 || jabatan_peminjam.length > 50) {
                    jabatan_peminjam_error.textContent = "Jabatan Peminjam Tidak boleh kurang dari 5 karakter dan lebih dari 50 karakter !";
                    return;
                } else {
                    jabatan_peminjam_error.textContent = "";
                }
                if (!bidang_peminjam || bidang_peminjam.length < 5 || bidang_peminjam.length > 50) {
                    bidang_peminjam_error.textContent = "Bidang Peminjam Tidak boleh kurang dari 5 karakter dan lebih dari 50 karakter !";
                    return;
                } else {
                    bidang_peminjam_error.textContent = "";
                }
                if (!no_telp || no_telp.length < 5 || no_telp.length > 20) {
                    no_telp_error.textContent = "Nomor Telepon Tidak boleh kurang dari 5 karakter dan lebih dari 20 karakter !";
                    return;
                } else {
                    no_telp_error.textContent = "";
                }

                Swal.fire({
                    title: 'Apakah Data Peminjaman Sudah Benar?',
                    text: "Cek Kembali Data Peminjaman Sebelum Meneruskan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Pinjam Buku!',
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
                        });
                    }
                }) 
            });
        });
    </script>
</body>
</html>
