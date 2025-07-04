<?php
require_once __DIR__ . "/../config/db.php";
require_once __DIR__ . "/../config/class.php";

$conn = getConnection();
$perpustakaan = new Perpustakaan($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["search_book"])) {
        $_SESSION["search_keyword"] = $_POST["search_book"];
        header("Location: katalog.php"); 
        exit();
    }
}
$searchKeyword = $_SESSION["search_keyword"] ?? null;

if ($searchKeyword) {
    $book_collections = $perpustakaan->searchBook(["search_book" => $searchKeyword]);
    unset($_SESSION["search_keyword"]); 
} else {
    $book_collections = $perpustakaan->displayCatalogBook();
}


$footer = $perpustakaan->displayFooter();
$footerResult = $footer['footer'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/style/style.css">
    <link rel="stylesheet" href="../assets/style/katalog.css">
    <script src="../assets/script/script.js"></script>   
    <title>Perpustakaan - Katalog</title>
</head>
<body>
    <?php include '../components/navbar.php'; ?>
    
    <div class="hero-section">
        <div class="container">
            <h1 class="hero-title">Katalog Buku</h1>
            <div class="pb-3">
                <form action="katalog.php" method="POST" class="d-flex justify-content-center gap-1">
                    <input type="text" class="form-control w-50" placeholder="Cari buku berdasarkan judul, kategori, pengarang atau penerbit" autocomplete="off" name="search_book">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <br>
            <?php include '../components/table.php'; ?>
        </div>
    </div>
    
    <?php include '../components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script>
    const previews = document.querySelectorAll('.pdf-preview');

    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

    previews.forEach(canvas => {
        const url = canvas.getAttribute('data-pdf');
        const context = canvas.getContext('2d');

        pdfjsLib.getDocument(url).promise.then(pdf => {
            return pdf.getPage(1);
        }).then(page => {
            const viewport = page.getViewport({ scale: 0.3 });
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            const renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            return page.render(renderContext).promise;
        }).catch(error => {
            console.error("PDF.js error:", error);
            canvas.width = 120;
            canvas.height = 150;
            context.fillStyle = "#f8f9fa";
            context.fillRect(0, 0, canvas.width, canvas.height);
            context.fillStyle = "#6c757d";
            context.font = "12px Arial";
            context.textAlign = "center";
            context.fillText("Preview", canvas.width/2, canvas.height/2 - 10);
            context.fillText("Unavailable", canvas.width/2, canvas.height/2 + 10);
        });
    });
</script>

</body>
</html>