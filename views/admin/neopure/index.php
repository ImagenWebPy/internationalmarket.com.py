<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Neo Pure</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL . $this->idioma; ?>/admin">Inicio</a>
            </li>
            <li class="active">
                <strong>Neo Pure</strong>
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
                    <div class="html5fileupload fileImagenCabecera" data-max-filesize="2048000" data-url="<?= URL . $this->idioma; ?>/admin/uploadImgHeaderNeoPure" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
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
                            <img class="img-responsive" src="<?= URL ?>public/images/header/<?= $this->datosNeoPure['imagen_header']; ?>">';
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
                        <form id="frmContenidoNeoPure" method="POST">
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
                                                        <input type="text" name="es_header_text" class="form-control" placeholder="ES header Text" value="<?= utf8_encode($this->datosNeoPure['es_header_text']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Contenido</label>
                                                        <textarea name="es_contenido" class="summernote"><?= utf8_encode($this->datosNeoPure['es_contenido']) ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Titulo Header</label>
                                                        <input type="text" name="en_header_text" class="form-control" placeholder="EN header Text" value="<?= utf8_encode($this->datosNeoPure['en_header_text']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Contenido</label>
                                                        <textarea name="en_contenido" class="summernote"><?= utf8_encode($this->datosNeoPure['en_contenido']) ?></textarea>
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
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Contenido Multimedia</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form id="frmAgregarVideoNeo" method="POST">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>ID video YouTube</label>
                                    <input class="form-control" type="text" id="id_youtube" name="id_youtube" value="" >
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Video</button>
                        </form>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label>Agregar Imagen</label> <small>(Puede agregar varias imagenes)</small>
                            <div class="html5fileupload fileImagenes" data-multiple="true" data-url="<?= URL . $this->idioma ?>/admin/uploadNeoImagen" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo[]" />
                            </div>
                        </div>
                        <script>
                            $(".html5fileupload.fileImagenes").html5fileupload({
                                onAfterStartSuccess: function (response) {
                                    $("#galeriaNeoPure").append(response.content);
                                }
                            });
                        </script>
                    </div>

                    <div class="row">
                        <div class="col-md-12" id="galeriaNeoPure">
                            <?php if (!empty($this->galeria)): ?>
                                <?php
                                foreach ($this->galeria as $item):
                                    $idImg = $item['id'];
                                    if ($item['estado'] == 1) {
                                        $mostrar = '    <a class="pointer btnMostrarImgNeo" id="mostrarImg' . $idImg . '" data-id="' . $idImg . '"><span class="label label-success">Visible</span></a>';
                                    } else {
                                        $mostrar = '    <a class="pointer btnMostrarImgNeo" id="mostrarImg' . $idImg . '" data-id="' . $idImg . '"><span class="label label-danger">Oculta</span></a>';
                                    }
                                    ?>
                                    <div class="col-sm-3" id="multimediaNeoPure<?= $idImg ?>">
                                        <?php if (!empty($item['img_miniatura'])): ?>
                                            <img class="img-responsive" src="<?= URL ?>public/images/neopure/thumb/<?= utf8_encode($item['img_miniatura']) ?>" alt="Photo">
                                        <?php endif; ?>
                                        <?php if (!empty($item['id_youtube'])): ?>
                                            <iframe  class="scale-with-grid" width="230" height="172" src="http://www.youtube.com/embed/<?= utf8_encode($item['id_youtube']) ?>?wmode=opaque" allowfullscreen=""></iframe>
                                        <?php endif; ?>
                                        <p> <?= $mostrar; ?> | <a class="pointer btnEliminarImgNeo" data-id="<?= $idImg ?>" id="eliminarImg<?= $idImg ?>"><span class="label label-danger">Eliminar</span></a></p>
                                    </div>
                                    <!-- /.col -->
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
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
        $(document).on("submit", "#frmContenidoNeoPure", function (e) {
            var url = "<?= URL . $this->idioma; ?>/admin/frmContenidoNeoPure"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmContenidoNeoPure").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        toastr.success(data.content)
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on('click', '.btnMostrarImgNeo', function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: '<?= URL . $this->idioma; ?>/admin/btnMostrarImgNeo',
                    type: 'POST',
                    data: {id: id},
                    dataType: 'json'
                }).done(function (data) {
                    $('#mostrarImg' + data.id).html(data.content);
                });
            }
            e.handled = true;
        });
        $(document).on('click', '.btnEliminarImgNeo', function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: '<?= URL . $this->idioma; ?>/admin/btnEliminarImgNeo',
                    type: 'POST',
                    data: {id: id},
                    dataType: 'json'
                }).done(function (data) {
                    $('#multimediaNeoPure' + data.id).remove();
                });
            }
            e.handled = true;
        });
        $(document).on("submit", "#frmAgregarVideoNeo", function (e) {
            var url = "<?= URL . $this->idioma; ?>/admin/frmAgregarVideoNeo"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmAgregarVideoNeo").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        toastr.success(data.mensaje);
                        $("#galeriaNeoPure").append(data.content);
                        $('#id_youtube').val("");
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>