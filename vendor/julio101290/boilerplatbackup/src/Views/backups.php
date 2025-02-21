<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplatebackup\Views\modulesBackups\modalCaptureBackups') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddBackups" data-toggle="modal" data-target="#modalAddBackups"><i class="fa fa-plus"></i>

                    <?= lang('backups.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableBackups" class="table table-striped table-hover va-middle tableBackups">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('backups.fields.idEmpresa') ?></th>
                                <th><?= lang('backups.fields.description') ?></th>
                                <th><?= lang('backups.fields.SQLFile') ?></th>
                                <th><?= lang('backups.fields.created_at') ?></th>
                                <th><?= lang('backups.fields.updated_at') ?></th>
                                <th><?= lang('backups.fields.deleted_at') ?></th>

                                <th><?= lang('backups.fields.actions') ?> </th>

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

    var tableBackups = $('#tableBackups').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url('admin/backups') ?>',
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
                'data': 'description'
            },

            {
                'data': 'SQLFile'
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
                             <button class="btn btn-primary btnDownloadBackup" uuid="${data.uuid}"><i class="fas fa-download"></i></button>
                             <button class="btn btn-success btnRestore" uuid="${data.uuid}"><i class="fas fa-upload"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveBackups', function (e) {


        var idBackups = $("#idBackups").val();
        var idEmpresa = $("#idEmpresa").val();
        var description = $("#description").val();
        var SQLFile = $("#SQLFile").prop("files")[0];
        

        $("#btnSaveBackups").attr("disabled", true);

        var datos = new FormData();
        datos.append("idBackups", idBackups);
        datos.append("idEmpresa", idEmpresa);
        datos.append("description", description);
        datos.append("SQLFile", SQLFile);


        $.ajax({

            url: "<?= base_url('admin/backups/save') ?>",
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

                    tableBackups.ajax.reload();
                    $("#btnSaveBackups").removeAttr("disabled");


                    $('#modalAddBackups').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveBackups").removeAttr("disabled");


                }

            }

        }

        ).fail(function (jqXHR, textStatus, errorThrown) {

            if (jqXHR.status === 0) {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "No hay conexión.!" + jqXHR.responseText
                });

                $("#btnSaveBackups").removeAttr("disabled");


            } else if (jqXHR.status == 404) {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Requested page not found [404]" + jqXHR.responseText
                });

                $("#btnSaveBackups").removeAttr("disabled");

            } else if (jqXHR.status == 500) {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Internal Server Error [500]." + jqXHR.responseText
                });


                $("#btnSaveBackups").removeAttr("disabled");

            } else if (textStatus === 'parsererror') {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Requested JSON parse failed." + jqXHR.responseText
                });

                $("#btnSaveBackups").removeAttr("disabled");

            } else if (textStatus === 'timeout') {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Time out error." + jqXHR.responseText
                });

                $("#btnSaveBackups").removeAttr("disabled");

            } else if (textStatus === 'abort') {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Ajax request aborted." + jqXHR.responseText
                });

                $("#btnSaveBackups").removeAttr("disabled");

            } else {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: 'Uncaught Error: ' + jqXHR.responseText
                });


                $("#btnSaveBackups").removeAttr("disabled");

            }
        })

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Backups
     =============================================*/
    $(".tableBackups").on("click", ".btnEditBackups", function () {

        var idBackups = $(this).attr("idBackups");

        var datos = new FormData();
        datos.append("idBackups", idBackups);

        $.ajax({

            url: "<?= base_url('admin/backups/getBackups') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idBackups").val(respuesta["id"]);

                $("#idEmpresa").val(respuesta["idEmpresa"]).trigger("change");
                $("#description").val(respuesta["description"]);
                $("#SQLFile").val(respuesta["SQLFile"]);


            }

        })

    })


    /*=============================================
     Restore Backup
     =============================================*/
    $(".tableBackups").on("click", ".btnRestore", function () {

        var uuidBackup = $(this).attr("uuid");

        Swal.fire({
            title: '<?= lang('boilerplate.global.sweet.title') ?>',
            text: "<?= lang('boilerplate.global.sweet.text') ?>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?= lang('backups.msg.msg_restore_database') ?>'
        })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: `<?= base_url('admin/backups/restore') ?>/` + uuidBackup,
                            method: 'GET',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableBackups.ajax.reload();
                        }).fail((error) => {
                            Toast.fire({
                                icon: 'error',
                                title: error.responseJSON.messages.error,
                            });
                        })
                    }
                })
    })


    /*=============================================
     ELIMINAR backups
     =============================================*/
    $(".tableBackups").on("click", ".btn-delete", function () {

        var idBackups = $(this).attr("data-id");

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
                            url: `<?= base_url('admin/backups') ?>/` + idBackups,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableBackups.ajax.reload();
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
        $("#modalAddBackups").draggable();

    });


    /**
     * DESCARGAR RESPALDO
     */

    $(".tableBackups").on("click", ".btnDownloadBackup", function () {

        var uuid = $(this).attr("uuid");

        window.open("<?= base_url('admin/backups/downloadBackup') ?>" + "/" + uuid, "_blank");

    })


</script>
<?= $this->endSection() ?>
        