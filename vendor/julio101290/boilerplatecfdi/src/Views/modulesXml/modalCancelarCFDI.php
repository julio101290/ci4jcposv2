<!-- Modal Vehicles -->
<div class="modal fade" id="modalCancelaCFDI" tabindex="-1" role="dialog" aria-labelledby="modalCancelaCFDI" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cancelar CFDI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-paciente" class="form-horizontal">


                    <div class="form-group row">
                        <label for="tireType" class="col-sm-2 col-form-label">UUID A Cancelar</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text"  name="uuidACancelar" disabled id="uuidACancelar" class="form-control <?= session('error.uuidACancelar') ? 'is-invalid' : '' ?>" value="" placeholder="UUID A Cancelar" autocomplete="off">

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="metodoPago" class="col-sm-2 col-form-label">Motivo Cancelación</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control metodoPago" name="motivoCancelacion" id="motivoCancelacion" style="width:80%;">
                                    <option value="01"> 01 Comprobantes emitidos con errores con relación</option>
                                    <option value="02"> 02 Comprobantes emitidos con errores sin relación</option>
                                    <option value="03"> 03 No se llevó a cabo la operación</option>
                                    <option value="04"> 04 Operación nominativa relacionada en una factura global</option>


                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Observaciones</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text"  name="observacionesCancelacion" id="observacionesCancelacion" class="form-control <?= session('error.observacionesCancelacion') ? 'is-invalid' : '' ?>" value="" placeholder="observacionesCancelacion" autocomplete="off">
                               

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tireType" class="col-sm-2 col-form-label">UUID Relacionado</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text"  name="uuidRelacionado" id="uuidRelacionado" class="form-control <?= session('error.uuidRelacionado') ? 'is-invalid' : '' ?>" value="" placeholder="UUID Relacionado" autocomplete="off">

                            </div>
                        </div>
                    </div>




                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm btnCancelarTimbre" id="btnSavePayment">Cancelar Timbre</button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>




</script>


<?= $this->endSection() ?>