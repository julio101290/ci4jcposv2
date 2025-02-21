<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplatesuppliers\Views\modulesProveedores/modalCaptureProveedores') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddProveedores" data-toggle="modal" data-target="#modalAddProveedores"><i
                        class="fa fa-plus"></i>

                    <?= lang('proveedores.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableProveedores" class="table table-striped table-hover va-middle tableProveedores">
                        <thead>
                            <tr>

                                <th>#</th>

                                <th>Empresa</th>
                                <th>
                                    <?= lang('proveedores.fields.firstname') ?>
                                </th>
                                <th>
                                    <?= lang('proveedores.fields.lastname') ?>
                                </th>
                                <th>
                                    <?= lang('proveedores.fields.taxID') ?>
                                </th>
                                <th>
                                    <?= lang('proveedores.fields.email') ?>
                                </th>
                                <th>
                                    <?= lang('proveedores.fields.direction') ?>
                                </th>
                                <th>
                                    <?= lang('proveedores.fields.birthdate') ?>
                                </th>
                                <th>
                                    <?= lang('proveedores.fields.created_at') ?>
                                </th>
                                <th>
                                    <?= lang('proveedores.fields.updated_at') ?>
                                </th>
                                <th>
                                    <?= lang('proveedores.fields.deleted_at') ?>
                                </th>

                                <th>
                                    <?= lang('proveedores.fields.actions') ?>
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

    var tableProveedores = $('#tableProveedores').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url('admin/proveedores') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [11],
                searchable: false,
                targets: [11]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'nombreEmpresa'
            },

            {
                'data': 'firstname'
            },

            {
                'data': 'lastname'
            },

            {
                'data': 'taxID'
            },

            {
                'data': 'email'
            },

            {
                'data': 'direction'
            },

            {
                'data': 'birthdate'
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
                             <button class="btn btn-warning btnEditProveedores" data-toggle="modal" idProveedor="${data.id}" data-target="#modalAddProveedores">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });







    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Proveedores
     =============================================*/
    $(".tableProveedores").on("click", ".btnEditProveedores", function () {

        var idProveedor = $(this).attr("idProveedor");

        var datos = new FormData();
        datos.append("idProveedor", idProveedor);

        $.ajax({

            url: "<?= base_url('admin/proveedores/getProveedores') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {

                $("#idProveedor").val(respuesta["id"]);
                $("#idEmpresaProveedor").val(respuesta["idEmpresa"]);
                $("#idEmpresaProveedor").trigger("change");
                $("#firstname").val(respuesta["firstname"]);
                $("#razonSocial").val(respuesta["razonSocial"]);
                $("#lastname").val(respuesta["lastname"]);
                $("#taxID").val(respuesta["taxID"]);
                $("#email").val(respuesta["email"]);
                $("#direction").val(respuesta["direction"]);
                $("#birthdate").val(respuesta["birthdate"]);

                $("#formaPago").val(respuesta["formaPago"]);
                $("#formaPago").trigger("change");
                $("#metodoPago").val(respuesta["metodoPago"]);
                $("#metodoPago").trigger("change");
                $("#usoCFDI").val(respuesta["usoCFDI"]);
                $("#usoCFDI").trigger("change");

                $("#codigoPostal").val(respuesta["codigoPostal"]);
                $("#regimenFiscal").val(respuesta["regimenFiscal"]);
                $("#regimenFiscal").trigger("change");

            }

        })

    })

    $("#idEmpresaProveedor ").select2();
    /*=============================================
     ELIMINAR proveedores
     =============================================*/
    $(".tableProveedores").on("click", ".btn-delete", function () {

        var idProveedores = $(this).attr("data-id");

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
                            url: `<?= base_url('admin/proveedores') ?>/` + idProveedores,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableProveedores.ajax.reload();
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
        $("#modalAddProveedores").draggable();

    });


</script>
<?= $this->endSection() ?>