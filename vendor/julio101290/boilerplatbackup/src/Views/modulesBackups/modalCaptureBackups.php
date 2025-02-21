<!-- Modal Backups -->
<div class="modal fade" id="modalAddBackups" tabindex="-1" role="dialog" aria-labelledby="modalAddBackups" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('backups.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-backups" class="form-horizontal">
                    <input type="hidden" id="idBackups" name="idBackups" value="0">

                    <div class="form-group row">
                        <label for="emitidoRecibido" class="col-sm-2 col-form-label">Empresa</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control idEmpresa" name="idEmpresa" id="idEmpresa" style = "width:80%;">

                                    <?php
                                    foreach ($empresas as $key => $value) {

                                        echo "<option selected value='$value[id]' selected>$value[id] - $value[nombre] </option>  ";
                                    }
                                    ?>

                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label"><?= lang('backups.fields.description') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="description" id="description" class="form-control <?= session('error.description') ? 'is-invalid' : '' ?>" value="<?= old('description') ?>" placeholder="<?= lang('backups.fields.description') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" hidden>
                        <label for="SQLFile" class="col-sm-2 col-form-label"><?= lang('backups.fields.SQLFile') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="file" name="SQLFile" id="SQLFile" class="form-control <?= session('error.SQLFile') ? 'is-invalid' : '' ?>" value="<?= old('SQLFile') ?>" placeholder="<?= lang('backups.fields.SQLFile') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveBackups"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddBackups', function (e) {


        $(".form-control").val("");

        $("#idBackups").val("0");

        $("#btnSaveBackups").removeAttr("disabled");

        $("#idEmpresa").val("1").trigger("change");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditBackups', function (e) {


        var idBackups = $(this).attr("idBackups");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idBackups").val(idBackups);
        $("#btnGuardarBackups").removeAttr("disabled");

    });


    $("#idEmpresa").select2();

</script>


<?= $this->endSection() ?>
        