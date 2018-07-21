<?php

class Contact extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $url = $this->url;
        $lng = $url[0];

        $metas = $this->helper->getMetaTags($this->idioma, $this->url);
        $this->view->idioma = $this->idioma;
        $this->view->title = SITE_TITLE . $metas['title'];
        $this->view->description = $metas['description'];
        $this->view->keywords = $metas['keywords'];

        $this->view->contacto = $this->model->contacto($lng);
        $this->view->direcciones = $this->helper->getDirecciones();
        $this->view->subHeader = $this->view->contacto['header_text'];
        $this->view->Breadcrumbs = $this->helper->Breadcrumbs($this->url);
        $this->view->render('header');
        $this->view->render('contact/index');
        $this->view->render('footer');
    }

    public function frmContacto() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'idioma' => $this->idioma,
            'name' => (!empty($_POST['name'])) ? $this->helper->cleanInput($_POST['name']) : NULL,
            'mail' => (!empty($_POST['mail'])) ? $this->helper->cleanInput($_POST['mail']) : NULL,
            'subject' => (!empty($_POST['subject'])) ? $this->helper->cleanInput($_POST['subject']) : NULL,
            'comment' => (!empty($_POST['comment'])) ? $this->helper->cleanInput($_POST['comment']) : NULL
        );
        $data = $this->model->frmContacto($datos);
        echo json_encode($data);
    }

}
