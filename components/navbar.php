<!-- navbar.php -->
<nav class="navbar navbar-expand-lg bg-light p-3" id="mainNavbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" >
                <!-- <img src="./assets/img/Lampung_coa.png" alt="" class="img-fluid lampung-logo"> -->
                <img src="/assets/img/Lampung_coa.png" alt="" class="img-fluid lampung-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ps-5 me-auto mb-2 mb-lg-0 gap-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/pages/katalog.php">Catalog</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link text-dark d-flex align-items-center gap-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                        Profil <i class="bi bi-chevron-down" style="text-shadow: 0 0 1px currentColor;"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/pages/kelembagaan.php">Kelembagaan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/pages/struktur.php">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark d-flex align-items-center gap-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Social Media <i class="bi bi-chevron-down" style="text-shadow: 0 0 1px currentColor;"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="https://www.instagram.com/bappeda_lampung/?hl=en" target="_blank" rel="noopener noreferrer">Instagram</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="https://www.youtube.com/channel/UCZMZAzUJh0EDYEU5FfV64eg" target="_blank" rel="noopener noreferrer">YouTube</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/pages/login.php">Login</a>
                    </li>
                </ul>
                <a class="borrow-book p-2">
                    <button class="btn btn-primary p-0 px-3 py-2 rounded">
                        Pinjam Buku
                    </button>
                </a>
            </div>
        </div>
    </nav>