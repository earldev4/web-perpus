<div class="carousel-section">
    <div class="container py-1">
        <div class="section-header d-flex  flex-column align-items-center">
            <h2 class="section-title fs-1">Top 6 Buku Dengan Peminjaman Terbanyak</h2>
            <p class="section-subtitle fs-4">Berikut adalah top 6 buku dengan peminjaman terbanyak</p>
        </div>
        <?php if(isset($books_lend_top)){?>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach($books_lend_top as $book){?>
                        <?php if($book["jenis_buku"] == "Fisik"){ ?>
                            <div class="swiper-slide">
                                <a href="./pages/detail.php?id=<?= htmlspecialchars($book['id_buku']) ?>" class="text-decoration-none">
                                    <div class="card" style="width: 18rem; min-height: 25rem; ">
                                        <img src="assets/img/thumbnail/<?= $book["thumbnail_buku"]?>" alt="<?= htmlspecialchars($book["judul_buku"])?>" class="card-img-top img-fluid">
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <div>
                                                <h5 class="card-title"><?= isset($book["judul_buku"]) ? htmlspecialchars($book["judul_buku"]) : "Tidak ada judul buku"?></h5>
                                                <div class="d-flex justify-content-between">
                                                    <p class="card-text text-dark fw-bold"><?= isset($book["kategori_buku"]) ? htmlspecialchars($book["kategori_buku"]) : "Tidak ada kategori buku"?></p>
                                                    <p class="card-text text-primary"><i class="bi bi-person"></i> <?= isset($book["pinjam"]) ? htmlspecialchars($book["pinjam"]) : "Tidak ada jumlah peminjaman"?></p>
                                                </div>
                                            </div>
                                            <span class="card-text"><?= isset($book["deskripsi_buku"]) ? substr(htmlspecialchars_decode($book["deskripsi_buku"]), 0, 75) : "Tidak ada deskripsi buku";?>...<i>Baca Selengkapnya</i></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php } else { echo "Tidak ada buku yang tersedia."; }?>
    </div>
</div>
