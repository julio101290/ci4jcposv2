<!-- Modal Cartaporte -->
  <div class="modal fade" id="modalAddCartaporte" tabindex="-1" role="dialog" aria-labelledby="modalAddCartaporte" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"><?= lang('cartaporte.createEdit') ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="form-cartaporte" class="form-horizontal">
                      <input type="hidden" id="idCartaporte" name="idCartaporte" value="0">

                                  <div class="form-group row">
                <label for="emitidoRecibido" class="col-sm-2 col-form-label">Empresa</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        </div>

                        <select class="form-control idEmpresa" name="idEmpresa" id="idEmpresa" style = "width:80%;">
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
    <label for="idCustumer" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.idCustumer') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="idCustumer" id="idCustumer" class="form-control <?= session('error.idCustumer') ? 'is-invalid' : '' ?>" value="<?= old('idCustumer') ?>" placeholder="<?= lang('cartaporte.fields.idCustumer') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="folio" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.folio') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="folio" id="folio" class="form-control <?= session('error.folio') ? 'is-invalid' : '' ?>" value="<?= old('folio') ?>" placeholder="<?= lang('cartaporte.fields.folio') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="idUser" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.idUser') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="idUser" id="idUser" class="form-control <?= session('error.idUser') ? 'is-invalid' : '' ?>" value="<?= old('idUser') ?>" placeholder="<?= lang('cartaporte.fields.idUser') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="listProducts" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.listProducts') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="listProducts" id="listProducts" class="form-control <?= session('error.listProducts') ? 'is-invalid' : '' ?>" value="<?= old('listProducts') ?>" placeholder="<?= lang('cartaporte.fields.listProducts') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="taxes" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.taxes') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="taxes" id="taxes" class="form-control <?= session('error.taxes') ? 'is-invalid' : '' ?>" value="<?= old('taxes') ?>" placeholder="<?= lang('cartaporte.fields.taxes') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="IVARetenido" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.IVARetenido') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="IVARetenido" id="IVARetenido" class="form-control <?= session('error.IVARetenido') ? 'is-invalid' : '' ?>" value="<?= old('IVARetenido') ?>" placeholder="<?= lang('cartaporte.fields.IVARetenido') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="ISRRetenido" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.ISRRetenido') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="ISRRetenido" id="ISRRetenido" class="form-control <?= session('error.ISRRetenido') ? 'is-invalid' : '' ?>" value="<?= old('ISRRetenido') ?>" placeholder="<?= lang('cartaporte.fields.ISRRetenido') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="subTotal" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.subTotal') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="subTotal" id="subTotal" class="form-control <?= session('error.subTotal') ? 'is-invalid' : '' ?>" value="<?= old('subTotal') ?>" placeholder="<?= lang('cartaporte.fields.subTotal') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="total" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.total') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="total" id="total" class="form-control <?= session('error.total') ? 'is-invalid' : '' ?>" value="<?= old('total') ?>" placeholder="<?= lang('cartaporte.fields.total') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="balance" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.balance') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="balance" id="balance" class="form-control <?= session('error.balance') ? 'is-invalid' : '' ?>" value="<?= old('balance') ?>" placeholder="<?= lang('cartaporte.fields.balance') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="date" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.date') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="date" id="date" class="form-control <?= session('error.date') ? 'is-invalid' : '' ?>" value="<?= old('date') ?>" placeholder="<?= lang('cartaporte.fields.date') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="dateVen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.dateVen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="dateVen" id="dateVen" class="form-control <?= session('error.dateVen') ? 'is-invalid' : '' ?>" value="<?= old('dateVen') ?>" placeholder="<?= lang('cartaporte.fields.dateVen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="quoteTo" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.quoteTo') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="quoteTo" id="quoteTo" class="form-control <?= session('error.quoteTo') ? 'is-invalid' : '' ?>" value="<?= old('quoteTo') ?>" placeholder="<?= lang('cartaporte.fields.quoteTo') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="delivaryTime" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.delivaryTime') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="delivaryTime" id="delivaryTime" class="form-control <?= session('error.delivaryTime') ? 'is-invalid' : '' ?>" value="<?= old('delivaryTime') ?>" placeholder="<?= lang('cartaporte.fields.delivaryTime') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="generalObservations" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.generalObservations') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="generalObservations" id="generalObservations" class="form-control <?= session('error.generalObservations') ? 'is-invalid' : '' ?>" value="<?= old('generalObservations') ?>" placeholder="<?= lang('cartaporte.fields.generalObservations') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="UUID" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.UUID') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="UUID" id="UUID" class="form-control <?= session('error.UUID') ? 'is-invalid' : '' ?>" value="<?= old('UUID') ?>" placeholder="<?= lang('cartaporte.fields.UUID') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="idQuote" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.idQuote') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="idQuote" id="idQuote" class="form-control <?= session('error.idQuote') ? 'is-invalid' : '' ?>" value="<?= old('idQuote') ?>" placeholder="<?= lang('cartaporte.fields.idQuote') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="tipoComprobanteRD" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.tipoComprobanteRD') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="tipoComprobanteRD" id="tipoComprobanteRD" class="form-control <?= session('error.tipoComprobanteRD') ? 'is-invalid' : '' ?>" value="<?= old('tipoComprobanteRD') ?>" placeholder="<?= lang('cartaporte.fields.tipoComprobanteRD') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="folioCombrobanteRD" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.folioCombrobanteRD') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="folioCombrobanteRD" id="folioCombrobanteRD" class="form-control <?= session('error.folioCombrobanteRD') ? 'is-invalid' : '' ?>" value="<?= old('folioCombrobanteRD') ?>" placeholder="<?= lang('cartaporte.fields.folioCombrobanteRD') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="RFCReceptor" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.RFCReceptor') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="RFCReceptor" id="RFCReceptor" class="form-control <?= session('error.RFCReceptor') ? 'is-invalid' : '' ?>" value="<?= old('RFCReceptor') ?>" placeholder="<?= lang('cartaporte.fields.RFCReceptor') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="usoCFDI" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.usoCFDI') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="usoCFDI" id="usoCFDI" class="form-control <?= session('error.usoCFDI') ? 'is-invalid' : '' ?>" value="<?= old('usoCFDI') ?>" placeholder="<?= lang('cartaporte.fields.usoCFDI') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="metodoPago" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.metodoPago') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="metodoPago" id="metodoPago" class="form-control <?= session('error.metodoPago') ? 'is-invalid' : '' ?>" value="<?= old('metodoPago') ?>" placeholder="<?= lang('cartaporte.fields.metodoPago') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="formaPago" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.formaPago') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="formaPago" id="formaPago" class="form-control <?= session('error.formaPago') ? 'is-invalid' : '' ?>" value="<?= old('formaPago') ?>" placeholder="<?= lang('cartaporte.fields.formaPago') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="razonSocialReceptor" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.razonSocialReceptor') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="razonSocialReceptor" id="razonSocialReceptor" class="form-control <?= session('error.razonSocialReceptor') ? 'is-invalid' : '' ?>" value="<?= old('razonSocialReceptor') ?>" placeholder="<?= lang('cartaporte.fields.razonSocialReceptor') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="codigoPostalReceptor" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.codigoPostalReceptor') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="codigoPostalReceptor" id="codigoPostalReceptor" class="form-control <?= session('error.codigoPostalReceptor') ? 'is-invalid' : '' ?>" value="<?= old('codigoPostalReceptor') ?>" placeholder="<?= lang('cartaporte.fields.codigoPostalReceptor') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="regimenFiscalReceptor" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.regimenFiscalReceptor') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="regimenFiscalReceptor" id="regimenFiscalReceptor" class="form-control <?= session('error.regimenFiscalReceptor') ? 'is-invalid' : '' ?>" value="<?= old('regimenFiscalReceptor') ?>" placeholder="<?= lang('cartaporte.fields.regimenFiscalReceptor') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="idVehiculo" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.idVehiculo') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="idVehiculo" id="idVehiculo" class="form-control <?= session('error.idVehiculo') ? 'is-invalid' : '' ?>" value="<?= old('idVehiculo') ?>" placeholder="<?= lang('cartaporte.fields.idVehiculo') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="idChofer" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.idChofer') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="idChofer" id="idChofer" class="form-control <?= session('error.idChofer') ? 'is-invalid' : '' ?>" value="<?= old('idChofer') ?>" placeholder="<?= lang('cartaporte.fields.idChofer') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="tipoVehiculo" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.tipoVehiculo') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="tipoVehiculo" id="tipoVehiculo" class="form-control <?= session('error.tipoVehiculo') ? 'is-invalid' : '' ?>" value="<?= old('tipoVehiculo') ?>" placeholder="<?= lang('cartaporte.fields.tipoVehiculo') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="idArqueoCaja" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.idArqueoCaja') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="idArqueoCaja" id="idArqueoCaja" class="form-control <?= session('error.idArqueoCaja') ? 'is-invalid' : '' ?>" value="<?= old('idArqueoCaja') ?>" placeholder="<?= lang('cartaporte.fields.idArqueoCaja') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="TranspInternac" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.TranspInternac') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="TranspInternac" id="TranspInternac" class="form-control <?= session('error.TranspInternac') ? 'is-invalid' : '' ?>" value="<?= old('TranspInternac') ?>" placeholder="<?= lang('cartaporte.fields.TranspInternac') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="TotalDistRec" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.TotalDistRec') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="TotalDistRec" id="TotalDistRec" class="form-control <?= session('error.TotalDistRec') ? 'is-invalid' : '' ?>" value="<?= old('TotalDistRec') ?>" placeholder="<?= lang('cartaporte.fields.TotalDistRec') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="IDUbicacionOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.IDUbicacionOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="IDUbicacionOrigen" id="IDUbicacionOrigen" class="form-control <?= session('error.IDUbicacionOrigen') ? 'is-invalid' : '' ?>" value="<?= old('IDUbicacionOrigen') ?>" placeholder="<?= lang('cartaporte.fields.IDUbicacionOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="RFCRemitenteDestinatarioOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.RFCRemitenteDestinatarioOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="RFCRemitenteDestinatarioOrigen" id="RFCRemitenteDestinatarioOrigen" class="form-control <?= session('error.RFCRemitenteDestinatarioOrigen') ? 'is-invalid' : '' ?>" value="<?= old('RFCRemitenteDestinatarioOrigen') ?>" placeholder="<?= lang('cartaporte.fields.RFCRemitenteDestinatarioOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="FechaHoraSalidaLlegadaOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.FechaHoraSalidaLlegadaOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="FechaHoraSalidaLlegadaOrigen" id="FechaHoraSalidaLlegadaOrigen" class="form-control <?= session('error.FechaHoraSalidaLlegadaOrigen') ? 'is-invalid' : '' ?>" value="<?= old('FechaHoraSalidaLlegadaOrigen') ?>" placeholder="<?= lang('cartaporte.fields.FechaHoraSalidaLlegadaOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="DistanciaRecorridaOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.DistanciaRecorridaOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="DistanciaRecorridaOrigen" id="DistanciaRecorridaOrigen" class="form-control <?= session('error.DistanciaRecorridaOrigen') ? 'is-invalid' : '' ?>" value="<?= old('DistanciaRecorridaOrigen') ?>" placeholder="<?= lang('cartaporte.fields.DistanciaRecorridaOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="LocalidadOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.LocalidadOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="LocalidadOrigen" id="LocalidadOrigen" class="form-control <?= session('error.LocalidadOrigen') ? 'is-invalid' : '' ?>" value="<?= old('LocalidadOrigen') ?>" placeholder="<?= lang('cartaporte.fields.LocalidadOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="ReferenciaOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.ReferenciaOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="ReferenciaOrigen" id="ReferenciaOrigen" class="form-control <?= session('error.ReferenciaOrigen') ? 'is-invalid' : '' ?>" value="<?= old('ReferenciaOrigen') ?>" placeholder="<?= lang('cartaporte.fields.ReferenciaOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="MunicipioOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.MunicipioOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="MunicipioOrigen" id="MunicipioOrigen" class="form-control <?= session('error.MunicipioOrigen') ? 'is-invalid' : '' ?>" value="<?= old('MunicipioOrigen') ?>" placeholder="<?= lang('cartaporte.fields.MunicipioOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="EstadoOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.EstadoOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="EstadoOrigen" id="EstadoOrigen" class="form-control <?= session('error.EstadoOrigen') ? 'is-invalid' : '' ?>" value="<?= old('EstadoOrigen') ?>" placeholder="<?= lang('cartaporte.fields.EstadoOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="PaisOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.PaisOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="PaisOrigen" id="PaisOrigen" class="form-control <?= session('error.PaisOrigen') ? 'is-invalid' : '' ?>" value="<?= old('PaisOrigen') ?>" placeholder="<?= lang('cartaporte.fields.PaisOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="CodigoPostalOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.CodigoPostalOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="CodigoPostalOrigen" id="CodigoPostalOrigen" class="form-control <?= session('error.CodigoPostalOrigen') ? 'is-invalid' : '' ?>" value="<?= old('CodigoPostalOrigen') ?>" placeholder="<?= lang('cartaporte.fields.CodigoPostalOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="IDUbicacionDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.IDUbicacionDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="IDUbicacionDestino" id="IDUbicacionDestino" class="form-control <?= session('error.IDUbicacionDestino') ? 'is-invalid' : '' ?>" value="<?= old('IDUbicacionDestino') ?>" placeholder="<?= lang('cartaporte.fields.IDUbicacionDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="RFCRemitenteDestinatarioDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.RFCRemitenteDestinatarioDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="RFCRemitenteDestinatarioDestino" id="RFCRemitenteDestinatarioDestino" class="form-control <?= session('error.RFCRemitenteDestinatarioDestino') ? 'is-invalid' : '' ?>" value="<?= old('RFCRemitenteDestinatarioDestino') ?>" placeholder="<?= lang('cartaporte.fields.RFCRemitenteDestinatarioDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="FechaHoraSalidaLlegadaDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.FechaHoraSalidaLlegadaDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="FechaHoraSalidaLlegadaDestino" id="FechaHoraSalidaLlegadaDestino" class="form-control <?= session('error.FechaHoraSalidaLlegadaDestino') ? 'is-invalid' : '' ?>" value="<?= old('FechaHoraSalidaLlegadaDestino') ?>" placeholder="<?= lang('cartaporte.fields.FechaHoraSalidaLlegadaDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="DistanciaRecorridaDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.DistanciaRecorridaDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="DistanciaRecorridaDestino" id="DistanciaRecorridaDestino" class="form-control <?= session('error.DistanciaRecorridaDestino') ? 'is-invalid' : '' ?>" value="<?= old('DistanciaRecorridaDestino') ?>" placeholder="<?= lang('cartaporte.fields.DistanciaRecorridaDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="LocalidadDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.LocalidadDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="LocalidadDestino" id="LocalidadDestino" class="form-control <?= session('error.LocalidadDestino') ? 'is-invalid' : '' ?>" value="<?= old('LocalidadDestino') ?>" placeholder="<?= lang('cartaporte.fields.LocalidadDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="ReferenciaDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.ReferenciaDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="ReferenciaDestino" id="ReferenciaDestino" class="form-control <?= session('error.ReferenciaDestino') ? 'is-invalid' : '' ?>" value="<?= old('ReferenciaDestino') ?>" placeholder="<?= lang('cartaporte.fields.ReferenciaDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="MunicipioDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.MunicipioDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="MunicipioDestino" id="MunicipioDestino" class="form-control <?= session('error.MunicipioDestino') ? 'is-invalid' : '' ?>" value="<?= old('MunicipioDestino') ?>" placeholder="<?= lang('cartaporte.fields.MunicipioDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="EstadoDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.EstadoDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="EstadoDestino" id="EstadoDestino" class="form-control <?= session('error.EstadoDestino') ? 'is-invalid' : '' ?>" value="<?= old('EstadoDestino') ?>" placeholder="<?= lang('cartaporte.fields.EstadoDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="PaisDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.PaisDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="PaisDestino" id="PaisDestino" class="form-control <?= session('error.PaisDestino') ? 'is-invalid' : '' ?>" value="<?= old('PaisDestino') ?>" placeholder="<?= lang('cartaporte.fields.PaisDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="CodigoPostalDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.CodigoPostalDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="CodigoPostalDestino" id="CodigoPostalDestino" class="form-control <?= session('error.CodigoPostalDestino') ? 'is-invalid' : '' ?>" value="<?= old('CodigoPostalDestino') ?>" placeholder="<?= lang('cartaporte.fields.CodigoPostalDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="PesoBrutoTotal" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.PesoBrutoTotal') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="PesoBrutoTotal" id="PesoBrutoTotal" class="form-control <?= session('error.PesoBrutoTotal') ? 'is-invalid' : '' ?>" value="<?= old('PesoBrutoTotal') ?>" placeholder="<?= lang('cartaporte.fields.PesoBrutoTotal') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="UnidadPeso" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.UnidadPeso') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="UnidadPeso" id="UnidadPeso" class="form-control <?= session('error.UnidadPeso') ? 'is-invalid' : '' ?>" value="<?= old('UnidadPeso') ?>" placeholder="<?= lang('cartaporte.fields.UnidadPeso') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="NumTotalMercancias" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.NumTotalMercancias') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="NumTotalMercancias" id="NumTotalMercancias" class="form-control <?= session('error.NumTotalMercancias') ? 'is-invalid' : '' ?>" value="<?= old('NumTotalMercancias') ?>" placeholder="<?= lang('cartaporte.fields.NumTotalMercancias') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="TipoFigura" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.TipoFigura') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="TipoFigura" id="TipoFigura" class="form-control <?= session('error.TipoFigura') ? 'is-invalid' : '' ?>" value="<?= old('TipoFigura') ?>" placeholder="<?= lang('cartaporte.fields.TipoFigura') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="RFCFigura" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.RFCFigura') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="RFCFigura" id="RFCFigura" class="form-control <?= session('error.RFCFigura') ? 'is-invalid' : '' ?>" value="<?= old('RFCFigura') ?>" placeholder="<?= lang('cartaporte.fields.RFCFigura') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="NumLicencia" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.NumLicencia') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="NumLicencia" id="NumLicencia" class="form-control <?= session('error.NumLicencia') ? 'is-invalid' : '' ?>" value="<?= old('NumLicencia') ?>" placeholder="<?= lang('cartaporte.fields.NumLicencia') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="NombreFigura" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.NombreFigura') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="NombreFigura" id="NombreFigura" class="form-control <?= session('error.NombreFigura') ? 'is-invalid' : '' ?>" value="<?= old('NombreFigura') ?>" placeholder="<?= lang('cartaporte.fields.NombreFigura') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="MunicipioFigura" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.MunicipioFigura') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="MunicipioFigura" id="MunicipioFigura" class="form-control <?= session('error.MunicipioFigura') ? 'is-invalid' : '' ?>" value="<?= old('MunicipioFigura') ?>" placeholder="<?= lang('cartaporte.fields.MunicipioFigura') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="EstadoFigura" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.EstadoFigura') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="EstadoFigura" id="EstadoFigura" class="form-control <?= session('error.EstadoFigura') ? 'is-invalid' : '' ?>" value="<?= old('EstadoFigura') ?>" placeholder="<?= lang('cartaporte.fields.EstadoFigura') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="PaisFigura" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.PaisFigura') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="PaisFigura" id="PaisFigura" class="form-control <?= session('error.PaisFigura') ? 'is-invalid' : '' ?>" value="<?= old('PaisFigura') ?>" placeholder="<?= lang('cartaporte.fields.PaisFigura') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="CodigoPostalFigura" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.CodigoPostalFigura') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="CodigoPostalFigura" id="CodigoPostalFigura" class="form-control <?= session('error.CodigoPostalFigura') ? 'is-invalid' : '' ?>" value="<?= old('CodigoPostalFigura') ?>" placeholder="<?= lang('cartaporte.fields.CodigoPostalFigura') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="PermSCT" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.PermSCT') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="PermSCT" id="PermSCT" class="form-control <?= session('error.PermSCT') ? 'is-invalid' : '' ?>" value="<?= old('PermSCT') ?>" placeholder="<?= lang('cartaporte.fields.PermSCT') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="NumPermisoSCT" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.NumPermisoSCT') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="NumPermisoSCT" id="NumPermisoSCT" class="form-control <?= session('error.NumPermisoSCT') ? 'is-invalid' : '' ?>" value="<?= old('NumPermisoSCT') ?>" placeholder="<?= lang('cartaporte.fields.NumPermisoSCT') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="ConfigVehicular" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.ConfigVehicular') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="ConfigVehicular" id="ConfigVehicular" class="form-control <?= session('error.ConfigVehicular') ? 'is-invalid' : '' ?>" value="<?= old('ConfigVehicular') ?>" placeholder="<?= lang('cartaporte.fields.ConfigVehicular') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="PesoBrutoVehicular" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.PesoBrutoVehicular') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="PesoBrutoVehicular" id="PesoBrutoVehicular" class="form-control <?= session('error.PesoBrutoVehicular') ? 'is-invalid' : '' ?>" value="<?= old('PesoBrutoVehicular') ?>" placeholder="<?= lang('cartaporte.fields.PesoBrutoVehicular') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="PlacaVM" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.PlacaVM') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="PlacaVM" id="PlacaVM" class="form-control <?= session('error.PlacaVM') ? 'is-invalid' : '' ?>" value="<?= old('PlacaVM') ?>" placeholder="<?= lang('cartaporte.fields.PlacaVM') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="AnioModeloVM" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.AnioModeloVM') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="AnioModeloVM" id="AnioModeloVM" class="form-control <?= session('error.AnioModeloVM') ? 'is-invalid' : '' ?>" value="<?= old('AnioModeloVM') ?>" placeholder="<?= lang('cartaporte.fields.AnioModeloVM') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="AseguraRespCivil" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.AseguraRespCivil') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="AseguraRespCivil" id="AseguraRespCivil" class="form-control <?= session('error.AseguraRespCivil') ? 'is-invalid' : '' ?>" value="<?= old('AseguraRespCivil') ?>" placeholder="<?= lang('cartaporte.fields.AseguraRespCivil') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="PolizaRespCivil" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.PolizaRespCivil') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="PolizaRespCivil" id="PolizaRespCivil" class="form-control <?= session('error.PolizaRespCivil') ? 'is-invalid' : '' ?>" value="<?= old('PolizaRespCivil') ?>" placeholder="<?= lang('cartaporte.fields.PolizaRespCivil') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="SubTipoRem" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.SubTipoRem') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="SubTipoRem" id="SubTipoRem" class="form-control <?= session('error.SubTipoRem') ? 'is-invalid' : '' ?>" value="<?= old('SubTipoRem') ?>" placeholder="<?= lang('cartaporte.fields.SubTipoRem') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="PlacaSubTipoRemolque" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.PlacaSubTipoRemolque') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="PlacaSubTipoRemolque" id="PlacaSubTipoRemolque" class="form-control <?= session('error.PlacaSubTipoRemolque') ? 'is-invalid' : '' ?>" value="<?= old('PlacaSubTipoRemolque') ?>" placeholder="<?= lang('cartaporte.fields.PlacaSubTipoRemolque') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="ColoniaOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.ColoniaOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="ColoniaOrigen" id="ColoniaOrigen" class="form-control <?= session('error.ColoniaOrigen') ? 'is-invalid' : '' ?>" value="<?= old('ColoniaOrigen') ?>" placeholder="<?= lang('cartaporte.fields.ColoniaOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="CalleOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.CalleOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="CalleOrigen" id="CalleOrigen" class="form-control <?= session('error.CalleOrigen') ? 'is-invalid' : '' ?>" value="<?= old('CalleOrigen') ?>" placeholder="<?= lang('cartaporte.fields.CalleOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="numInteriorOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.numInteriorOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="numInteriorOrigen" id="numInteriorOrigen" class="form-control <?= session('error.numInteriorOrigen') ? 'is-invalid' : '' ?>" value="<?= old('numInteriorOrigen') ?>" placeholder="<?= lang('cartaporte.fields.numInteriorOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="coloniaDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.coloniaDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="coloniaDestino" id="coloniaDestino" class="form-control <?= session('error.coloniaDestino') ? 'is-invalid' : '' ?>" value="<?= old('coloniaDestino') ?>" placeholder="<?= lang('cartaporte.fields.coloniaDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="calleDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.calleDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="calleDestino" id="calleDestino" class="form-control <?= session('error.calleDestino') ? 'is-invalid' : '' ?>" value="<?= old('calleDestino') ?>" placeholder="<?= lang('cartaporte.fields.calleDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="numInteriorDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.numInteriorDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="numInteriorDestino" id="numInteriorDestino" class="form-control <?= session('error.numInteriorDestino') ? 'is-invalid' : '' ?>" value="<?= old('numInteriorDestino') ?>" placeholder="<?= lang('cartaporte.fields.numInteriorDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="nombreRazonSocialUbicacionOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.nombreRazonSocialUbicacionOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="nombreRazonSocialUbicacionOrigen" id="nombreRazonSocialUbicacionOrigen" class="form-control <?= session('error.nombreRazonSocialUbicacionOrigen') ? 'is-invalid' : '' ?>" value="<?= old('nombreRazonSocialUbicacionOrigen') ?>" placeholder="<?= lang('cartaporte.fields.nombreRazonSocialUbicacionOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="nombreRazonSocialUbicacionDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.nombreRazonSocialUbicacionDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="nombreRazonSocialUbicacionDestino" id="nombreRazonSocialUbicacionDestino" class="form-control <?= session('error.nombreRazonSocialUbicacionDestino') ? 'is-invalid' : '' ?>" value="<?= old('nombreRazonSocialUbicacionDestino') ?>" placeholder="<?= lang('cartaporte.fields.nombreRazonSocialUbicacionDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="listMercancias" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.listMercancias') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="listMercancias" id="listMercancias" class="form-control <?= session('error.listMercancias') ? 'is-invalid' : '' ?>" value="<?= old('listMercancias') ?>" placeholder="<?= lang('cartaporte.fields.listMercancias') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="remolqueCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.remolqueCartaPorte') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="remolqueCartaPorte" id="remolqueCartaPorte" class="form-control <?= session('error.remolqueCartaPorte') ? 'is-invalid' : '' ?>" value="<?= old('remolqueCartaPorte') ?>" placeholder="<?= lang('cartaporte.fields.remolqueCartaPorte') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="numExteriorOrigen" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.numExteriorOrigen') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="numExteriorOrigen" id="numExteriorOrigen" class="form-control <?= session('error.numExteriorOrigen') ? 'is-invalid' : '' ?>" value="<?= old('numExteriorOrigen') ?>" placeholder="<?= lang('cartaporte.fields.numExteriorOrigen') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="numExteriorDestino" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.numExteriorDestino') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="numExteriorDestino" id="numExteriorDestino" class="form-control <?= session('error.numExteriorDestino') ? 'is-invalid' : '' ?>" value="<?= old('numExteriorDestino') ?>" placeholder="<?= lang('cartaporte.fields.numExteriorDestino') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="apellidoFigura" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.apellidoFigura') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="apellidoFigura" id="apellidoFigura" class="form-control <?= session('error.apellidoFigura') ? 'is-invalid' : '' ?>" value="<?= old('apellidoFigura') ?>" placeholder="<?= lang('cartaporte.fields.apellidoFigura') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="AseguraMedAmbiente" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.AseguraMedAmbiente') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="AseguraMedAmbiente" id="AseguraMedAmbiente" class="form-control <?= session('error.AseguraMedAmbiente') ? 'is-invalid' : '' ?>" value="<?= old('AseguraMedAmbiente') ?>" placeholder="<?= lang('cartaporte.fields.AseguraMedAmbiente') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="PolizaMedAmbiente" class="col-sm-2 col-form-label"><?= lang('cartaporte.fields.PolizaMedAmbiente') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="PolizaMedAmbiente" id="PolizaMedAmbiente" class="form-control <?= session('error.PolizaMedAmbiente') ? 'is-invalid' : '' ?>" value="<?= old('PolizaMedAmbiente') ?>" placeholder="<?= lang('cartaporte.fields.PolizaMedAmbiente') ?>" autocomplete="off">
        </div>
    </div>
</div>

        
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                  <button type="button" class="btn btn-primary btn-sm" id="btnSaveCartaporte"><?= lang('boilerplate.global.save') ?></button>
              </div>
          </div>
      </div>
  </div>

  <?= $this->section('js') ?>


  <script>

      $(document).on('click', '.btnAddCartaporte', function (e) {


          $(".form-control").val("");

          $("#idCartaporte").val("0");

          $("#btnSaveCartaporte").removeAttr("disabled");

      });

      /* 
       * AL hacer click al editar
       */



      $(document).on('click', '.btnEditCartaporte', function (e) {


          var idCartaporte = $(this).attr("idCartaporte");

          //LIMPIAMOS CONTROLES
          $(".form-control").val("");

          $("#idCartaporte").val(idCartaporte);
          $("#btnGuardarCartaporte").removeAttr("disabled");

      });


    $("#idEmpresa").select2();

  </script>


  <?= $this->endSection() ?>
        