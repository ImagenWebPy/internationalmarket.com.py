<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Certificaciones</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL . $this->idioma; ?>/admin">Inicio</a>
            </li>
            <li class="active">
                <a>Certificaciones</A>
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
                    <h5>Secciones</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-certificaciones" >
                            <thead>
                                <tr>
                                    <th>Orden</th>
                                    <th>ES Header Text</th>
                                    <th>EN Header Text</th>
                                    <th>ES Menu</th>
                                    <th>EN Menu</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($this->listadoCertificaciones as $item):
                                    $id = $item['id'];
                                    if ($item['estado'] == 1) {
                                        $estado = '<a class="pointer btnCambiarEstado" data-seccion="logistica" data-rowid="logistica_" data-tabla="logistica" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                                    } else {
                                        $estado = '<a class="pointer btnCambiarEstado" data-seccion="logistica" data-rowid="logistica_" data-tabla="logistica" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                                    }
                                    $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarLogistica"><i class="fa fa-edit"></i> Editar </a>';
                                    ?>
                                    <tr id="logistica_<?= $id; ?>">
                                        <td><?= $item['orden']; ?></td>
                                        <td><?= utf8_encode($item['es_texto_header']); ?></td>
                                        <td><?= utf8_encode($item['en_texto_header']); ?></td>
                                        <td><?= utf8_encode($item['es_menu']); ?></td>
                                        <td><?= utf8_encode($item['en_menu']); ?></td>
                                        <td><?= $estado; ?></td>
                                        <td><?= $btnEditar; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Orden</th>
                                    <th>ES Texto Header</th>
                                    <th>EN Texto Header</th>
                                    <th>ES Menu</th>
                                    <th>EN Menu</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-primary btnAgregarContenido" data-url="modalAgregarLogistica">Agregar Seccion</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        $(document).on("submit", "#frmEditarBlogPost", function (e) {
            var url = "<?= URL . $this->idioma ?>/admin/frmEditarBlogPost"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarBlogPost").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        $("#blog_" + data.id).html(data.content);
                        $(".genericModal").modal("toggle");
                        $(".summernote").summernote({
                            height: 300, // set editor height
                            minHeight: null, // set minimum height of editor
                            maxHeight: null // set maximum height of editor
                        });
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                        $("#data_1 .input-group.date").datepicker({
                            todayBtn: "linked",
                            keyboardNavigation: false,
                            forceParse: false,
                            calendarWeeks: true,
                            autoclose: true,
                            format: "dd/mm/yyyy",
                        });
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("submit", "#frmBlogTextos", function (e) {
            var url = "<?= URL . $this->idioma; ?>/admin/frmBlogTextos"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmBlogTextos").serialize(), // serializes the form's elements.
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