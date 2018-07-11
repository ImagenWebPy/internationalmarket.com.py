<?php

class Blog extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function listado() {
        $url = $this->url;
        $lng = $url[0];

        $this->view->idioma = $this->idioma;
        $this->view->title = SITE_TITLE . 'Blog';
        $this->view->description = '';
        $this->view->keywords = '';

        $this->view->subHeader = 'Blog';
        $this->view->Breadcrumbs = $this->helper->Breadcrumbs($this->url);
        $this->view->render('header');
        $this->view->render('blog/index');
        $this->view->render('footer');
    }

}
