<!-- Modal Seriesfacturaelectronica -->
<div class="modal fade" id="modalAddSeriesfacturaelectronica" tabindex="-1" role="dialog" aria-labelledby="modalAddSeriesfacturaelectronica" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('seriesfacturaelectronica.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-seriesfacturaelectronica" class="form-horizontal">
                    <input type="hidden" id="idSeriesfacturaelectronica" name="idSeriesfacturaelectronica" value="0">

                    <div class="form-group row">
                        <label for="emitidoRecibido" class="col-sm-2 col-form-label">Empresa</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control empresa" name="empresa" id="empresa" style = "width:80%;">
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
                        <label for="sucursal" class="col-sm-2 col-form-label">Sucursal</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control sucursal" name="sucursal" id="sucursal" style = "width:80%;">
                                    <option value="0">Seleccione sucursal</option>


                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="sucursal" class="col-sm-2 col-form-label">Tipo Serie</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control tipoSerie" name="tipoSerie" id="tipoSerie" style = "width:80%;">
                                    <option value="ven">Venta</option>
                                    <option value="pag">Pago</option>
                                    <option value="dev">Devolución</option>
                                    <option value="bon">Bonificaciónn</option>
                                    <option value="tra">Traslado</option>

                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="desdeFecha" class="col-sm-2 col-form-label"><?= lang('seriesfacturaelectronica.fields.desdeFecha') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="date" name="desdeFecha" id="desdeFecha" class="form-control <?= session('error.desdeFecha') ? 'is-invalid' : '' ?>" value="<?= old('desdeFecha') ?>" placeholder="<?= lang('seriesfacturaelectronica.fields.desdeFecha') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hastaFecha" class="col-sm-2 col-form-label"><?= lang('seriesfacturaelectronica.fields.hastaFecha') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="date" name="hastaFecha" id="hastaFecha" class="form-control <?= session('error.hastaFecha') ? 'is-invalid' : '' ?>" value="<?= old('hastaFecha') ?>" placeholder="<?= lang('seriesfacturaelectronica.fields.hastaFecha') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="serie" class="col-sm-2 col-form-label">Serie</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="serie" id="serie" class="form-control <?= session('error.serie') ? 'is-invalid' : '' ?>" value="<?= old('desdeFolio') ?>" placeholder="Inserte serie" autocomplete="off">
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="desdeFolio" class="col-sm-2 col-form-label"><?= lang('seriesfacturaelectronica.fields.desdeFolio') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="number" name="desdeFolio" id="desdeFolio" class="form-control <?= session('error.desdeFolio') ? 'is-invalid' : '' ?>" value="<?= old('desdeFolio') ?>" placeholder="<?= lang('seriesfacturaelectronica.fields.desdeFolio') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hastaFolio" class="col-sm-2 col-form-label">Hasta Folio</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="number" name="hastaFolio" id="hastaFolio" class="form-control <?= session('error.desdeFolio') ? 'is-invalid' : '' ?>" value="<?= old('hastaFolio') ?>" placeholder="Hasta Folio" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ambienteTimbrado" class="col-sm-2 col-form-label"><?= lang('seriesfacturaelectronica.fields.ambienteTimbrado') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="checkbox" name="ambienteTimbrado" id="ambienteTimbrado" class="form-control " autocomplete="off" data-width="250" data-height="40" checked data-toggle="toggle" data-on="produccion" data-off="pruebas" data-onstyle="success" data-offstyle="danger">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tokenPruebas" class="col-sm-2 col-form-label"><?= lang('seriesfacturaelectronica.fields.tokenPruebas') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="tokenPruebas" id="tokenPruebas" class="form-control <?= session('error.tokenPruebas') ? 'is-invalid' : '' ?>" value="<?= old('tokenPruebas') ?>" placeholder="<?= lang('seriesfacturaelectronica.fields.tokenPruebas') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tokenProduccion" class="col-sm-2 col-form-label"><?= lang('seriesfacturaelectronica.fields.tokenProduccion') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="tokenProduccion" id="tokenProduccion" class="form-control <?= session('error.tokenProduccion') ? 'is-invalid' : '' ?>" value="<?= old('tokenProduccion') ?>" placeholder="<?= lang('seriesfacturaelectronica.fields.tokenProduccion') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveSeriesfacturaelectronica"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddSeriesfacturaelectronica', function (e) {


        $(".form-control").val("");

        $("#idSeriesfacturaelectronica").val("0");

        $("#empresa").val("0");
        $("#empresa").trigger("change");

        $("#ambienteTimbrado").bootstrapToggle("off");

        $("#btnSaveSeriesfacturaelectronica").removeAttr("disabled");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditSeriesfacturaelectronica', function (e) {


        var idSeriesfacturaelectronica = $(this).attr("idSeriesfacturaelectronica");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idSeriesfacturaelectronica").val(idSeriesfacturaelectronica);
        $("#btnGuardarSeriesfacturaelectronica").removeAttr("disabled");

    });


    $("#empresa").select2();

    $("#empresa").trigger("change");



    $("#sucursal").select2({
        ajax: {
            url: "<?= site_url('admin/sucursales/getSucursalesAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var idEmpresa = $('.empresa').val(); // CSRF hash

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

</script>


<?= $this->endSection() ?>
        