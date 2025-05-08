<?= $this->include('julio101290\boilerplate\Views\load/toggle') ?>
<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplateCFDIElectronicSeries\Views\modulesSeriesfacturaelectronica/modalCaptureSeriesfacturaelectronica') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddSeriesfacturaelectronica" data-toggle="modal" data-target="#modalAddSeriesfacturaelectronica"><i class="fa fa-plus"></i>

                    <?= lang('seriesfacturaelectronica.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableSeriesfacturaelectronica" class="table table-striped table-hover va-middle tableSeriesfacturaelectronica">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('seriesfacturaelectronica.fields.empresa') ?></th>
                                <th><?= lang('seriesfacturaelectronica.fields.sucursal') ?></th>
                                <th><?= lang('seriesfacturaelectronica.fields.tipoSerie') ?></th>
                                <th><?= lang('seriesfacturaelectronica.fields.desdeFecha') ?></th>
                                <th><?= lang('seriesfacturaelectronica.fields.hastaFecha') ?></th>
                                <th><?= lang('seriesfacturaelectronica.fields.desdeFolio') ?></th>
                                <th><?= lang('seriesfacturaelectronica.fields.ambienteTimbrado') ?></th>
                                <th><?= lang('seriesfacturaelectronica.fields.tokenPruebas') ?></th>
                                <th><?= lang('seriesfacturaelectronica.fields.tokenProduccion') ?></th>
                                <th><?= lang('seriesfacturaelectronica.fields.created_at') ?></th>
                                <th><?= lang('seriesfacturaelectronica.fields.updated_at') ?></th>
                                <th><?= lang('seriesfacturaelectronica.fields.deleted_at') ?></th>

                                <th><?= lang('seriesfacturaelectronica.fields.actions') ?> </th>

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

    var tableSeriesfacturaelectronica = $('#tableSeriesfacturaelectronica').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url('admin/seriesfacturaelectronica') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [12],
                searchable: false,
                targets: [12]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'nombreEmpresa'
            },

            {
                'data': 'nombreSucursal'
            },

            {
                'data': 'tipoSerie'
            },

            {
                'data': 'desdeFecha'
            },

            {
                'data': 'hastaFecha'
            },

            {
                'data': 'desdeFolio'
            },

            {
                'data': 'ambienteTimbrado'
            },

            {
                'data': 'tokenPruebas'
            },

            {
                'data': 'tokenProduccion'
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
                             <button class="btn btn-warning btnEditSeriesfacturaelectronica" data-toggle="modal" idSeriesfacturaelectronica="${data.id}" data-target="#modalAddSeriesfacturaelectronica">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveSeriesfacturaelectronica', function (e) {


        var idSeriesfacturaelectronica = $("#idSeriesfacturaelectronica").val();
        var empresa = $("#empresa").val();
        var sucursal = $("#sucursal").val();
        var tipoSerie = $("#tipoSerie").val();
        var serie = $("#serie").val();
        var desdeFecha = $("#desdeFecha").val();
        var hastaFecha = $("#hastaFecha").val();
        var desdeFolio = $("#desdeFolio").val();
        var hastaFolio = $("#hastaFolio").val();

        if ($("#ambienteTimbrado").is(':checked')) {

            var ambienteTimbrado = "on";

        } else {

            var ambienteTimbrado = "off";

        }

        var tokenPruebas = $("#tokenPruebas").val();
        var tokenProduccion = $("#tokenProduccion").val();


        $("#btnSaveSeriesfacturaelectronica").attr("disabled", true);

        var datos = new FormData();
        datos.append("idSeriesfacturaelectronica", idSeriesfacturaelectronica);
        datos.append("idEmpresa", empresa);
        datos.append("sucursal", sucursal);
        datos.append("tipoSerie", tipoSerie);
        datos.append("serie", serie);
        datos.append("desdeFecha", desdeFecha);
        datos.append("hastaFecha", hastaFecha);
        datos.append("desdeFolio", desdeFolio);
        datos.append("hastaFolio", hastaFolio);
        datos.append("ambienteTimbrado", ambienteTimbrado);
        datos.append("tokenPruebas", tokenPruebas);
        datos.append("tokenProduccion", tokenProduccion);


        $.ajax({

            url: "<?= base_url('admin/seriesfacturaelectronica/save') ?>",
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

                    tableSeriesfacturaelectronica.ajax.reload();
                    $("#btnSaveSeriesfacturaelectronica").removeAttr("disabled");


                    $('#modalAddSeriesfacturaelectronica').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveSeriesfacturaelectronica").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Seriesfacturaelectronica
     =============================================*/
    $(".tableSeriesfacturaelectronica").on("click", ".btnEditSeriesfacturaelectronica", function () {

        var idSeriesfacturaelectronica = $(this).attr("idSeriesfacturaelectronica");

        var datos = new FormData();
        datos.append("idSeriesfacturaelectronica", idSeriesfacturaelectronica);

        $.ajax({

            url: "<?= base_url('admin/seriesfacturaelectronica/getSeriesfacturaelectronica') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idSeriesfacturaelectronica").val(respuesta["id"]);

                $("#empresa").val(respuesta["idEmpresa"]);

                var newOptionSucursal = new Option(respuesta["nombreSucursal"], respuesta["sucursal"], true, true);
                $('#sucursal').append(newOptionSucursal).trigger('change');
                $("#sucursal").val(respuesta["sucursal"]);


                $("#sucursal").val(respuesta["sucursal"]);
                $("#tipoSerie").val(respuesta["tipoSerie"]);
                $("#tipoSerie").trigger("change");
                $("#serie").val(respuesta["serie"]);
                $("#desdeFecha").val(respuesta["desdeFecha"]);
                $("#hastaFecha").val(respuesta["hastaFecha"]);
                $("#desdeFolio").val(respuesta["desdeFolio"]);
                $("#hastaFolio").val(respuesta["hastaFolio"]);

                $("#ambienteTimbrado").bootstrapToggle(respuesta["ambienteTimbrado"]);
                $("#tokenPruebas").val(respuesta["tokenPruebas"]);
                $("#tokenProduccion").val(respuesta["tokenProduccion"]);


            }

        })

    })


    /*=============================================
     ELIMINAR seriesfacturaelectronica
     =============================================*/
    $(".tableSeriesfacturaelectronica").on("click", ".btn-delete", function () {

        var idSeriesfacturaelectronica = $(this).attr("data-id");

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
                            url: `<?= base_url('admin/seriesfacturaelectronica') ?>/` + idSeriesfacturaelectronica,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableSeriesfacturaelectronica.ajax.reload();
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
        $("#modalAddSeriesfacturaelectronica").draggable();

    });


    $("#tipoSerie").select2();

</script>
<?= $this->endSection() ?>
        