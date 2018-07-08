<?php

class Contact extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->idioma = $this->idioma;
        $this->view->title = SITE_TITLE . 'Contact';
        $this->view->description = '';
        $this->view->keywords = '';

        $this->view->subHeader = 'Contact';
        $this->view->Breadcrumbs = $this->helper->Breadcrumbs($this->url);
        $this->view->render('header');
        $this->view->render('contact/index');
        $this->view->render('footer');
    }

}
