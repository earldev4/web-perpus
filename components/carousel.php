<div class="carousel-section">
    <div class="container py-5">
        <div class="section-header d-flex  flex-column align-items-center">
            <h2 class="section-title fs-1">Koleksi Buku Pilihan</h2>
            <p class="section-subtitle fs-4">Jelajahi berbagai kategori buku yang tersedia</p>
        </div>
        <?php if(isset($books)){?>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach($books as $book){?>
                        <div class="swiper-slide">
                            <a href="./pages/detail.php?id=<?= htmlspecialchars($book['id_buku']) ?>" class="text-decoration-none">
                                <div class="card" style="width: 18rem; min-height: 25rem; ">
                                    <img loading="lazy" src="assets/img/thumbnail/<?= $book["thumbnail_buku"]?>" alt="<?= htmlspecialchars($book["judul_buku"])?>" class="card-img-top img-fluid">
                                    <div class="card-body d-flex flex-column justify-content-around">
                                        <div>
                                            <h5 class="card-title"><?= isset($book["judul_buku"]) ? htmlspecialchars($book["judul_buku"]) : "Tidak ada judul buku"?></h5>
                                            <div class="d-flex justify-content-between">
                                                <p class="card-text text-dark fw-bold"><?= isset($book["kategori_buku"]) ? htmlspecialchars($book["kategori_buku"]) : "Tidak ada kategori buku"?></p>
                                                <?php if($book["jenis_buku"] == "E-Book"){ ?><p class="card-text text-primary"><i class="bi bi-download"></i> <?= isset($book["download"]) ? htmlspecialchars($book["download"]) : "Tidak ada jumlah download"?></p><?php } else { ?>
                                                <p class="card-text text-primary"><i class="bi bi-person"></i><?= isset($book["pinjam"]) ? htmlspecialchars($book["pinjam"]) : "Tidak ada jumlah pinjam"?></p>
                                                <?php } ?>
                                            </div>
                                            <span class="card-text text-muted fw-bold"><?= isset($book["jenis_buku"]) ? htmlspecialchars($book["jenis_buku"]) : "Tidak ada jenis buku"?></span>
                                        </div>
                                        <span class="card-text"><?= isset($book["deskripsi_buku"]) ? substr(htmlspecialchars_decode($book["deskripsi_buku"]), 0, 75) : "Tidak ada deskripsi buku";?>...<i>Baca Selengkapnya</i></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php } else { echo "Tidak ada buku yang tersedia."; }?>
    </div>
</div>
