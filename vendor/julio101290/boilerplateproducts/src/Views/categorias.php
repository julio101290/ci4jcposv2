<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplateproducts\Views/modulesCategorias/modalCaptureCategorias') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddCategorias" data-toggle="modal"
                    data-target="#modalAddCategorias"><i class="fa fa-plus"></i>

                    <?= lang('categorias.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableCategorias" class="table table-striped table-hover va-middle tableCategorias">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>Empresa</th>
                                <th>Clave</th>
                                <th>
                                    <?= lang('categorias.fields.descripcion') ?>
                                </th>
                                <th>
                                    <?= lang('categorias.fields.created_at') ?>
                                </th>
                                <th>
                                    <?= lang('categorias.fields.updated_at') ?>
                                </th>
                                <th>
                                    <?= lang('categorias.fields.deleted_at') ?>
                                </th>

                                <th>
                                    <?= lang('categorias.fields.actions') ?>
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

    var tableCategorias = $('#tableCategorias').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [
            [1, 'asc']
        ],

        ajax: {
            url: '<?= base_url('admin/categorias') ?>',
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
            'data': 'nombreEmpresa'
        },

        {
            'data': 'clave'
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
                             <button class="btn btn-warning btnEditCategorias" data-toggle="modal" idCategorias="${data.id}" data-target="#modalAddCategorias">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
            }
        }
        ]
    });



    $(document).on('click', '#btnSaveCategorias', function (e) {


        var idCategorias = $("#idCategorias").val();
        var descripcion = $("#descripcion").val();
        var clave = $("#clave").val();
        var idEmpresa = $("#idEmpresa").val();

        if (idEmpresa == 0 || idEmpresa == null) {

            Toast.fire({
                icon: 'error',
                title: "Tiene que seleccionar la empresa"
            });
            return;
        }

        $("#btnSaveCategorias").attr("disabled", true);

        var datos = new FormData();
        datos.append("idCategorias", idCategorias);
        datos.append("descripcion", descripcion);
        datos.append("clave", clave);
        datos.append("idEmpresa", idEmpresa);


        $.ajax({

            url: "<?= base_url('admin/categorias/save') ?>",
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

                    tableCategorias.ajax.reload();
                    $("#btnSaveCategorias").removeAttr("disabled");


                    $('#modalAddCategorias').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveCategorias").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Categorias
     =============================================*/
    $(".tableCategorias").on("click", ".btnEditCategorias", function () {

        var idCategorias = $(this).attr("idCategorias");

        var datos = new FormData();
        datos.append("idCategorias", idCategorias);

        $.ajax({

            url: "<?= base_url('admin/categorias/getCategorias') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {

                console.log()
                $("#idCategorias").val(respuesta["id"]);
                $("#clave").val(respuesta["clave"]);
                $("#idEmpresa").val(respuesta["idEmpresa"]);
                $("#idEmpresa").trigger("change");

                $("#descripcion").val(respuesta["descripcion"]);


            }

        })

    })


    /*=============================================
     ELIMINAR categorias
     =============================================*/
    $(".tableCategorias").on("click", ".btn-delete", function () {

        var idCategorias = $(this).attr("data-id");

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
                        url: `<?= base_url('admin/categorias') ?>/` + idCategorias,
                        method: 'DELETE',
                    }).done((data, textStatus, jqXHR) => {
                        Toast.fire({
                            icon: 'success',
                            title: jqXHR.statusText,
                        });


                        tableCategorias.ajax.reload();
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
        $("#modalAddCategorias").draggable();

    });
</script>
<?= $this->endSection() ?>