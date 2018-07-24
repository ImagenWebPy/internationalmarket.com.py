<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Calidad</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL . $this->idioma; ?>/admin">Inicio</a>
            </li>
            <li class="active">
                <strong>Calidad</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<?php
if (isset($_SESSION['message'])) {
    echo $this->helper->messageAlert($_SESSION['message']['type'], $_SESSION['message']['mensaje']);
}
?>
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
                        -Formato: PNG (transparente)<br>
                        -Dimensión Recomendada: 1400 x 788px<br>
                        -Tamaño: 2MB<br>
                    </div>
                    <div class="html5fileupload fileImagenCabecera" data-max-filesize="2048000" data-url="<?= URL . $this->idioma; ?>/admin/uploadImgHeaderCalidad" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
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
                            <img class="img-responsive" src="<?= URL ?>public/images/header/<?= $this->datosCalidad['imagen_header']; ?>">';
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
                    <h5>Contenido</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form id="frmContenidoCalidad" method="POST">
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
                                                        <label>Titulo Header</label>
                                                        <input type="text" name="es_header_text" class="form-control" placeholder="ES header Text" value="<?= utf8_encode($this->datosCalidad['es_header_text']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Contenido</label>
                                                        <textarea name="es_contenido" class="summernote"><?= utf8_encode($this->datosCalidad['es_contenido']) ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Titulo Header</label>
                                                        <input type="text" name="en_header_text" class="form-control" placeholder="EN header Text" value="<?= utf8_encode($this->datosCalidad['en_header_text']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Contenido</label>
                                                        <textarea name="en_contenido" class="summernote"><?= utf8_encode($this->datosCalidad['en_contenido']) ?></textarea>
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
<script type="text/javascript">
    $(document).ready(function () {
        $(".summernote").summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null // set maximum height of editor
        });
        $(document).on("submit", "#frmContenidoCalidad", function (e) {
            var url = "<?= URL . $this->idioma; ?>/admin/frmContenidoCalidad"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmContenidoCalidad").serialize(), // serializes the form's elements.
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