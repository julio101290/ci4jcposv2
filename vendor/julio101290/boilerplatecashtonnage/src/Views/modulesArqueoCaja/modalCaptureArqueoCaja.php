<!-- Modal ArqueoCaja -->
<div class="modal fade" id="modalAddArqueoCaja" tabindex="-1" role="dialog" aria-labelledby="modalAddArqueoCaja" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('arqueoCaja.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-arqueoCaja" class="form-horizontal">
                    <input type="hidden" id="idArqueoCaja" name="idArqueoCaja" value="0">

                    <div class="form-group row">
                        <label for="idEmpresa" class="col-sm-2 col-form-label"><?= lang('arqueoCaja.fields.idEmpresa') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <select class="form-control idEmpresa form-controlArqueoCaja" name="idEmpresa" id="idEmpresa" style="width:80%;">
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
                        <label for="idSucursal" class="col-sm-2 col-form-label"><?= lang('arqueoCaja.fields.idSucursal') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>


                                <select id='idSucursal' name='idSucursal' class="idSucursal" style='width: 80%;'>

                                    <?php
                                    if (isset($idSucursal)) {

                                        echo "   <option value='$idSucursal'>$idSucursal - $nombreSucursal</option>";
                                    }
                                    ?>

                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="idUsuarioEntrega" class="col-sm-2 col-form-label"><?= lang('arqueoCaja.fields.idUsuarioEntrega') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <select id='idUsuarioEntrega' name='idUsuarioEntrega' class="idUsuarioEntrega" style='width: 80%;'>



                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="idUsuarioVerifica" class="col-sm-2 col-form-label"><?= lang('arqueoCaja.fields.idUsuarioVerifica') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select id='idUsuarioVerifica' name='idUsuarioVerifica' class="idUsuarioVerifica" style='width: 80%;'>



                                </select>



                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="idUsuarioRecibe" class="col-sm-2 col-form-label"><?= lang('arqueoCaja.fields.idUsuarioRecibe') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>



                                <select id='idUsuarioRecibe' name='idUsuarioRecibe' class="idUsuarioRecibe" style='width: 80%;'>



                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fechaInicial" class="col-sm-2 col-form-label"><?= lang('arqueoCaja.fields.fechaInicial') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="datetime-local" name="fechaInicial" id="fechaInicial" class="form-control <?= session('error.fechaInicial') ? 'is-invalid' : '' ?>" value="<?= old('fechaInicial') ?>" placeholder="<?= lang('arqueoCaja.fields.fechaInicial') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="datetime-local" class="col-sm-2 col-form-label"><?= lang('arqueoCaja.fields.fechaFinal') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="datetime-local" name="fechaFinal" id="fechaFinal" class="form-control <?= session('error.fechaFinal') ? 'is-invalid' : '' ?>" value="<?= old('fechaFinal') ?>" placeholder="<?= lang('arqueoCaja.fields.fechaFinal') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="importeInicial" class="col-sm-2 col-form-label"><?= lang('arqueoCaja.fields.importeInicial') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="importeInicial" id="importeInicial" class="form-control <?= session('error.importeInicial') ? 'is-invalid' : '' ?>" value="<?= old('importeInicial') ?>" placeholder="<?= lang('arqueoCaja.fields.importeInicial') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="importeVentasCredito" class="col-sm-2 col-form-label"><?= lang('arqueoCaja.fields.importeVentasCredito') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="importeVentasCredito" id="importeVentasCredito" class="form-control <?= session('error.importeVentasCredito') ? 'is-invalid' : '' ?>" value="<?= old('importeVentasCredito') ?>" placeholder="<?= lang('arqueoCaja.fields.importeVentasCredito') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="importeVentasContado" class="col-sm-2 col-form-label"><?= lang('arqueoCaja.fields.importeVentasContado') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="importeVentasContado" id="importeVentasContado" class="form-control <?= session('error.importeVentasContado') ? 'is-invalid' : '' ?>" value="<?= old('importeVentasContado') ?>" placeholder="<?= lang('arqueoCaja.fields.importeVentasContado') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="importeEfectivoContadoManual" class="col-sm-2 col-form-label"><?= lang('arqueoCaja.fields.importeEfectivoContadoManual') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="importeEfectivoContadoManual" id="importeEfectivoContadoManual" class="form-control <?= session('error.importeEfectivoContadoManual') ? 'is-invalid' : '' ?>" value="<?= old('importeEfectivoContadoManual') ?>" placeholder="<?= lang('arqueoCaja.fields.importeEfectivoContadoManual') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="observaciones" class="col-sm-2 col-form-label">Observaciones</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="observaciones" id="observaciones" class="form-control <?= session('error.observaciones') ? 'is-invalid' : '' ?>" value="<?= old('observaciones') ?>" placeholder="Observaciones" autocomplete="off">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveArqueoCaja"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $("#idEmpresa").select2();


    // Initialize select2 storages
    $("#idSucursal").select2({
        ajax: {
            url: "<?= site_url('admin/sucursales/getSucursalesAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var idEmpresa = $('.idEmpresa').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                    idEmpresa: idEmpresa // search term
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);

                return {
                    results: response.data
                };
            },
            cache: true
        }
    });



    // Initialize select2 storages
    $("#idUsuarioEntrega").select2({
        ajax: {
            url: "<?= site_url('admin/usuarios/getUsuariosEmpresaAjaxSelect2') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var idEmpresa = $('.idEmpresa').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                    idEmpresa: idEmpresa // search term
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);

                return {
                    results: response.data
                };
            },
            cache: true
        }
    });



    // Initialize select2 storages
    $("#idUsuarioRecibe").select2({
        ajax: {
            url: "<?= site_url('admin/usuarios/getUsuariosEmpresaAjaxSelect2') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var idEmpresa = $('.idEmpresa').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                    idEmpresa: idEmpresa // search term
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);

                return {
                    results: response.data
                };
            },
            cache: true
        }
    });


    // Initialize select2 storages
    $("#idUsuarioVerifica").select2({
        ajax: {
            url: "<?= site_url('admin/usuarios/getUsuariosEmpresaAjaxSelect2') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var idEmpresa = $('.idEmpresa').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                    idEmpresa: idEmpresa // search term
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);

                return {
                    results: response.data
                };
            },
            cache: true
        }
    });




    $(document).on('click', '.btnAddArqueoCaja', function (e) {


        $(".form-control").val("");

        $("#idArqueoCaja").val("0");

        $("#btnSaveArqueoCaja").removeAttr("disabled");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditArqueoCaja', function (e) {


        var idArqueoCaja = $(this).attr("idArqueoCaja");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idArqueoCaja").val(idArqueoCaja);
        $("#btnGuardarArqueoCaja").removeAttr("disabled");

    });




</script>


<?= $this->endSection() ?>
        