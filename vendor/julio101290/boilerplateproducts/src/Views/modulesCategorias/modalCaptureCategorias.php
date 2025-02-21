<!-- Modal Categorias -->
<div class="modal fade" id="modalAddCategorias" tabindex="-1" role="dialog" aria-labelledby="modalAddCategorias" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <?= lang('categorias.createEdit') ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-categorias" class="form-horizontal">
                    <input type="hidden" id="idCategorias" name="idCategorias" value="0">


                    <div class="form-group row">
                        <label for="emitidoRecibido" class="col-sm-2 col-form-label">Empresa</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control" name="idEmpresa" id="idEmpresa" style = "width:80%;">
                                    <option value="0">Seleccione empresa</option>
                                    <?php
                                    foreach ($empresas as $key => $value) {

                                        echo "<option value='$value[id]' selected>$value[id] - $value[nombre] </option>  ";
                                    }
                                    ?>

                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="clave" class="col-sm-2 col-form-label">
                            Clave
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="clave" id="clave" class="form-control <?= session('error.clave') ? 'is-invalid' : '' ?>" value="<?= old('clave') ?>" placeholder="Clave" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="descripcion" class="col-sm-2 col-form-label">
<?= lang('categorias.fields.descripcion') ?>
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="descripcion" id="descripcion" class="form-control <?= session('error.descripcion') ? 'is-invalid' : '' ?>" value="<?= old('descripcion') ?>" placeholder="<?= lang('categorias.fields.descripcion') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
<?= lang('boilerplate.global.close') ?>
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveCategorias">
                    <?= lang('boilerplate.global.save') ?>
                </button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>
    $(document).on('click', '.btnAddCategorias', function (e) {


        $(".form-control").val("");

        $("#idCategorias").val("0");


        $("#idEmpresa").val("0");
        $("#idEmpresa").trigger("change");


        $("#btnSaveCategorias").removeAttr("disabled");

    });



    $("#idEmpresa").select2();

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditCategorias', function (e) {


        var idCategorias = $(this).attr("idCategorias");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idCategorias").val(idCategorias);
        $("#btnGuardarCategorias").removeAttr("disabled");

    });
</script>


<?= $this->endSection() ?>