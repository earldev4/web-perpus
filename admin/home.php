<?php
require_once __DIR__ . "/../config/db.php";
require_once __DIR__ . "/../config/class.php";

$conn = getConnection();
$perpustakaan = new Perpustakaan($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['logout'])) {
        $response = $perpustakaan->handleLogout($_POST);
        echo json_encode($response);
        exit();
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
    <h1><?= isset($_SESSION['nama_user']) ? $_SESSION['nama_user'] : "Belom login" ?></h1>
    <h1>Hello World</h1>
    <form action="home.php" method="POST">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>