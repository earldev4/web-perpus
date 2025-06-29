<footer>
    <div class="container-fluid p-5 footer-color">
        <div>
            <div class="row">
                <div class="col-sm-6 col-12 footer-content">
                    <div class="logo-section">
                        <img src="/assets/img/Lampung_coa.png" alt="Logo" class="footer-logo">
                    </div>
                    <div class="footer-text">
                        <p><?= $footerResult["footer_text"]; ?></p>
                    </div>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="mailto:example@example.com"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="col-sm-6 col-12 py-sm-0 py-3">
                    <div class="row contact-info">
                        <div class="col-12 d-flex align-items-center mb-3">
                            <i class="fas fa-phone-alt contact-icon"></i>
                            <div class="contact-details">
                                <span class="contact-label">Kontak</span>
                                <span class="contact-value"><?= $footerResult["kontak"]; ?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row contact-info">
                        <div class="col-12 d-flex align-items-center mb-3">
                            <i class="fas fa-envelope contact-icon"></i>
                            <div class="contact-details">
                                <span class="contact-label">E-Mail</span>
                                <span class="contact-value"><?= $footerResult["email"]; ?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row contact-info">
                        <div class="col-12 d-flex align-items-center mb-3">
                            <i class="fas fa-clock contact-icon"></i>
                            <div class="contact-details">
                                <span class="contact-label">Jam Kerja</span>
                                <span class="contact-value"><?= $footerResult["hari"]; ?>: <?= $footerResult["jam"]; ?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row contact-info">
                        <div class="col-12 d-flex align-items-center mb-3">
                            <i class="fas fa-map-marker-alt contact-icon"></i>
                            <div class="contact-details">
                                <span class="contact-label">Lokasi</span>
                                <span class="contact-value"><?= $footerResult["lokasi"]; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>