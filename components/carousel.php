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
                            <a href="./pages/detail.php?id=<?= $book['id_buku'] ?>" class="text-decoration-none">
                                <div class="card" style="width: 18rem;">
                                    <img src="/assets/img/buku/<?= $book["gambar_buku"]?>" alt="<?= $book["judul_buku"]?>" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $book["judul_buku"]?></h5>
                                        <p class="card-text text-muted"><?= $book["kategori_buku"]?></p>
                                        <p class="card-text"><?= $book["deskripsi_buku"]?></p>
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
