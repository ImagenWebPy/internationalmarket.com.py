<?php

class About_Us extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->idioma = $this->idioma;
        $this->view->title = SITE_TITLE . 'About Us';
        $this->view->description = '';
        $this->view->keywords = '';

        $this->view->subHeader = 'About Us';
        $this->view->Breadcrumbs = $this->helper->Breadcrumbs($this->url);
        $this->view->render('header');
        $this->view->render('aboutus/index');
        $this->view->render('footer');
    }

}
