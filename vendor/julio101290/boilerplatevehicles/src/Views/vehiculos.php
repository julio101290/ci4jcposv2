<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplatevehicles\Views\modulesVehiculos/modalCaptureVehiculos') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddVehiculos" data-toggle="modal" data-target="#modalAddVehiculos"><i class="fa fa-plus"></i>

                    <?= lang('vehiculos.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableVehiculos" class="table table-striped table-hover va-middle tableVehiculos">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('vehiculos.fields.idEmpresa') ?></th>
                                <th><?= lang('vehiculos.fields.idTipoVehiculo') ?></th>
                                <th><?= lang('vehiculos.fields.descripcion') ?></th>
                                <th><?= lang('vehiculos.fields.placas') ?></th>
                                <th><?= lang('vehiculos.fields.created_at') ?></th>
                                <th><?= lang('vehiculos.fields.updated_at') ?></th>
                                <th><?= lang('vehiculos.fields.deleted_at') ?></th>

                                <th><?= lang('vehiculos.fields.actions') ?> </th>

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

    var tableVehiculos = $('#tableVehiculos').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url('admin/vehiculos') ?>',
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
                'data': 'descripcionTipo'
            },

            {
                'data': 'descripcion'
            },

            {
                'data': 'placas'
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
                             <button class="btn btn-warning btnEditVehiculos" data-toggle="modal" idVehiculos="${data.id}" data-target="#modalAddVehiculos">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveVehiculos', function (e) {


        var idVehiculos = $("#idVehiculos").val();
        var idEmpresa = $("#idEmpresaVehiculos").val();
        var idTipoVehiculo = $("#idTipoVehiculo").val();
        var descripcion = $("#descripcionVehiculo").val();
        var placas = $("#placas").val();

        var permisoSCT = $("#permisoSCT").val();
        var numPermisoSCT = $("#numPermisoSCT").val();
        var configVehicular = $("#configVehicular").val();
        var pesoBrutoVehicular = $("#pesoBrutoVehicular").val();
        var anioModelo = $("#anioModelo").val();
        var aseguraRespCivil = $("#aseguraRespCivil").val();
        var polizaRespCivil = $("#polizaRespCivil").val();



        if (idEmpresa == 0 || idEmpresa == null) {

            Toast.fire({
                icon: 'error',
                title: "Tiene que seleccionar la empresa"
            });
            return;
        }

        if (idTipoVehiculo == 0 || idTipoVehiculo == null) {

            Toast.fire({
                icon: 'error',
                title: "Tiene que seleccionar el tipo de vehiculo"
            });
            return;
        }



        $("#btnSaveVehiculos").attr("disabled", true);

        var datos = new FormData();
        datos.append("idVehiculos", idVehiculos);
        datos.append("idEmpresa", idEmpresa);
        datos.append("idTipoVehiculo", idTipoVehiculo);
        datos.append("descripcion", descripcion);
        datos.append("placas", placas);

        datos.append("permSCT", permisoSCT);
        datos.append("numPermisoSCT", numPermisoSCT);
        datos.append("configVehicular", configVehicular);
        datos.append("pesoBrutoVehicular", pesoBrutoVehicular);
        datos.append("anioModelo", anioModelo);
        datos.append("aseguraRespCivil", aseguraRespCivil);
        datos.append("polizaRespCivil", polizaRespCivil);


        $.ajax({

            url: "<?= base_url('admin/vehiculos/save') ?>",
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

                    tableVehiculos.ajax.reload();
                    $("#btnSaveVehiculos").removeAttr("disabled");


                    $('#modalAddVehiculos').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveVehiculos").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Vehiculos
     =============================================*/
    $(".tableVehiculos").on("click", ".btnEditVehiculos", function () {

        var idVehiculos = $(this).attr("idVehiculos");

        var datos = new FormData();
        datos.append("idVehiculos", idVehiculos);

        $.ajax({

            url: "<?= base_url('admin/vehiculos/getVehiculos') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idVehiculos").val(respuesta["id"]);

                $("#idEmpresaVehiculos").val(respuesta["idEmpresa"]);
                $("#idEmpresaVehiculos").trigger("change");
                $("#idTipoVehiculo").val(respuesta["idTipoVehiculo"]);
                $("#idTipoVehiculo").trigger("change");
                $("#descripcionVehiculo").val(respuesta["descripcion"]);
                $("#placas").val(respuesta["placas"]);

                var newOption = new Option(respuesta["idTipoVehiculo"] + ' ' + respuesta["descripcionTipo"], respuesta["idTipoVehiculo"], true, true);
                $('#idTipoVehiculo').append(newOption).trigger('change');
                $("#idTipoVehiculo").val(respuesta["idTipoVehiculo"]);

                $("#permisoSCT").val(respuesta["permSCT"]);
                $("#permisoSCT").trigger("change");
                $("#numPermisoSCT").val(respuesta["numPermisoSCT"]);
                $("#configVehicular").val(respuesta["configVehicular"]);
                $("#pesoBrutoVehicular").val(respuesta["pesoBrutoVehicular"]);
                $("#anioModelo").val(respuesta["anioModelo"]);
                $("#aseguraRespCivil").val(respuesta["aseguraRespCivil"]);
                $("#polizaRespCivil").val(respuesta["polizaRespCivil"]);


            }

        })

    })


    /*=============================================
     ELIMINAR vehiculos
     =============================================*/
    $(".tableVehiculos").on("click", ".btn-delete", function () {

        var idVehiculos = $(this).attr("data-id");

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
                            url: `<?= base_url('admin/vehiculos') ?>/` + idVehiculos,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableVehiculos.ajax.reload();
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
        $("#modalAddVehiculos").draggable();

    });



    $("#idTipoVehiculo").select2({
        ajax: {
            url: "<?= site_url('admin/vehiculos/getTipoVehiculoAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var idEmpresa = $('.idEmpresaVehiculos').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                    idEmpresa: idEmpresa // search term
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);
                return {
                    results: response.data
                };
            },
            cache: true
        }
    });


</script>
<?= $this->endSection() ?>
        