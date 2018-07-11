<?php

class Neopure extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $url = $this->url;
        $lng = $url[0];

        $this->view->idioma = $this->idioma;
        $this->view->title = SITE_TITLE . 'Neo Pure';
        $this->view->description = '';
        $this->view->keywords = '';

        $this->view->datoNeo = $this->model->datoNeo($lng);
        $this->view->subHeader = $this->view->datoNeo['header_text'];
        $this->view->Breadcrumbs = $this->helper->Breadcrumbs($this->url);
        $this->view->render('header');
        $this->view->render('neopure/index');
        $this->view->render('footer');
    }

}
