<?php 

class Routing {
    private $homePage;
    private $profilePage;
    private $cataloguePage;
    private $socialPage;
    private $backToWebPage;
    private $logout;

    public function __construct($homePage, $profilePage, $cataloguePage, $socialPage, $backToWebPage, $logout) {
        $this->homePage = $homePage;
        $this->profilePage = $profilePage;
        $this->cataloguePage = $cataloguePage;
        $this->socialPage = $socialPage;
        $this->backToWebPage = $backToWebPage;
        $this->logout = $logout;
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
    public function getBackToWebPage() {
        return $this->backToWebPage;
    }
    public function getLogout() {
        return $this->logout;
    }
}

?>