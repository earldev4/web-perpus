<!-- components/stats.php -->
<div class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="stat-number"><?= isset($statisticBook['total_buku'])? htmlspecialchars($statisticBook['total_buku']) : "0" ?></div>
                        <div class="stat-label">Total Buku</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-number"><?= isset($statisticMember['clicks'])? htmlspecialchars($statisticMember['clicks']) : "0"?></div>
                        <div class="stat-label">Anggota Aktif</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <div class="stat-number"><?= isset($statisticBook['total_kategori']) ? htmlspecialchars($statisticBook['total_kategori']) : "0" ?></div>
                        <div class="stat-label">Kategori</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Akses Online</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
