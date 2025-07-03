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
                                <div class="card" style="width: 18rem;">
                                    <img src="https://asset.kompas.com/crops/MDKtGB-Qbs2L0FBC7bOlWcb5VeY=/65x65:865x599/1200x800/data/photo/2017/06/28/1265845835.jpg" alt="<?= htmlspecialchars($book["judul_buku"])?>" class="card-img-top img-fluid">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($book["judul_buku"])?></h5>
                                        <p class="card-text text-muted"><?= htmlspecialchars($book["kategori_buku"])?></p>
                                        <p class="card-text"><?= htmlspecialchars($book["deskripsi_buku"])?></p>
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
