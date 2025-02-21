<!-- Modal Products -->
<div class="modal fade" id="modalAddProducts" tabindex="-1" role="dialog" aria-labelledby="modalAddProducts" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <?= lang('products.createEdit') ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#generalesProductos" type="button" role="tab" aria-controls="home" aria-selected="true">Generales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#inventoryProducts" type="button" role="tab" aria-controls="profile" aria-selected="false">Inventario</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="emailsetting-tab" data-toggle="tab" data-target="#precios" type="button" role="tab" aria-controls="emailSettings" aria-selected="false">Precios</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#imageProduct" type="button" role="tab" aria-controls="contact" aria-selected="false">Logos / Imagenes</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#productsCFDIV4" type="button" role="tab" aria-controls="contact" aria-selected="false">Datos CFDI V4 </button>
                    </li>

                </ul>
                <form id="form-products" class="form-horizontal">


                    <div class="tab-content" id="myTabContent">



                        <div class="tab-pane fade show active" id="generalesProductos" role="tabpanel" aria-labelledby="generales">

                            <?= $this->include('julio101290\boilerplateproducts\Views/modulesProducts/generalsProducts') ?>

                        </div>
                        <div class="tab-pane fade" id="inventoryProducts" role="tabpanel" aria-labelledby="datosFacturacion">

                            <?= $this->include('julio101290\boilerplateproducts\Views\modulesProducts/inventoryProducts') ?>

                        </div>
                        <div class="tab-pane fade" id="precios" role="tabpanel" aria-labelledby="contact-tab">

                            <?= $this->include('julio101290\boilerplateproducts\Views/modulesProducts/priceProducts') ?>

                        </div>

                        <div class="tab-pane fade" id="imageProduct" role="tabpanel" aria-labelledby="contact-tab">

                            <?= $this->include('julio101290\boilerplateproducts\Views/modulesProducts/imageProduct') ?>

                        </div>

                        <div class="tab-pane fade" id="productsCFDIV4" role="tabpanel" aria-labelledby="contact-tab">

                            <?= $this->include('julio101290\boilerplateproducts\Views/modulesProducts/productsCFDIV4') ?>

                        </div>

                    </div>

                    <input type="hidden" id="idProducts" name="idProducts" value="0">






                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <?= lang('boilerplate.global.close') ?>
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveProducts">
                    <?= lang('boilerplate.global.save') ?>
                </button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>
    $("#idEmpresa").select2();




    /**
     * Categorias por empresa
     */

    $(".unidadSAT").select2({
        ajax: {
            url: "<?= base_url('admin/products/getUnidadSATAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var idEmpresa = $('.idEmpresa').val(); // CSRF hash

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


    /**
     * Categorias por empresa
     */

    $(".claveProductoSAT").select2({
        ajax: {
            url: "<?= base_url('admin/products/getProductosSATAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var idEmpresa = $('.idEmpresa').val(); // CSRF hash

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


    /**
     * Categorias por empresa
     */

    $(".idCategory").select2({
        ajax: {
            url: "<?= base_url('admin/categorias/getCategoriasAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var idEmpresa = $('.idEmpresa').val(); // CSRF hash

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




    /**
     * When change id Control
     */

    $("#idCategory").on("change", function () {

        var idCategoria = $(this).val();
        var idEmpresa = $(".idEmpresa").val();

        var idProduct = $("#idProducts").val();

        var datos = new FormData();
        datos.append("idCategoria", idCategoria);
        datos.append("idEmpresa", idEmpresa);

        $.ajax({

            url: "<?= base_url('admin/categorias/buscarFolio') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {


                if (idProduct == 0) {
                    $("#code").val(respuesta);
                }

            }

        }

        )



    });




    $("#porcentSale").on("keyup", function () {

        var porcentaje = $(this).val() / 100;
        var precioCompra = $("#buyPrice").val()
        var precioVenta = $("#salePrice").val()


        if (!(precioCompra > 0)) {


            return;
        }


        precioVenta = precioCompra * (porcentaje + 1)

        $("#salePrice").val(precioVenta);


    });

    $(document).on('click', '.btnAddProducts', function (e) {


        $(".form-controlProducts").val("");

        $("#idProducts").val("0");

        $("#btnSaveProducts").removeAttr("disabled");

        $("#idCategory").val("0");

        $("#idCategory").trigger("change");

        $("#idEmpresa").val("0");

        $("#idEmpresa").trigger("change");

        $("#porcentSale").val("40");
        $("#porcentTax").val("0");

        $("#porcentIVARetenido").val("0");
        $("#porcentISRRetenido").val("0");

        $("#unidadSAT").val("0");

        $("#unidadSAT").trigger("change");

        $("#claveProductoSAT").val("0");

        $("#claveProductoSAT").trigger("change");


        $("#facturacionRD").bootstrapToggle("off");


    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditProducts', function (e) {


        var idProducts = $(this).attr("idProducts");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idProducts").val(idProducts);
        $("#btnGuardarProducts").removeAttr("disabled");

    });




    $(document).on('click', '#btnSaveProducts', function (e) {

        var idEmpresa = $("#idEmpresa").val();
        var idProducts = $("#idProducts").val();
        var clave = $("#code").val();
        var idCategory = $("#idCategory").val();
        var barcode = $("#barcode").val();
        var description = $("#description").val();
        var stock = $("#stock").val();
        var buyPrice = $("#buyPrice").val();
        var salePrice = $("#salePrice").val();
        var porcentSale = $("#porcentSale").val();
        var porcentTax = $("#porcentTax").val();
        var porcentIVARetenido = $("#porcentIVARetenido").val();
        var porcentISRRetenido = $("#porcentISRRetenido").val();
        var routeImage = $("#routeImage").val();



        var unidadSAT = $("#unidadSAT").val();
        var unidad = $("#unidad").val();
        var claveProductoSAT = $("#claveProductoSAT").val();

        var nombreUnidadSAT = $("#unidadSAT option:selected").text();
        var nombreClaveProducto = $("#claveProductoSAT option:selected").text();
        
        
        
        var predial = $("#predial").val();



        var imagenProducto = $("#imagenProducto").prop("files")[0];

        if ($("#validateStock").is(':checked')) {

            var validateStock = "on";

        } else {

            var validateStock = "off";

        }


        if ($("#inventarioRiguroso").is(':checked')) {

            var inventarioRiguroso = "on";

        } else {

            var inventarioRiguroso = "off";

        }

        /*
         * Asignamos si va ser tasa exenta
         */

        if ($("#tasaExcenta").is(':checked')) {

            var tasaExcenta = "on";

        } else {

            var tasaExcenta = "off";

        }


        /*
         * Valida que el inmueble este ocupado
         */

        if ($("#inmuebleOcupado").is(':checked')) {

            var inmuebleOcupado = "on";

        } else {

            var inmuebleOcupado = "off";

        }




        if (idEmpresa == 0 || idEmpresa == "") {

            Toast.fire({
                icon: 'error',
                title: "Tiene que seleccionar la empresa"
            });

            return;

        }

        if (idCategory == 0 || idCategory == "") {

            Toast.fire({
                icon: 'error',
                title: "Tiene que seleccionar la categoria"
            });

            return;

        }

        if (porcentTax == "") {

            Toast.fire({
                icon: 'error',
                title: "Tiene que ingregar el porcentaje de impuesto"
            });

            return;

        }



        $("#btnSaveProducts").attr("disabled", true);

        var datos = new FormData();
        datos.append("idEmpresa", idEmpresa);
        datos.append("idProducts", idProducts);
        datos.append("code", clave);
        datos.append("idCategory", idCategory);
        datos.append("description", description);
        datos.append("stock", stock);
        datos.append("buyPrice", buyPrice);
        datos.append("salePrice", salePrice);
        datos.append("porcentSale", porcentSale);
        datos.append("porcentTax", porcentTax);
        datos.append("porcentIVARetenido", porcentIVARetenido);
        datos.append("porcentISRRetenido", porcentISRRetenido);

        datos.append("imagenProducto", imagenProducto);
        datos.append("barcode", barcode);
        datos.append("validateStock", validateStock);
        datos.append("inventarioRiguroso", inventarioRiguroso);

        datos.append("unidadSAT", unidadSAT);
        datos.append("unidad", unidad);
        datos.append("claveProductoSAT", claveProductoSAT);

        datos.append("nombreUnidadSAT", nombreUnidadSAT);
        datos.append("nombreClaveProducto", nombreClaveProducto);

        datos.append("inmuebleOcupado", inmuebleOcupado);
        datos.append("tasaExcenta", tasaExcenta);
        datos.append("predial", predial);
        
        

        $.ajax({

            url: "<?= base_url('admin/products/save') ?>",
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

                    tableProducts.ajax.reload();
                    $("#btnSaveProducts").removeAttr("disabled");


                    $('#modalAddProducts').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveProducts").removeAttr("disabled");


                }

            }

        }

        )

    });
</script>


<?= $this->endSection() ?>