<?php

class Logistics extends Controller{

    function __construct() {
        parent::__construct();
    }
    
    public function logistic() {
        $url = $this->url;
        $lng = $url[0];
        $id = $url[3];

        $this->view->idioma = $this->idioma;
        $this->view->title = SITE_TITLE . 'Logistics';
        $this->view->description = '';
        $this->view->keywords = '';

        $this->view->datoLogistica = $this->model->datoLogistica($id, $lng);
        $this->view->subHeader = $this->view->datoLogistica['header_text'];
        $this->view->Breadcrumbs = $this->helper->Breadcrumbs($this->url);
        $this->view->render('header');
        $this->view->render('logistics/index');
        $this->view->render('footer');
    }
}
