<!-- Modal Usuariosempresa -->
<div class="modal fade" id="modalAddUsuariosempresa" tabindex="-1" role="dialog" aria-labelledby="modalAddUsuariosempresa" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('usuariosempresa.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-usuariosempresa" class="form-horizontal">
                    <input type="hidden" id="idUsuariosempresa" name="idUsuariosempresa" value="0">

                    <div class="form-group row">
                        <label for="idEmpresa" class="col-sm-2 col-form-label"><?= lang('usuariosempresa.fields.idEmpresa') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="idEmpresa" id="idEmpresa" class="form-control <?= session('error.idEmpresa') ? 'is-invalid' : '' ?>" value="<?= old('idEmpresa') ?>" placeholder="<?= lang('usuariosempresa.fields.idEmpresa') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="idUsuario" class="col-sm-2 col-form-label"><?= lang('usuariosempresa.fields.idUsuario') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="idUsuario" id="idUsuario" class="form-control <?= session('error.idUsuario') ? 'is-invalid' : '' ?>" value="<?= old('idUsuario') ?>" placeholder="<?= lang('usuariosempresa.fields.idUsuario') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label"><?= lang('usuariosempresa.fields.status') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="status" id="status" class="form-control <?= session('error.status') ? 'is-invalid' : '' ?>" value="<?= old('status') ?>" placeholder="<?= lang('usuariosempresa.fields.status') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveUsuariosempresa"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddUsuariosempresa', function (e) {


        $(".form-control").val("");

        $("#idUsuariosempresa").val("0");

        $("#btnSaveUsuariosempresa").removeAttr("disabled");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditUsuariosempresa', function (e) {


        var idUsuariosempresa = $(this).attr("idUsuariosempresa");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idUsuariosempresa").val(idUsuariosempresa);
        $("#btnGuardarUsuariosempresa").removeAttr("disabled");

    });




</script>


<?= $this->endSection() ?>
        