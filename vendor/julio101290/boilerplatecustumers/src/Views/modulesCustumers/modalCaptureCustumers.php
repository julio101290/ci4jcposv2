<!-- Modal Custumers -->
<div class="modal fade" id="modalAddCustumers" tabindex="-1" role="dialog" aria-labelledby="modalAddCustumers" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <?= lang('custumers.createEdit') ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#generalesClientes" type="button" role="tab" aria-controls="home" aria-selected="true">Generales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#facturacionCFDIClientes" type="button" role="tab" aria-controls="profile" aria-selected="false">Datos Facturacion MX</button>
                    </li>

                </ul>


                <form id="form-custumers" class="form-horizontal">
                    <input type="hidden" id="idCustumers" name="idCustumers" value="0">

                    <div class="tab-content" id="myTabContent">


                        <div class="tab-pane fade show active" id="generalesClientes" role="tabpanel" aria-labelledby="generales">

                            <?= $this->include('julio101290\boilerplatecustumers\Views\modulesCustumers/generalCustumers') ?>

                        </div>

                        <div class="tab-pane fade" id="facturacionCFDIClientes" role="tabpanel" aria-labelledby="datosFacturacion">

                            <?= $this->include('julio101290\boilerplatecustumers\Views\modulesCustumers/facturacionCustumers') ?>

                        </div>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <?= lang('boilerplate.global.close') ?>
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveCustumers">
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

    $(document).on('click', '.btnAddCustumers', function(e) {


        $(".form-controlCustumers").val("");

        $("#idCustumers").val("0");

        $("#birthdate").val("<?= $fecha ?>");

        $("#btnSaveCustumers").removeAttr("disabled");

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



    $(document).on('click', '.btnEditCustumers', function(e) {


        var idCustumers = $(this).attr("idCustumers");

        //LIMPIAMOS CONTROLES
        $(".form-controlCustumers").val("");

        $("#idCustumers").val(idCustumers);
        $("#btnGuardarCustumers").removeAttr("disabled");



    });


    $(document).on('click', '#btnSaveCustumers', function(e) {


        var idCustumers = $("#idCustumers").val();
        var idEmpresa = $("#idEmpresaCustumer").val();
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



        if (idEmpresa == 0 || idEmpresa == null) {

            Toast.fire({
                icon: 'error',
                title: "Tiene que seleccionar la empresa"
            });

            return;

        }

        $("#btnSaveCustumers").attr("disabled", true);

        var datos = new FormData();
        datos.append("idCustumers", idCustumers);
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

                url: "<?= base_url('admin/custumers/save') ?>",
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

                        tableCustumers.ajax.reload();
                        $("#btnSaveCustumers").removeAttr("disabled");


                        $('#modalAddCustumers').modal('hide');
                    } else {

                        Toast.fire({
                            icon: 'error',
                            title: respuesta
                        });

                        $("#btnSaveCustumers").removeAttr("disabled");


                    }

                }

            }

        )

    });
</script>


<?= $this->endSection() ?>