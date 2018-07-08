<?php

class Certifications extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function certification(){
        $url = $this->url;
        $lng = $url[0];
        $id = $url[3];

        $this->view->idioma = $this->idioma;
        $this->view->title = SITE_TITLE . 'Certificacion';
        $this->view->description = '';
        $this->view->keywords = '';

        $this->view->datoCertificacion = $this->model->datoCertificacion($id, $lng);
        $this->view->subHeader = $this->view->datoCertificacion['header_text'];
        $this->view->Breadcrumbs = $this->helper->Breadcrumbs($this->url);
        $this->view->render('header');
        $this->view->render('certification/index');
        $this->view->render('footer');
    }
}

