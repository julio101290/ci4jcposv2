<!-- Modal Proveedores -->
<div class="modal fade" id="modalAddProveedores" tabindex="-1" role="dialog" aria-labelledby="modalAddProveedores" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <?= lang('proveedores.createEdit') ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#generales" type="button" role="tab" aria-controls="home" aria-selected="true">Generales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#facturacionCFDI" type="button" role="tab" aria-controls="profile" aria-selected="false">Datos Facturacion MX</button>
                    </li>

                </ul>


                <form id="form-proveedores" class="form-horizontal">
                    <input type="hidden" id="idProveedor" name="idProveedor" value="0">

                    <div class="tab-content" id="myTabContent">


                        <div class="tab-pane fade show active" id="generales" role="tabpanel" aria-labelledby="generales">

                            <?= $this->include('julio101290\boilerplatesuppliers\Views\modulesProveedores/generalProveedores') ?>

                        </div>

                        <div class="tab-pane fade" id="facturacionCFDI" role="tabpanel" aria-labelledby="datosFacturacion">

                            <?= $this->include('julio101290\boilerplatesuppliers\Views\modulesProveedores/facturacionProveedores') ?>

                        </div>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <?= lang('boilerplate.global.close') ?>
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveProveedores">
                    <?= lang('boilerplate.global.save') ?>
                </button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>
    $("#idEmpresaCustumer").select2();
    $("#metodoPago").select2();
    $("#formaPago").select2();
    $("#usoCFDI").select2();
    $("#regimenFiscal").select2();

    $(document).on('click', '.btnAddProveedores', function(e) {


        $(".form-controlProveedores").val("");

        $("#idProveedor").val("0");

        $("#birthdate").val("<?= $fecha ?>");

        $("#btnSaveProveedores").removeAttr("disabled");

        $("#idEmpresaCustumer").val("0");
        $("#idEmpresaCustumer").trigger("change");

        $("#metodoPago").val("0");
        $("#metodoPago").trigger("change");

        $("#formaPago").val("0");
        $("#formaPago").trigger("change");

        $("#usoCFDI").val("0");
        $("#usoCFDI").trigger("change");

        $("#regimenFiscal").val("0");
        $("#regimenFiscal").trigger("change");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditProveedores', function(e) {


        var idProveedor = $(this).attr("idProveedor");

        //LIMPIAMOS CONTROLES
        $(".form-controlProveedores").val("");

        $("#idProveedor").val(idProveedor);
        $("#btnGuardarProveedores").removeAttr("disabled");



    });


    $(document).on('click', '#btnSaveProveedores', function(e) {


        var idProveedor = $("#idProveedor").val();
        var idEmpresa = $("#idEmpresaProveedor").val();
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var taxID = $("#taxID").val();
        var email = $("#email").val();
        var direction = $("#direction").val();
        var birthdate = $("#birthdate").val();

        var metodoPago = $("#metodoPago").val();
        var formaPago = $("#formaPago").val();
        var usoCFDI = $("#usoCFDI").val();
        var codigoPostal = $("#codigoPostal").val();
        var regimenFiscal = $("#regimenFiscal").val();
        var razonSocial = $("#razonSocial").val();



        console.log("idEmpresa",idEmpresa);

        if (idEmpresa == 0 || idEmpresa == null) {

            Toast.fire({
                icon: 'error',
                title: "Tiene que seleccionar la empresa"
            });

            return;

        }

        $("#btnSaveProveedores").attr("disabled", true);

        var datos = new FormData();
        datos.append("idProveedor", idProveedor);
        datos.append("idEmpresa", idEmpresa);
        datos.append("firstname", firstname);
        datos.append("lastname", lastname);
        datos.append("taxID", taxID);
        datos.append("email", email);
        datos.append("direction", direction);
        datos.append("birthdate", birthdate);

        datos.append("metodoPago", metodoPago);
        datos.append("formaPago", formaPago);
        datos.append("usoCFDI", usoCFDI);
        datos.append("codigoPostal", codigoPostal);
        datos.append("regimenFiscal", regimenFiscal);
        datos.append("razonSocial", razonSocial);

        $.ajax({

                url: "<?= base_url('admin/proveedores/save') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {
                    if (respuesta.match(/Correctamente.*/)) {

                        Toast.fire({
                            icon: 'success',
                            title: "Guardado Correctamente"
                        });

                        tableProveedores.ajax.reload();
                        $("#btnSaveProveedores").removeAttr("disabled");


                        $('#modalAddProveedores').modal('hide');
                    } else {

                        Toast.fire({
                            icon: 'error',
                            title: respuesta
                        });

                        $("#btnSaveProveedores").removeAttr("disabled");


                    }

                }

            }

        )

    });
</script>


<?= $this->endSection() ?>