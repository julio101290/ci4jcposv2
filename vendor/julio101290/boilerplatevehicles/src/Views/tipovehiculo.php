<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplatevehicles\Views\modulesTipovehiculo/modalCaptureTipovehiculo') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddTipovehiculo" data-toggle="modal" data-target="#modalAddTipovehiculo"><i class="fa fa-plus"></i>

                    <?= lang('tipovehiculo.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableTipovehiculo" class="table table-striped table-hover va-middle tableTipovehiculo">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('tipovehiculo.fields.idEmpresa') ?></th>
                                <th><?= lang('tipovehiculo.fields.codigo') ?></th>
                                <th><?= lang('tipovehiculo.fields.descripcion') ?></th>
                                <th><?= lang('tipovehiculo.fields.created_at') ?></th>
                                <th><?= lang('tipovehiculo.fields.updated_at') ?></th>
                                <th><?= lang('tipovehiculo.fields.deleted_at') ?></th>

                                <th><?= lang('tipovehiculo.fields.actions') ?> </th>

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

    var tableTipovehiculo = $('#tableTipovehiculo').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url('admin/tipovehiculo') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [7],
                searchable: false,
                targets: [7]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'idEmpresa'
            },

            {
                'data': 'codigo'
            },

            {
                'data': 'descripcion'
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
                             <button class="btn btn-warning btnEditTipovehiculo" data-toggle="modal" idTipovehiculo="${data.id}" data-target="#modalAddTipovehiculo">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveTipovehiculo', function (e) {


        var idTipovehiculo = $("#idTipovehiculo").val();
        var idEmpresa = $("#idEmpresa").val();
        var codigo = $("#codigo").val();
        var descripcion = $("#descripcion").val();

        if (idEmpresa == 0 || idEmpresa == null) {

            Toast.fire({
                icon: 'error',
                title: "Tiene que seleccionar la empresa"
            });
            return;
        }


        $("#btnSaveTipovehiculo").attr("disabled", true);




        var datos = new FormData();
        datos.append("idTipovehiculo", idTipovehiculo);
        datos.append("idEmpresa", idEmpresa);
        datos.append("codigo", codigo);
        datos.append("descripcion", descripcion);


        $.ajax({

            url: "<?= base_url('admin/tipovehiculo/save') ?>",
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

                    tableTipovehiculo.ajax.reload();
                    $("#btnSaveTipovehiculo").removeAttr("disabled");


                    $('#modalAddTipovehiculo').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveTipovehiculo").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Tipovehiculo
     =============================================*/
    $(".tableTipovehiculo").on("click", ".btnEditTipovehiculo", function () {

        var idTipovehiculo = $(this).attr("idTipovehiculo");

        var datos = new FormData();
        datos.append("idTipovehiculo", idTipovehiculo);

        $.ajax({

            url: "<?= base_url('admin/tipovehiculo/getTipovehiculo') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idTipovehiculo").val(respuesta["id"]);

                $("#idEmpresa").val(respuesta["idEmpresa"]);
                $("#idEmpresa").trigger("change");
                $("#codigo").val(respuesta["codigo"]);
                $("#descripcion").val(respuesta["descripcion"]);


            }

        })

    })


    /*=============================================
     ELIMINAR tipovehiculo
     =============================================*/
    $(".tableTipovehiculo").on("click", ".btn-delete", function () {

        var idTipovehiculo = $(this).attr("data-id");

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
                            url: `<?= base_url('admin/tipovehiculo') ?>/` + idTipovehiculo,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableTipovehiculo.ajax.reload();
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
        $("#modalAddTipovehiculo").draggable();

    });


</script>
<?= $this->endSection() ?>
        