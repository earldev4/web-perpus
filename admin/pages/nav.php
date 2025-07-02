<nav>
    <div class="d-flex flex-column align-items-center py-3 px-2">
        <i class="fa-solid fa-circle-user img-profile" style="font-size: 80px;"></i>
        <h3 class="text-center p-2">Selamat datang <?= isset($_SESSION['nama_user']) ? $_SESSION['nama_user'] : "Belom login" ?></h3>
    </div>
    <div class="kumpulanLink">
        <div class="page-home">
            <a href="<?= $routing->getHomePage() ?>" class="text-light <?= $routing->isHomeActive() ? 'active' : '' ?>">Home</a>
        </div>
        <div class="page-profile">
            <a href="<?= $routing->getProfilePage() ?>" class="text-light <?= $routing->isProfileActive() ? 'active' : '' ?>">Profile</a>
        </div>
        <div class="page-catalogue">
            <a href="<?= $routing->getCataloguePage() ?>" class="text-light <?= $routing->isCatalogueActive() ? 'active' : '' ?>">Catalog</a>
        </div>
        <div class="page-socialmedia">
            <a href="<?= $routing->getSocialPage() ?>" class="text-light <?= $routing->isSocialActive() ? 'active' : '' ?>">Social Media</a>
        </div>
        <div class="page-lend">
            <a href="<?= $routing->getLendPage() ?>" class="text-light <?= $routing->isLendActive() ? 'active' : '' ?>">Data Peminjaman</a>
        </div>
        <div class="page-backweb">
            <a href="<?= $routing->getBackToWebPage() ?>" class="text-light <?= $routing->isBackWebActive() ? 'active' : '' ?>">Back To Web</a>
        </div>
        <div class="page-logout p-3">
            <form action="<?= $routing->getLogout() ?>" method="POST" id="form_logout" name="form_logout">
                <input type="hidden" name="logout" class="btn btn-danger w-100" value="">
                <button type="submit" class="btn btn-danger w-100">Logout</button>
            </form>
        </div>
    </div>
</nav>