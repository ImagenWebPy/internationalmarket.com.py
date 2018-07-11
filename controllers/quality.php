<?php

class Quality extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $url = $this->url;
        $lng = $url[0];

        $this->view->idioma = $this->idioma;
        $this->view->title = SITE_TITLE . 'Qaulity';
        $this->view->description = '';
        $this->view->keywords = '';

        $this->view->datoCalidad = $this->model->datoCalidad($lng);
        $this->view->subHeader = $this->view->datoCalidad['header_text'];
        $this->view->Breadcrumbs = $this->helper->Breadcrumbs($this->url);
        $this->view->render('header');
        $this->view->render('quality/index');
        $this->view->render('footer');
    }

}
