<?php

class Admin_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function getRedesTable() {
        $sql = $this->db->select("select * from redes");
        return $sql;
    }

    public function modalEditarRedes($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM redes where id = $id");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarRedes" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre Red Social</label>
                                    <input type="text" name="descripcion" class="form-control" placeholder="Nombre Red Social" value="' . utf8_encode($sql[0]['descripcion']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Enlace</label>
                                    <input type="text" name="url" class="form-control" placeholder="Enlace" value="' . utf8_encode($sql[0]['url']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-info alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    Para cambiar el icono hay que visitar la siguiente pagina y copiar el tag del icono. <a class="alert-link" href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a>.
                                </div>
                                    <div class="form-group">
                                    <label>Font Awesome</label>
                                    <input type="text" name="fontawesome" class="form-control" placeholder="Fuente" value="' . utf8_encode($sql[0]['fontawesome']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Red Social</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Red Social',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalAgregarRedes($datos) {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmAgregarRedes" method="POST">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre Red Social</label>
                                    <input type="text" name="descripcion" class="form-control" placeholder="Nombre Red Social" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Enlace</label>
                                    <input type="text" name="url" class="form-control" placeholder="Enlace" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-info alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    Para cambiar el icono hay que visitar la siguiente pagina y copiar el tag del icono. <a class="alert-link" href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a>.
                                </div>
                                    <div class="form-group">
                                    <label>Font Awesome</label>
                                    <input type="text" name="fontawesome" class="form-control" placeholder="Fuente" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                            </div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Red Social</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Red Social',
            'content' => $modal
        );
        return $data;
    }

    public function frmEditarRedes($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'descripcion' => utf8_decode($datos['descripcion']),
            'url' => utf8_decode($datos['url']),
            'fontawesome' => utf8_decode($datos['fontawesome']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => $estado
        );
        $this->db->update('redes', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('redes', 'redes', $id),
            'mensaje' => 'Se han editado satisfactoriamente los datos de ' . $datos['descripcion'],
            'id' => $id
        );
        return $data;
    }

    public function frmAgregarRedes($datos) {
        $this->db->insert('redes', array(
            'descripcion' => utf8_decode($datos['descripcion']),
            'url' => utf8_decode($datos['url']),
            'fontawesome' => utf8_decode($datos['fontawesome']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => (!empty($datos['estado'])) ? $datos['estado'] : 0
        ));
        $id = $this->db->lastInsertId();
        $sql = $this->db->select("select * from redes where id = $id");
        $btnEstado = '';
        if ($sql[0]['estado'] == 1) {
            $btnEstado = '<a class="pointer btnCambiarEstado" data-seccion="redes" data-rowid="redes_" data-tabla="redes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
        } else {
            $btnEstado = '<a class="pointer btnCambiarEstado" data-seccion="redes" data-rowid="redes_" data-tabla="redes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
        }
        $data = array(
            'type' => 'success',
            'content' => '<tr id="redes_' . $id . '">'
            . '<td>' . $sql[0]['orden'] . '</td>'
            . '<td>' . utf8_encode($sql[0]['descripcion']) . '</td>'
            . '<td>' . $sql[0]['url'] . '</td>'
            . '<td>' . $btnEstado . '</td>'
            . '<td> <a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarRedes"><i class="fa fa-edit"></i> Editar </a> </td></tr>',
            'mensaje' => 'Se ha agregado correctamente la red social ' . utf8_encode($sql[0]['descripcion']),
            'id' => $id
        );
        return $data;
    }

    public function frmAgregarIndexSeccionItem5($datos) {
        $this->db->insert('index_seccion5_items', array(
            'es_item' => utf8_decode($datos['es_item']),
            'en_item' => utf8_decode($datos['en_item']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => (!empty($datos['estado'])) ? $datos['estado'] : 0
        ));
        $id = $this->db->lastInsertId();
        $sql = $this->db->select("select * from index_seccion5_items where id = $id");
        if ($sql[0]['estado'] == 1) {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="seccion5" data-rowid="seccion5_" data-tabla="index_seccion5_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
        } else {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="seccion5" data-rowid="seccion5_" data-tabla="index_seccion5_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
        }
        $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSeccion5"><i class="fa fa-edit"></i> Editar </a>';
        $data = array(
            'type' => 'success',
            'content' => '<tr id="seccion5_' . $id . '" role="row" class="odd">'
            . '<td class="sorting_1">' . utf8_encode($sql[0]['orden']) . '</td>'
            . '<td>' . utf8_encode($sql[0]['es_item']) . '</td>'
            . '<td>' . utf8_encode($sql[0]['en_item']) . '</td>'
            . '<td>' . $estado . '</td>'
            . '<td>' . $btnEditar . '</td>'
            . '</tr>',
            'mensaje' => 'Se ha agregado correctamente Item'
        );
        return $data;
    }

    private function rowDataTable($seccion, $tabla, $id) {
        //$sql = $this->db->select("SELECT * FROM $tabla WHERE id = $id;");
        $data = '';
        switch ($tabla) {
            case 'usuario':
                $sql = $this->db->select("SELECT wa.nombre, wa.email, wr.descripcion as rol, wa.estado
                                        FROM usuario wa
                                        LEFT JOIN usuario_rol wr on wr.id = wa.id_usuario_rol WHERE wa.id = $id;");
                break;
            case 'meta_tags':
                $sql = $this->db->select("SELECT
                                                m.es_texto,
                                                en_texto
                                        FROM
                                                meta_tags mt
                                        LEFT JOIN menu m ON m.id = mt.id_menu WHERE mt.id = $id;");
                break;
            default :
                $sql = $this->db->select("SELECT * FROM $tabla WHERE id = $id;");
                break;
        }
        switch ($seccion) {
            case 'departamento':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="departamento" data-rowid="departamento_" data-tabla="departamento" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="departamento" data-rowid="departamento_" data-tabla="departamento" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modal_editar_departamento" data-id=""><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . $id . '</td>'
                        . '<td>' . utf8_encode($sql[0]['descripcion']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'logistica':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="logistica" data-rowid="logistica_" data-tabla="logistica" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="logistica" data-rowid="logistica_" data-tabla="logistica" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarLogistica"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . utf8_encode($sql[0]['orden']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['es_header_text']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['en_header_text']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['es_menu']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['en_menu']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'slider':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="slider" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="slider" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSlider"><i class="fa fa-edit"></i> Editar </a>';
                if (!empty($sql[0]['imagen'])) {
                    $img = '<img src="' . URL . 'public/images/slider/' . $sql[0]['imagen'] . '" style="width: 160px;">';
                } else {
                    $img = '';
                }
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . $img . '</td>'
                        . '<td>' . utf8_encode($sql[0]['es_texto1']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['en_texto1']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'blog':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="blog" data-rowid="blog_" data-tabla="blog" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="blog" data-rowid="blog_" data-tabla="blog" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarBlogPost"><i class="fa fa-edit"></i> Editar </a>';
                if (empty($sql[0]['youtube_id'])) {
                    $imagen = '<img class="img-responsive imgBlogTable" src="' . URL . 'public/images/blog/' . $sql[0]['imagen_thumb'] . '">';
                } else {
                    $imagen = '<iframe class="scale-with-grid" src="http://www.youtube.com/embed/' . $sql[0]['youtube_id'] . '?wmode=opaque" allowfullscreen></iframe>';
                }
                $data = '<td>' . $sql[0]['id'] . '</td>'
                        . '<td>' . utf8_encode($sql[0]['es_titulo']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['en_titulo']) . '</td>'
                        . '<td>' . $imagen . '</td>'
                        . '<td>' . date('d-m-Y', strtotime($sql[0]['fecha_blog'])) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'usuarios':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="usuarios" data-rowid="usuarios_" data-tabla="usuario" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="usuarios" data-rowid="usuarios_" data-tabla="usuario" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTUsuario"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . utf8_encode($sql[0]['nombre']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['email']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['rol']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'redes':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="redes" data-rowid="redes_" data-tabla="redes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="redes" data-rowid="redes_" data-tabla="redes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarRedes"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . utf8_encode($sql[0]['orden']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['descripcion']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['url']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'seccion5':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="seccion5" data-rowid="seccion5_" data-tabla="index_seccion5_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="seccion5" data-rowid="seccion5_" data-tabla="index_seccion5_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSeccion5"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . utf8_encode($sql[0]['orden']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['es_item']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['en_item']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'meta_tags':
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarMetaTag"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . $id . '</td>'
                        . '<td>' . utf8_encode($sql[0]['es_texto']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['en_texto']) . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
        }
        return $data;
    }

    public function cambiarEstado($datos) {
        $id = $datos['id'];
        $tabla = $datos['tabla'];
        $campo = $datos['campo'];
        $seccion = $datos['seccion'];
        $estado = $datos['estado'];
        #Actualizamos el estado de acuerdo al valor actual
        if ($estado == 1)
            $newEstado = 0;
        else
            $newEstado = 1;
        $update = array(
            $campo => $newEstado
        );
        $this->db->update($tabla, $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable($seccion, $tabla, $id)
        );
        return $data;
    }

    public function datosDirecciones() {
        $sql = $this->db->select("select * from datos_contacto where id = 1");
        return $sql[0];
    }

    public function frmEditarDirecciones($datos) {
        $id = 1;
        $update = array(
            'direccion' => utf8_decode($datos['direccion']),
            'ciudad' => utf8_decode($datos['ciudad']),
            'pais' => utf8_decode($datos['pais']),
            'email' => utf8_decode($datos['email']),
            'telefono' => utf8_decode($datos['telefono']),
            'latitud' => utf8_decode($datos['latitud']),
            'longitud' => utf8_decode($datos['longitud']),
            'zoom' => utf8_decode($datos['zoom']),
        );
        $row = $this->db->update('datos_contacto', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => 'Se han actualizado correctamente los datos de contacto',
            'id' => $id
        );
        return $data;
    }

    public function frmEditarNosotrosEncabezado($datos) {
        $id = 1;
        $update = array(
            'es_header_text' => utf8_decode($datos['es_header_text']),
            'en_header_text' => utf8_decode($datos['en_header_text'])
        );
        $row = $this->db->update('nosotros', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido del encabezado'
        );
        return $data;
    }

    public function frmEditarContenidoNosostros($datos) {
        $id = 1;
        $update = array(
            'es_contenido' => utf8_decode($datos['es_contenido']),
            'en_contenido' => utf8_decode($datos['en_contenido']),
            'es_contenido_adicional' => utf8_decode($datos['es_contenido_adicional']),
            'en_contenido_adicional' => utf8_decode($datos['en_contenido_adicional'])
        );
        $row = $this->db->update('nosotros', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de la pagina nosotros'
        );
        return $data;
    }

    public function frmEditarNosotrosParallax($datos) {
        $id = 1;
        $update = array(
            'es_texto_parallax' => utf8_decode($datos['es_texto_parallax']),
            'en_texto_parallax' => utf8_decode($datos['en_texto_parallax'])
        );
        $row = $this->db->update('nosotros', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => 'Se han actualizado los textos'
        );
        return $data;
    }

    public function listadoDTUsuarios() {
        $sql = $this->db->select("SELECT wa.id, wa.nombre, wa.email, wr.descripcion as rol, wa.estado
                                FROM usuario wa
                                LEFT JOIN usuario_rol wr on wr.id = wa.id_usuario_rol");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="usuarios" data-rowid="usuarios_" data-tabla="usuario" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="usuarios" data-rowid="usuarios_" data-tabla="usuario" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTUsuario"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "usuarios_$id",
                'nombre' => utf8_encode($item['nombre']),
                'email' => utf8_encode($item['email']),
                'rol' => utf8_encode($item['rol']),
                'estado' => $estado,
                'accion' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoLogistica() {
        $sql = $this->db->select("SELECT id, orden, es_header_text, en_header_text, es_menu, en_menu, estado FROM logistica ORDER BY orden ASC;");
        return $sql;
    }

    public function modalEditarDTUsuario($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT wa.nombre, wa.email, wr.descripcion as rol, wa.estado, wr.id as id_rol
                                FROM usuario wa
                                LEFT JOIN usuario_rol wr on wr.id = wa.id_usuario_rol where wa.id = $id");
        $sqlRoles = $this->db->select("select * from usuario_rol where estado = 1");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarUsuario" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="' . utf8_encode($sql[0]['nombre']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="' . utf8_encode($sql[0]['email']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select class="form-control m-b" name="id_usuario_rol" required> 
                                        <option value="">Seleccione un Rol</option>';
        foreach ($sqlRoles as $item) {
            $selected = ($item['id'] == $sql[0]['id_rol']) ? 'selected' : '';
            $modal .= '                 <option value="' . $item['id'] . '" ' . $selected . '>' . $item['descripcion'] . '</option>';
        }
        $modal .= '                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    Solamente complete el campo contraseña cuando desee modificar la misma. Si la deja vacia no se modificará.
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="text" name="contrasena" class="form-control" placeholder="Contraseña" value="">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Usuario</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Datos del Usuario',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarDTSeccion5($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM `index_seccion5_items` where id = $id");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarIndexSeccionItem5" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ES Item</label>
                                    <input type="text" name="es_item" class="form-control" value="' . utf8_encode($sql[0]['es_item']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>EN Item</label>
                                    <input type="text" name="en_item" class="form-control" value="' . utf8_encode($sql[0]['en_item']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" value="' . utf8_encode($sql[0]['orden']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <hr>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Item</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green"
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Item de la Seccion 5',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalAgregarItemSeccion5() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmAgregarIndexSeccionItem5" method="POST">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ES Item</label>
                                    <input type="text" name="es_item" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>EN Item</label>
                                    <input type="text" name="en_item" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" > <i></i> Mostrar </label></div>
                            </div>
                            <hr>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Item</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green"
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Item',
            'content' => $modal
        );
        return $data;
    }

    public function frmEditarUsuario($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $contrasena = $datos['contrasena'];
        if (!empty($contrasena)) {
            $update = array(
                'nombre' => utf8_decode($datos['nombre']),
                'email' => utf8_decode($datos['email']),
                'id_usuario_rol' => utf8_decode($datos['id_usuario_rol']),
                'contrasena' => Hash::create('sha256', $contrasena, HASH_PASSWORD_KEY),
                'estado' => $estado
            );
        } else {
            $update = array(
                'nombre' => utf8_decode($datos['nombre']),
                'email' => utf8_decode($datos['email']),
                'id_usuario_rol' => utf8_decode($datos['id_usuario_rol']),
                'estado' => $estado
            );
        }
        $this->db->update('usuario', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('usuarios', 'usuario', $id),
            'message' => 'Se han Actualizado correctamente los datos del usuario ' . $datos['nombre'],
            'id' => $id
        );
        return $data;
    }

    public function modalAgregarUsuario($lng) {
        $sqlRoles = $this->db->select("select * from usuario_rol where estado = 1");
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . $lng . '/admin/frmAgregarUsuario" method="POST">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select class="form-control m-b" name="id_usuario_rol" required> 
                                        <option value="">Seleccione un Rol</option>';
        foreach ($sqlRoles as $item) {
            $modal .= '                 <option value="' . $item['id'] . '">' . $item['descripcion'] . '</option>';
        }
        $modal .= '                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="text" name="contrasena" class="form-control" placeholder="Contraseña" value="" required>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Usuario</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Usuario',
            'content' => $modal
        );
        return $data;
    }

    public function frmAgregarUsuario($datos) {
        $this->db->insert('usuario', array(
            'id_usuario_rol' => utf8_decode($datos['id_usuario_rol']),
            'email' => utf8_decode($datos['email']),
            'contrasena' => Hash::create('sha256', utf8_decode($datos['contrasena']), HASH_PASSWORD_KEY),
            'nombre' => utf8_decode($datos['nombre']),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function listadoDTMetas($datos) {
        $columns = array(
            0 => 'id',
            1 => 'pagina',
            2 => 'accion'
        );
        #getting total number records without any search
        $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM meta_tags");
        $totalFiltered = $sql[0]['cantidad'];
        $totalData = $sql[0]['cantidad'];

        $query = "SELECT mt.id, m.es_texto, m.en_texto FROM meta_tags mt 
                 LEFT JOIN menu m on m.id = mt.id_menu  where 1 = 1";
        $where = "";
        if (!empty($datos['search']['value'])) {
            $where .= " AND (m.es_texto LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR m.en_texto LIKE '%" . $requestData['search']['value'] . "%' )";
            #when there is a search parameter then we have to modify total number filtered rows as per search result.
            $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM meta_tags mt 
                                    LEFT JOIN menu m on m.id = mt.id_menu where 1 = 1 $where");
            $totalFiltered = $sql[0]['cantidad'];
        }
        $query .= $where;
        $query .= " ORDER BY " . $columns[$datos['order'][0]['column']] . "   " . $datos['order'][0]['dir'] . "  LIMIT " . $datos['start'] . " ," . $datos['length'] . "   ";
        $sql = $this->db->select($query);
        $data = array();
        foreach ($sql as $row) {  // preparing an array
            $id = $row["id"];
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarMetaTag"><i class="fa fa-edit"></i> Editar </a>';
            $nestedData = array();
            $nestedData['DT_RowId'] = 'metatag_' . $id;
            $nestedData[] = $id;
            $nestedData[] = utf8_encode($row["es_texto"]);
            $nestedData[] = utf8_encode($row["en_texto"]);
            $nestedData[] = $btnEditar;
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw" => intval($datos['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );

        return json_encode($json_data);
    }

    public function modalEditarMetaTag($datos) {
        $id = $datos['id'];
        $sqlTitle = $this->db->select("SELECT
                                            m.es_texto,
                                            m.en_texto
                                    FROM
                                            meta_tags mt
                                    LEFT JOIN menu m ON m.id = mt.id_menu
                                    WHERE
                                            mt.id = $id");
        $sql = $this->db->select("SELECT * FROM meta_tags where id = $id");
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" class="frmEditarMetaTags" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-lg-12">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#tab-1"> Español</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-2">English</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>ES Texto</label>
                                                        <input type="text" name="es_title" class="form-control" value="' . utf8_encode($sql[0]['es_title']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>ES Descripcion</label>
                                                        <textarea style="height:80px;" name="es_descripcion" class="form-control">' . utf8_encode($sql[0]['es_descripcion']) . '</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>ES Keywords y/o frases (palabras separadas por comas)</label>
                                                        <textarea style="height:80px;" name="es_keywords" class="form-control">' . utf8_encode($sql[0]['es_keywords']) . '</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>En Texto</label>
                                                        <input type="text" name="en_title" class="form-control" value="' . utf8_encode($sql[0]['en_title']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>EN Descripcion</label>
                                                        <textarea style="height:80px;" name="en_descripcion" class="form-control">' . utf8_encode($sql[0]['en_descripcion']) . '</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>EN Keywords y/o frases (palabras separadas por comas)</label>
                                                        <textarea style="height:80px;" name="en_keywords" class="form-control">' . utf8_encode($sql[0]['en_keywords']) . '</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Item ' . utf8_encode($sqlTitle[0]['es_texto']) . '|' . utf8_encode($sqlTitle[0]['en_texto']),
            'content' => $modal
        );
        return json_encode($data);
    }

    public function frmEditarMetaTags($datos) {
        $id = $datos['id'];
        $update = array(
            'es_descripcion' => utf8_decode($datos['es_descripcion']),
            'es_keywords' => utf8_decode($datos['es_keywords']),
            'en_descripcion' => utf8_decode($datos['en_descripcion']),
            'en_keywords' => utf8_decode($datos['en_keywords']),
            'es_title' => utf8_decode($datos['es_title']),
            'en_title' => utf8_decode($datos['en_title']),
        );
        $this->db->update('meta_tags', $update, "id = $id");
        $sqlPagina = $this->db->select("SELECT
                                                m.es_texto,
                                                en_texto
                                        FROM
                                                meta_tags mt
                                        LEFT JOIN menu m ON m.id = mt.id_menu WHERE mt.id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('meta_tags', 'meta_tags', $id),
            'id' => $id,
            'mensaje' => 'Se ha actualizado correctamente los metatags de la pagina "' . utf8_encode($sqlPagina[0]['es_texto']) . ' | ' . utf8_encode($sqlPagina[0]['en_texto']) . '"'
        );
        return $data;
    }

    public function uploadImgLogoCabacera($datos) {
        $id = 1;
        $update = array(
            'logo' => $datos['imagen']
        );
        $this->db->update('logo', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function uploadImgHeaderNeoPure($datos) {
        $id = 1;
        $update = array(
            'imagen_header' => $datos['imagen']
        );
        $this->db->update('neo_pure', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/header/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }
    
    public function uploadImgParallaxNosotros($datos) {
        $id = 1;
        $update = array(
            'imagen_parallax' => $datos['imagen']
        );
        $this->db->update('nosotros', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/parallax/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function uploadImgHeaderNosotros($datos) {
        $id = 1;
        $update = array(
            'imagen_header' => $datos['imagen']
        );
        $this->db->update('nosotros', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/header/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function uploadImgLogisticaHeader($datos) {
        $id = $datos['id'];
        $update = array(
            'imagen_header' => $datos['imagen']
        );
        $this->db->update('logistica', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/header/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
        );
        return $data;
    }

    public function uploadImgHeaderCalidad($datos) {
        $id = 1;
        $update = array(
            'imagen_header' => $datos['imagen']
        );
        $this->db->update('quality', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/header/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function uploadImgBlogHeaderListado($datos) {
        $id = 1;
        $update = array(
            'imagen_header' => $datos['imagen']
        );
        $this->db->update('blog_header', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/header/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function uploadImgHeaderContacto($datos) {
        $id = 1;
        $update = array(
            'imagen_header' => $datos['imagen']
        );
        $this->db->update('contacto', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/header/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function uploadImgFormularioContacto($datos) {
        $id = 1;
        $update = array(
            'imagen_parallax' => $datos['imagen']
        );
        $this->db->update('contacto', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/parallax/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'content' => $contenido,
        );
        return $data;
    }

    public function unlinkLogoCabecera() {
        $logo = $this->helper->getLogos();
        $dir = 'public/images/';
        if (file_exists($dir . $logo['logo'])) {
            unlink($dir . $logo['logo']);
        }
    }

    public function unlinkImagenNeoPure() {
        $sql = $this->db->select("select imagen_header from neo_pure where id = 1");
        $dir = 'public/images/header/';
        if (file_exists($dir . $sql[0]['imagen_header'])) {
            unlink($dir . $sql[0]['imagen_header']);
        }
    }
    
    public function unlinkImagenParallaxNosotros() {
        $sql = $this->db->select("select imagen_parallax from nosotros where id = 1");
        $dir = 'public/images/parallax/';
        if (file_exists($dir . $sql[0]['imagen_parallax'])) {
            unlink($dir . $sql[0]['imagen_parallax']);
        }
    }

    public function unlinkImagenNosotros() {
        $sql = $this->db->select("select imagen_header from nosotros where id = 1");
        $dir = 'public/images/header/';
        if (file_exists($dir . $sql[0]['imagen_header'])) {
            unlink($dir . $sql[0]['imagen_header']);
        }
    }

    public function unlinkImagenBlogHeaderContacto() {
        $sql = $this->db->select("SELECT
                                        imagen_header
                                FROM
                                        `blog_header`
                                WHERE
                                        id = 1;");
        $dir = 'public/images/header/';
        if (file_exists($dir . $sql[0]['imagen_header'])) {
            unlink($dir . $sql[0]['imagen_header']);
        }
    }

    public function unlinkImagenCalidad() {
        $sql = $this->db->select("select imagen_header from quality where id = 1");
        $dir = 'public/images/header/';
        if (file_exists($dir . $sql[0]['imagen_header'])) {
            unlink($dir . $sql[0]['imagen_header']);
        }
    }

    public function unlinkImagenContacto() {
        $sql = $this->db->select("SELECT imagen_header FROM contacto where id = 1;");
        $dir = 'public/images/header/';
        if (file_exists($dir . $sql[0]['imagen_header'])) {
            unlink($dir . $sql[0]['imagen_header']);
        }
    }

    public function unlinkImagenFormularioContacto() {
        $sql = $this->db->select("SELECT imagen_parallax FROM contacto where id = 1;");
        $dir = 'public/images/parallax/';
        if (file_exists($dir . $sql[0]['imagen_parallax'])) {
            unlink($dir . $sql[0]['imagen_parallax']);
        }
    }

    public function listadoDTContacto($datos) {
        $columns = array(
            0 => 'id',
            1 => 'nombre',
            2 => 'email',
            3 => 'asunto',
            4 => 'fecha',
            5 => 'visto',
            6 => 'accion',
        );
        #getting total number records without any search
        $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM frm_contacto");
        $totalFiltered = $sql[0]['cantidad'];
        $totalData = $sql[0]['cantidad'];

        $query = "SELECT * FROM frm_contacto where 1 = 1";
        $where = "";
        if (!empty($datos['search']['value'])) {
            $where .= " AND (nombre LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR email LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR asunto LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR fecha LIKE '%" . $requestData['search']['value'] . "%' )";
            #when there is a search parameter then we have to modify total number filtered rows as per search result.
            $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM frm_contacto where 1 = 1 $where");
            $totalFiltered = $sql[0]['cantidad'];
        }
        $query .= $where;
        $query .= " ORDER BY " . $columns[$datos['order'][0]['column']] . "   " . $datos['order'][0]['dir'] . "  LIMIT " . $datos['start'] . " ," . $datos['length'] . "   ";
        $sql = $this->db->select($query);
        $data = array();
        foreach ($sql as $row) {  // preparing an array
            $id = $row["id"];
            if ($row['leido'] == 1) {
                $estado = '<span class="label label-primary">Leído</span>';
            } else {
                $estado = '<span class="label label-danger">No Leído</span>';
            }
            $btnEditar = '<a class="btnVerContacto pointer btn-xs" data-id="' . $id . '" data-url="modalVerContacto"><i class="fa fa-edit"></i> Ver Datos </a>';
            $nestedData = array();
            $nestedData['DT_RowId'] = 'contacto_' . $id;
            $nestedData[] = $id;
            $nestedData[] = utf8_encode($row["nombre"]);
            $nestedData[] = utf8_encode($row["email"]);
            $nestedData[] = utf8_encode($row["asunto"]);
            $nestedData[] = date('d-m-Y H:i:s', strtotime($row["fecha"]));
            $nestedData[] = $estado;
            $nestedData[] = $btnEditar;
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw" => intval($datos['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );

        return json_encode($json_data);
    }

    public function modalVerContacto($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM frm_contacto where id = $id");
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Formulario de contacto enviado por ' . utf8_encode($sql[0]['nombre']) . '</h3>
                    </div>
                    <div class="row">
                        <table class="table table-hover">
                            <tr>
                                <td class="text-bold">Nombre:</td>
                                <td>' . utf8_encode($sql[0]['nombre']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Email:</td>
                                <td>' . utf8_encode($sql[0]['email']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Asunto:</td>
                                <td>' . utf8_encode($sql[0]['asunto']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Mensaje:</td>
                                <td>' . utf8_encode($sql[0]['mensaje']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">IP:</td>
                                <td>' . utf8_encode($sql[0]['ip']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Fecha:</td>
                                <td>' . date('d-m-Y H:i:s', strtotime($sql[0]['fecha'])) . '</td>
                            </tr>
                        </table>
                    </div>
                </div>';
        $update = array(
            'leido' => 1
        );
        $this->db->update('frm_contacto', $update, "id = $id");
        $data = array(
            'titulo' => 'Ver datos de contacto',
            'content' => $modal,
            'id' => $id,
            'row' => $this->rowDataTable('verContacto', 'frm_contacto', $id)
        );
        return json_encode($data);
    }

    public function listadoDTBlog($datos) {
        $columns = array(
            0 => 'id',
            1 => 'titulo',
            2 => 'imagen_thumb',
            3 => 'fecha_blog',
            4 => 'estado',
            6 => 'accion',
        );
        #getting total number records without any search
        $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM blog");
        $totalFiltered = $sql[0]['cantidad'];
        $totalData = $sql[0]['cantidad'];

        $query = "SELECT * FROM blog where 1 = 1";
        $where = "";
        if (!empty($datos['search']['value'])) {
            $where .= " AND (titulo LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR fecha_blog LIKE '%" . $requestData['search']['value'] . "%')";
            #when there is a search parameter then we have to modify total number filtered rows as per search result.
            $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM blog where 1 = 1 $where");
            $totalFiltered = $sql[0]['cantidad'];
        }
        $query .= $where;
        $query .= " ORDER BY " . $columns[$datos['order'][0]['column']] . "   " . $datos['order'][0]['dir'] . "  LIMIT " . $datos['start'] . " ," . $datos['length'] . "   ";
        $sql = $this->db->select($query);
        $data = array();
        foreach ($sql as $row) {  // preparing an array
            $id = $row["id"];
            if ($row['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="blog" data-rowid="blog_" data-tabla="blog" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="blog" data-rowid="blog_" data-tabla="blog" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarBlogPost"><i class="fa fa-edit"></i> Editar </a>';
            if (empty($row['youtube_id'])) {
                $imagen = '<img class="img-responsive imgBlogTable" src="' . URL . 'public/images/blog/' . $row['imagen_thumb'] . '">';
            } else {
                $imagen = '<iframe class="scale-with-grid" src="http://www.youtube.com/embed/' . $row['youtube_id'] . '?wmode=opaque" allowfullscreen></iframe>';
            }
            $nestedData = array();
            $nestedData['DT_RowId'] = 'blog_' . $id;
            $nestedData[] = $id;
            $nestedData[] = utf8_encode($row["es_titulo"]);
            $nestedData[] = utf8_encode($row["en_titulo"]);
            $nestedData[] = $imagen;
            $nestedData[] = date('d-m-Y', strtotime($row["fecha_blog"]));
            $nestedData[] = $estado;
            $nestedData[] = $btnEditar;
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw" => intval($datos['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );

        return json_encode($json_data);
    }

    public function modalEditarBlogPost($datos) {
        $id = $datos['id'];
        $lng = $datos['idioma'];
        $sql = $this->db->select("select * from blog where id = $id");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarBlogPost" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ES Titulo</label>
                                        <input type="text" name="es_titulo" class="form-control" placeholder="Nombre" value="' . utf8_encode($sql[0]['es_titulo']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>EN Titulo</label>
                                        <input type="text" name="en_titulo" class="form-control" placeholder="Nombre" value="' . utf8_encode($sql[0]['en_titulo']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ID video Youtube</label>
                                        <input type="text" name="youtube_id" class="form-control" placeholder="ID video Youtube" value="' . utf8_encode($sql[0]['youtube_id']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="data_1">
                                            <label class="font-normal">Fecha Publicación</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="fecha_blog" value="' . date('d/m/Y', strtotime($sql[0]['fecha_blog'])) . '">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ES Tags</label>
                                        <input type="text" name="es_tags" class="form-control" placeholder="ES Tags" value="' . utf8_encode($sql[0]['es_tags']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>EN Tags</label>
                                        <input type="text" name="en_tags" class="form-control" placeholder="EN Tags" value="' . utf8_encode($sql[0]['en_tags']) . '">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-12">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#tab-1"> ES Contenido</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-2">EN Contenido</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Contenido</label>
                                                        <textarea name="es_contenido" class="summernote">' . utf8_encode($sql[0]['es_contenido']) . '</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Contenido</label>
                                                        <textarea name="en_contenido" class="summernote">' . utf8_encode($sql[0]['en_contenido']) . '</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen del Blog</h3>
                            <div class="alert alert-warning alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <strong>No subir una imagen para el blog si va a vincular un video de Youtube al contenido, porque la misma no será visible.</strong>
                            </div>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                    -Formato: JPG, PNG<br>
                                    -Dimensión: Hasta 1200 x 800px<br>
                                    -Tamaño: 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileBlog" data-max-filesize="2048000" data-url="' . URL . $lng . '/admin/uploadImgBlog" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileBlog").html5fileupload({
                                    data:{id:' . $id . '},
                                    onAfterStartSuccess: function(response) {
                                        $("#imgBlog" + response.id).html(response.content);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgBlog' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/blog/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                        <div class="col-md-12">
                            <h3>Imagen de Cabecera</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                    -Formato: JPG, PNG<br>
                                    -Dimensión: Hasta 1400 x 788<br>
                                    -Tamaño: 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileTestimonio" data-max-filesize="2048000" data-url="' . URL . $lng . '/admin/uploadImgBlogHeader" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileTestimonio").html5fileupload({
                                    data:{id:' . $id . '},
                                    onAfterStartSuccess: function(response) {
                                        $("#imgBlogHeader" + response.id).html(response.content);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgBlogHeader' . $id . '">';
        if (!empty($sql[0]['imagen_header'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/header/' . $sql[0]['imagen_header'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>';
        $data = array(
            'titulo' => 'Editar Entrada del Blog',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalEditarLogistica($datos) {
        $id = $datos['id'];
        $lng = $datos['idioma'];
        $sql = $this->db->select("select * from logistica where id = $id");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarLogistica" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tabs-container">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#tab-1"> ES Contenido</a></li>
                                            <li class=""><a data-toggle="tab" href="#tab-2">EN Contenido</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane active">
                                                <div class="panel-body">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Es Header Text</label>
                                                            <input type="text" name="es_header_text" class="form-control" placeholder="ES header text" value="' . utf8_encode($sql[0]['es_header_text']) . '">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Es Menu</label>
                                                            <input type="text" name="es_menu" class="form-control" placeholder="ES Menu" value="' . utf8_encode($sql[0]['es_menu']) . '">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Contenido</label>
                                                            <textarea name="es_contenido" class="summernote">' . utf8_encode($sql[0]['es_contenido']) . '</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tab-2" class="tab-pane">
                                                <div class="panel-body">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>EN Header Text</label>
                                                            <input type="text" name="en_header_text" class="form-control" placeholder="EN header text" value="' . utf8_encode($sql[0]['en_header_text']) . '">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>EN Menu</label>
                                                            <input type="text" name="en_menu" class="form-control" placeholder="EN Menu" value="' . utf8_encode($sql[0]['en_menu']) . '">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Contenido</label>
                                                            <textarea name="en_contenido" class="summernote">' . utf8_encode($sql[0]['en_contenido']) . '</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen de Cabecera</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                    -Formato: JPG, PNG<br>
                                    -Dimensión: Hasta 1400 x 788<br>
                                    -Tamaño: 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileLogisticaHeader" data-max-filesize="2048000" data-url="' . URL . $lng . '/admin/uploadImgLogisticaHeader" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileLogisticaHeader").html5fileupload({
                                    data:{id:' . $id . '},
                                    onAfterStartSuccess: function(response) {
                                        $("#imgLogisticaHeader" + response.id).html(response.content);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgLogisticaHeader' . $id . '">';
        if (!empty($sql[0]['imagen_header'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/header/' . $sql[0]['imagen_header'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>';
        $data = array(
            'titulo' => 'Editar Sección',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalAgregarLogistica($datos) {
        $lng = $datos;
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . $lng . '/admin/frmAgregarLogistica" method="POST" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tabs-container">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#tab-1"> ES Contenido</a></li>
                                            <li class=""><a data-toggle="tab" href="#tab-2">EN Contenido</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane active">
                                                <div class="panel-body">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Es Header Text</label>
                                                            <input type="text" name="es_header_text" class="form-control" placeholder="ES header text" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Es Menu</label>
                                                            <input type="text" name="es_menu" class="form-control" placeholder="ES Menu" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Contenido</label>
                                                            <textarea name="es_contenido" class="summernote"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tab-2" class="tab-pane">
                                                <div class="panel-body">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>EN Header Text</label>
                                                            <input type="text" name="en_header_text" class="form-control" placeholder="EN header text" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>EN Menu</label>
                                                            <input type="text" name="en_menu" class="form-control" placeholder="EN Menu" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Contenido</label>
                                                            <textarea name="en_contenido" class="summernote"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h3>Imagen de Cabecera</h3>
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                            -Formato: JPG, PNG<br>
                                            -Dimensión: Hasta 1400 x 788<br>
                                            -Tamaño: 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileLogisticaHeaderAgregar" data-max-filesize="2048000" data-form="true" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileLogisticaHeaderAgregar").html5fileupload();
                                    </script>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Contenido</button>
                        </form>
                    </div>
                </div>';
        $data = array(
            'titulo' => 'Agregar Sección',
            'content' => $modal
        );
        return $data;
    }

    public function frmEditarBlogPost($datos) {
        $id = $datos['id'];
        $estado = 1;
        $fecha_blog = $datos['fecha_blog'];
        $fecha_blog = str_replace('/', '-', $fecha_blog);
        $fecha_blog = date('Y-m-d', strtotime($fecha_blog));
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'es_titulo' => utf8_decode($datos['es_titulo']),
            'en_titulo' => utf8_decode($datos['en_titulo']),
            'es_contenido' => utf8_decode($datos['es_contenido']),
            'en_contenido' => utf8_decode($datos['en_contenido']),
            'es_tags' => utf8_decode($datos['es_tags']),
            'en_tags' => utf8_decode($datos['en_tags']),
            'youtube_id' => utf8_decode($datos['youtube_id']),
            'fecha_blog' => $fecha_blog,
            'estado' => $estado
        );
        $this->db->update('blog', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('blog', 'blog', $id),
            'id' => $id
        );
        return $data;
    }

    public function frmContenidoNeoPure($datos) {
        $update = array(
            'es_header_text' => utf8_decode($datos['es_header_text']),
            'es_contenido' => utf8_decode($datos['es_contenido']),
            'en_header_text' => utf8_decode($datos['en_header_text']),
            'en_contenido' => utf8_decode($datos['en_contenido'])
        );
        $this->db->update('neo_pure', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado exitosamente el contenido de la pagina',
        );
        return $data;
    }

    public function frmBlogTextos($datos) {
        $update = array(
            'es_header' => utf8_decode($datos['es_header']),
            'es_footer' => utf8_decode($datos['es_footer']),
            'en_header' => utf8_decode($datos['en_header']),
            'en_footer' => utf8_decode($datos['en_footer'])
        );
        $this->db->update('blog_header', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado exitosamente el contenido de los textos del blog',
        );
        return $data;
    }

    public function frmContenidoCalidad($datos) {
        $update = array(
            'es_header_text' => utf8_decode($datos['es_header_text']),
            'es_contenido' => utf8_decode($datos['es_contenido']),
            'en_header_text' => utf8_decode($datos['en_header_text']),
            'en_contenido' => utf8_decode($datos['en_contenido']),
        );
        $this->db->update('quality', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado exitosamente el contenido de la pagina',
        );
        return $data;
    }

    public function frmContenidoContacto($datos) {
        $update = array(
            'es_header_text' => utf8_decode($datos['es_header_text']),
            'es_titulo' => utf8_decode($datos['es_titulo']),
            'es_frm_nombre' => utf8_decode($datos['es_frm_nombre']),
            'es_frm_email' => utf8_decode($datos['es_frm_email']),
            'es_frm_asunto' => utf8_decode($datos['es_frm_asunto']),
            'es_frm_mensaje' => utf8_decode($datos['es_frm_mensaje']),
            'es_btn_enviar' => utf8_decode($datos['es_btn_enviar']),
            'es_texto_ubicacion' => utf8_decode($datos['es_texto_ubicacion']),
            'en_header_text' => utf8_decode($datos['en_header_text']),
            'en_titulo' => utf8_decode($datos['en_titulo']),
            'en_frm_nombre' => utf8_decode($datos['en_frm_nombre']),
            'en_frm_email' => utf8_decode($datos['en_frm_email']),
            'en_frm_asunto' => utf8_decode($datos['en_frm_asunto']),
            'en_frm_mensaje' => utf8_decode($datos['en_frm_mensaje']),
            'en_btn_enviar' => utf8_decode($datos['en_btn_enviar']),
            'en_texto_ubicacion' => utf8_decode($datos['en_texto_ubicacion']),
        );
        $this->db->update('contacto', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado exitosamente los textos de la pagina de contacto',
        );
        return $data;
    }

    public function unlinkActualBlogImg($idPost) {
        $dir = 'public/images/blog/';
        $sql = $this->db->select("select imagen, imagen_thumb from blog where id = $idPost");
        if (file_exists($dir . $sql[0]['imagen'])) {
            unlink($dir . $sql[0]['imagen']);
        }
        if (file_exists($dir . $sql[0]['imagen_thumb'])) {
            unlink($dir . $sql[0]['imagen_thumb']);
        }
    }

    public function uploadImgBlog($data) {
        $id = $data['id'];
        $update = array(
            'imagen' => $data['imagen'],
            'imagen_thumb' => $data['imagen_thumb'],
        );
        $this->db->update('blog', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/blog/' . $data['imagen_thumb'] . '">';
        $datos = array(
            "result" => TRUE,
            'id' => $id,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgBlogHeader($data) {
        $id = $data['id'];
        $update = array(
            'imagen_header' => $data['imagen']
        );
        $this->db->update('blog', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/header/' . $data['imagen'] . '">';
        $datos = array(
            "result" => TRUE,
            'id' => $id,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgSeccion2($data) {
        $id = 1;
        $update = array(
            'imagen' => $data['imagen']
        );
        $this->db->update('index_seccion2', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/' . $data['imagen'] . '">';
        $datos = array(
            "result" => TRUE,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgSeccion5($data) {
        $id = 1;
        $update = array(
            'imagen' => $data['imagen']
        );
        $this->db->update('index_seccion5', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/' . $data['imagen'] . '">';
        $datos = array(
            "result" => TRUE,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgSeccion3($data) {
        $id = 1;
        $update = array(
            'imagen' => $data['imagen']
        );
        $this->db->update('index_seccion3', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/parallax/' . $data['imagen'] . '">';
        $datos = array(
            "result" => TRUE,
            'content' => $contenido
        );
        return $datos;
    }

    public function modalAgregarBlogPost($lng) {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Contenido al Blog</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . $lng . '/admin/frmAgregarBlogPost" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ES Titulo</label>
                                        <input type="text" name="es_titulo" class="form-control" placeholder="Nombre" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>EN Titulo</label>
                                        <input type="text" name="en_titulo" class="form-control" placeholder="Nombre" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ES Tags</label>
                                        <input type="text" name="es_tags" class="form-control" placeholder="ES Tags" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>EN Tags</label>
                                        <input type="text" name="en_tags" class="form-control" placeholder="EN Tags" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ID video Youtube</label>
                                        <input type="text" name="youtube_id" class="form-control" placeholder="ID video Youtube" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="data_1">
                                            <label class="font-normal">Fecha Publicación</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="fecha_blog" value="">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tabs-container">
                                        <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#tab-1"> ES Contenido</a></li>
                                                <li class=""><a data-toggle="tab" href="#tab-2">EN Contenido</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane active">
                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Contenido</label>
                                                            <textarea name="es_contenido" class="summernote"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tab-2" class="tab-pane">
                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Contenido</label>
                                                            <textarea name="en_contenido" class="summernote"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h3>Imagen del Blog</h3>
                                <div class="alert alert-warning alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <strong>No subir una imagen para el blog si va a vincular un video de Youtube al contenido, porque la misma no será visible.</strong>
                                </div>
                                <div class="alert alert-info alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    Detalles de la imagen a subir:<br>
                                        -Formato: JPG,PNG<br>
                                        -Dimensión: Hasta 1200 x 800px<br>
                                        -Tamaño: Hasta 2MB<br>
                                    <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                </div>
                                <div class="html5fileupload fileAgregarBlog" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                    <input type="file" name="file_archivo" />
                                </div>
                                <script>
                                    $(".html5fileupload.fileAgregarBlog").html5fileupload();
                                </script>
                            </div>
                            <div class="col-md-12">
                                <h3>Imagen de Cabecera</h3>
                                <div class="alert alert-info alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    Detalles de la imagen a subir:<br>
                                        -Formato: JPG,PNG<br>
                                        -Dimensión: Hasta 1400 x 788<br>
                                        -Tamaño: Hasta 2MB<br>
                                    <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                </div>
                                <div class="html5fileupload fileAgregarBlogHeader" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                    <input type="file" name="file_archivo_header" />
                                </div>
                                <script>
                                    $(".html5fileupload.fileAgregarBlogHeader").html5fileupload();
                                </script>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Blog</button>
                        </form>
                    </div>
                </div>';
        $data = array(
            'titulo' => 'Agregar Entrada al Blog',
            'content' => $modal
        );
        return $data;
    }

    public function frmAddBlogImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagen'],
            'imagen_thumb' => $imagenes['imagen_thumb'],
            'imagen_header' => $imagenes['imagen_header']
        );
        $this->db->update('blog', $update, "id = $id");
    }

    public function frmAddHeaderImgLogisticaImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen_header' => $imagenes['imagen_header']
        );
        $this->db->update('logistica', $update, "id = $id");
    }

    public function frmAgregarBlogPost($datos) {
        $fecha_blog = $datos['fecha_blog'];
        $fecha_blog = str_replace('/', '-', $fecha_blog);
        $fecha_blog = date('Y-m-d', strtotime($fecha_blog));
        $this->db->insert('blog', array(
            'es_titulo' => utf8_decode($datos['es_titulo']),
            'en_titulo' => utf8_decode($datos['en_titulo']),
            'es_contenido' => utf8_decode($datos['es_contenido']),
            'en_contenido' => utf8_decode($datos['en_contenido']),
            'es_tags' => utf8_decode($datos['es_tags']),
            'en_tags' => utf8_decode($datos['en_tags']),
            'youtube_id' => $datos['youtube_id'],
            'fecha_blog' => $fecha_blog,
            'fecha' => date('Y-m-d H:i:s'),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarLogistica($datos) {
        $this->db->insert('logistica', array(
            'es_header_text' => utf8_decode($datos['es_header_text']),
            'es_menu' => utf8_decode($datos['es_menu']),
            'es_contenido' => utf8_decode($datos['es_contenido']),
            'en_header_text' => utf8_decode($datos['en_header_text']),
            'en_menu' => utf8_decode($datos['en_menu']),
            'en_contenido' => utf8_decode($datos['en_contenido']),
            'orden' => $datos['orden'],
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function datosNeoPure() {
        $sql = $this->db->select("SELECT
                                        *
                                FROM
                                        neo_pure
                                WHERE id =1;");
        return $sql[0];
    }

    public function datosNosotros() {
        $sql = $this->db->select("SELECT
                                        *
                                FROM
                                        nosotros
                                WHERE id =1;");
        return $sql[0];
    }

    public function datosContacto() {
        $sql = $this->db->select("SELECT
                                        *
                                FROM
                                        contacto
                                WHERE id =1;");
        return $sql[0];
    }

    public function datosCalidad() {
        $sql = $this->db->select("SELECT
                                        *
                                FROM
                                        quality
                                WHERE
                                        id = 1;");
        return $sql[0];
    }

    public function datosBlog() {
        $sql = $this->db->select("SELECT
                                        *
                                FROM
                                        `blog_header`
                                WHERE
                                        id = 1;");
        return $sql[0];
    }

    public function listadoDTSlider() {
        $sql = $this->db->select("SELECT * FROM slider ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="slider" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="slider" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSlider"><i class="fa fa-edit"></i> Editar </a>';
            if (!empty($item['imagen'])) {
                $img = '<img src="' . URL . 'public/images/slider/' . $item['imagen'] . '" style="width: 160px;">';
            } else {
                $img = '-';
            }
            array_push($datos, array(
                "DT_RowId" => "slider_$id",
                'orden' => $item['orden'],
                'imagen' => $img,
                'es_texto1' => utf8_encode($item['es_texto1']),
                'en_texto1' => utf8_encode($item['en_texto1']),
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function listadoDTSeccion5() {
        $sql = $this->db->select("SELECT * FROM index_seccion5_items ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="seccion5" data-rowid="seccion5_" data-tabla="index_seccion5_items" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="seccion5" data-rowid="seccion5_" data-tabla="index_seccion5_items" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSeccion5"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "seccion5_$id",
                'orden' => $item['orden'],
                'es_item' => utf8_encode($item['es_item']),
                'en_item' => utf8_encode($item['en_item']),
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function modalEditarDTSlider($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from slider where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos del Slider</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarSlider" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Enlace ES</label>
                                        <input type="text" name="es_url" class="form-control" placeholder="Enlace ES" value="' . utf8_encode($sql[0]['es_url']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Enlace EN</label>
                                        <input type="text" name="en_url" class="form-control" placeholder="Enlace EN" value="' . utf8_encode($sql[0]['en_url']) . '">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#tab-1"> ES Contenido</a></li>
                                            <li class=""><a data-toggle="tab" href="#tab-2">EN Contenido</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Encabezado</label>
                                                        <input type="text" name="es_texto1" class="form-control" value="' . utf8_encode($sql[0]['es_texto1']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Texto Destacado</label>
                                                        <input type="text" name="es_texto2" class="form-control" value="' . utf8_encode($sql[0]['es_texto2']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Texto Botón</label>
                                                        <input type="text" name="es_boton" class="form-control" value="' . utf8_encode($sql[0]['es_boton']) . '">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Encabezado</label>
                                                        <input type="text" name="en_texto1" class="form-control" value="' . utf8_encode($sql[0]['en_texto1']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Texto Destacado</label>
                                                        <input type="text" name="en_texto2" class="form-control" value="' . utf8_encode($sql[0]['en_texto2']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Texto Botón</label>
                                                        <input type="text" name="en_boton" class="form-control" value="' . utf8_encode($sql[0]['en_boton']) . '">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                            <i class="fa fa-warning"></i> Posiciones
                                        </div>
                                        <div class="panel-body">
                                            <p>Solo modificaque los valores en caso de que desee cambiar la posición de los textos y/o botón del slider</p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Posición X Encabezado</label>
                                                        <input type="text" name="data_x_1" class="form-control" value="' . utf8_encode($sql[0]['data_x_1']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Posición Y Encabezado</label>
                                                        <input type="text" name="data_y_1" class="form-control" value="' . utf8_encode($sql[0]['data_y_1']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Inicio Encabezado</label>
                                                        <input type="text" name="data_start_1" class="form-control" value="' . utf8_encode($sql[0]['data_start_1']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Velocidad Encabezado</label>
                                                        <input type="text" name="data_speed_1" class="form-control" value="' . utf8_encode($sql[0]['data_speed_1']) . '">
                                                    </div>
                                                </div>
                                            </div><!--/row-->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Posición X Destacado</label>
                                                        <input type="text" name="data_x_2" class="form-control" value="' . utf8_encode($sql[0]['data_x_2']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Posición Y Destacado</label>
                                                        <input type="text" name="data_y_2" class="form-control" value="' . utf8_encode($sql[0]['data_y_2']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Inicio Destacado</label>
                                                        <input type="text" name="data_start_2" class="form-control" value="' . utf8_encode($sql[0]['data_start_2']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Velocidad Destacado</label>
                                                        <input type="text" name="data_speed_2" class="form-control" value="' . utf8_encode($sql[0]['data_speed_2']) . '">
                                                    </div>
                                                </div>
                                            </div><!--/row-->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Posición X Botón</label>
                                                        <input type="text" name="boton_x" class="form-control" value="' . utf8_encode($sql[0]['boton_x']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Posición Y Botón</label>
                                                        <input type="text" name="boton_y" class="form-control" value="' . utf8_encode($sql[0]['boton_y']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Inicio Botón</label>
                                                        <input type="text" name="boton_start" class="form-control" value="' . utf8_encode($sql[0]['boton_start']) . '">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Velocidad Botón</label>
                                                        <input type="text" name="boton_speed" class="form-control" value="' . utf8_encode($sql[0]['boton_speed']) . '">
                                                    </div>
                                                </div>
                                            </div><!--/row-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                    -Formato: JPG,PNG (La imagen principal tiene que ser PNG transparente)<br>
                                    -Dimensión: Imagen Normal: 1920 x 1080px, Imagen Principal: 310 x 649px<br>
                                    -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileSlider" data-max-filesize="2048000" data-url="' . URL . 'admin/uploadImgSlider" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileSlider").html5fileupload({
                                    data:{id:' . $id . '},
                                    onAfterStartSuccess: function(response) {
                                        $("#imgSlider" + response.id).html(response.content);
                                        $("#slider_" + response.id).html(response.row);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgSlider' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/slider/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Slider',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function frmEditarSlider($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'es_texto1' => utf8_decode($datos['es_texto1']),
            'es_texto2' => utf8_decode($datos['es_texto2']),
            'es_boton' => utf8_decode($datos['es_boton']),
            'en_texto1' => utf8_decode($datos['en_texto1']),
            'en_texto2' => utf8_decode($datos['en_texto2']),
            'en_boton' => utf8_decode($datos['en_boton']),
            'data_x_1' => utf8_decode($datos['data_x_1']),
            'data_y_1' => utf8_decode($datos['data_y_1']),
            'data_start_1' => utf8_decode($datos['data_start_1']),
            'data_speed_1' => utf8_decode($datos['data_speed_1']),
            'data_x_2' => utf8_decode($datos['data_x_2']),
            'data_y_2' => utf8_decode($datos['data_y_2']),
            'data_start_2' => utf8_decode($datos['data_start_2']),
            'data_speed_2' => utf8_decode($datos['data_speed_2']),
            'boton_x' => utf8_decode($datos['boton_x']),
            'boton_y' => utf8_decode($datos['boton_y']),
            'boton_start' => utf8_decode($datos['boton_start']),
            'boton_speed' => utf8_decode($datos['boton_speed']),
            'orden' => $datos['orden'],
            'es_url' => $datos['es_url'],
            'en_url' => $datos['en_url'],
            'estado' => $estado
        );
        $this->db->update('slider', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('slider', 'slider', $id),
            'message' => 'Se ha actualizado el contenido del slider'
        );
        return $data;
    }

    public function modalAgregarSlider($lng) {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Slider</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . $lng . '/admin/frmAgregarSlider" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Enlace ES</label>
                                        <input type="text" name="es_url" class="form-control" placeholder="Enlace" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Enlace EN</label>
                                        <input type="text" name="en_url" class="form-control" placeholder="Enlace" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#tab-1"> ES Contenido</a></li>
                                            <li class=""><a data-toggle="tab" href="#tab-2">EN Contenido</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Encabezado</label>
                                                        <input type="text" name="es_texto1" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Texto Destacado</label>
                                                        <input type="text" name="es_texto2" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Texto Botón</label>
                                                        <input type="text" name="es_boton" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Encabezado</label>
                                                        <input type="text" name="en_texto1" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Texto Destacado</label>
                                                        <input type="text" name="en_texto2" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Texto Botón</label>
                                                        <input type="text" name="en_boton" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                            <i class="fa fa-warning"></i> Posiciones
                                        </div>
                                        <div class="panel-body">
                                            <p>Solo modificaque los valores en caso de que desee cambiar la posición de los textos y/o botón del slider</p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Posición X Encabezado</label>
                                                        <input type="text" name="data_x_1" class="form-control" value="63">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Posición Y Encabezado</label>
                                                        <input type="text" name="data_y_1" class="form-control" value="228">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Inicio Encabezado</label>
                                                        <input type="text" name="data_start_1" class="form-control" value="500">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Velocidad Encabezado</label>
                                                        <input type="text" name="data_speed_1" class="form-control" value="900">
                                                    </div>
                                                </div>
                                            </div><!--/row-->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Posición X Destacado</label>
                                                        <input type="text" name="data_x_2" class="form-control" value="76">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Posición Y Destacado</label>
                                                        <input type="text" name="data_y_2" class="form-control" value="169">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Inicio Destacado</label>
                                                        <input type="text" name="data_start_2" class="form-control" value="800">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Velocidad Destacado</label>
                                                        <input type="text" name="data_speed_2" class="form-control" value="1000">
                                                    </div>
                                                </div>
                                            </div><!--/row-->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Posición X Botón</label>
                                                        <input type="text" name="boton_x" class="form-control" value="240">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Posición Y Botón</label>
                                                        <input type="text" name="boton_y" class="form-control" value="286">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Inicio Botón</label>
                                                        <input type="text" name="boton_start" class="form-control" value="1100">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Velocidad Botón</label>
                                                        <input type="text" name="boton_speed" class="form-control" value="1000">
                                                    </div>
                                                </div>
                                            </div><!--/row-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Imagen</h3>
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                            -Formato: JPG,PNG<br>
                                            -Dimensión: Imagen Normal: 1920 x 755<br>
                                            -Tamaño: Hasta 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileAgregarSlider" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileAgregarSlider").html5fileupload();
                                    </script>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Slider</button>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Slider',
            'content' => $modal
        );
        return $data;
    }

    public function frmAgregarSlider($datos) {
        $this->db->insert('slider', array(
            'es_texto1' => utf8_decode($datos['es_texto1']),
            'es_texto2' => utf8_decode($datos['es_texto2']),
            'es_boton' => utf8_decode($datos['es_boton']),
            'en_texto1' => utf8_decode($datos['en_texto1']),
            'en_texto2' => utf8_decode($datos['en_texto2']),
            'en_boton' => utf8_decode($datos['en_boton']),
            'data_x_1' => $datos['data_x_1'],
            'data_y_1' => $datos['data_y_1'],
            'data_start_1' => $datos['data_start_1'],
            'data_speed_1' => $datos['data_speed_1'],
            'data_x_2' => $datos['data_x_2'],
            'data_y_2' => $datos['data_y_2'],
            'data_start_2' => $datos['data_start_2'],
            'data_speed_2' => $datos['data_speed_2'],
            'boton_x' => $datos['boton_x'],
            'boton_y' => $datos['boton_y'],
            'boton_start' => $datos['boton_start'],
            'boton_speed' => $datos['boton_speed'],
            'orden' => $datos['orden'],
            'estado' => $datos['estado'],
            'es_url' => $datos['es_url'],
            'en_url' => $datos['en_url']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAddSliderImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('slider', $update, "id = $id");
    }

    public function datosSeccion($seccion) {
        $sql = $this->db->select("select * from index_seccion" . $seccion . " where id = 1");
        return $sql[0];
    }

    public function frmEditarIndexSeccion1($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'es_titulo' => utf8_decode($datos['es_titulo']),
            'en_titulo' => utf8_decode($datos['en_titulo']),
            'es_contenido' => utf8_decode($datos['es_contenido']),
            'en_contenido' => utf8_decode($datos['en_contenido']),
            'estado' => $estado
        );
        $this->db->update('index_seccion1', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se ha actualizado el contenido de la sección 1'
        );
        return $data;
    }

    public function frmEditarIndexSeccion2($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'es_contenido' => utf8_decode($datos['es_contenido']),
            'en_contenido' => utf8_decode($datos['en_contenido']),
            'es_boton' => utf8_decode($datos['es_boton']),
            'en_boton' => utf8_decode($datos['en_boton']),
            'es_url' => utf8_decode($datos['es_url']),
            'en_url' => utf8_decode($datos['en_url']),
            'estado' => $estado
        );
        $this->db->update('index_seccion2', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se ha actualizado el contenido de la sección 2'
        );
        return $data;
    }

    public function frmEditarIndexSeccion3($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'es_titulo' => utf8_decode($datos['es_titulo']),
            'en_titulo' => utf8_decode($datos['en_titulo']),
            'es_contenido' => utf8_decode($datos['es_contenido']),
            'en_contenido' => utf8_decode($datos['en_contenido']),
            'estado' => $estado
        );
        $this->db->update('index_seccion3', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se ha actualizado el contenido de la sección 3'
        );
        return $data;
    }

    public function frmEditarIndexSeccion4($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'es_titulo' => utf8_decode($datos['es_titulo']),
            'en_titulo' => utf8_decode($datos['en_titulo']),
            'es_contenido' => utf8_decode($datos['es_contenido']),
            'en_contenido' => utf8_decode($datos['en_contenido']),
            'id_video_youtube' => utf8_decode($datos['id_video_youtube']),
            'estado' => $estado
        );
        $this->db->update('index_seccion4', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se ha actualizado el contenido de la sección 4'
        );
        return $data;
    }

    public function frmEditarIndexSeccion5($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'es_titulo' => utf8_decode($datos['es_titulo']),
            'en_titulo' => utf8_decode($datos['en_titulo']),
            'estado' => $estado
        );
        $this->db->update('index_seccion5', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se ha actualizado el contenido de la sección 5'
        );
        return $data;
    }

    public function frmEditarIndexSeccionItem5($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'es_item' => utf8_decode($datos['es_item']),
            'en_item' => utf8_decode($datos['en_item']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => $estado
        );
        $this->db->update('index_seccion5_items', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('seccion5', 'index_seccion5_items', $id),
            'mensaje' => 'Se ha actualizado el contenido del Item de la sección 5',
            'id' => $id
        );
        return $data;
    }

}
