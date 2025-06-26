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
    public function handleLogout(): array {
        session_unset();
        session_destroy();
        return [
            "status" => "success",
            "message" => "Logout Berhasil",
            "redirect" => "../pages/login.php"
        ];
    }
    public function displayCatalogBook(): array{
        $stmt = $this->conn->prepare("SELECT * FROM buku");
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return [
            "books" => $books,
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
}