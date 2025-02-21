<!-- Modal Comprobantes_rd -->
<div class="modal fade" id="modalAddComprobantes_rd" tabindex="-1" role="dialog" aria-labelledby="modalAddComprobantes_rd" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <?= lang('comprobantes_rd.createEdit') ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-comprobantes_rd" class="form-horizontal">
                    <input type="hidden" id="idComprobantes_rd" name="idComprobantes_rd" value="0">

                    <div class="form-group row">
                        <label for="idEmpresa" class="col-sm-2 col-form-label">
                            <?= lang('comprobantes_rd.fields.idEmpresa') ?>
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <select class="form-control idEmpresa form-control" name="idEmpresa" id="idEmpresa" style="width:80%;">
                                    <option value="0" selected>Seleccione empresa</option>
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
                        <label for="tipoDocumento" class="col-sm-2 col-form-label">
                            <?= lang('comprobantes_rd.fields.tipoDocumento') ?>
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>



                                <select class="form-control tipoDocumento form-control" name="tipoDocumento" id="tipoDocumento" style="width:80%;">
                                    <option value="CF">Credito Fiscal</option>

                                    <option value="COF">Consumidor Final</option>


                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prefijo" class="col-sm-2 col-form-label">
                            <?= lang('comprobantes_rd.fields.prefijo') ?>
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="prefijo" id="prefijo" class="form-control <?= session('error.prefijo') ? 'is-invalid' : '' ?>" value="<?= old('prefijo') ?>" placeholder="<?= lang('comprobantes_rd.fields.prefijo') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">
                            <?= lang('comprobantes_rd.fields.nombre') ?>
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="nombre" id="nombre" class="form-control <?= session('error.nombre') ? 'is-invalid' : '' ?>" value="<?= old('nombre') ?>" placeholder="<?= lang('comprobantes_rd.fields.nombre') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="folioInicial" class="col-sm-2 col-form-label">
                            <?= lang('comprobantes_rd.fields.folioInicial') ?>
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="number" name="folioInicial" id="folioInicial" class="form-control <?= session('error.folioInicial') ? 'is-invalid' : '' ?>" value="<?= old('folioInicial') ?>" placeholder="<?= lang('comprobantes_rd.fields.folioInicial') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="folioFinal" class="col-sm-2 col-form-label">
                            <?= lang('comprobantes_rd.fields.folioFinal') ?>
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="number" name="folioFinal" id="folioFinal" class="form-control <?= session('error.folioFinal') ? 'is-invalid' : '' ?>" value="<?= old('folioFinal') ?>" placeholder="<?= lang('comprobantes_rd.fields.folioFinal') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="folioFinal" class="col-sm-2 col-form-label">
                           Folio Actual
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="number" name="folioActual" id="folioActual" class="form-control <?= session('error.folioActual') ? 'is-invalid' : '' ?>" value="<?= old('folioActual') ?>" placeholder="Folio Actual" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="desdeFecha" class="col-sm-2 col-form-label">
                            <?= lang('comprobantes_rd.fields.desdeFecha') ?>
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="date" name="desdeFecha" id="desdeFecha" class="form-control <?= session('error.desdeFecha') ? 'is-invalid' : '' ?>" value="<?= old('desdeFecha') ?>" placeholder="<?= lang('comprobantes_rd.fields.desdeFecha') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hastaFecha" class="col-sm-2 col-form-label">
                            <?= lang('comprobantes_rd.fields.hastaFecha') ?>
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="date" name="hastaFecha" id="hastaFecha" class="form-control <?= session('error.hastaFecha') ? 'is-invalid' : '' ?>" value="<?= old('hastaFecha') ?>" placeholder="<?= lang('comprobantes_rd.fields.hastaFecha') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <?= lang('boilerplate.global.close') ?>
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveComprobantes_rd">
                    <?= lang('boilerplate.global.save') ?>
                </button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>
    $("#idEmpresa").select2();
    $("#tipoDocumento").select2();

    $(document).on('click', '.btnAddComprobantes_rd', function(e) {


        $(".form-control").val("");

        $("#idComprobantes_rd").val("0");

        $("#btnSaveComprobantes_rd").removeAttr("disabled");

        $("#idEmpresa").val("0");

        $("#idEmpresa").trigger("change");


    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditComprobantes_rd', function(e) {


        var idComprobantes_rd = $(this).attr("idComprobantes_rd");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idComprobantes_rd").val(idComprobantes_rd);
        $("#btnGuardarComprobantes_rd").removeAttr("disabled");

    });
</script>


<?= $this->endSection() ?>