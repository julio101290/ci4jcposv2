<!-- Modal Storages -->
<div class="modal fade" id="modalAddStorages" tabindex="-1" role="dialog" aria-labelledby="modalAddStorages" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('storages.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-storages" class="form-horizontal">
                    <input type="hidden" id="idStorages" name="idStorages" value="0">

                    <div class="form-group row">
                        <label for="idEmpresaStorage" class="col-sm-2 col-form-label">Empresa</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control idEmpresa form-controlProducts" name="idEmpresaStorage" id="idEmpresaStorage" style="width:80%;">

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
                        <label for="code" class="col-sm-2 col-form-label"><?= lang('storages.fields.code') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="code" id="code" class="form-control <?= session('error.code') ? 'is-invalid' : '' ?>" value="<?= old('code') ?>" placeholder="<?= lang('storages.fields.code') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label"><?= lang('storages.fields.name') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control <?= session('error.name') ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" placeholder="<?= lang('storages.fields.name') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" hidden>
                        <label for="type" class="col-sm-2 col-form-label"><?= lang('storages.fields.type') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="type" id="type" class="form-control <?= session('error.type') ? 'is-invalid' : '' ?>" value="<?= old('type') ?>" placeholder="<?= lang('storages.fields.type') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" hidden>
                        <label for="brachoffice" class="col-sm-2 col-form-label"><?= lang('storages.fields.brachoffice') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <select type="text" name="brachoffice" id="brachoffice" class="form-control <?= session('error.brachoffice') ? 'is-invalid' : '' ?>" value="<?= old('brachoffice') ?>" placeholder="<?= lang('storages.fields.brachoffice') ?>" autocomplete="off">
                                    <?php
                                    foreach ($sucursales as $key => $value) {

                                        echo "<option value='$value[id]'>$value[key] - $value[name]</option>";
                                    }


                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" hidden>
                        <label for="company" class="col-sm-2 col-form-label"><?= lang('storages.fields.company') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="company" id="company" class="form-control <?= session('error.company') ? 'is-invalid' : '' ?>" value="<?= old('company') ?>" placeholder="<?= lang('storages.fields.company') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" hidden>
                        <label for="costCenter" class="col-sm-2 col-form-label"><?= lang('storages.fields.costCenter') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="costCenter" id="costCenter" class="form-control <?= session('error.costCenter') ? 'is-invalid' : '' ?>" value="<?= old('costCenter') ?>" placeholder="<?= lang('storages.fields.costCenter') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" hidden>
                        <label for="exist" class="col-sm-2 col-form-label"><?= lang('storages.fields.exist') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="exist" id="exist" class="form-control <?= session('error.exist') ? 'is-invalid' : '' ?>" value="<?= old('exist') ?>" placeholder="<?= lang('storages.fields.exist') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" hidden>
                        <label for="list" class="col-sm-2 col-form-label"><?= lang('storages.fields.list') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="list" id="list" class="form-control <?= session('error.list') ? 'is-invalid' : '' ?>" value="<?= old('list') ?>" placeholder="<?= lang('storages.fields.list') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" hidden>
                        <label for="main" class="col-sm-2 col-form-label"><?= lang('storages.fields.main') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="main" id="main" class="form-control <?= session('error.main') ? 'is-invalid' : '' ?>" value="<?= old('main') ?>" placeholder="<?= lang('storages.fields.main') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                    <div class="form-group row" >
                        <label for="main" class="col-sm-2 col-form-label">Inicio Inventario</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="date" name="inicioInventario" id="inicioInventario" class="form-control <?= session('error.main') ? 'is-invalid' : '' ?>" value="<?= $fecha ?>" placeholder="Inicio Inventario" autocomplete="off">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveStorages"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>
    $("#idEmpresa").select2();
    $("#idEmpresa").trigger("change");


    $(document).on('click', '.btnAddStorages', function(e) {



        var idEmpresa = $("#idEmpresaStorage").val();
        $(".form-control").val("");

        $("#idStorages").val("0");

        $("#btnSaveStorages").removeAttr("disabled");

        $("#idEmpresaStorage").val(idEmpresa);
        $("#idEmpresaStorage").trigger("change");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditStorages', function(e) {


        var idStorages = $(this).attr("idStorages");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idStorages").val(idStorages);
        $("#btnGuardarStorages").removeAttr("disabled");

    });
</script>


<?= $this->endSection() ?>