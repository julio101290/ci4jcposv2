<?= $this->include('julio101290\boilerplate\Views\load/toggle') ?>
<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplateproducts\Views\modulesProducts/modalCaptureProducts') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddProducts" data-toggle="modal" data-target="#modalAddProducts"><i class="fa fa-plus"></i>

                    <?= lang('products.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableProducts" class="table table-striped table-hover va-middle tableProducts">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>
                                    Empresa
                                </th>
                                <th>
                                    Clave
                                </th>

                                <th>
                                    <?= lang('products.fields.idCategory') ?>
                                </th>

                                <th>
                                    <?= lang('products.fields.barcode') ?>
                                </th>
                                <th>
                                    <?= lang('products.fields.description') ?>
                                </th>
                                <th>
                                    <?= lang('products.fields.stock') ?>
                                </th>
                                <th>
                                    <?= lang('products.fields.buyPrice') ?>
                                </th>
                                <th>
                                    <?= lang('products.fields.salePrice') ?>
                                </th>
                                <th>
                                    <?= lang('products.fields.porcentSale') ?>
                                </th>
                                <th>
                                    <?= lang('products.fields.porcentTax') ?>
                                </th>
                                <th>
                                    <?= lang('products.fields.routeImage') ?>
                                </th>
                                <th>
                                    <?= lang('products.fields.created_at') ?>
                                </th>
                                <th>
                                    <?= lang('products.fields.deleted_at') ?>
                                </th>
                                <th>
                                    <?= lang('products.fields.updated_at') ?>
                                </th>

                                <th>
                                    <?= lang('products.fields.actions') ?>
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

    var tableProducts = $('#tableProducts').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [
            [1, 'asc']
        ],

        ajax: {
            url: '<?= base_url('admin/products') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [11, 15],
                searchable: false,
                targets: [11, 15]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'nombreEmpresa'
            },

            {
                'data': 'code'
            },

            {
                'data': 'idCategory'
            },

            {
                'data': 'barcode'
            },

            {
                'data': 'description'
            },

            {
                'data': 'stock'
            },

            {
                'data': 'buyPrice'
            },

            {
                'data': 'salePrice'
            },

            {
                'data': 'porcentSale'
            },

            {
                'data': 'porcentTax'
            },

            {
                "data": function (data) {

                    if (data.routeImage == "") {
                        data.routeImage = "anonymous.png";
                    }

                    return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                         <img src="<?= base_URL("images/products") ?>/${data.routeImage}" data-action="zoom" width="40px" class="" style="">
                         </div>
                         </td>`
                }
            },

            {
                'data': 'created_at'
            },

            {
                'data': 'deleted_at'
            },

            {
                'data': 'updated_at'
            },

            {
                "data": function (data) {
                    return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-warning btnEditProducts" data-toggle="modal" idProducts="${data.id}" data-target="#modalAddProducts">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                             <button class="btn btn-success btn-barcode" data-id="${data.id}"><i class="fas fa-barcode"></i></button>
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
     EDITAR Products
     =============================================*/
    $(".tableProducts").on("click", ".btnEditProducts", function () {

        var idProducts = $(this).attr("idProducts");

        var datos = new FormData();
        datos.append("idProducts", idProducts);

        if (idEmpresa == 0) {

            Toast.fire({
                icon: 'error',
                title: "Tiene que seleccionar la empresa"
            });

        }

        $.ajax({

            url: "<?= base_url('admin/products/getProducts') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idProducts").val(respuesta["id"]);
                $("#idEmpresa").val(respuesta["idEmpresa"]);
                $("#idEmpresa").trigger("change");


                var newOption = new Option(respuesta["clave"] + ' ' + respuesta["descripcionCategoria"], respuesta["idCategory"], true, true);
                $('#idCategory').append(newOption).trigger('change');
                $("#idCategory").val(respuesta["idCategory"]);



                var newOptionUnidad = new Option(respuesta["nombreUnidadSAT"], respuesta["unidadSAT"], true, true);
                $('#unidadSAT').append(newOptionUnidad).trigger('change');
                $("#unidadSAT").val(respuesta["unidadSAT"]);

                $("#unidad").val(respuesta["unidad"]);


                var newOptionClaveProducto = new Option(respuesta["nombreClaveProducto"], respuesta["claveProductoSAT"], true, true);
                $('#claveProductoSAT').append(newOptionClaveProducto).trigger('change');
                $("#claveProductoSAT").val(respuesta["claveProductoSAT"]);




                $("#clave").val(respuesta["clave"]);
                $("#description").val(respuesta["description"]);
                $("#stock").val(respuesta["stock"]);
                $("#buyPrice").val(respuesta["buyPrice"]);
                $("#salePrice").val(respuesta["salePrice"]);
                $("#porcentSale").val(respuesta["porcentSale"]);
                $("#porcentTax").val(respuesta["porcentTax"]);
                $("#porcentIVARetenido").val(respuesta["porcentIVARetenido"]);
                $("#porcentISRRetenido").val(respuesta["porcentISRRetenido"]);

                $("#barcode").val(respuesta["barcode"]);


                $("#validateStock").bootstrapToggle(respuesta["validateStock"]);
                $("#inventarioRiguroso").bootstrapToggle(respuesta["inventarioRiguroso"]);
                $("#inmuebleOcupado").bootstrapToggle(respuesta["inmuebleOcupado"]);
                $("#tasaExcenta").bootstrapToggle(respuesta["tasaExcenta"]);
                
                
                $("#predial").val(respuesta["predial"]);

                //$("#routeImage").val(respuesta["routeImage"]);
                if (respuesta["routeImage"] == "") {
                    $(".previsualizarLogo").attr("src", '<?= base_URL("images/products/") ?>anonymous.png');

                } else {

                    $(".previsualizarLogo").attr("src", '<?= base_URL("images/products") ?>/' + respuesta["routeImage"]);

                }

                $("#code").val(respuesta["code"]);


            }

        })

    })

    $(".tableProducts").on("click", ".btn-barcode", function () {

        var idProduct = $(this).attr("data-id");

        window.open("<?= base_url('admin/products/barcode') ?>" + "/" + idProduct, "_blank");

    });


    /*=============================================
     ELIMINAR products
     =============================================*/
    $(".tableProducts").on("click", ".btn-delete", function () {

        var idProducts = $(this).attr("data-id");

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
                            url: `<?= base_url('admin/products') ?>/` + idProducts,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableProducts.ajax.reload();
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
        $("#modalAddProducts").draggable();

    });



    /*=============================================
     SUBIENDO LA FOTO DEL USUARIO
     =============================================*/
    $(".imagenProducto").change(function () {



        var imagen = this.files[0];

        /*=============================================
         VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
         =============================================*/

        if (imagen["type"] != "image/png") {

            $(".imagenProducto").val("");

            Toast.fire({
                icon: 'error',
                title: "<?= lang('empresas.imagenesFormato') ?>",
            });


        } else if (imagen["size"] > 2000000) {

            $(".imagenProducto").val("");

            Toast.fire({
                icon: 'error',
                title: "<?= lang('empresas.imagenesPeso') ?>",
            });


        } else {

            var datosImagen = new FileReader;
            datosImagen.readAsDataURL(imagen);

            $(datosImagen).on("load", function (event) {

                var rutaImagen = event.target.result;

                $(".previsualizarLogo").attr("src", rutaImagen);

            })

        }
    });


</script>
<?= $this->endSection() ?>