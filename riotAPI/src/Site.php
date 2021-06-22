<?php

// Nouvel API
require(SRC_PATH . '/RiotAPI.php');


class Site {
    protected $siteName = "League of Friends";
    protected $defaultPage = "accueil";
    protected $page;
    protected $errorPage = '404';
    protected $RiotAPI;
    protected $sContent;


    public function __construct() {
        $this->sContent = '';

        $this->setPage();

        $this->RiotAPI = new RiotAPI();
    }

    public function loadPage() {
        $file = realpath(VIEWS_PATH . '/' . $this->page . '.php');

        // file ! exists => 404 error
        if(!file_exists($file)) {
            $this->page = $this->errorPage;
            $file = VIEWS_PATH . '/' . $this->page . '.php';
        }
        
        // return file to include
        return $file;
    }


    public function createContent() {
        ob_start();
        
        $sIncPage = $this->loadPage();
        
        include($sIncPage);
        
		$this->sContent = ob_get_clean();
    }



    // getters

    public function getSiteName() {
        return $this->siteName;
    }

    public function getPage() {
        return $this->page;
    }

    public function getContent() {
		return $this->sContent;
    }


    // setters

    public function setPage() {
        $this->page = (isset($_GET["page"]) && !empty($_GET["page"])) ? preg_replace('/[^a-zA-Z0-9\/\-]/', '', $_GET["page"]) : $this->defaultPage;
    }
}