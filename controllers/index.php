<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $metas = $this->helper->getMetaTags($this->idioma, $this->url);
        $lng = $this->idioma;
        $this->view->idioma = $lng;
        $this->view->title = SITE_TITLE . $metas['title'];
        $this->view->description = $metas['description'];
        $this->view->keywords = $metas['keywords'];

        $this->view->slider = $this->helper->cargarSlider($lng);
        $this->view->seccion1 = $this->helper->cargarSeccion1($lng);
        $this->view->seccion2 = $this->helper->cargarSeccion2($lng);
        $this->view->seccion3 = $this->helper->cargarSeccion3($lng);
        $this->view->seccion4 = $this->helper->cargarSeccion4($lng);
        $this->view->seccion5 = $this->helper->cargarSeccion5($lng);
        $this->view->seccion5_items = $this->helper->cargarSeccion5_items($lng);
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

}
