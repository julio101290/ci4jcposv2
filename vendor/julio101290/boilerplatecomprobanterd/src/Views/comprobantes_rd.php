<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplatecomprobanterd\Views\modulesComprobantes_rd/modalCaptureComprobantes_rd') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddComprobantes_rd" data-toggle="modal"
                    data-target="#modalAddComprobantes_rd"><i class="fa fa-plus"></i>

                    <?= lang('comprobantes_rd.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableComprobantes_rd"
                        class="table table-striped table-hover va-middle tableComprobantes_rd">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>
                                    Empresa
                                </th>
                                <th>
                                    <?= lang('comprobantes_rd.fields.tipoDocumento') ?>
                                </th>
                                <th>
                                    <?= lang('comprobantes_rd.fields.prefijo') ?>
                                </th>
                                <th>
                                    <?= lang('comprobantes_rd.fields.nombre') ?>
                                </th>
                                <th>
                                    <?= lang('comprobantes_rd.fields.folioInicial') ?>
                                </th>
                                <th>
                                    <?= lang('comprobantes_rd.fields.folioFinal') ?>
                                </th>

                                <th>
                                   Folio Actual
                                </th>
                                <th>
                                    <?= lang('comprobantes_rd.fields.desdeFecha') ?>
                                </th>
                                <th>
                                    <?= lang('comprobantes_rd.fields.hastaFecha') ?>
                                </th>
                                <th>
                                    <?= lang('comprobantes_rd.fields.created_at') ?>
                                </th>
                                <th>
                                    <?= lang('comprobantes_rd.fields.updated_at') ?>
                                </th>
                                <th>
                                    <?= lang('comprobantes_rd.fields.deleted_at') ?>
                                </th>

                                <th>
                                    <?= lang('comprobantes_rd.fields.actions') ?>
                                </th>

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

    var tableComprobantes_rd = $('#tableComprobantes_rd').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url('admin/comprobantes_rd') ?>',
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
            'data': 'tipoDocumento'
        },

        {
            'data': 'prefijo'
        },

        {
            'data': 'nombre'
        },

        {
            'data': 'folioInicial'
        },

        {
            'data': 'folioFinal'
        },

        {
            'data': 'folioActual'
        },

        {
            'data': 'desdeFecha'
        },

        {
            'data': 'hastaFecha'
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
                             <button class="btn btn-warning btnEditComprobantes_rd" data-toggle="modal" idComprobantes_rd="${data.id}" data-target="#modalAddComprobantes_rd">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
            }
        }
        ]
    });



    $(document).on('click', '#btnSaveComprobantes_rd', function (e) {


        var idComprobantes_rd = $("#idComprobantes_rd").val();
        var idEmpresa = $("#idEmpresa").val();
        var tipoDocumento = $("#tipoDocumento").val();
        var prefijo = $("#prefijo").val();
        var nombre = $("#nombre").val();
        var folioInicial = $("#folioInicial").val();
        var folioFinal = $("#folioFinal").val();
        var desdeFecha = $("#desdeFecha").val();
        var hastaFecha = $("#hastaFecha").val();
        var folioActual = $("#folioActual").val();

        if (idEmpresa == 0) {

            Toast.fire({
                icon: 'error',
                title: "Tiene que seleccionar la empresa"
            });

            return;

        }



        $("#btnSaveComprobantes_rd").attr("disabled", true);

        var datos = new FormData();
        datos.append("idComprobantes_rd", idComprobantes_rd);
        datos.append("idEmpresa", idEmpresa);
        datos.append("tipoDocumento", tipoDocumento);
        datos.append("prefijo", prefijo);
        datos.append("nombre", nombre);
        datos.append("folioInicial", folioInicial);
        datos.append("folioFinal", folioFinal);
        datos.append("desdeFecha", desdeFecha);
        datos.append("hastaFecha", hastaFecha);
        datos.append("folioActual", folioActual);


        $.ajax({

            url: "<?= base_url('admin/comprobantes_rd/save') ?>",
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

                    tableComprobantes_rd.ajax.reload();
                    $("#btnSaveComprobantes_rd").removeAttr("disabled");


                    $('#modalAddComprobantes_rd').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveComprobantes_rd").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Comprobantes_rd
     =============================================*/
    $(".tableComprobantes_rd").on("click", ".btnEditComprobantes_rd", function () {

        var idComprobantes_rd = $(this).attr("idComprobantes_rd");

        var datos = new FormData();
        datos.append("idComprobantes_rd", idComprobantes_rd);

        $.ajax({

            url: "<?= base_url('admin/comprobantes_rd/getComprobantes_rd') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idComprobantes_rd").val(respuesta["id"]);

                $("#idEmpresa").val(respuesta["idEmpresa"]);
                $("#idEmpresa").trigger("change");
                $("#tipoDocumento").val(respuesta["tipoDocumento"]);
                $("#tipoDocumento").trigger("change");
                $("#prefijo").val(respuesta["prefijo"]);
                $("#nombre").val(respuesta["nombre"]);
                $("#folioInicial").val(respuesta["folioInicial"]);
                $("#folioFinal").val(respuesta["folioFinal"]);
                $("#folioActual").val(respuesta["folioActual"]);
                $("#desdeFecha").val(respuesta["desdeFecha"]);
                $("#hastaFecha").val(respuesta["hastaFecha"]);


            }

        })

    })


    /*=============================================
     ELIMINAR comprobantes_rd
     =============================================*/
    $(".tableComprobantes_rd").on("click", ".btn-delete", function () {

        var idComprobantes_rd = $(this).attr("data-id");

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
                        url: `<?= base_url('admin/comprobantes_rd') ?>/` + idComprobantes_rd,
                        method: 'DELETE',
                    }).done((data, textStatus, jqXHR) => {
                        Toast.fire({
                            icon: 'success',
                            title: jqXHR.statusText,
                        });


                        tableComprobantes_rd.ajax.reload();
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
        $("#modalAddComprobantes_rd").draggable();

    });


</script>
<?= $this->endSection() ?>