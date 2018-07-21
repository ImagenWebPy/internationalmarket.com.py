<?php

class Admin extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    public function index() {
        $this->view->idioma = $this->idioma;

        $this->view->title = TITLE . 'Inicio';
        $this->view->public_css = array("css/plugins/daterangepicker/daterangepicker-bs3.css");
        $this->view->public_js = array("js/plugins/daterangepicker/momen.min.js", "js/plugins/daterangepicker/daterangepicker.js");
        $this->view->render('admin/header');
        $this->view->render('admin/index/index');
        $this->view->render('admin/footer');
    }

    public function redes() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Redes';
        $this->view->getRedesTable = $this->model->getRedesTable();
        $this->view->public_css = array("css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css", "css/plugins/toastr/toastr.min.css");
        $this->view->public_js = array("js/plugins/iCheck/icheck.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/toastr/toastr.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/redes/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function direccion() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Direcciones';
        $this->view->datosDirecciones = $this->model->datosDirecciones();
        $this->view->public_css = array("css/plugins/toastr/toastr.min.css");
        $this->view->public_js = array("js/plugins/toastr/toastr.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/direccion/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function usuarios() {
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Usuarios';
        #cargamos las librerias extras
        $this->view->helper = new Helper();
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/datapicker/datepicker3.css");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/dataTables/dataTables.rowReorder.min.js", "js/plugins/iCheck/icheck.min.js", "js/plugins/pdfobject/pdfobject.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/datapicker/bootstrap-datepicker.js", "js/plugins/input-mask/jquery.inputmask.js", "js/plugins/input-mask/jquery.inputmask.numeric.extensions.js", "js/plugins/datapicker/locales/bootstrap-datepicker.es.min.js");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/usuarios/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function metatags() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Meta Tags';
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/iCheck/custom.css", "css/wfmi-style.css", "css/plugins/toastr/toastr.min.css");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/iCheck/icheck.min.js", "js/plugins/toastr/toastr.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/metatags/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function logo() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Logo';
        $this->view->logos = $this->helper->getLogos();
        $this->view->public_css = array("css/plugins/html5fileupload/html5fileupload.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/logo/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function contacto() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Contacto';
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/contacto/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function modalEditarRedes() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarRedes($data);
        echo $datos;
    }

    public function frmEditarRedes() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'descripcion' => $this->helper->cleanInput($_POST['descripcion']),
            'url' => $this->helper->cleanInput($_POST['url']),
            'fontawesome' => $this->helper->cleanInput($_POST['fontawesome']),
            'orden' => $this->helper->cleanInput($_POST['orden']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarRedes($datos);
        echo json_encode($data);
    }

    public function frmAgregarRedes() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'descripcion' => (!empty($_POST['descripcion'])) ? $this->helper->cleanInput($_POST['descripcion']) : NULL,
            'url' => (!empty($_POST['url'])) ? $this->helper->cleanInput($_POST['url']) : NULL,
            'fontawesome' => (!empty($_POST['fontawesome'])) ? $this->helper->cleanInput($_POST['fontawesome']) : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmAgregarRedes($datos);
        echo json_encode($data);
    }

    public function cambiarEstado() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'tabla' => $this->helper->cleanInput($_POST['tabla']),
            'campo' => $this->helper->cleanInput($_POST['campo']),
            'seccion' => $this->helper->cleanInput($_POST['seccion']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->cambiarEstado($datos);
        echo json_encode($data);
    }

    public function frmEditarDirecciones() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'direccion' => $this->helper->cleanInput($_POST['direccion']),
            'ciudad' => $this->helper->cleanInput($_POST['ciudad']),
            'pais' => $this->helper->cleanInput($_POST['pais']),
            'email' => $this->helper->cleanInput($_POST['email']),
            'telefono' => $this->helper->cleanInput($_POST['telefono']),
            'latitud' => $this->helper->cleanInput($_POST['latitud']),
            'longitud' => $this->helper->cleanInput($_POST['longitud']),
            'zoom' => $this->helper->cleanInput($_POST['zoom']),
        );
        $data = $this->model->frmEditarDirecciones($datos);
        echo json_encode($data);
    }

    public function listadoDTUsuarios() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTUsuarios();
        echo $data;
    }

    public function modalEditarDTUsuario() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTUsuario($data);
        echo $datos;
    }

    public function frmEditarUsuario() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'nombre' => $this->helper->cleanInput($_POST['nombre']),
            'email' => $this->helper->cleanInput($_POST['email']),
            'id_usuario_rol' => $this->helper->cleanInput($_POST['id_usuario_rol']),
            'contrasena' => (!empty($_POST['contrasena'])) ? $this->helper->cleanInput($_POST['contrasena']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $data = $this->model->frmEditarUsuario($datos);
        echo json_encode($data);
    }

    public function modalAgregarUsuario() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarUsuario($this->idioma);
        echo json_encode($datos);
    }

    public function modalAgregarRedes() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarRedes($this->idioma);
        echo json_encode($datos);
    }

    public function frmAgregarUsuario() {
        if (!empty($_POST)) {
            $data = array(
                'nombre' => (!empty($_POST['nombre'])) ? $this->helper->cleanInput($_POST['nombre']) : NULL,
                'email' => (!empty($_POST['email'])) ? $this->helper->cleanInput($_POST['email']) : NULL,
                'id_usuario_rol' => (!empty($_POST['id_usuario_rol'])) ? $this->helper->cleanInput($_POST['id_usuario_rol']) : NULL,
                'contrasena' => (!empty($_POST['contrasena'])) ? $this->helper->cleanInput($_POST['contrasena']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $_POST['estado'] : 0,
            );
            $id = $this->model->frmAgregarUsuario($data);
            if (!empty($id)) {
                Session::set('message', array(
                    'type' => 'success',
                    'mensaje' => 'Se ha agregado correctamente el usuario'
                ));
            } else {
                Session::set('message', array(
                    'type' => 'error',
                    'mensaje' => 'Lo sentimos, ha ocurrido un error inesperado.'
                ));
            }
        }
        header('Location:' . URL . $this->idioma . '/admin/usuarios/');
    }

    public function listadoDTMetas() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTMetas($_REQUEST);
        echo $data;
    }

    public function modalEditarMetaTag() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarMetaTag($data);
        echo $datos;
    }

    public function frmEditarMetaTags() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'es_title' => (!empty($_POST['es_title'])) ? $this->helper->cleanInput($_POST['es_title']) : NULL,
            'es_descripcion' => (!empty($_POST['es_descripcion'])) ? $this->helper->cleanInput($_POST['es_descripcion']) : NULL,
            'es_keywords' => (!empty($_POST['es_keywords'])) ? $this->helper->cleanInput($_POST['es_keywords']) : NULL,
            'en_title' => (!empty($_POST['en_title'])) ? $this->helper->cleanInput($_POST['en_title']) : NULL,
            'en_descripcion' => (!empty($_POST['en_descripcion'])) ? $this->helper->cleanInput($_POST['en_descripcion']) : NULL,
            'en_keywords' => (!empty($_POST['en_keywords'])) ? $this->helper->cleanInput($_POST['en_keywords']) : NULL
        );
        $data = $this->model->frmEditarMetaTags($datos);
        echo json_encode($data);
    }

    public function uploadImgLogoCabacera() {
        if (!empty($_POST)) {
            $this->model->unlinkLogoCabecera();
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgLogoCabacera($data);
            echo json_encode($response);
        }
    }

    public function listadoDTContacto() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTContacto($_REQUEST);
        echo $data;
    }

    public function modalVerContacto() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalVerContacto($data);
        echo $datos;
    }

}
