<?php

require_once __DIR__ . "/../../config/db.php";
require_once __DIR__ . "/../../config/class.php";

$conn = getConnection();
$perpustakaan = new Perpustakaan($conn);

if($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id_link'])) {
        $id_link = $_GET['id_link'];
        $result = $perpustakaan->countLinkClicks(["id_link" => $id_link]);
        if ($result["status"] === "success") {
            header("Location: " . $result["redirect"]);
            exit();
        } else {
            echo $result["message"];
            exit();
        }
        
    } else {
        echo "ID link tidak diberikan.";
        exit();
    }
}

?>