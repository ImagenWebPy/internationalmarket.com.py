<?php

class Pagina extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function contenido() {
        $url = $this->url;
        $lng = $url[0];
        $id = $url[3];

        $this->view->idioma = $this->idioma;
        $this->view->page = $this->page;
        $this->view->title = SITE_TITLE . 'Producto';
        $this->view->description = '';
        $this->view->keywords = '';

        $this->view->datoPagina = $this->model->datoPagina($id, $lng);
        $this->view->url = $this->helper->urlInicio($lng);
        $this->view->subHeader = $this->view->datoPagina['header_text'];
        $this->view->Breadcrumbs = $this->helper->Breadcrumbs($this->url);
        $this->view->render('header');
        $this->view->render('pagina/index');
        $this->view->render('footer');
    }

}
