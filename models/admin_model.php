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
            case 'verContacto':
                if ($sql[0]['leido'] == 1) {
                    $estado = '<span class="label label-primary">Leído</span>';
                } else {
                    $estado = '<span class="label label-danger">No Leído</span>';
                }
                $btnEditar = '<a class="btnVerContacto pointer btn-xs" data-id="' . $id . '" data-url="modalVerContacto"><i class="fa fa-edit"></i> Ver Datos </a>';
                $data = '<td>' . $id . '</td>'
                        . '<td>' . utf8_encode($sql[0]['nombre']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['email']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['asunto']) . '</td>'
                        . '<td>' . date('d-m-Y H:i:s', strtotime($sql[0]['fecha'])) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'slider':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="web_inicio_slider" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="web_inicio_slider" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSlider"><i class="fa fa-edit"></i> Editar </a>';
                if (!empty($sql[0]['imagen'])) {
                    $img = '<img src="' . URL . 'public/images/slider/' . $sql[0]['imagen'] . '" style="width: 160px;">';
                } else {
                    $img = '';
                }
                if ($sql[0]['principal'] == 1) {
                    $principal = '<span class="badge badge-warning">Principal</span>';
                } else {
                    $principal = '<span class="badge">Normal</span>';
                }
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . $img . '</td>'
                        . '<td>' . utf8_encode($sql[0]['texto_1']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['texto_2']) . '</td>'
                        . '<td>' . $principal . '</td>'
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

    public function unlinkLogoCabecera() {
        $logo = $this->helper->getLogos();
        $dir = 'public/images/';
        unlink($dir . $logo['logo']);
    }

    public function unlinkImagenNeoPure() {
        $sql = $this->db->select("select imagen_header from neo_pure where id = 1");
        $dir = 'public/images/header/';
        unlink($dir . $sql[0]['imagen_header']);
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
            'en_contenido' => utf8_decode($datos['en_contenido']),
        );
        $this->db->update('neo_pure', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado exitosamente el contenido de la pagina',
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

    public function datosNeoPure() {
        $sql = $this->db->select("SELECT
                                        *
                                FROM
                                        neo_pure
                                WHERE id =1;");
        return $sql[0];
    }

}
