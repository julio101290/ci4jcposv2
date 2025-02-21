<!-- Modal Empresas -->
<div class="modal fade" id="modalAddEmpresa" tabindex="-1" role="dialog" aria-labelledby="modalAddEmpresa" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('empresas.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#generales" type="button" role="tab" aria-controls="home" aria-selected="true"><?= lang('empresas.tab_generals') ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#datosFacturacion" type="button" role="tab" aria-controls="profile" aria-selected="false"><?= lang('empresas.tab_invoice') ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><?= lang('empresas.tab_logos_images') ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="emailsetting-tab" data-toggle="tab" data-target="#emailsettings" type="button" role="tab" aria-controls="emailSettings" aria-selected="false"><?= lang('empresas.tab_email_settings') ?></button>
                    </li>

                </ul>
                <form id="form-empresa" class="form-horizontal">
                    <div class="tab-content" id="myTabContent">



                        <div class="tab-pane fade show active" id="generales" role="tabpanel" aria-labelledby="generales">

                            <?= $this->include('julio101290\boilerplatecompanies\Views\modulosEmpresas/generalesEmpresa') ?>

                        </div>
                        <div class="tab-pane fade" id="datosFacturacion" role="tabpanel" aria-labelledby="datosFacturacion">

                            <?= $this->include('julio101290\boilerplatecompanies\Views\modulosEmpresas/facturacionEmpresa') ?>

                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                            <?= $this->include('julio101290\boilerplatecompanies\Views\modulosEmpresas/logosEmpresa') ?>

                        </div>

                        <div class="tab-pane fade" id="emailsettings" role="tabpanel" aria-labelledby="contact-tab">

                            <?= $this->include('julio101290\boilerplatecompanies\Views\modulosEmpresas/configuracionCorreo') ?>

                        </div>

                        
                 


                    </div>

                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveEmpresa"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>
    $("#smtpDebug").select2();
    $("#SMTPAuth").select2();
    $("#smptSecurity").select2();

    $(document).on('click', '.btnAddEmpresa', function(e) {

        console.log("asd");

        $(".form-control").val("");

        $("#idEmpresa").val("0");

        $(".previsualizarLogo").attr('src', '<?= base_URL("images/logo") ?>/default.png');

        $("#btnSaveEmpresa").removeAttr("disabled");

        $("#smtpDebug").val("0");
        $("#SMTPAuth").val("0");
        $("#smptSecurity").val("0");
        $("#facturacionRD").bootstrapToggle("off");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditarEmpresa', function(e) {


        var idEmpresa = $(this).attr("idEmpresa");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idEmpresa").val(idEmpresa);
        $("#btnGuardarEmpresa").removeAttr("disabled");

    });
</script>


<?= $this->endSection() ?>