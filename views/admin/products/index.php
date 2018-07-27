<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Productos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL . $this->idioma; ?>/admin">Inicio</a>
            </li>
            <li class="active">
                <a>Productos</A>
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
                                    <th>ES Nombre</th>
                                    <th>EN Nombre</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($this->listadoProductos as $item):
                                    $id = $item['id'];
                                    if ($item['estado'] == 1) {
                                        $estado = '<a class="pointer btnCambiarEstado" data-seccion="productos" data-rowid="productos_" data-tabla="productos" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                                    } else {
                                        $estado = '<a class="pointer btnCambiarEstado" data-seccion="productos" data-rowid="productos_" data-tabla="productos" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                                    }
                                    $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarProductos"><i class="fa fa-edit"></i> Editar </a>';
                                    ?>
                                    <tr id="productos_<?= $id; ?>">
                                        <td><?= $item['orden']; ?></td>
                                        <td><?= utf8_encode($item['es_header_text']); ?></td>
                                        <td><?= utf8_encode($item['en_header_text']); ?></td>
                                        <td><?= utf8_encode($item['es_nombre']); ?></td>
                                        <td><?= utf8_encode($item['en_nombre']); ?></td>
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
                                    <th>ES Nombre</th>
                                    <th>EN Nombre</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-primary btnAgregarContenido" data-url="modalAgregarProducto">Agregar Producto</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on("submit", "#frmEditarProducto", function (e) {
            var url = "<?= URL . $this->idioma ?>/admin/frmEditarProducto"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarProducto").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        $('#productos_' + data.id).html(data.content);
                        $(".genericModal").modal("toggle");
                        toastr.success(data.mensaje);
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>