<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Contacto</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL . $this->idioma; ?>/admin">Inicio</a>
            </li>
            <li class="active">
                <a>Contacto</A>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Imagen de la cabecera</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Detalles de la imagen a subir:<br>
                        -Formato: JPG,PNG<br>
                        -Dimensión Recomendada: 1400 x 788px<br>
                        -Tamaño: 2MB<br>
                    </div>
                    <div class="html5fileupload fileImagenCabecera" data-max-filesize="2048000" data-url="<?= URL . $this->idioma; ?>/admin/uploadImgHeaderContacto" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                        <input type="file" name="file_archivo" />
                    </div>
                    <script>
                        $(".html5fileupload.fileImagenCabecera").html5fileupload({
                            onAfterStartSuccess: function (response) {
                                $("#imgImagenCabecera").html(response.content);
                            }
                        });
                    </script>
                    <div class="row">
                        <div class="col-md-12" id="imgImagenCabecera">
                            <img class="img-responsive" src="<?= URL ?>public/images/header/<?= $this->datosContacto['imagen_header']; ?>">';
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Imagen Formulario</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Detalles de la imagen a subir:<br>
                        -Formato: JPG,PNG<br>
                        -Dimensión Recomendada: 1400 x 788px<br>
                        -Tamaño: 2MB<br>
                    </div>
                    <div class="html5fileupload fileImagenFormulario" data-max-filesize="2048000" data-url="<?= URL . $this->idioma; ?>/admin/uploadImgFormularioContacto" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                        <input type="file" name="file_archivo" />
                    </div>
                    <script>
                        $(".html5fileupload.fileImagenFormulario").html5fileupload({
                            onAfterStartSuccess: function (response) {
                                $("#imgImagenFormualario").html(response.content);
                            }
                        });
                    </script>
                    <div class="row">
                        <div class="col-md-12" id="imgImagenFormualario">
                            <img class="img-responsive" src="<?= URL ?>public/images/parallax/<?= $this->datosContacto['imagen_parallax']; ?>">';
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de Contactos desde el sitio web</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-contacto" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Asunto</th>
                                    <th>Fecha Creado</th>
                                    <th>Visto</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Asunto</th>
                                    <th>Fecha Creado</th>
                                    <th>Visto</th>
                                    <th>Accion</th> 
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Textos de la Página</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form id="frmContenidoContacto" method="POST">
                            <div class="col-lg-12">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#tab-1"> ES Contenido</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-2">EN Contenido</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <div class="panel-body">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Texto Header</label>
                                                        <input type="text" name="es_header_text" class="form-control" placeholder="ES header Text" value="<?= utf8_encode($this->datosContacto['es_header_text']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Titulo</label>
                                                        <input type="text" name="es_titulo" class="form-control" placeholder="ES Titulo" value="<?= utf8_encode($this->datosContacto['es_titulo']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Formulario Nombre</label>
                                                        <input type="text" name="es_frm_nombre" class="form-control" placeholder="ES Formulario Nombre" value="<?= utf8_encode($this->datosContacto['es_frm_nombre']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Formulario Email</label>
                                                        <input type="text" name="es_frm_email" class="form-control" placeholder="ES Formulario Email" value="<?= utf8_encode($this->datosContacto['es_frm_email']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Formulario Asunto</label>
                                                        <input type="text" name="es_frm_asunto" class="form-control" placeholder="ES Formulario Asunto" value="<?= utf8_encode($this->datosContacto['es_frm_asunto']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Formulario Mensaje</label>
                                                        <input type="text" name="es_frm_mensaje" class="form-control" placeholder="ES Formulario Mensaje" value="<?= utf8_encode($this->datosContacto['es_frm_mensaje']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Formulario Botón</label>
                                                        <input type="text" name="es_btn_enviar" class="form-control" placeholder="ES Formulario Botón" value="<?= utf8_encode($this->datosContacto['es_btn_enviar']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Titulo Ubicación</label>
                                                        <input type="text" name="es_texto_ubicacion" class="form-control" placeholder="ES Titulo ubicación" value="<?= utf8_encode($this->datosContacto['es_texto_ubicacion']) ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Texto Header</label>
                                                        <input type="text" name="en_header_text" class="form-control" placeholder="EN header Text" value="<?= utf8_encode($this->datosContacto['en_header_text']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Titulo</label>
                                                        <input type="text" name="en_titulo" class="form-control" placeholder="EN Titulo" value="<?= utf8_encode($this->datosContacto['en_titulo']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Formulario Nombre</label>
                                                        <input type="text" name="en_frm_nombre" class="form-control" placeholder="EN Formulario Nombre" value="<?= utf8_encode($this->datosContacto['en_frm_nombre']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Formulario Email</label>
                                                        <input type="text" name="en_frm_email" class="form-control" placeholder="EN Formulario Email" value="<?= utf8_encode($this->datosContacto['en_frm_email']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Formulario Asunto</label>
                                                        <input type="text" name="en_frm_asunto" class="form-control" placeholder="EN Formulario Asunto" value="<?= utf8_encode($this->datosContacto['en_frm_asunto']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Formulario Mensaje</label>
                                                        <input type="text" name="en_frm_mensaje" class="form-control" placeholder="EN Formulario Mensaje" value="<?= utf8_encode($this->datosContacto['en_frm_mensaje']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Formulario Botón</label>
                                                        <input type="text" name="en_btn_enviar" class="form-control" placeholder="EN Formulario Botón" value="<?= utf8_encode($this->datosContacto['en_btn_enviar']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Titulo Ubicación</label>
                                                        <input type="text" name="en_texto_ubicacion" class="form-control" placeholder="EN Titulo ubicación" value="<?= utf8_encode($this->datosContacto['en_texto_ubicacion']) ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.dataTables-contacto').DataTable({
            "processing": true,
            "serverSide": true,
            ajax: '<?= URL . $this->idioma; ?>/admin/listadoDTContacto',
            type: "post",
            pageLength: 25,
            responsive: true,
            "order": [[0, "desc"]],
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                    }
                }
            ],
            "language": {
                "url": "<?= URL ?>public/language/Spanish.json"
            }

        });
        $(document).on("click", ".btnVerContacto", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                var id = $(this).attr("data-id");
                $.ajax({
                    url: "<?= URL . $this->idioma; ?>/admin/modalVerContacto",
                    type: "POST",
                    data: {id: id},
                    dataType: "json"
                }).done(function (data) {
                    $(".genericModal .modal-header").removeClass("modal-header").addClass("modal-header bg-primary");
                    $(".genericModal .modal-title").html(data.titulo);
                    $(".genericModal .modal-body").html(data.content);
                    $(".genericModal").modal("toggle");
                    $('#contacto_' + id).html(data.row);
                });
            }
            e.handled = true;
        });
        $(document).on("submit", "#frmContenidoContacto", function (e) {
            var url = "<?= URL . $this->idioma; ?>/admin/frmContenidoContacto"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmContenidoContacto").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        toastr.success(data.content)
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>