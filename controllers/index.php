<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $metas = $this->helper->getMetaTags($this->idioma, $this->url);
        $this->view->idioma = $this->idioma;
        $this->view->title = SITE_TITLE . $metas['title'];
        $this->view->description = $metas['description'];
        $this->view->keywords = $metas['keywords'];
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

}
