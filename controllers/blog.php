<?php

class Blog extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function listado() {
        $url = $this->url;
        $lng = $url[0];
        if (!empty($url[3])) {
            $pagina = $url[3];
        } else {
            $pagina = 1;
        }
        $metas = $this->helper->getMetaTags($lng, $url);

        $metas = $this->helper->getMetaTags($this->idioma, $this->url);
        $this->view->idioma = $this->idioma;
        $this->view->title = SITE_TITLE . $metas['title'];
        $this->view->description = $metas['description'];
        $this->view->keywords = $metas['keywords'];

        $this->view->listado = $this->model->listado($lng, $pagina);
        $this->view->dataHeader = $this->model->dataHeader($lng);

        $this->view->subHeader = utf8_encode($this->view->dataHeader['titulo']);
        $this->view->Breadcrumbs = $this->helper->Breadcrumbs($this->url);
        $this->view->render('header');
        $this->view->render('blog/index');
        $this->view->render('footer');
    }

    public function post() {
        $url = $this->url;
        $lng = $url[0];
        $id = $url[3];
        $this->view->post = $this->model->post($lng, $id);

        $this->view->idioma = $this->idioma;
        $this->view->title = SITE_TITLE . $this->view->post['titulo'];
        $this->view->description = $this->view->post['description'];
        $this->view->keywords = $this->view->post['keywords'];

        $this->view->Breadcrumbs = $this->helper->Breadcrumbs($this->url);
        $this->view->subHeader = utf8_encode($this->view->post['titulo']);
        $this->view->render('header');
        $this->view->render('blog/post');
        $this->view->render('footer');
    }

}
