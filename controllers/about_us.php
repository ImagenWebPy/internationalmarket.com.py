<?php

class About_Us extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $url = $this->url;
        $lng = $url[0];
        
        $metas = $this->helper->getMetaTags($this->idioma, $this->url);
        $this->view->idioma = $this->idioma;
        $this->view->page = $this->page;
        $this->view->title = SITE_TITLE . $metas['title'];
        $this->view->description = $metas['description'];
        $this->view->keywords = $metas['keywords'];

        $this->view->nosotros = $this->model->nosotros($lng);
        $this->view->subHeader = $this->view->nosotros['header_text'];
        $this->view->Breadcrumbs = $this->helper->Breadcrumbs($this->url);
        $this->view->render('header');
        $this->view->render('aboutus/index');
        $this->view->render('footer');
    }

}
