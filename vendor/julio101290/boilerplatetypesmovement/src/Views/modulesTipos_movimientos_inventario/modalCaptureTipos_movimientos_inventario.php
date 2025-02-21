<!-- Modal Tipos_movimientos_inventario -->
<div class="modal fade" id="modalAddTipos_movimientos_inventario" tabindex="-1" role="dialog" aria-labelledby="modalAddTipos_movimientos_inventario" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('tipos_movimientos_inventario.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tipos_movimientos_inventario" class="form-horizontal">
                    <input type="hidden" id="idTipos_movimientos_inventario" name="idTipos_movimientos_inventario" value="0">

                    <div class="form-group row">
                        <label for="idEmpresa" class="col-sm-2 col-form-label">Empresa</label>
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
                        <label for="descripcion" class="col-sm-2 col-form-label"><?= lang('tipos_movimientos_inventario.fields.descripcion') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="descripcion" id="descripcion" class="form-control <?= session('error.descripcion') ? 'is-invalid' : '' ?>" value="<?= old('descripcion') ?>" placeholder="<?= lang('tipos_movimientos_inventario.fields.descripcion') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control" name="tipo" id="tipo" style = "width:80%;">
                                    <option value="ENT" selected>ENT Entrada </option>
                                    <option value="SAL">SAL Salida </option>

                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipo" class="col-sm-2 col-form-label">Es traspaso</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control esTraspaso" name="esTraspaso" id="esTraspaso" style = "width:80%;">
                                    <option value="No" selected>No </option>
                                    <option value="Si">Si</option>

                                </select>

                            </div>
                        </div>
                    </div>



                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveTipos_movimientos_inventario"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>
    $(document).on('click', '.btnAddTipos_movimientos_inventario', function (e) {


        $(".form-control").val("");

        $("#idTipos_movimientos_inventario").val("0");

        $("#btnSaveTipos_movimientos_inventario").removeAttr("disabled");

        $("#idEmpresa").val("0");

        $("#tipo").val("ENT");

        $("#esTraspaso").val("No");

        $("#idEmpresa").trigger("change");

    });

    /* 
     * AL hacer click al editar
     */

    $("#idEmpresa").select2();
    $("#tipo").select2();
    $("#esTraspaso").select2();


    $(document).on('click', '.btnEditTipos_movimientos_inventario', function (e) {


        var idTipos_movimientos_inventario = $(this).attr("idTipos_movimientos_inventario");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idTipos_movimientos_inventario").val(idTipos_movimientos_inventario);
        $("#btnGuardarTipos_movimientos_inventario").removeAttr("disabled");

    });
</script>


<?= $this->endSection() ?>