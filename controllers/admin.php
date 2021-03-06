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

    public function menu() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Menú';
        $this->view->getMenu = $this->model->getMenu();
        $this->view->public_css = array("css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css", "css/plugins/toastr/toastr.min.css");
        $this->view->public_js = array("js/plugins/iCheck/icheck.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/toastr/toastr.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/menu/index');
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
        $this->view->datosContacto = $this->model->datosContacto();
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/toastr/toastr.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/contacto/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function blog() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Blog';
        $this->view->datosBlog = $this->model->datosBlog();
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css", "css/wfmi-style.css", "css/plugins/toastr/toastr.min.css", "css/plugins/summernote/summernote.css", "css/plugins/datapicker/datepicker3.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/iCheck/icheck.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/datapicker/bootstrap-datepicker.js");
        $this->view->render('admin/header');
        $this->view->render('admin/blog/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function inicio() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Inicio';

        $this->view->datosSeccion1 = $this->model->datosSeccion(1);
        $this->view->datosSeccion2 = $this->model->datosSeccion(2);
        $this->view->datosSeccion3 = $this->model->datosSeccion(3);
        $this->view->datosSeccion4 = $this->model->datosSeccion(4);
        $this->view->datosSeccion5 = $this->model->datosSeccion(5);

        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/iCheck/icheck.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/inicio/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function aboutus() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Nosotros';

        $this->view->datosNosotros = $this->model->datosNosotros();

        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/iCheck/icheck.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/nosotros/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function logistics() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Logistica';
        $this->view->listadoLogistica = $this->model->listadoLogistica();
        $this->view->public_css = array("css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css", "css/wfmi-style.css", "css/plugins/toastr/toastr.min.css", "css/plugins/summernote/summernote.css", "css/plugins/datapicker/datepicker3.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/iCheck/icheck.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/datapicker/bootstrap-datepicker.js");
        $this->view->render('admin/header');
        $this->view->render('admin/logistica/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function certifications() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Certificaciones';
        $this->view->listadoCertificaciones = $this->model->listadoCertificaciones();
        $this->view->public_css = array("css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css", "css/wfmi-style.css", "css/plugins/toastr/toastr.min.css", "css/plugins/summernote/summernote.css", "css/plugins/datapicker/datepicker3.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/iCheck/icheck.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/datapicker/bootstrap-datepicker.js");
        $this->view->render('admin/header');
        $this->view->render('admin/certificaciones/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function products() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Productos';
        $this->view->listadoProductos = $this->model->listadoProductos();
        $this->view->public_css = array("css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css", "css/wfmi-style.css", "css/plugins/toastr/toastr.min.css", "css/plugins/summernote/summernote.css", "css/plugins/datapicker/datepicker3.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/iCheck/icheck.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/datapicker/bootstrap-datepicker.js");
        $this->view->render('admin/header');
        $this->view->render('admin/products/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function pagina() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Páginas';
        $this->view->listadoPaginas = $this->model->listadoPaginas();
        $this->view->public_css = array("css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css", "css/wfmi-style.css", "css/plugins/toastr/toastr.min.css", "css/plugins/summernote/summernote.css", "css/plugins/datapicker/datepicker3.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/iCheck/icheck.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/datapicker/bootstrap-datepicker.js");
        $this->view->render('admin/header');
        $this->view->render('admin/paginas/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function neopure() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Neo Pure';
        $this->view->galeria = $this->model->galeria();
        $this->view->datosNeoPure = $this->model->datosNeoPure();
        $this->view->public_css = array("css/plugins/toastr/toastr.min.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css", "css/plugins/html5fileupload/html5fileupload.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/toastr/toastr.min.js", "js/plugins/iCheck/icheck.min.js", "js/plugins/summernote/summernote.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/neopure/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function quality() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Calidad';
        $this->view->datosCalidad = $this->model->datosCalidad();
        $this->view->public_css = array("css/plugins/toastr/toastr.min.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css", "css/plugins/html5fileupload/html5fileupload.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/toastr/toastr.min.js", "js/plugins/iCheck/icheck.min.js", "js/plugins/summernote/summernote.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/calidad/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function busquedas() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;

        $this->view->title = 'Busquedas en el Blog';
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/blog/busquedas');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function listadoDTBusqueda() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTBusqueda($_REQUEST);
        echo $data;
    }

    public function modalEditarRedes() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarRedes($data);
        echo $datos;
    }

    public function modalEditarMenu() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarMenu($data);
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

    public function frmEditarMenu() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'es_texto' => (!empty($_POST['es_texto'])) ? $this->helper->cleanInput($_POST['es_texto']) : NULL,
            'en_texto' => (!empty($_POST['en_texto'])) ? $this->helper->cleanInput($_POST['en_texto']) : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarMenu($datos);
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

    public function frmAgregarMenu() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'es_texto' => (!empty($_POST['es_texto'])) ? $this->helper->cleanInput($_POST['es_texto']) : NULL,
            'en_texto' => (!empty($_POST['en_texto'])) ? $this->helper->cleanInput($_POST['en_texto']) : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmAgregarMenu($datos);
        echo json_encode($data);
    }

    public function frmAgregarIndexSeccionItem5() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'es_item' => (!empty($_POST['es_item'])) ? $this->helper->cleanInput($_POST['es_item']) : NULL,
            'en_item' => (!empty($_POST['en_item'])) ? $this->helper->cleanInput($_POST['en_item']) : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmAgregarIndexSeccionItem5($datos);
        echo json_encode($data);
    }

    public function frmAgregarVideoNeo() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id_youtube' => (!empty($_POST['id_youtube'])) ? $this->helper->cleanInput($_POST['id_youtube']) : NULL
        );
        $data = $this->model->frmAgregarVideoNeo($datos);
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

    public function modalEditarDTSeccion5() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTSeccion5($data);
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

    public function modalAgregarMenu() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarMenu($this->idioma);
        echo json_encode($datos);
    }

    public function modalAgregarSlider() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarSlider($this->idioma);
        echo json_encode($datos);
    }

    public function modalAgregarRedes() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarRedes($this->idioma);
        echo json_encode($datos);
    }

    public function modalAgregarItemSeccion5() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarItemSeccion5();
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

            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgLogoCabacera($data);
            echo json_encode($response);
        }
    }

    public function uploadImgHeaderNeoPure() {
        if (!empty($_POST)) {
            $this->model->unlinkImagenNeoPure();
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/header/';
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
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1400;
            $alto = 788;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgHeaderNeoPure($data);
            echo json_encode($response);
        }
    }

    public function uploadImgCertificacion() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImgCertificacion($idPost);
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/certificaciones/';
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
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgCertificacion($data);
            echo json_encode($response);
        }
    }

    public function uploadImgParallaxNosotros() {
        if (!empty($_POST)) {
            $this->model->unlinkImagenParallaxNosotros();
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/parallax/';
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
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1400;
            $alto = 788;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgParallaxNosotros($data);
            echo json_encode($response);
        }
    }

    public function uploadImgLogisticaHeader() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagenNeoPure();
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/header/';
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
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1400;
            $alto = 788;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgLogisticaHeader($data);
            echo json_encode($response);
        }
    }

    public function uploadImgSlider() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagenSlider($idPost);
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/slider/';
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
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1920;
            $alto = 755;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgSlider($data);
            echo json_encode($response);
        }
    }

    public function uploadImgCertificacionHeader() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagenCertificacionHeader($idPost);
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/header/';
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
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1400;
            $alto = 788;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgCertificacionHeader($data);
            echo json_encode($response);
        }
    }

    public function uploadImgProductoHeader() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagenNeoPure();
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/header/';
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
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1400;
            $alto = 788;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgProductoHeader($data);
            echo json_encode($response);
        }
    }

    public function uploadImgPaginaHeader() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagenNeoPure();
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/header/';
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
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1400;
            $alto = 788;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgPaginaHeader($data);
            echo json_encode($response);
        }
    }

    public function uploadImgHeaderCalidad() {
        if (!empty($_POST)) {
            $this->model->unlinkImagenCalidad();
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/header/';
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
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1400;
            $alto = 788;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgHeaderCalidad($data);
            echo json_encode($response);
        }
    }

    public function uploadImgHeaderNosotros() {
        if (!empty($_POST)) {
            $this->model->unlinkImagenNosotros();
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/header/';
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
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1400;
            $alto = 788;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgHeaderNosotros($data);
            echo json_encode($response);
        }
    }

    public function uploadImgHeaderContacto() {
        if (!empty($_POST)) {
            $this->model->unlinkImagenContacto();
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/header/';
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
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1400;
            $alto = 788;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgHeaderContacto($data);
            echo json_encode($response);
        }
    }

    public function uploadImgBlogHeaderListado() {
        if (!empty($_POST)) {
            $this->model->unlinkImagenBlogHeaderContacto();
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/header/';
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
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1400;
            $alto = 788;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgBlogHeaderListado($data);
            echo json_encode($response);
        }
    }

    public function uploadImgFormularioContacto() {
        if (!empty($_POST)) {
            $this->model->unlinkImagenFormularioContacto();
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/parallax/';
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
            $response = $this->model->uploadImgFormularioContacto($data);
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

    public function listadoDTBlog() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTBlog($_REQUEST);
        echo $data;
    }

    public function modalEditarBlogPost() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'idioma' => $this->idioma
        );
        $datos = $this->model->modalEditarBlogPost($data);
        echo $datos;
    }

    public function modalEditarLogistica() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'idioma' => $this->idioma
        );
        $datos = $this->model->modalEditarLogistica($data);
        echo $datos;
    }

    public function modalEditarCertificaciones() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'idioma' => $this->idioma
        );
        $datos = $this->model->modalEditarCertificaciones($data);
        echo $datos;
    }

    public function modalEditarProductos() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'idioma' => $this->idioma
        );
        $datos = $this->model->modalEditarProductos($data);
        echo $datos;
    }

    public function modalEditarPaginas() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'idioma' => $this->idioma
        );
        $datos = $this->model->modalEditarPaginas($data);
        echo $datos;
    }

    public function frmEditarBlogPost() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'es_titulo' => $this->helper->cleanInput($_POST['es_titulo']),
            'en_titulo' => $this->helper->cleanInput($_POST['en_titulo']),
            'es_contenido' => $_POST['es_contenido'],
            'en_contenido' => $_POST['en_contenido'],
            'es_tags' => $_POST['es_tags'],
            'en_tags' => $_POST['en_tags'],
            'youtube_id' => (!empty($_POST['youtube_id'])) ? $this->helper->cleanInput($_POST['youtube_id']) : NULL,
            'fecha_blog' => $this->helper->cleanInput($_POST['fecha_blog']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarBlogPost($datos);
        echo json_encode($data);
    }

    public function frmContenidoNeoPure() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'es_header_text' => $this->helper->cleanInput($_POST['es_header_text']),
            'es_contenido' => $_POST['es_contenido'],
            'en_header_text' => $this->helper->cleanInput($_POST['en_header_text']),
            'en_contenido' => $_POST['en_contenido'],
        );
        $data = $this->model->frmContenidoNeoPure($datos);
        echo json_encode($data);
    }

    public function frmBlogTextos() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'es_header' => (!empty($_POST['es_header'])) ? $this->helper->cleanInput($_POST['es_header']) : NULL,
            'es_footer' => (!empty($_POST['es_footer'])) ? $this->helper->cleanInput($_POST['es_footer']) : NULL,
            'en_header' => (!empty($_POST['en_header'])) ? $this->helper->cleanInput($_POST['en_header']) : NULL,
            'en_footer' => (!empty($_POST['en_footer'])) ? $this->helper->cleanInput($_POST['en_footer']) : NULL,
        );
        $data = $this->model->frmBlogTextos($datos);
        echo json_encode($data);
    }

    public function frmContenidoCalidad() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'es_header_text' => $this->helper->cleanInput($_POST['es_header_text']),
            'es_contenido' => $_POST['es_contenido'],
            'en_header_text' => $this->helper->cleanInput($_POST['en_header_text']),
            'en_contenido' => $_POST['en_contenido'],
        );
        $data = $this->model->frmContenidoCalidad($datos);
        echo json_encode($data);
    }

    public function frmContenidoContacto() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'es_header_text' => (!empty($_POST['es_header_text'])) ? $this->helper->cleanInput($_POST['es_header_text']) : NULL,
            'es_titulo' => (!empty($_POST['es_titulo'])) ? $this->helper->cleanInput($_POST['es_titulo']) : NULL,
            'es_frm_nombre' => (!empty($_POST['es_frm_nombre'])) ? $this->helper->cleanInput($_POST['es_frm_nombre']) : NULL,
            'es_frm_email' => (!empty($_POST['es_frm_email'])) ? $this->helper->cleanInput($_POST['es_frm_email']) : NULL,
            'es_frm_asunto' => (!empty($_POST['es_frm_asunto'])) ? $this->helper->cleanInput($_POST['es_frm_asunto']) : NULL,
            'es_frm_mensaje' => (!empty($_POST['es_frm_mensaje'])) ? $this->helper->cleanInput($_POST['es_frm_mensaje']) : NULL,
            'es_btn_enviar' => (!empty($_POST['es_btn_enviar'])) ? $this->helper->cleanInput($_POST['es_btn_enviar']) : NULL,
            'es_texto_ubicacion' => (!empty($_POST['es_texto_ubicacion'])) ? $this->helper->cleanInput($_POST['es_texto_ubicacion']) : NULL,
            'en_header_text' => (!empty($_POST['en_header_text'])) ? $this->helper->cleanInput($_POST['en_header_text']) : NULL,
            'en_titulo' => (!empty($_POST['en_titulo'])) ? $this->helper->cleanInput($_POST['en_titulo']) : NULL,
            'en_frm_nombre' => (!empty($_POST['en_frm_nombre'])) ? $this->helper->cleanInput($_POST['en_frm_nombre']) : NULL,
            'en_frm_email' => (!empty($_POST['en_frm_email'])) ? $this->helper->cleanInput($_POST['en_frm_email']) : NULL,
            'en_frm_asunto' => (!empty($_POST['en_frm_asunto'])) ? $this->helper->cleanInput($_POST['en_frm_asunto']) : NULL,
            'en_frm_mensaje' => (!empty($_POST['en_frm_mensaje'])) ? $this->helper->cleanInput($_POST['en_frm_mensaje']) : NULL,
            'en_btn_enviar' => (!empty($_POST['en_btn_enviar'])) ? $this->helper->cleanInput($_POST['en_btn_enviar']) : NULL,
            'en_texto_ubicacion' => (!empty($_POST['en_texto_ubicacion'])) ? $this->helper->cleanInput($_POST['en_texto_ubicacion']) : NULL,
        );
        $data = $this->model->frmContenidoContacto($datos);
        echo json_encode($data);
    }

    public function uploadImgBlog() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            //$this->model->unlinkActualBlogImg($idPost);
            $error = false;
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/blog/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            //$filename				= $file.'.'.substr(sha1(time()),0,6).'.'.$extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #############
            #SE REDIMENSIONA LA IMAGEN
            #############
            # ruta de la imagen a redimensionar 
            $imagen = $serverdir . $filename;
            # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
            $imagen_final = $filename;
            $ancho = 1200;
            $alto = 800;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);

            #IMAGEN THUMB
            $tmp = explode(',', $_POST['file']);
            $file_thumb = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename_thumb = $this->helper->cleanUrl($idPost . '_thumb-' . $name);
            $filename_thumb = $filename_thumb . '.' . $extension;

            $handle = fopen($serverdir . $filename_thumb, 'w');
            fwrite($handle, $file_thumb);
            fclose($handle);

            #############
            #SE REDIMENSIONA LA IMAGEN
            #############
            # ruta de la imagen a redimensionar 
            $imagen_thumb = $serverdir . $filename_thumb;
            $imagen_final_thumb = $filename_thumb;
            $ancho_thumb = 566;
            $alto_thumb = 372;

            $this->helper->redimensionar($imagen_thumb, $imagen_final_thumb, $ancho_thumb, $alto_thumb, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename,
                'imagen_thumb' => $filename_thumb
            );
            $response = $this->model->uploadImgBlog($data);
            echo json_encode($response);
        }
    }

    public function uploadImgBlogHeader() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            //$this->model->unlinkActualBlogImg($idPost);
            $error = false;
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/header/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #############
            #SE REDIMENSIONA LA IMAGEN
            #############
            # ruta de la imagen a redimensionar 
            $imagen = $serverdir . $filename;
            # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
            $imagen_final = $filename;
            $ancho = 1400;
            $alto = 788;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);

            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgBlogHeader($data);
            echo json_encode($response);
        }
    }

    public function uploadImgSeccion2() {
        if (!empty($_POST)) {
            $error = false;
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
            #SE REDIMENSIONA LA IMAGEN
            #############
            # ruta de la imagen a redimensionar 
            $imagen = $serverdir . $filename;
            # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
            $imagen_final = $filename;
            $ancho = 555;
            $alto = 450;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);

            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgSeccion2($data);
            echo json_encode($response);
        }
    }

    public function uploadImgSeccion5() {
        if (!empty($_POST)) {
            $error = false;
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
            #SE REDIMENSIONA LA IMAGEN
            #############
            # ruta de la imagen a redimensionar 
            $imagen = $serverdir . $filename;
            # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
            $imagen_final = $filename;
            $ancho = 555;
            $alto = 450;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);

            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgSeccion5($data);
            echo json_encode($response);
        }
    }

    public function uploadImgSeccion3() {
        if (!empty($_POST)) {
            $error = false;
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/parallax/';
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
            #SE REDIMENSIONA LA IMAGEN
            #############
            # ruta de la imagen a redimensionar 
            $imagen = $serverdir . $filename;
            # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
            $imagen_final = $filename;
            $ancho = 1400;
            $alto = 788;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);

            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgSeccion3($data);
            echo json_encode($response);
        }
    }

    public function modalAgregarBlogPost() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarBlogPost($this->idioma);
        echo json_encode($datos);
    }

    public function modalAgregarLogistica() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarLogistica($this->idioma);
        echo json_encode($datos);
    }

    public function modalAgregarCertificacion() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarCertificacion($this->idioma);
        echo json_encode($datos);
    }

    public function modalAgregarProducto() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarProducto($this->idioma);
        echo json_encode($datos);
    }

    public function frmAgregarBlogPost() {
        if (!empty($_POST)) {
            $data = array(
                'es_titulo' => (!empty($_POST['es_titulo'])) ? $this->helper->cleanInput($_POST['es_titulo']) : NULL,
                'en_titulo' => (!empty($_POST['en_titulo'])) ? $this->helper->cleanInput($_POST['en_titulo']) : NULL,
                'es_tags' => (!empty($_POST['en_titulo'])) ? $this->helper->cleanInput($_POST['es_tags']) : NULL,
                'en_tags' => (!empty($_POST['en_titulo'])) ? $this->helper->cleanInput($_POST['en_tags']) : NULL,
                'es_contenido' => (!empty($_POST['en_titulo'])) ? $_POST['es_contenido'] : NULL,
                'en_contenido' => (!empty($_POST['en_titulo'])) ? $_POST['en_contenido'] : NULL,
                'youtube_id' => (!empty($_POST['youtube_id'])) ? $this->helper->cleanInput($_POST['youtube_id']) : NULL,
                'fecha_blog' => (!empty($_POST['fecha_blog'])) ? $this->helper->cleanInput($_POST['fecha_blog']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $_POST['estado'] : 0,
            );
            $idPost = $this->model->frmAgregarBlogPost($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                #IMAGEN DEL BLOG
                $dir = 'public/images/blog/';
                $serverdir = $dir;
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);

                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                $imagen_final = $fname;
                $ancho = 1200;
                $alto = 800;

                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);

                #IMAGEN THUMB
                $newname_thumb = $idPost . '_thumb-' . $_FILES['file_archivo']['name'];
                $fname_thumb = $this->helper->cleanUrl($newname_thumb);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname_thumb, 'w');
                fwrite($handle, $contents);
                fclose($handle);

                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen_thumb = $serverdir . $fname_thumb;
                $imagen_final_thumb = $fname_thumb;
                $ancho_thumb = 566;
                $alto_thumb = 372;

                $this->helper->redimensionar($imagen_thumb, $imagen_final_thumb, $ancho_thumb, $alto_thumb, $serverdir);

                #IMAGEN DEL BLOG HEADER
                $dirHeader = 'public/images/header/';
                $serverdirHeader = $dirHeader;
                $newname = $idPost . '_' . $_FILES['file_archivo_header']['name'];
                $fnameHeader = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo_header']['tmp_name']);

                $handle = fopen($serverdirHeader . $fnameHeader, 'w');
                fwrite($handle, $contents);
                fclose($handle);

                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdirHeader . $fnameHeader;
                $imagen_final = $fnameHeader;
                $ancho = 1400;
                $alto = 788;

                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdirHeader);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagen' => $fname,
                    'imagen_thumb' => $fname_thumb,
                    'imagen_header' => $fnameHeader
                );
                $this->model->frmAddBlogImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente el contenido'
            ));
        }
        header('Location:' . URL . $this->idioma . '/admin/blog/');
    }

    public function frmAgregarCertificacion() {
        if (!empty($_POST)) {
            $data = array(
                'es_texto_header' => (!empty($_POST['es_texto_header'])) ? $this->helper->cleanInput($_POST['es_texto_header']) : NULL,
                'es_menu' => (!empty($_POST['es_menu'])) ? $this->helper->cleanInput($_POST['es_menu']) : NULL,
                'es_contenido' => (!empty($_POST['es_contenido'])) ? $_POST['es_contenido'] : NULL,
                'en_texto_header' => (!empty($_POST['en_texto_header'])) ? $this->helper->cleanInput($_POST['en_texto_header']) : NULL,
                'en_menu' => (!empty($_POST['en_menu'])) ? $this->helper->cleanInput($_POST['en_menu']) : NULL,
                'en_contenido' => (!empty($_POST['en_contenido'])) ? $_POST['en_contenido'] : NULL,
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $_POST['estado'] : 0,
            );
            $idPost = $this->model->frmAgregarCertificacion($data);
            #IMAGEN CERTIFICACION
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                #IMAGEN DEL BLOG
                $dir = 'public/images/certificaciones/';
                $serverdir = $dir;
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);

                #IMAGEN DEL HEADER
                $dirHeader = 'public/images/header/';
                $serverdirHeader = $dirHeader;
                $newname = $idPost . '_' . $_FILES['file_archivo_header']['name'];
                $fnameHeader = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo_header']['tmp_name']);

                $handle = fopen($serverdirHeader . $fnameHeader, 'w');
                fwrite($handle, $contents);
                fclose($handle);

                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdirHeader . $fnameHeader;
                $imagen_final = $fnameHeader;
                $ancho = 1400;
                $alto = 788;

                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdirHeader);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagen' => $fname,
                    'imagen_header' => $fnameHeader
                );
                $this->model->frmAddCertificadoImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente el contenido'
            ));
        }
        header('Location:' . URL . $this->idioma . '/admin/certifications/');
    }

    public function frmAgregarProducto() {
        if (!empty($_POST)) {
            $data = array(
                'es_nombre' => (!empty($_POST['es_nombre'])) ? $this->helper->cleanInput($_POST['es_nombre']) : NULL,
                'es_header_text' => (!empty($_POST['es_header_text'])) ? $this->helper->cleanInput($_POST['es_header_text']) : NULL,
                'es_contenido' => (!empty($_POST['es_contenido'])) ? $_POST['es_contenido'] : NULL,
                'en_nombre' => (!empty($_POST['en_nombre'])) ? $this->helper->cleanInput($_POST['en_nombre']) : NULL,
                'en_header_text' => (!empty($_POST['en_header_text'])) ? $this->helper->cleanInput($_POST['en_header_text']) : NULL,
                'en_contenido' => (!empty($_POST['en_contenido'])) ? $_POST['en_contenido'] : NULL,
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $_POST['estado'] : 0,
            );
            $idPost = $this->model->frmAgregarProducto($data);
            #IMAGEN PRODUCTO HEADER
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;

                #IMAGEN DEL HEADER
                $dirHeader = 'public/images/header/';
                $serverdirHeader = $dirHeader;
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fnameHeader = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdirHeader . $fnameHeader, 'w');
                fwrite($handle, $contents);
                fclose($handle);

                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdirHeader . $fnameHeader;
                $imagen_final = $fnameHeader;
                $ancho = 1400;
                $alto = 788;

                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdirHeader);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagen_header' => $fnameHeader
                );
                $this->model->frmAddProductoImg($imagenes);
            }
            if (!empty($_FILES['file_productos']['name'])) {
                $dir = 'public/images/productos/';
                $dirThumb = 'public/images/productos/thumb/';
                $serverdir = $dir;
                $serverdirThumb = $dirThumb;
                #IMAGENES
                $filename = array();
                $filenameThumb = array();
                #IMAGENES
                $cantImagenes = count($_FILES['file_productos']['name']) - 1;
                for ($i = 0; $i <= $cantImagenes; $i++) {
                    $newname = $idPost . '_' . $_FILES['file_productos']['name'][$i];

                    $fname = $this->helper->cleanUrl($newname);


                    $contents = file_get_contents($_FILES['file_productos']['tmp_name'][$i]);

                    $handle = fopen($serverdir . $fname, 'w');
                    fwrite($handle, $contents);
                    fclose($handle);
                    #############
                    #SE REDIMENSIONA LA IMAGEN
                    #############
                    # ruta de la imagen a redimensionar 
                    $imagen = $serverdir . $fname;
                    # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                    $imagen_final = $fname;
                    $ancho = 1180;
                    $alto = 785;
                    $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                    #############
                    array_push($filename, $fname);
                    #THUMB DE LA IMAGEN
                    $newnameThumb = $idPost . '_thumb-' . $_FILES['file_productos']['name'][$i];
                    $fnameThumb = $this->helper->cleanUrl($newnameThumb);
                    $contents = file_get_contents($_FILES['file_productos']['tmp_name'][$i]);
                    $handle = fopen($serverdirThumb . $fnameThumb, 'w');
                    fwrite($handle, $contents);
                    fclose($handle);
                    #############
                    #SE REDIMENSIONA LA IMAGEN
                    #############
                    # ruta de la imagen a redimensionar 
                    $imagen = $serverdirThumb . $fnameThumb;
                    # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                    $imagen_final = $fnameThumb;
                    $ancho = 270;
                    $alto = 203;
                    $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdirThumb);
                    #############
                    array_push($filenameThumb, $fnameThumb);
                }
                $imagenes = array(
                    'id' => $idPost,
                    'imagenes' => $filename,
                    'thumb' => $filenameThumb
                );
                $this->model->insertProductoImagen($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente el contenido'
            ));
        }
        header('Location:' . URL . $this->idioma . '/admin/products/');
    }

    public function frmAgregarLogistica() {
        if (!empty($_POST)) {
            $data = array(
                'es_header_text' => (!empty($_POST['es_header_text'])) ? $this->helper->cleanInput($_POST['es_header_text']) : NULL,
                'es_menu' => (!empty($_POST['es_menu'])) ? $this->helper->cleanInput($_POST['es_menu']) : NULL,
                'es_contenido' => (!empty($_POST['es_contenido'])) ? $_POST['es_contenido'] : NULL,
                'en_header_text' => (!empty($_POST['en_header_text'])) ? $this->helper->cleanInput($_POST['en_header_text']) : NULL,
                'en_menu' => (!empty($_POST['en_menu'])) ? $this->helper->cleanInput($_POST['en_menu']) : NULL,
                'en_contenido' => (!empty($_POST['en_contenido'])) ? $_POST['en_contenido'] : NULL,
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $_POST['estado'] : 0,
            );
            $idPost = $this->model->frmAgregarLogistica($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                #IMAGEN DEL BLOG
                $dir = 'public/images/header/';
                $serverdir = $dir;
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);

                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                $imagen_final = $fname;
                $ancho = 1400;
                $alto = 788;

                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagen_header' => $fname
                );
                $this->model->frmAddHeaderImgLogisticaImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente el contenido'
            ));
        }
        header('Location:' . URL . $this->idioma . '/admin/logistics/');
    }

    public function listadoDTSlider() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTSlider();
        echo $data;
    }

    public function listadoDTSeccion5() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTSeccion5();
        echo $data;
    }

    public function btnMostrarImg() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->btnMostrarImg($data);
        echo json_encode($datos);
    }

    public function btnMostrarImgNeo() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->btnMostrarImgNeo($data);
        echo json_encode($datos);
    }

    public function btnEliminarImg() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->btnEliminarImg($data);
        echo json_encode($datos);
    }

    public function btnEliminarImgNeo() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->btnEliminarImgNeo($data);
        echo json_encode($datos);
    }

    public function modalEditarDTSlider() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'lng' => $this->idioma,
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTSlider($data);
        echo $datos;
    }

    public function frmEditarSlider() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'es_url' => (!empty($_POST['es_url'])) ? $this->helper->cleanInput($_POST['es_url']) : NULL,
            'en_url' => (!empty($_POST['en_url'])) ? $this->helper->cleanInput($_POST['en_url']) : NULL,
            'es_texto1' => (!empty($_POST['es_texto1'])) ? $this->helper->cleanInput($_POST['es_texto1']) : NULL,
            'es_texto2' => (!empty($_POST['es_texto2'])) ? $this->helper->cleanInput($_POST['es_texto2']) : NULL,
            'es_boton' => (!empty($_POST['es_boton'])) ? $this->helper->cleanInput($_POST['es_boton']) : NULL,
            'en_texto1' => (!empty($_POST['en_texto1'])) ? $this->helper->cleanInput($_POST['en_texto1']) : NULL,
            'en_texto2' => (!empty($_POST['en_texto2'])) ? $this->helper->cleanInput($_POST['en_texto2']) : NULL,
            'en_boton' => (!empty($_POST['en_boton'])) ? $this->helper->cleanInput($_POST['en_boton']) : NULL,
            'data_x_1' => (!empty($_POST['data_x_1'])) ? $this->helper->cleanInput($_POST['data_x_1']) : NULL,
            'data_y_1' => (!empty($_POST['data_y_1'])) ? $this->helper->cleanInput($_POST['data_y_1']) : NULL,
            'data_start_1' => (!empty($_POST['data_start_1'])) ? $this->helper->cleanInput($_POST['data_start_1']) : NULL,
            'data_speed_1' => (!empty($_POST['data_speed_1'])) ? $this->helper->cleanInput($_POST['data_speed_1']) : NULL,
            'data_x_2' => (!empty($_POST['data_speed_1'])) ? $this->helper->cleanInput($_POST['data_x_2']) : NULL,
            'data_y_2' => (!empty($_POST['data_y_2'])) ? $this->helper->cleanInput($_POST['data_y_2']) : NULL,
            'data_start_2' => (!empty($_POST['data_start_2'])) ? $this->helper->cleanInput($_POST['data_start_2']) : NULL,
            'data_speed_2' => (!empty($_POST['data_speed_2'])) ? $this->helper->cleanInput($_POST['data_speed_2']) : NULL,
            'boton_x' => (!empty($_POST['boton_x'])) ? $this->helper->cleanInput($_POST['boton_x']) : NULL,
            'boton_y' => (!empty($_POST['boton_y'])) ? $this->helper->cleanInput($_POST['boton_y']) : NULL,
            'boton_start' => (!empty($_POST['boton_start'])) ? $this->helper->cleanInput($_POST['boton_start']) : NULL,
            'boton_speed' => (!empty($_POST['boton_speed'])) ? $this->helper->cleanInput($_POST['boton_speed']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarSlider($datos);
        echo json_encode($data);
    }

    public function frmAgregarSlider() {
        if (!empty($_POST)) {
            $principal = $_POST['principal'];
            $data = array(
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'es_texto1' => (!empty($_POST['es_texto1'])) ? $this->helper->cleanInput($_POST['es_texto1']) : NULL,
                'es_texto2' => (!empty($_POST['es_texto2'])) ? $this->helper->cleanInput($_POST['es_texto2']) : NULL,
                'es_boton' => (!empty($_POST['es_boton'])) ? $this->helper->cleanInput($_POST['es_boton']) : NULL,
                'en_texto1' => (!empty($_POST['en_texto1'])) ? $this->helper->cleanInput($_POST['en_texto1']) : NULL,
                'en_texto2' => (!empty($_POST['en_texto2'])) ? $this->helper->cleanInput($_POST['en_texto2']) : NULL,
                'en_boton' => (!empty($_POST['en_boton'])) ? $this->helper->cleanInput($_POST['en_boton']) : NULL,
                'data_x_1' => (!empty($_POST['data_x_1'])) ? $this->helper->cleanInput($_POST['data_x_1']) : NULL,
                'data_y_1' => (!empty($_POST['data_y_1'])) ? $this->helper->cleanInput($_POST['data_y_1']) : NULL,
                'data_start_1' => (!empty($_POST['data_start_1'])) ? $this->helper->cleanInput($_POST['data_start_1']) : NULL,
                'data_speed_1' => (!empty($_POST['data_speed_1'])) ? $this->helper->cleanInput($_POST['data_speed_1']) : NULL,
                'data_x_2' => (!empty($_POST['data_x_2'])) ? $this->helper->cleanInput($_POST['data_x_2']) : NULL,
                'data_y_2' => (!empty($_POST['data_y_2'])) ? $this->helper->cleanInput($_POST['data_y_2']) : NULL,
                'data_start_2' => (!empty($_POST['data_start_2'])) ? $this->helper->cleanInput($_POST['data_start_2']) : NULL,
                'data_speed_2' => (!empty($_POST['data_speed_2'])) ? $this->helper->cleanInput($_POST['data_speed_2']) : NULL,
                'boton_x' => (!empty($_POST['boton_x'])) ? $this->helper->cleanInput($_POST['boton_x']) : NULL,
                'boton_y' => (!empty($_POST['boton_y'])) ? $this->helper->cleanInput($_POST['boton_y']) : NULL,
                'boton_start' => (!empty($_POST['boton_start'])) ? $this->helper->cleanInput($_POST['boton_start']) : NULL,
                'boton_speed' => (!empty($_POST['boton_speed'])) ? $this->helper->cleanInput($_POST['boton_speed']) : NULL,
                'es_url' => (!empty($_POST['es_url'])) ? $this->helper->cleanInput($_POST['es_url']) : NULL,
                'en_url' => (!empty($_POST['en_url'])) ? $this->helper->cleanInput($_POST['en_url']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
            );
            $idPost = $this->model->frmAgregarSlider($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                $dir = 'public/images/slider/';
                $serverdir = $dir;
                #IMAGENES
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);
                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                $imagen_final = $fname;
                $ancho = 1920;
                $alto = 755;
                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagenes' => $fname
                );
                $this->model->frmAddSliderImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente el slider'
            ));
        }
        header('Location:' . URL . 'admin/inicio/');
    }

    public function frmEditarNosotrosEncabezado() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'es_header_text' => (!empty($_POST['es_header_text'])) ? $this->helper->cleanInput($_POST['es_header_text']) : NULL,
            'en_header_text' => (!empty($_POST['en_header_text'])) ? $this->helper->cleanInput($_POST['en_header_text']) : NULL,
        );
        $datos = $this->model->frmEditarNosotrosEncabezado($data);
        echo json_encode($datos);
    }

    public function frmEditarCertificacion() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'es_texto_header' => (!empty($_POST['es_texto_header'])) ? $this->helper->cleanInput($_POST['es_texto_header']) : NULL,
            'es_menu' => (!empty($_POST['es_menu'])) ? $this->helper->cleanInput($_POST['es_menu']) : NULL,
            'es_contenido' => (!empty($_POST['es_contenido'])) ? $_POST['es_contenido'] : NULL,
            'en_texto_header' => (!empty($_POST['en_texto_header'])) ? $this->helper->cleanInput($_POST['en_texto_header']) : NULL,
            'en_menu' => (!empty($_POST['en_menu'])) ? $this->helper->cleanInput($_POST['en_menu']) : NULL,
            'en_contenido' => (!empty($_POST['en_contenido'])) ? $_POST['en_contenido'] : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $datos = $this->model->frmEditarCertificacion($data);
        echo json_encode($datos);
    }

    public function frmEditarProducto() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'es_nombre' => (!empty($_POST['es_nombre'])) ? $this->helper->cleanInput($_POST['es_nombre']) : NULL,
            'es_header_text' => (!empty($_POST['es_header_text'])) ? $this->helper->cleanInput($_POST['es_header_text']) : NULL,
            'es_contenido' => (!empty($_POST['es_contenido'])) ? $_POST['es_contenido'] : NULL,
            'en_nombre' => (!empty($_POST['en_nombre'])) ? $_POST['en_nombre'] : NULL,
            'en_header_text' => (!empty($_POST['en_header_text'])) ? $_POST['en_header_text'] : NULL,
            'en_contenido' => (!empty($_POST['en_contenido'])) ? $_POST['en_contenido'] : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $datos = $this->model->frmEditarProducto($data);
        echo json_encode($datos);
    }
    
    public function frmEditarLogistica() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'es_header_text' => (!empty($_POST['es_header_text'])) ? $this->helper->cleanInput($_POST['es_header_text']) : NULL,
            'es_menu' => (!empty($_POST['es_menu'])) ? $this->helper->cleanInput($_POST['es_menu']) : NULL,
            'es_contenido' => (!empty($_POST['es_contenido'])) ? $_POST['es_contenido'] : NULL,
            'en_header_text' => (!empty($_POST['en_header_text'])) ? $this->helper->cleanInput($_POST['en_header_text']) : NULL,
            'en_menu' => (!empty($_POST['en_menu'])) ? $this->helper->cleanInput($_POST['en_menu']) : NULL,
            'en_contenido' => (!empty($_POST['en_contenido'])) ? $_POST['en_contenido'] : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $datos = $this->model->frmEditarLogistica($data);
        echo json_encode($datos);
    }

    public function frmEditarPagina() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'es_contenido' => (!empty($_POST['es_contenido'])) ? $_POST['es_contenido'] : NULL,
            'es_header_text' => (!empty($_POST['es_header_text'])) ? $this->helper->cleanInput($_POST['es_header_text']) : NULL,
            'en_header_text' => (!empty($_POST['en_header_text'])) ? $this->helper->cleanInput($_POST['en_header_text']) : NULL,
            'en_contenido' => (!empty($_POST['en_contenido'])) ? $_POST['en_contenido'] : NULL,
        );
        $datos = $this->model->frmEditarPagina($data);
        echo json_encode($datos);
    }

    public function frmEditarContenidoNosostros() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'es_contenido' => (!empty($_POST['es_contenido'])) ? $_POST['es_contenido'] : NULL,
            'en_contenido' => (!empty($_POST['en_contenido'])) ? $_POST['en_contenido'] : NULL,
            'es_contenido_adicional' => (!empty($_POST['es_contenido_adicional'])) ? $_POST['es_contenido_adicional'] : NULL,
            'en_contenido_adicional' => (!empty($_POST['en_contenido_adicional'])) ? $_POST['en_contenido_adicional'] : NULL
        );
        $datos = $this->model->frmEditarContenidoNosostros($data);
        echo json_encode($datos);
    }

    public function frmEditarNosotrosParallax() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'es_texto_parallax' => (!empty($_POST['es_texto_parallax'])) ? $this->helper->cleanInput($_POST['es_texto_parallax']) : NULL,
            'en_texto_parallax' => (!empty($_POST['en_texto_parallax'])) ? $this->helper->cleanInput($_POST['en_texto_parallax']) : NULL
        );
        $datos = $this->model->frmEditarNosotrosParallax($data);
        echo json_encode($datos);
    }

    public function frmEditarIndexSeccion1() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'es_titulo' => (!empty($_POST['es_titulo'])) ? $this->helper->cleanInput($_POST['es_titulo']) : NULL,
            'es_contenido' => (!empty($_POST['es_contenido'])) ? $_POST['es_contenido'] : NULL,
            'en_titulo' => (!empty($_POST['en_titulo'])) ? $this->helper->cleanInput($_POST['en_titulo']) : NULL,
            'en_contenido' => (!empty($_POST['en_contenido'])) ? $_POST['en_contenido'] : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $datos = $this->model->frmEditarIndexSeccion1($data);
        echo json_encode($datos);
    }

    public function frmEditarIndexSeccion2() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'es_contenido' => (!empty($_POST['es_contenido'])) ? $_POST['es_contenido'] : NULL,
            'en_contenido' => (!empty($_POST['en_contenido'])) ? $_POST['en_contenido'] : NULL,
            'es_boton' => (!empty($_POST['es_boton'])) ? $this->helper->cleanInput($_POST['es_boton']) : NULL,
            'en_boton' => (!empty($_POST['en_boton'])) ? $_POST['en_boton'] : NULL,
            'es_url' => (!empty($_POST['es_url'])) ? $_POST['es_url'] : NULL,
            'en_url' => (!empty($_POST['en_url'])) ? $_POST['en_url'] : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $datos = $this->model->frmEditarIndexSeccion2($data);
        echo json_encode($datos);
    }

    public function frmEditarIndexSeccion3() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'es_titulo' => (!empty($_POST['es_titulo'])) ? $this->helper->cleanInput($_POST['es_titulo']) : NULL,
            'en_titulo' => (!empty($_POST['en_titulo'])) ? $_POST['en_titulo'] : NULL,
            'es_contenido' => (!empty($_POST['es_contenido'])) ? $_POST['es_contenido'] : NULL,
            'en_contenido' => (!empty($_POST['en_contenido'])) ? $_POST['en_contenido'] : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $datos = $this->model->frmEditarIndexSeccion3($data);
        echo json_encode($datos);
    }

    public function frmEditarIndexSeccion4() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'es_titulo' => (!empty($_POST['es_titulo'])) ? $this->helper->cleanInput($_POST['es_titulo']) : NULL,
            'en_titulo' => (!empty($_POST['en_titulo'])) ? $_POST['en_titulo'] : NULL,
            'es_contenido' => (!empty($_POST['es_contenido'])) ? $_POST['es_contenido'] : NULL,
            'en_contenido' => (!empty($_POST['en_contenido'])) ? $_POST['en_contenido'] : NULL,
            'id_video_youtube' => (!empty($_POST['id_video_youtube'])) ? $_POST['id_video_youtube'] : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $datos = $this->model->frmEditarIndexSeccion4($data);
        echo json_encode($datos);
    }

    public function frmEditarIndexSeccion5() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'es_titulo' => (!empty($_POST['es_titulo'])) ? $this->helper->cleanInput($_POST['es_titulo']) : NULL,
            'en_titulo' => (!empty($_POST['en_titulo'])) ? $_POST['en_titulo'] : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $datos = $this->model->frmEditarIndexSeccion5($data);
        echo json_encode($datos);
    }

    public function frmEditarIndexSeccionItem5() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'es_item' => (!empty($_POST['es_item'])) ? $this->helper->cleanInput($_POST['es_item']) : NULL,
            'en_item' => (!empty($_POST['en_item'])) ? $this->helper->cleanInput($_POST['en_item']) : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $datos = $this->model->frmEditarIndexSeccionItem5($data);
        echo json_encode($datos);
    }

    public function uploadProductoImagen() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $idInsertDB = $this->model->insertProductoImagenes($idPost);
            $error = false;
            $dir = 'public/images/productos/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            #insertamos la imagen para obtene

            $filename = $this->helper->cleanUrl($idInsertDB . '_' . $name);
            $filename = $filename . '.' . $extension;
            //$filename				= $file.'.'.substr(sha1(time()),0,6).'.'.$extension;

            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #############
            #SE REDIMENSIONA LA IMAGEN
            #############
            # ruta de la imagen a redimensionar 
            $imagen = $serverdir . $filename;
            # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
            $imagen_final = $filename;
            $ancho = 1180;
            $alto = 785;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            $dataImagen = array(
                'id' => $idInsertDB,
                'archivo' => $filename
            );
            $uploadImagen = $this->model->uploadProductoImagen($dataImagen);
            ###################################################
            $dirThumb = 'public/images/productos/thumb/';
            $serverdirThumb = $dirThumb;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            #insertamos la imagen para obtene

            $filenameThumb = $this->helper->cleanUrl($idInsertDB . '_thumb-' . $name);
            $filenameThumb = $filenameThumb . '.' . $extension;
            //$filename				= $file.'.'.substr(sha1(time()),0,6).'.'.$extension;

            $handle = fopen($serverdirThumb . $filenameThumb, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #############
            #SE REDIMENSIONA LA IMAGEN
            #############
            # ruta de la imagen a redimensionar 
            $imagen = $serverdirThumb . $filenameThumb;
            # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
            $imagen_final = $filenameThumb;
            $ancho = 270;
            $alto = 203;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdirThumb);
            $dataImagenThumb = array(
                'id' => $idInsertDB,
                'archivo' => $filenameThumb
            );
            $response = $this->model->uploadProductoImagenMiniatura($dataImagenThumb);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($response);
            //echo json_encode(array('result'=>true));
        }
    }

    public function rptVisitasPaginas() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'fechaInicio' => $this->helper->cleanInput($_POST['fechaInicio']),
            'fechaFin' => $this->helper->cleanInput($_POST['fechaFin']),
            'mostrar' => $_POST['mostrar']
        );
        $data = $this->model->rptVisitasPaginas($datos);
        echo json_encode($data);
    }

    public function rptCantidadVisitasDia() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'fechaInicio' => $this->helper->cleanInput($_POST['fechaInicio']),
            'fechaFin' => $this->helper->cleanInput($_POST['fechaFin'])
        );
        $data = $this->model->rptCantidadVisitasDia($datos);
        echo json_encode($data);
    }

    public function rptUsuarios() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'fechaInicio' => $this->helper->cleanInput($_POST['fechaInicio']),
            'fechaFin' => $this->helper->cleanInput($_POST['fechaFin'])
        );
        $data = $this->model->rptUsuarios($datos);
        echo json_encode($data);
    }

    public function rptDispositivos() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'fechaInicio' => $this->helper->cleanInput($_POST['fechaInicio']),
            'fechaFin' => $this->helper->cleanInput($_POST['fechaFin'])
        );
        $data = $this->model->rptDispositivos($datos);
        echo json_encode($data);
    }

    public function rptPaginasSesion() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'fechaInicio' => $this->helper->cleanInput($_POST['fechaInicio']),
            'fechaFin' => $this->helper->cleanInput($_POST['fechaFin'])
        );
        $data = $this->model->rptPaginasSesion($datos);
        echo json_encode($data);
    }

    public function uploadNeoImagen() {
        if (!empty($_POST)) {
            $idInsertDB = $this->model->insertNeoImagenes();
            $error = false;
            $dir = 'public/images/neopure/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            #insertamos la imagen para obtene

            $filename = $this->helper->cleanUrl($idInsertDB . '_' . $name);
            $filename = $filename . '.' . $extension;
            //$filename				= $file.'.'.substr(sha1(time()),0,6).'.'.$extension;

            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #############
            #SE REDIMENSIONA LA IMAGEN
            #############
            # ruta de la imagen a redimensionar 
            $imagen = $serverdir . $filename;
            # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
            $imagen_final = $filename;
            $ancho = 1180;
            $alto = 785;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            $dataImagen = array(
                'id' => $idInsertDB,
                'archivo' => $filename
            );
            $uploadImagen = $this->model->uploadNeoImagen($dataImagen);
            ###################################################
            $dirThumb = 'public/images/neopure/thumb/';
            $serverdirThumb = $dirThumb;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            #insertamos la imagen para obtene

            $filenameThumb = $this->helper->cleanUrl($idInsertDB . '_thumb-' . $name);
            $filenameThumb = $filenameThumb . '.' . $extension;
            //$filename				= $file.'.'.substr(sha1(time()),0,6).'.'.$extension;

            $handle = fopen($serverdirThumb . $filenameThumb, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #############
            #SE REDIMENSIONA LA IMAGEN
            #############
            # ruta de la imagen a redimensionar 
            $imagen = $serverdirThumb . $filenameThumb;
            # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
            $imagen_final = $filenameThumb;
            $ancho = 270;
            $alto = 203;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdirThumb);
            $dataImagenThumb = array(
                'id' => $idInsertDB,
                'archivo' => $filenameThumb
            );
            $response = $this->model->uploadNeoImagenMiniatura($dataImagenThumb);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($response);
            //echo json_encode(array('result'=>true));
        }
    }

}
