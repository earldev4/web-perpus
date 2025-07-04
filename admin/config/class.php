<?php 

class Routing {
    private $homePage;
    private $profilePage;
    private $cataloguePage;
    private $socialPage;
    private $lendPage;
    private $backToWebPage;
    private $logout;
    private $navSubmit;

    public function __construct($homePage, $profilePage, $cataloguePage, $socialPage, $lendPage, $backToWebPage, $logout, $navSubmit) {
        $this->homePage = $homePage;
        $this->profilePage = $profilePage;
        $this->cataloguePage = $cataloguePage;
        $this->socialPage = $socialPage;
        $this->lendPage = $lendPage;
        $this->backToWebPage = $backToWebPage;
        $this->logout = $logout;
        $this->navSubmit = $navSubmit;
    }

    public function getHomePage() {
        return $this->homePage;
    }
    public function getProfilePage() {
        return $this->profilePage;
    }
    public function getCataloguePage() {
        return $this->cataloguePage;
    }
    public function getSocialPage() {
        return $this->socialPage;
    }
    public function getLendPage() {
        return $this->lendPage;
    }
    public function getBackToWebPage() {
        return $this->backToWebPage;
    }
    public function getLogout() {
        return $this->logout;
    }
    public function navSubmit() {
        return $this->navSubmit;
    }
    public function isHomeActive() {
        return basename($_SERVER['PHP_SELF']) === basename($this->homePage);
    }

    public function isProfileActive() {
        return basename($_SERVER['PHP_SELF']) === basename($this->profilePage);
    }

    public function isCatalogueActive() {
        return basename($_SERVER['PHP_SELF']) === basename($this->cataloguePage);
    }

    public function isSocialActive() {
        return basename($_SERVER['PHP_SELF']) === basename($this->socialPage);
    }

    public function isLendActive() {
        return basename($_SERVER['PHP_SELF']) === basename($this->lendPage);
    }

    public function isBackWebActive() {
        return basename($_SERVER['PHP_SELF']) === basename($this->backToWebPage);
    }
}

?>