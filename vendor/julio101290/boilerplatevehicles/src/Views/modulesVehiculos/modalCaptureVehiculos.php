<!-- Modal Vehiculos -->
<div class="modal fade" id="modalAddVehiculos" tabindex="-1" role="dialog" aria-labelledby="modalAddVehiculos" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('vehiculos.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#generalesVehiculo" type="button" role="tab" aria-controls="home" aria-selected="true">Generales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#cartaPorte" type="button" role="tab" aria-controls="profile" aria-selected="false">Datos Carta Porte</button>
                    </li>

                </ul>


                <form id="form-vehiculos" class="form-horizontal">
                    <input type="hidden" id="idVehiculos" name="idVehiculos" value="0">

                    <div class="tab-content" id="myTabContent">


                        <div class="tab-pane fade show active" id="generalesVehiculo" role="tabpanel" aria-labelledby="generales">

                            <?= $this->include('julio101290\boilerplatevehicles\Views\modulesVehiculos/datosGenerales') ?>

                        </div>

                        <div class="tab-pane fade" id="cartaPorte" role="tabpanel" aria-labelledby="datosFacturacion">

                            <?= $this->include('julio101290\boilerplatevehicles\Views\modulesVehiculos/datosCartaPorte') ?>

                        </div>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveVehiculos"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddVehiculos', function (e) {




        $("#idVehiculos").val("0");

        $("#idEmpresaVehiculos").val("0");

        $(".datosVehiculos").val("");

        $("#idEmpresaVehiculos").trigger("change");


        $("#idTipoVehiculo").val("0");

        $("#idTipoVehiculo").trigger("change");


        $("#btnSaveVehiculos").removeAttr("disabled");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditVehiculos', function (e) {


        var idVehiculos = $(this).attr("idVehiculos");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idVehiculos").val(idVehiculos);
        $("#btnGuardarVehiculos").removeAttr("disabled");

    });



    $("#idEmpresaVehiculos").select2();
    $("#permisoSCT").select2();
    $("#configVehicular").select2();

</script>


<?= $this->endSection() ?>
        