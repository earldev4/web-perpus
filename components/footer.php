<footer>
    <div class="container-fluid p-5 footer-color">
        <div>
            <div class="row">
                <div class="col-sm-6 col-12 footer-content">
                    <div class="logo-section">
                        <img src="/assets/img/Lampung_coa.png" alt="Logo" class="footer-logo">
                    </div>
                    <div class="footer-text">
                        <p><?= isset($footerResult["footer_text"]) ? $footerResult["footer_text"] : "" ; ?></p>
                    </div>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/bappeda_lampung/?hl=en" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/channel/UCZMZAzUJh0EDYEU5FfV64eg" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="col-sm-6 col-12 py-sm-0 py-3">
                    <div class="row contact-info">
                        <div class="col-12 d-flex align-items-center mb-3">
                            <i class="fas fa-phone-alt contact-icon"></i>
                            <div class="contact-details">
                                <span class="contact-label">Kontak</span>
                                <span class="contact-value"><?= isset($footerResult["kontak"]) ? $footerResult["kontak"] : "" ; ?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row contact-info">
                        <div class="col-12 d-flex align-items-center mb-3">
                            <i class="fas fa-envelope contact-icon"></i>
                            <div class="contact-details">
                                <span class="contact-label">E-Mail</span>
                                <span class="contact-value"><?= isset($footerResult["email"]) ? $footerResult["email"] : "" ; ?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row contact-info">
                        <div class="col-12 d-flex align-items-center mb-3">
                            <i class="fas fa-clock contact-icon"></i>
                            <div class="contact-details">
                                <span class="contact-label">Jam Kerja</span>
                                <span class="contact-value"><?= isset($footerResult["hari"]) ? $footerResult["hari"] : "" ; ?>: <?= isset($footerResult["jam"]) ? $footerResult["jam"] : "" ; ?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row contact-info">
                        <div class="col-12 d-flex align-items-center mb-3">
                            <i class="fas fa-map-marker-alt contact-icon"></i>
                            <div class="contact-details">
                                <span class="contact-label">Lokasi</span>
                                <span class="contact-value"><?= isset($footerResult["lokasi"]) ? $footerResult["lokasi"] : "" ; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>