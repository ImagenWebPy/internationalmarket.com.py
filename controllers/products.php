<?php

class Products extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function product() {
        $url = $this->url;
        $lng = $url[0];
        $id = $url[3];

        $this->view->idioma = $this->idioma;
        $this->view->page = $this->page;
        $this->view->title = SITE_TITLE . 'Producto';
        $this->view->description = '';
        $this->view->keywords = '';

        $this->view->datoProducto = $this->model->datoProducto($id, $lng);
        $this->view->imgProducto = $this->model->imgProducto($id);
        $this->view->url = $this->helper->urlInicio($lng);
        $this->view->subHeader = $this->view->datoProducto['header_text'];
        $this->view->Breadcrumbs = $this->helper->Breadcrumbs($this->url);
        $this->view->render('header');
        $this->view->render('product/index');
        $this->view->render('footer');
    }

}
