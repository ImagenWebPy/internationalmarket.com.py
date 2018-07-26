<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Inicio</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL . $this->idioma; ?>/admin">Inicio</a>
            </li>
            <li><a>Contenido</a></li>
            <li class="active">
                <strong>Nosotros</strong>
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
                    <h5>Datos del Encabezado</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <form role="form" id="frmEditarNosotrosEncabezado" method="POST">
                            <input type="hidden" name="id" value="<?= utf8_encode($this->datosNosotros['id']); ?>">
                            <div class="col-lg-12">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#seccionEncabezado-es">ES Contenido</a></li>
                                        <li class=""><a data-toggle="tab" href="#seccionEncabezado-en">EN Contenido</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="seccionEncabezado-es" class="tab-pane active">
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Texto Encabezado</label>
                                                        <input type="text" name="es_header_text" class="form-control" value="<?= utf8_encode($this->datosNosotros['es_header_text']); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="seccionEncabezado-en" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Texto Encabezado</label>
                                                        <input type="text" name="en_header_text" class="form-control" value="<?= utf8_encode($this->datosNosotros['en_header_text']); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Actualizar Contenido</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Imagen de la Cabecera</h5>
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
                                        -Formato: JPG, PNG<br>
                                        -Dimensión Recomendada: 1400 x 788px<br>
                                        -Tamaño: 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileImagenSeccion2" data-max-filesize="2048000" data-url="<?= URL . $this->idioma; ?>/admin/uploadImgHeaderNosotros" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileImagenSeccion2").html5fileupload({
                                            onAfterStartSuccess: function (response) {
                                                $("#imgImagenNosotrosHeader").html(response.content);
                                            }
                                        });
                                    </script>
                                    <div class="row">
                                        <div class="col-md-12" id="imgImagenNosotrosHeader">
                                            <img class="img-responsive" src="<?= URL ?>public/images/header/<?= $this->datosNosotros['imagen_header']; ?>">';
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Contenido</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <form role="form" id="frmEditarContenidoNosostros" method="POST">
                            <div class="col-lg-12">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#Contenido-1">ES Contenido</a></li>
                                        <li class=""><a data-toggle="tab" href="#Contenido-2">EN Contenido</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="Contenido-1" class="tab-pane active">
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Contenido Principal</label>
                                                        <textarea style="height:80px;" name="es_contenido" class="summernote"><?= utf8_encode($this->datosNosotros['es_contenido']); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Contenido Adicional</label>
                                                        <textarea style="height:80px;" name="es_contenido_adicional" class="summernote"><?= utf8_encode($this->datosNosotros['es_contenido_adicional']); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="Contenido-2" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Contenido Principal</label>
                                                        <textarea style="height:80px;" name="en_contenido" class="summernote"><?= utf8_encode($this->datosNosotros['en_contenido']); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Contenido Adicional</label>
                                                        <textarea style="height:80px;" name="en_contenido_adicional" class="summernote"><?= utf8_encode($this->datosNosotros['en_contenido_adicional']); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Actualizar Contenido</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Contenido Parallax</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <form role="form" id="frmEditarNosotrosParallax" method="POST">
                            <div class="col-lg-12">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#parrallax-1">ES Contenido</a></li>
                                        <li class=""><a data-toggle="tab" href="#parrallax-2">EN Contenido</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="parrallax-1" class="tab-pane active">
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Texto Parallax</label>
                                                        <input type="text" name="es_texto_parallax" class="form-control" value="<?= utf8_encode($this->datosNosotros['es_texto_parallax']); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="parrallax-2" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Texto Parallax</label>
                                                        <input type="text" name="en_texto_parallax" class="form-control" value="<?= utf8_encode($this->datosNosotros['en_texto_parallax']); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Actualizar Textos</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Imagen</h5>
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
                                        -Formato: JPG, PNG<br>
                                        -Dimensión Recomendada: 1400 x 788px<br>
                                        -Tamaño: 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileImagenParallaxNosotros" data-max-filesize="2048000" data-url="<?= URL . $this->idioma; ?>/admin/uploadImgParallaxNosotros" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileImagenParallaxNosotros").html5fileupload({
                                            onAfterStartSuccess: function (response) {
                                                $("#imgImagenParallaxNosotros").html(response.content);
                                            }
                                        });
                                    </script>
                                    <div class="row">
                                        <div class="col-md-12" id="imgImagenParallaxNosotros">
                                            <img class="img-responsive" src="<?= URL ?>public/images/parallax/<?= $this->datosNosotros['imagen_parallax']; ?>">';
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /row-->
</div>
<script>
    $(document).ready(function () {
        $(".i-checks").iCheck({
            checkboxClass: "icheckbox_square-green"
        });
        $(".summernote").summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null // set maximum height of editor
        });


        $(document).on("submit", "#frmEditarNosotrosEncabezado", function (e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var url = "<?= URL . $this->idioma ?>/admin/frmEditarNosotrosEncabezado"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarNosotrosEncabezado").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    toastr.success(data.content);
                }
            });
        });
        $(document).on("submit", "#frmEditarContenidoNosostros", function (e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var url = "<?= URL . $this->idioma ?>/admin/frmEditarContenidoNosostros"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarContenidoNosostros").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    toastr.success(data.content);
                }
            });
        });
        $(document).on("submit", "#frmEditarNosotrosParallax", function (e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var url = "<?= URL . $this->idioma ?>/admin/frmEditarNosotrosParallax"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarNosotrosParallax").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    toastr.success(data.content);
                }
            });
        });
    });
</script>