<!-- Modal Tipovehiculo -->
<div class="modal fade" id="modalAddTipovehiculo" tabindex="-1" role="dialog" aria-labelledby="modalAddTipovehiculo" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('tipovehiculo.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tipovehiculo" class="form-horizontal">
                    <input type="hidden" id="idTipovehiculo" name="idTipovehiculo" value="0">

                    <div class="form-group row">
                        <label for="idEmpresa" class="col-sm-2 col-form-label">Empresa</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control idEmpresa form-controlCustumers" name="idEmpresa" id="idEmpresa" style="width:80%;">
                                    <option value="0">Seleccione empresa</option>
                                    <?php
                                    foreach ($empresas as $key => $value) {

                                        echo "<option value='$value[id]'>$value[id] - $value[nombre] </option>  ";
                                    }
                                    ?>

                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="codigo" class="col-sm-2 col-form-label"><?= lang('tipovehiculo.fields.codigo') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="codigo" id="codigo" class="form-control <?= session('error.codigo') ? 'is-invalid' : '' ?>" value="<?= old('codigo') ?>" placeholder="<?= lang('tipovehiculo.fields.codigo') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcion" class="col-sm-2 col-form-label"><?= lang('tipovehiculo.fields.descripcion') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="descripcion" id="descripcion" class="form-control <?= session('error.descripcion') ? 'is-invalid' : '' ?>" value="<?= old('descripcion') ?>" placeholder="<?= lang('tipovehiculo.fields.descripcion') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveTipovehiculo"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>



    $("#idEmpresa").select2();

    $(document).on('click', '.btnAddTipovehiculo', function (e) {


        $(".form-control").val("");

        $("#idTipovehiculo").val("0");

        $("#idEmpresa").val("0");

        $("#idEmpresa").trigger("change");

        $("#btnSaveTipovehiculo").removeAttr("disabled");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditTipovehiculo', function (e) {


        var idTipovehiculo = $(this).attr("idTipovehiculo");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idTipovehiculo").val(idTipovehiculo);
        $("#btnGuardarTipovehiculo").removeAttr("disabled");

    });




</script>


<?= $this->endSection() ?>
        