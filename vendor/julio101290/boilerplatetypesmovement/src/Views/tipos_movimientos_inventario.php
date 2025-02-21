<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplatetypesmovement\Views\modulesTipos_movimientos_inventario/modalCaptureTipos_movimientos_inventario') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddTipos_movimientos_inventario" data-toggle="modal" data-target="#modalAddTipos_movimientos_inventario"><i class="fa fa-plus"></i>

                    <?= lang('tipos_movimientos_inventario.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableTipos_movimientos_inventario" class="table table-striped table-hover va-middle tableTipos_movimientos_inventario">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('tipos_movimientos_inventario.fields.idEmpresa') ?></th>
                                <th><?= lang('tipos_movimientos_inventario.fields.descripcion') ?></th>
                                <th><?= lang('tipos_movimientos_inventario.fields.tipo') ?></th>
                                <th><?= lang('tipos_movimientos_inventario.fields.esTraspaso') ?></th>
                                <th><?= lang('tipos_movimientos_inventario.fields.created_at') ?></th>
                                <th><?= lang('tipos_movimientos_inventario.fields.updated_at') ?></th>
                                <th><?= lang('tipos_movimientos_inventario.fields.deleted_at') ?></th>

                                <th><?= lang('tipos_movimientos_inventario.fields.actions') ?> </th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.card -->

<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script>
    /**
     * Cargamos la tabla
     */

    var tableTipos_movimientos_inventario = $('#tableTipos_movimientos_inventario').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [
            [1, 'asc']
        ],

        ajax: {
            url: '<?= base_url('admin/tipos_movimientos_inventario') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [8],
                searchable: false,
                targets: [8]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'nombreEmpresa'
            },

            {
                'data': 'descripcion'
            },

            {
                'data': 'tipo'
            },

            {
                'data': 'esTraspaso'
            },

            {
                'data': 'created_at'
            },

            {
                'data': 'updated_at'
            },

            {
                'data': 'deleted_at'
            },

            {
                "data": function (data) {
                    return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-warning btnEditTipos_movimientos_inventario" data-toggle="modal" idTipos_movimientos_inventario="${data.id}" data-target="#modalAddTipos_movimientos_inventario">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveTipos_movimientos_inventario', function (e) {


        var idTipos_movimientos_inventario = $("#idTipos_movimientos_inventario").val();
        var idEmpresa = $("#idEmpresa").val();
        var descripcion = $("#descripcion").val();
        var tipo = $("#tipo").val();
        var esTraspaso = $("#esTraspaso").val();


        if (idEmpresa == 0) {

            Toast.fire({
                icon: 'error',
                title: "Tiene que seleccionar la empresa"
            });
            return;
        }

        $("#btnSaveTipos_movimientos_inventario").attr("disabled", true);

        var datos = new FormData();
        datos.append("idTipos_movimientos_inventario", idTipos_movimientos_inventario);
        datos.append("idEmpresa", idEmpresa);
        datos.append("descripcion", descripcion);
        datos.append("tipo", tipo);
        datos.append("esTraspaso", esTraspaso);


        $.ajax({

            url: "<?= base_url('admin/tipos_movimientos_inventario/save') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                if (respuesta.match(/Correctamente.*/)) {

                    Toast.fire({
                        icon: 'success',
                        title: "Guardado Correctamente"
                    });

                    tableTipos_movimientos_inventario.ajax.reload();
                    $("#btnSaveTipos_movimientos_inventario").removeAttr("disabled");


                    $('#modalAddTipos_movimientos_inventario').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveTipos_movimientos_inventario").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Tipos_movimientos_inventario
     =============================================*/
    $(".tableTipos_movimientos_inventario").on("click", ".btnEditTipos_movimientos_inventario", function () {

        var idTipos_movimientos_inventario = $(this).attr("idTipos_movimientos_inventario");

        var datos = new FormData();
        datos.append("idTipos_movimientos_inventario", idTipos_movimientos_inventario);

        $.ajax({

            url: "<?= base_url('admin/tipos_movimientos_inventario/getTipos_movimientos_inventario') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idTipos_movimientos_inventario").val(respuesta["id"]);

                $("#idEmpresa").val(respuesta["idEmpresa"]);
                $("#descripcion").val(respuesta["descripcion"]);
                $("#tipo").val(respuesta["tipo"]);
                $("#esTraspaso").val(respuesta["esTraspaso"]);


            }

        })

    })


    /*=============================================
     ELIMINAR tipos_movimientos_inventario
     =============================================*/
    $(".tableTipos_movimientos_inventario").on("click", ".btn-delete", function () {

        var idTipos_movimientos_inventario = $(this).attr("data-id");

        Swal.fire({
            title: '<?= lang('boilerplate.global.sweet.title') ?>',
            text: "<?= lang('boilerplate.global.sweet.text') ?>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?= lang('boilerplate.global.sweet.confirm_delete') ?>'
        })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: `<?= base_url('admin/tipos_movimientos_inventario') ?>/` + idTipos_movimientos_inventario,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableTipos_movimientos_inventario.ajax.reload();
                        }).fail((error) => {
                            Toast.fire({
                                icon: 'error',
                                title: error.responseJSON.messages.error,
                            });
                        })
                    }
                })
    })

    $(function () {
        $("#modalAddTipos_movimientos_inventario").draggable();

    });
</script>
<?= $this->endSection() ?>