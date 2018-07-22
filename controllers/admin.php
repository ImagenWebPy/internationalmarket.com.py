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

    public function blog() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Blog';
        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/iCheck/custom.css", "css/wfmi-style.css", "css/plugins/toastr/toastr.min.css", "css/plugins/summernote/summernote.css", "css/plugins/datapicker/datepicker3.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/iCheck/icheck.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/datapicker/bootstrap-datepicker.js");
        $this->view->render('admin/header');
        $this->view->render('admin/blog/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function neopure() {
        $this->view->helper = $this->helper;
        $this->view->idioma = $this->idioma;
        $this->view->title = 'Neo Pure';
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
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgHeaderNeoPure($data);
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

    public function modalAgregarBlogPost() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarBlogPost($this->idioma);
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

}
