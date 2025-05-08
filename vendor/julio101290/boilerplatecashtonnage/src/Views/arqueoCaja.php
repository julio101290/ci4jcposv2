<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplatecashtonnage\Views\modulesArqueoCaja/modalCaptureArqueoCaja') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddArqueoCaja" data-toggle="modal" data-target="#modalAddArqueoCaja"><i class="fa fa-plus"></i>

                    <?= lang('arqueoCaja.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableArqueoCaja" class="table table-striped table-hover va-middle tableArqueoCaja">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('arqueoCaja.fields.idEmpresa') ?></th>
                                <th><?= lang('arqueoCaja.fields.idSucursal') ?></th>
                                <th><?= lang('arqueoCaja.fields.idUsuarioEntrega') ?></th>
                                <th><?= lang('arqueoCaja.fields.idUsuarioVerifica') ?></th>
                                <th><?= lang('arqueoCaja.fields.idUsuarioRecibe') ?></th>
                                <th><?= lang('arqueoCaja.fields.fechaInicial') ?></th>
                                <th><?= lang('arqueoCaja.fields.fechaFinal') ?></th>
                                <th><?= lang('arqueoCaja.fields.importeInicial') ?></th>
                                <th><?= lang('arqueoCaja.fields.importeVentasCredito') ?></th>
                                <th><?= lang('arqueoCaja.fields.importeVentasContado') ?></th>
                                <th><?= lang('arqueoCaja.fields.importeEfectivoContadoManual') ?></th>
                                <th><?= lang('arqueoCaja.fields.created_at') ?></th>
                                <th><?= lang('arqueoCaja.fields.updated_at') ?></th>
                                <th><?= lang('arqueoCaja.fields.deleted_at') ?></th>

                                <th><?= lang('arqueoCaja.fields.actions') ?> </th>

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

    var tableArqueoCaja = $('#tableArqueoCaja').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url('admin/arqueoCaja') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [15],
                searchable: false,
                targets: [15]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'idEmpresa'
            },

            {
                'data': 'nombreSucursal'
            },

            {
                'data': 'nombreUsuarioEntrega'
            },

            {
                'data': 'nombreUsuarioVerifica'
            },

            {
                'data': 'nombreUsuarioRecibe'
            },

            {
                'data': 'fechaInicial'
            },

            {
                'data': 'fechaFinal'
            },

            {
                'data': 'importeInicial'
            },

            {
                'data': 'importeVentasCredito'
            },

            {
                'data': 'importeVentasContado'
            },

            {
                'data': 'importeEfectivoContadoManual'
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
                             <button class="btn btn-warning btnEditArqueoCaja" data-toggle="modal" idArqueoCaja="${data.id}" data-target="#modalAddArqueoCaja">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                             <button class="btn bg-warning btnImprimir" data-id="${data.id}" ><i class="far fa-file-pdf"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });


    /*=============================================
     IMPRIMIR VEnta
     =============================================*/

    $(".tableArqueoCaja").on("click", '.btnImprimir', function () {

        var uuid = $(this).attr("data-id");


        window.open("<?= base_url('admin/ArqueoCaja/report') ?>" + "/" + uuid, "_blank");

    });


    $(document).on('click', '#btnSaveArqueoCaja', function (e) {


        var idArqueoCaja = $("#idArqueoCaja").val();
        var idEmpresa = $("#idEmpresa").val();
        var idSucursal = $("#idSucursal").val();
        var idUsuarioEntrega = $("#idUsuarioEntrega").val();
        var idUsuarioVerifica = $("#idUsuarioVerifica").val();
        var idUsuarioRecibe = $("#idUsuarioRecibe").val();
        var fechaInicial = $("#fechaInicial").val();
        var fechaFinal = $("#fechaFinal").val();
        var importeInicial = $("#importeInicial").val();
        var importeVentasCredito = $("#importeVentasCredito").val();
        var importeVentasContado = $("#importeVentasContado").val();
        var importeEfectivoContadoManual = $("#importeEfectivoContadoManual").val();
        var observaciones = $("#observaciones").val();

        $("#btnSaveArqueoCaja").attr("disabled", true);

        var datos = new FormData();
        datos.append("idArqueoCaja", idArqueoCaja);
        datos.append("idEmpresa", idEmpresa);
        datos.append("idSucursal", idSucursal);
        datos.append("idUsuarioEntrega", idUsuarioEntrega);
        datos.append("idUsuarioVerifica", idUsuarioVerifica);
        datos.append("idUsuarioRecibe", idUsuarioRecibe);
        datos.append("fechaInicial", fechaInicial);
        datos.append("fechaFinal", fechaFinal);
        datos.append("importeInicial", importeInicial);
        datos.append("importeVentasCredito", importeVentasCredito);
        datos.append("importeVentasContado", importeVentasContado);
        datos.append("importeEfectivoContadoManual", importeEfectivoContadoManual);
        datos.append("observaciones", observaciones);


        $.ajax({

            url: "<?= base_url('admin/arqueoCaja/save') ?>",
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

                    tableArqueoCaja.ajax.reload();
                    $("#btnSaveArqueoCaja").removeAttr("disabled");


                    $('#modalAddArqueoCaja').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveArqueoCaja").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR ArqueoCaja
     =============================================*/
    $(".tableArqueoCaja").on("click", ".btnEditArqueoCaja", function () {

        var idArqueoCaja = $(this).attr("idArqueoCaja");

        var datos = new FormData();
        datos.append("idArqueoCaja", idArqueoCaja);

        $.ajax({

            url: "<?= base_url('admin/arqueoCaja/getArqueoCaja') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {



                $("#idArqueoCaja").val(respuesta["id"]);
                $("#idEmpresa").val(respuesta["idEmpresa"]);
                $("#idEmpresa").trigger("change");

                var newOptionSucursal = new Option(respuesta["nombreSucursal"], respuesta["idSucursal"], true, true);
                $('#idSucursal').append(newOptionSucursal).trigger('change');
                $("#idSucursal").val(respuesta["idSucursal"]);

                var newOptionUsuarioEntrega = new Option(respuesta["nombreUsuarioEntrega"], respuesta["idUsuarioEntrega"], true, true);
                $('#idUsuarioEntrega').append(newOptionUsuarioEntrega).trigger('change');
                $("#idUsuarioEntrega").val(respuesta["idUsuarioEntrega"]);

                var newOptionUsuarioVerificaa = new Option(respuesta["nombreUsuarioVerifica"], respuesta["idUsuarioVerifica"], true, true);
                $('#idUsuarioVerifica').append(newOptionUsuarioVerificaa).trigger('change');
                $("#idUsuarioVerifica").val(respuesta["idUsuarioVerifica"]);

                var newOptionUsuarioRecibe = new Option(respuesta["nombreUsuarioRecibe"], respuesta["idUsuarioRecibe"], true, true);
                $('#idUsuarioRecibe').append(newOptionUsuarioRecibe).trigger('change');
                $("#idUsuarioRecibe").val(respuesta["idUsuarioRecibe"]);


                $("#fechaInicial").val(respuesta["fechaInicial"]);
                $("#fechaFinal").val(respuesta["fechaFinal"]);
                $("#importeInicial").val(respuesta["importeInicial"]);
                $("#importeVentasCredito").val(respuesta["importeVentasCredito"]);
                $("#importeVentasContado").val(respuesta["importeVentasContado"]);
                $("#importeEfectivoContadoManual").val(respuesta["importeEfectivoContadoManual"]);
                $("#observaciones").val(respuesta["observaciones"]);


            }

        })

    })


    /*=============================================
     ELIMINAR arqueoCaja
     =============================================*/
    $(".tableArqueoCaja").on("click", ".btn-delete", function () {

        var idArqueoCaja = $(this).attr("data-id");

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
                            url: `<?= base_url('admin/arqueoCaja') ?>/` + idArqueoCaja,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableArqueoCaja.ajax.reload();
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
        $("#modalAddArqueoCaja").draggable();

    });


</script>
<?= $this->endSection() ?>
        