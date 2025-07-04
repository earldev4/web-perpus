<div class="row g-4">
    <?php if (!empty($book_collections["books"])): ?>
        <?php foreach ($book_collections["books"] as $book): ?>
            <div class="col-12">
                <div class="book-card d-flex flex-row align-items-start p-4 rounded-3 shadow-sm">
                    
                    <!-- BOOK COVER -->
                    <div class="book-cover flex-shrink-0">
                        <canvas 
                            class="pdf-preview rounded-2"
                            style="width: 150px; height: 200px;"
                            data-pdf="<?= htmlspecialchars("/assets/img/buku/" . $book["lampiran_buku"]) ?>">
                        </canvas>
                    </div>

                    <!-- BOOK INFORMATION -->
                    <div class="book-info flex-grow-1 ms-4">
                        <h5 class="book-title mb-3">
                            <?= htmlspecialchars($book["judul_buku"]) ?>
                        </h5>
                        
                        <ul class="book-meta list-unstyled mb-4">
                        <li>
                            <span class="meta-label">Deskripsi:</span>
                            <span class="meta-value">
                                <?= substr(htmlspecialchars($book["deskripsi_buku"]), 0, 75); ?>...
                                <i>Baca Selengkapnya</i>
                            </span>
                        </li>
                            <li>
                                <span class="meta-label">Kreator:</span>
                                <span class="meta-value"><?= htmlspecialchars($book["pengarang_buku"]) ?></span>
                            </li>
                            <li>
                                <span class="meta-label">Penerbitan:</span>
                                <span class="meta-value"><?= htmlspecialchars($book["penerbit_buku"]) ?></span>
                            </li>
                        </ul>
                        
                        <a href="./detail.php?id=<?= htmlspecialchars($book["id_buku"]) ?>" 
                           class="btn btn-primary">
                            <i class="fas fa-eye me-2"></i> Lihat Selengkapnya
                        </a>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <!-- Empty State -->
        <div class="col-12">
            <div class="empty-state text-center py-5">
                <div class="empty-icon mb-3">
                    <i class="fas fa-book-open fa-3x text-muted opacity-50"></i>
                </div>
                <h6 class="mb-2">Tidak ada buku tersedia</h6>
                <p class="text-muted mb-0">Belum ada koleksi buku yang dapat ditampilkan saat ini.</p>
            </div>
        </div>
    <?php endif; ?>
</div>
