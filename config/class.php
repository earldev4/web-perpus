<?php 

class Perpustakaan{
    private $conn;
    public function __construct($dbConnection){
        $this->conn = $dbConnection;
        session_start();
    }
    public function handleLogin($data): array{
        $username = $data['username'];
        $password = $data['password'];

        if($username && $password){
            $sql = <<<SQL
                SELECT * FROM user where nama_user = ? AND password_user = ?
            SQL;
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $password);
            $stmt->execute();
            
            $dataUser = $stmt->fetch();
            if($dataUser){
                $_SESSION["nama_user"] = $dataUser["nama_user"];
                $_SESSION["is_login"] = true;
                return [
                    "status"=> "success",
                    "message"=> "Login Berhasil",
                    "redirect"=> "/admin/home.php"
                ];
            } else {
                return [
                    "status"=> "error",
                    "message"=> "Username atau Password Salah",
                    "redirect"=> ""
                ];
            }
        } else {
            return [
                "status"=> "error",
                "message"=> "Username atau Password Kosong",
                "redirect"=> ""
            ];
        }
    }
    public function handleLogout($logout): array {
        session_unset();
        session_destroy();
        return [
            "status" => "success",
            "message" => "Logout Berhasil",
            "redirect" => $logout
        ];
    }
    public function changePassword($data, $redirect): array {
        $id = 1;
        $old_password = $data["old_password"];
        $new_password = $data["new_password"];
        if($old_password && $new_password != ""){
            $sql = <<<SQL
                SELECT password_user FROM user WHERE id_user = ?;
            SQL;
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $result =  $stmt->fetch(PDO::FETCH_ASSOC);
            if($old_password == $result["password_user"]){
                $sql = <<<SQL
                    UPDATE user SET password_user = ? WHERE id_user = ?;
                SQL;
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(1, $new_password);
                $stmt->bindParam(2, $id);
                $stmt->execute();
                return [
                    "status" => "success",
                    "message" => "Password Berhasil Diubah",
                    "redirect" => $redirect
                ];
            } else {
                return [
                    "status" => "error",
                    "message" => "Password Lama Salah",
                    "redirect" => ""
                ];
            }
        } else {
            return [
                "status" => "error",
                "message" => "Data tidak lengkap",
                "redirect" => ""
            ];
        }
    }
    public function displayCatalogBook(): array{
        $stmt = $this->conn->prepare("SELECT * FROM buku");
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return [
            "books" => $books,
        ];
    }
    public function searchBook($data): array {
        $trim = trim($data["search_book"]);
        $book = "%$trim%";
        $sql = <<<SQL
            SELECT * FROM buku WHERE judul_buku LIKE ? OR pengarang_buku LIKE ? OR penerbit_buku LIKE ? OR kategori_buku LIKE ?
        SQL;
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $book);
        $stmt->bindParam(2, $book);
        $stmt->bindParam(3, $book);
        $stmt->bindParam(4, $book);
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return [
            "books" => $books
        ];
    }
    public function addBook($data): array {        
        $judul_buku = $data["judul_buku"];
        $lampiran_buku = $_FILES["lampiran_buku"];
        $lampiran_buku_name = $_FILES["lampiran_buku"]["name"];
        $lampiran_buku_temp = $_FILES["lampiran_buku"]["tmp_name"];
        $lampiran_buku_size = $_FILES["lampiran_buku"]["size"];
        $lampiran_buku_type = $_FILES["lampiran_buku"]["type"];
        $kategori_buku = $data["kategori_buku"];
        $pengarang_buku = $data["pengarang_buku"];
        $penerbit_buku = $data["penerbit_buku"];
        $jumlah_buku = $data["jumlah_buku"];
        $jumlah_halaman = $data["jumlah_halaman"];
        $deskripsi_buku = $data["deskripsi_buku"];
        $bahasa_buku = $data["bahasa_buku"];
        $isbn_buku = $data["isbn_buku"];
        $file_ext = explode('.', $lampiran_buku_name);
        $file_ext_actual = strtolower(end($file_ext));
        $allowed = array('pdf', 'doc', 'docx');

        if($judul_buku && $lampiran_buku && $kategori_buku && $pengarang_buku && $penerbit_buku && $jumlah_buku && $jumlah_halaman && $deskripsi_buku && $bahasa_buku && $isbn_buku){
            if (in_array($file_ext_actual, $allowed)) {
                if($lampiran_buku_size < 15000000){
                    $sql = <<<SQL
                        INSERT INTO informasi (jumlah_halaman, bahasa_buku, isbn_buku) VALUES (?, ?, ?);
                    SQL;
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(1, $jumlah_halaman);
                    $stmt->bindParam(2, $bahasa_buku);
                    $stmt->bindParam(3, $isbn_buku);
                    $stmt->execute();
                    $id_informasi = $this->conn->lastInsertId();

                    $lampiran_name_new = uniqid('', true) . "." . $file_ext_actual;
                    $lampiran_folder = __DIR__ . '/../assets/img/buku/' . $lampiran_name_new;
                    move_uploaded_file($lampiran_buku_temp, $lampiran_folder);
                    $sql = <<<SQL
                        INSERT INTO buku (judul_buku, lampiran_buku, kategori_buku, pengarang_buku,  penerbit_buku, jumlah_buku, id_informasi, deskripsi_buku) VALUES (?, ?, ?, ?, ?, ?, ?, ?);
                    SQL;
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(1, $judul_buku);
                    $stmt->bindParam(2, $lampiran_name_new);
                    $stmt->bindParam(3, $kategori_buku);
                    $stmt->bindParam(4, $pengarang_buku);
                    $stmt->bindParam(5, $penerbit_buku);
                    $stmt->bindParam(6, $jumlah_buku);
                    $stmt->bindParam(7, $id_informasi);
                    $stmt->bindParam(8, $deskripsi_buku);
                    $stmt->execute();
                    return [
                        "status" => "success",
                        "message" => "Buku Berhasil Ditambahkan",
                        "redirect" => "add_book.php"
                    ];
                } else {
                    return [
                        "status" => "error",
                        "message" => "Ukuran File Terlalu Besar, Maksimal 15 MB",
                        "redirect" => ""
                    ];
                }
            } else {
                return [
                    "status" => "error",
                    "message" => "Format File Tidak Sesuai, Format Yang Diperbolehkan .pdf, .doc, .docx",
                    "redirect" => ""
                ];
            }
        } else {
            return [
                "status" => "error",
                "message" => "Data Tidak Boleh Kosong", 
                "redirect" => ""
            ];
        }
    }
    public function editBook($data): array {
        $id_informasi = $data["id_informasi"];        
        $id_buku = $data["id_buku"];        
        $judul_buku = $data["judul_buku"];
        $lampiran_buku = $_FILES["lampiran_buku"];
        $lampiran_buku_name = $_FILES["lampiran_buku"]["name"];
        $lampiran_buku_temp = $_FILES["lampiran_buku"]["tmp_name"];
        $lampiran_buku_size = $_FILES["lampiran_buku"]["size"];
        $lampiran_buku_type = $_FILES["lampiran_buku"]["type"];
        $kategori_buku = $data["kategori_buku"];
        $pengarang_buku = $data["pengarang_buku"];
        $penerbit_buku = $data["penerbit_buku"];
        $jumlah_buku = $data["jumlah_buku"];
        $jumlah_halaman = $data["jumlah_halaman"];
        $deskripsi_buku = $data["deskripsi_buku"];
        $bahasa_buku = $data["bahasa_buku"];
        $isbn_buku = $data["isbn_buku"];
        $file_ext = explode('.', $lampiran_buku_name);
        $file_ext_actual = strtolower(end($file_ext));
        $allowed = array('pdf', 'doc', 'docx');

        if($id_buku && $id_informasi && $judul_buku && $kategori_buku && $pengarang_buku && $penerbit_buku && $jumlah_buku && $jumlah_halaman && $deskripsi_buku && $bahasa_buku && $isbn_buku){
            if (!empty($lampiran_buku_name)) {
                if (in_array($file_ext_actual, $allowed)) {
                    if($lampiran_buku_size < 15000000){
                        $sql = <<<SQL
                            UPDATE informasi SET jumlah_halaman = ?, bahasa_buku = ?, isbn_buku = ? WHERE id_informasi = ?;
                        SQL;
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bindParam(1, $jumlah_halaman);
                        $stmt->bindParam(2, $bahasa_buku);
                        $stmt->bindParam(3, $isbn_buku);
                        $stmt->bindParam(4, $id_informasi);
                        $stmt->execute();

                        $sql = <<<SQL
                            SELECT lampiran_buku FROM buku WHERE id_buku = ?
                        SQL;
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bindParam(1, $id_buku);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $fileName = $result["lampiran_buku"];
                        unlink(__DIR__ . '/../assets/img/buku/' . $fileName);

                        $lampiran_name_new = uniqid('', true) . "." . $file_ext_actual;
                        $lampiran_folder = __DIR__ . '/../assets/img/buku/' . $lampiran_name_new;
                        move_uploaded_file($lampiran_buku_temp, $lampiran_folder);
                        $sql = <<<SQL
                            UPDATE buku SET judul_buku = ?, lampiran_buku = ?, kategori_buku = ?, pengarang_buku = ?,  penerbit_buku = ?, jumlah_buku = ?, deskripsi_buku = ? WHERE id_buku = ?;
                        SQL;
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bindParam(1, $judul_buku);
                        $stmt->bindParam(2, $lampiran_name_new);
                        $stmt->bindParam(3, $kategori_buku);
                        $stmt->bindParam(4, $pengarang_buku);
                        $stmt->bindParam(5, $penerbit_buku);
                        $stmt->bindParam(6, $jumlah_buku);
                        $stmt->bindParam(7, $deskripsi_buku);
                        $stmt->bindParam(8, $id_buku);
                        $stmt->execute();
                        return [
                            "status" => "success",
                            "message" => "Buku Berhasil Diedit",
                            "redirect" => "add_book.php"
                        ];
                    } else {
                        return [
                            "status" => "error",
                            "message" => "Ukuran File Terlalu Besar, Maksimal 15 MB",
                            "redirect" => ""
                        ];
                    }
                } else {
                    return [
                        "status" => "error",
                        "message" => "Format File Tidak Sesuai, Format Yang Diperbolehkan .pdf, .doc, .docx",
                        "redirect" => ""
                    ];
                }
            } else {
                $sql = <<<SQL
                    UPDATE informasi SET jumlah_halaman = ?, bahasa_buku = ?, isbn_buku = ? WHERE id_informasi = ?;
                SQL;
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(1, $jumlah_halaman);
                $stmt->bindParam(2, $bahasa_buku);
                $stmt->bindParam(3, $isbn_buku);
                $stmt->bindParam(4, $id_informasi);
                $stmt->execute();

                $sql = <<<SQL
                    UPDATE buku SET judul_buku = ?, kategori_buku = ?, pengarang_buku = ?,  penerbit_buku = ?, jumlah_buku = ?, deskripsi_buku = ? WHERE id_informasi = ?;
                SQL;
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(1, $judul_buku);
                $stmt->bindParam(2, $kategori_buku);
                $stmt->bindParam(3, $pengarang_buku);
                $stmt->bindParam(4, $penerbit_buku);
                $stmt->bindParam(5, $jumlah_buku);
                $stmt->bindParam(6, $deskripsi_buku);
                $stmt->bindParam(7, $id_informasi);
                $stmt->execute();
                return [
                    "status" => "success",
                    "message" => "Buku Berhasil Diedit",
                    "redirect" => "add_book.php"
                ];
            }
        } else {
            return [
                "status" => "error",
                "message" => "Data Tidak Boleh Kosong", 
                "redirect" => ""
            ];
        }
    }
    public function deleteBook($data): array {
        $id_buku = $data["hapus_buku"];
        $id_informasi = $data["hapus_informasi"];
        $sql = <<<SQL
            SELECT  lampiran_buku FROM buku WHERE id_buku = ?
        SQL;
        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(1, $id_buku);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $fileName = $result["lampiran_buku"];
        unlink(__DIR__ . '/../assets/img/buku/' . $fileName);

        $sql = <<<SQL
            DELETE FROM informasi WHERE id_informasi = ?;
        SQL;
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id_informasi);
        $stmt->execute();

        $sql = <<<SQL
            DELETE FROM buku WHERE id_buku = ?;
        SQL;
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id_buku);
        $stmt->execute();
        return [
            "status" => "success",
            "message" => "Buku Berhasil Dihapus",
            "redirect" => "add_book.php"
        ];
    }
    public function viewBookDetail($id_berita): array{
        $id = $id_berita;
        $sql = <<<SQL
            SELECT buku.*, informasi.jumlah_halaman, informasi.bahasa_buku, informasi.isbn_buku
            FROM buku
            JOIN informasi ON buku.id_informasi = informasi.id_informasi
            WHERE buku.id_buku = ?
        SQL;
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $book = $stmt->fetch(PDO::FETCH_ASSOC);
        return [
            "book" => $book
        ];
    }
    public function downloadBook($data): void {
        $id_buku = $data["id_buku"];
        $sql = <<<SQL
            SELECT judul_buku, lampiran_buku FROM buku WHERE id_buku = ?
        SQL;
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id_buku);
        $stmt->execute();
        $book = $stmt->fetch(PDO::FETCH_ASSOC);
        if(isset($book["lampiran_buku"])) {
            $fileName = $book["lampiran_buku"];
            $filePath = __DIR__ . '/../assets/img/buku/' . $fileName;
            if (file_exists($filePath)) {
                $judul = preg_replace('/[^a-zA-Z0-9-_\.]/', '_', $book["judul_buku"]);
                $ext = pathinfo($filePath, PATHINFO_EXTENSION);
                $downloadName = $judul . '.' . $ext;

                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . $downloadName . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filePath));
                flush(); 
                readfile($filePath); 
            } else {
                echo "File tidak ditemukan.";
            }
        }

    }
    public function getHomeHero(): array {
        $id = 1;
        $stmt = $this->conn->prepare("SELECT * FROM home_hero WHERE id_hero = ?"); 
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $hero = $stmt->fetch(PDO::FETCH_ASSOC);
        return [
            "hero" => $hero
        ];
    }
    public function editHeroText($data): array {
        if($data["hero_title"] != ""){
            $hero_text = $data["hero_title"];
            $id = 1;
            $stmt = $this->conn->prepare("UPDATE home_hero SET hero_desc = ? WHERE id_hero = ?");
            $stmt->bindParam(1, $hero_text);
            $stmt->bindParam(2, $id);
            $stmt->execute();
            return [
                "status" => "success",
                "message" => "Hero Text Berhasil Diubah",
                "redirect" => "/admin/home.php"
            ];
        } else {
            return [
                "status" => "error",
                "message" => "Hero Text Kosong",
                "redirect" => "/admin/home.php"
            ];
        }
    }

    public function countLinkClicks($data): array {
        $id = $data["id_link"];
        $stmt = $this->conn->prepare("SELECT link_url FROM link_clicks WHERE id_link = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $link = $stmt->fetch(PDO::FETCH_ASSOC);
        if($link){
            $update = $this->conn->prepare("UPDATE link_clicks SET clicks = clicks + 1 WHERE id_link = ?");
            $update->execute([$id]);
            return [
                "status" => "success",
                "message" => "Tunggu Sebentar",
                "redirect" => $link["link_url"]
            ];
        } else {
            return [
                "status" => "error",
                "message" => "Link Tidak Ditemukan",
                "redirect" => ""
            ];
        }
    }
    public function getClicks(): array {
        $stmt = $this->conn->prepare("SELECT * FROM link_clicks");
        $stmt->execute();
        $clicks = $stmt->fetch(PDO::FETCH_ASSOC);
        return [
            "clicks" => $clicks
        ];
    }
    public function editLinkClicks($data): array {
        if($data["edit_click"] != ""){
            $edit = $data["edit_click"];
            $id = 1;
            if(filter_var($data["edit_click"], FILTER_VALIDATE_INT)){
                $stmt = $this->conn->prepare("UPDATE link_clicks SET clicks = ? WHERE id_link = ?");
                $stmt->bindParam(1, $edit);
                $stmt->bindParam(2, $id);
                $stmt->execute();
                return [
                    "status" => "success",
                    "message" => "Nilai berhasil diubah",
                    "redirect" => "/admin/home.php"
                ];
            } else {
                return [
                    "status" => "error",
                    "message" => "Nilai bukan angka",
                    "redirect" => "/admin/home.php"
                ];
            }
        } else {
            return [
                "status" => "error",
                "message" => "Nilai tidak ada",
                "redirect" => "/admin/home.php"
            ];
        }
    }
    public function displayStatistic(): array {
        $sql = <<<SQL
        SELECT 
            (SELECT COUNT("id_buku") FROM buku) AS total_buku,
            (SELECT COUNT(DISTINCT kategori_buku) FROM buku) AS total_kategori
        SQL;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $statistic = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = $this->conn->prepare("SELECT clicks FROM link_clicks");
        $stmt->execute();
        $total_klik = $stmt->fetch(PDO::FETCH_ASSOC);
        return [
            "statistic" => $statistic,
            "total_klik" => $total_klik
        ];
    }

    public function setDisplayFooter($data): array{
        $footer_text = $data["footer_text"];
        $kontak = $data["footer_kontak"];
        $email = $data["footer_email"];
        $hari = $data["footer_hari"];
        $jam = $data["footer_jam"];
        $lokasi = $data["footer_lokasi"];
        $id = 1;
        if ($footer_text != "" && $kontak != "" && $email != "" && $hari != "" && $jam != "" && $lokasi != "") {
            $stmt = $this->conn->prepare("UPDATE footer SET footer_text = ?, kontak = ?, email = ?, hari = ?, jam = ?, lokasi = ? WHERE id_footer = ?");
            $stmt->bindParam(1, $footer_text);
            $stmt->bindParam(2, $kontak);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $hari);
            $stmt->bindParam(5, $jam);
            $stmt->bindParam(6, $lokasi);
            $stmt->bindParam(7, $id);
            $stmt->execute();
            return [
                "status" => "success",
                "message" => "Footer Berhasil Diubah",
                "redirect" => "/admin/home.php"
            ];
        } else {
            return [
                "status" => "error",
                "message" => "Input tidak lengkap",
                "redirect" => "/admin/home.php"
            ];
        }
    } 
    public function displayFooter(): array{
        $id = 1;
        $stmt = $this->conn->prepare("SELECT * FROM footer WHERE id_footer = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $footer = $stmt->fetch(PDO::FETCH_ASSOC);
        return [
            "footer" => $footer
        ];
    }
    public function getProfile (): array {
        $id = 1;
        $sql = <<<SQL
            SELECT * FROM profile WHERE id_profile = ?
        SQL;
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $profile = $stmt->fetch(PDO::FETCH_ASSOC);
        return [
            "profile" => $profile
        ];
    }
    public function editProfile($data): array {
        $id_profile = 1;
        $profile_desk = $data["profile"];
        $profile_picture = $_FILES["profile_picture"];
        $profile_picture_name = $_FILES["profile_picture"]["name"];
        $profile_picture_temp = $_FILES["profile_picture"]["tmp_name"];
        $profile_picture_size = $_FILES["profile_picture"]["size"];
        $fileExt = explode('.', $profile_picture_name);
        $fileExtActual = strtolower(end($fileExt));
        if($profile_desk != ""){
            if(!empty($profile_picture_name)){
                if(in_array($fileExtActual, array('jpg', 'jpeg', 'png'))){
                    if($profile_picture_size < 5000000){
                        $sql = <<<SQL
                            SELECT * FROM profile WHERE id_profile = ?
                        SQL;
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bindParam(1, $id_profile);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $pictureName = $result["profile_picture"];
                        unlink("../../assets/img/$pictureName");

                        $profile_picture_name_new = "struktur" . "." . $fileExtActual;
                        $profile_picture_folder = "../../assets/img/" . $profile_picture_name_new;
                        move_uploaded_file($profile_picture_temp, $profile_picture_folder);

                        $sql = <<<SQL
                            UPDATE profile SET profile_desk = ?, profile_picture = ? WHERE id_profile = ?
                        SQL;
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bindParam(1, $profile_desk);
                        $stmt->bindParam(2, $profile_picture_name_new);
                        $stmt->bindParam(3, $id_profile);
                        $stmt->execute();
                        return [
                            "status" => "success",
                            "message" => "Profile Berhasil Diubah",
                            "redirect" => "profile.php"
                        ];
                    } else {
                        return [
                            "status" => "error",
                            "message" => "Ukuran gambar terlalu besar, maksimal 5MB",
                            "redirect" => ""
                        ];
                    }  
                } else {
                    return [
                            "status" => "error",
                            "message" => "Ekstensi gambar harus jpg, jpeg, atau png",
                            "redirect" => ""
                        ];
                }
            } else {
                $sql = <<<SQL
                    UPDATE profile SET profile_desk = ? WHERE id_profile = ?
                SQL;
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(1, $profile_desk);
                $stmt->bindParam(2, $id_profile);
                $stmt->execute();
                return [
                    "status" => "success",
                    "message" => "Profile Berhasil Diubah",
                    "redirect" => ""
                ];
            }
        } else {
            return [
                "status" => "error",
                "message" => "Input tidak lengkap",
                "redirect" => ""
            ];
        }
    }  
}