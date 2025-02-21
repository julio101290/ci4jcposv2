<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplatestorages\Views\modulesStorages/modalCaptureStorages') ?>
<?= $this->include('julio101290\boilerplatestorages\Views\modulesStorages/usuariosAlmacenModal') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddStorages" data-toggle="modal" data-target="#modalAddStorages"><i class="fa fa-plus"></i>

                    <?= lang('storages.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableStorages" class="table table-striped table-hover va-middle tableStorages">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('storages.fields.code') ?></th>
                                <th><?= lang('storages.fields.name') ?></th>

                                <th><?= lang('storages.fields.Creado') ?></th>
                                <th><?= lang('storages.fields.Actualizado') ?></th>
                                <th><?= lang('storages.fields.Eliminado') ?></th>

                                <th><?= lang('storages.fields.actions') ?> </th>

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

    var tableStorages = $('#tableStorages').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [
            [1, 'asc']
        ],

        ajax: {
            url: '<?= base_url('admin/storages') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [6],
                searchable: false,
                targets: [6]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'code'
            },

            {
                'data': 'name'
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
                             <button class="btn btn-warning btnEditStorages" data-toggle="modal" idStorages="${data.id}" data-target="#modalAddStorages">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                             <button class="btn btn-success btn-users" data-id="${data.id}" data-toggle="modal" data-target="#modalUsuariosAlmacen"><i class="fas fa-users"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveStorages', function (e) {


        var idStorages = $("#idStorages").val();
        var code = $("#code").val();
        var name = $("#name").val();
        var type = $("#type").val();
        var brachoffice = $("#brachoffice").val();
        var company = $("#company").val();
        var costCenter = $("#costCenter").val();
        var exist = $("#exist").val();
        var list = $("#list").val();
        var main = $("#main").val();
        var idEmpresaStorage = $("#idEmpresaStorage").val();
        var inicioOperacion = $("#inicioInventario").val();

        $("#btnSaveStorages").attr("disabled", true);

        var datos = new FormData();
        datos.append("idStorages", idStorages);
        datos.append("code", code);
        datos.append("name", name);
        datos.append("type", type);
        datos.append("brachoffice", brachoffice);
        datos.append("company", company);
        datos.append("costCenter", costCenter);
        datos.append("exist", exist);
        datos.append("list", list);
        datos.append("main", main);
        datos.append("idEmpresa", idEmpresaStorage);
        datos.append("inicioOperacion", inicioOperacion);


        $.ajax({

            url: "<?= base_url('admin/storages/save') ?>",
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

                    tableStorages.ajax.reload();
                    $("#btnSaveStorages").removeAttr("disabled");


                    $('#modalAddStorages').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveStorages").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Storages
     =============================================*/
    $(".tableStorages").on("click", ".btnEditStorages", function () {

        var idStorages = $(this).attr("idStorages");

        var datos = new FormData();
        datos.append("idStorages", idStorages);

        $.ajax({

            url: "<?= base_url('admin/storages/getStorages') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idStorages").val(respuesta["id"]);

                $("#code").val(respuesta["code"]);
                $("#name").val(respuesta["name"]);
                $("#type").val(respuesta["type"]);
                $("#brachoffice").val(respuesta["brachoffice"]);
                $("#company").val(respuesta["company"]);
                $("#costCenter").val(respuesta["costCenter"]);
                $("#exist").val(respuesta["exist"]);
                $("#list").val(respuesta["list"]);
                $("#main").val(respuesta["main"]);
                $("#idEmpresaStorage").val(respuesta["idEmpresa"]);
                $("#idEmpresaStorage").trigger("change");
                $("#inicioInventario").val(respuesta["inicioOperacion"]);

            }

        })

    })


    /*=============================================
     ELIMINAR storages
     =============================================*/
    $(".tableStorages").on("click", ".btn-delete", function () {

        var idStorages = $(this).attr("data-id");

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
                            url: `<?= base_url('admin/storages') ?>/` + idStorages,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableStorages.ajax.reload();
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
        $("#modalAddStorages").draggable();

    });
</script>
<?= $this->endSection() ?>