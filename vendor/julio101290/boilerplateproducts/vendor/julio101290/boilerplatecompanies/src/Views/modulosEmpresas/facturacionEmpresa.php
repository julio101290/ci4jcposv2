<p>
<h3>Datos Facturación</h3>

<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label"><?= lang('empresas.fields.razonSocial') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="razonSocial" id="razonSocial" class="form-control <?= session('error.razonSocial') ? 'is-invalid' : '' ?>" value="<?= old('razonSocial') ?>" placeholder="<?= lang('empresas.fields.razonSocial') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="codigoPostal" class="col-sm-2 col-form-label"><?= lang('empresas.fields.codigoPostal') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
            </div>
            <input type="text" name="codigoPostal" id="codigoPostal" class="form-control <?= session('error.codigoPostal') ? 'is-invalid' : '' ?>" value="<?= old('codigoPostal') ?>" placeholder="<?= lang('empresas.fields.codigoPostal') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="rfc" class="col-sm-2 col-form-label"><?= lang('empresas.fields.rfc') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
            </div>
            <input type="text" name="rfc" id="rfc" class="form-control <?= session('error.rfc') ? 'is-invalid' : '' ?>" value="<?= old('rfc') ?>" placeholder="<?= lang('empresas.fields.rfc') ?>" autocomplete="off">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="CURP" class="col-sm-2 col-form-label"><?= lang('empresas.fields.CURP') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-id-card"></i></span>
            </div>
            <input type="text" name="CURP" id="CURP" class="form-control <?= session('error.CURP') ? 'is-invalid' : '' ?>" value="<?= old('CURP') ?>" placeholder="<?= lang('empresas.fields.CURP') ?>" autocomplete="off">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="inputSkills" class="col-sm-2 col-form-label"><?= lang('empresas.fields.regimenFiscal') ?></label>
    <div class="col-sm-8">
        <select class="form-control select" name="regimenFiscal" id="regimenFiscal" style="width: 100%;">

            <option value="0"><?= lang('empresas.fields.regimenFiscalOpcion') ?></option>
            <?php
            foreach ($regimenesFiscales as $key => $value) {

                echo '<option value="' . $value->id() . '">' . $value->id() . ' - ' . $value->texto() . '</option>';
            }
            ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="certificado" class="col-sm-2 col-form-label"><?= lang('empresas.fields.certificado') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-award"></i></span>
            </div>
            <input type="file" name="certificado" id="certificado" class="form-control <?= session('error.certificado') ? 'is-invalid' : '' ?>" value="<?= old('certificado') ?>" placeholder="<?= lang('empresas.fields.correoElectronico') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="archivoKey" class="col-sm-2 col-form-label"><?= lang('empresas.fields.archivoKey') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="file" name="archivoKey" id="archivoKey" class="form-control <?= session('error.certificado') ? 'is-invalid' : '' ?>" value="<?= old('archivoKey') ?>" placeholder="<?= lang('empresas.fields.archivoKey') ?>" autocomplete="off">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="contraCertificado" class="col-sm-2 col-form-label"><?= lang('empresas.fields.contraCertificado') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-unlock"></i></span>
            </div>
            <input type="password" name="contraCertificado" id="contraCertificado" class="form-control <?= session('error.contraCertificado') ? 'is-invalid' : '' ?>" value="<?= old('contraCertificado') ?>" placeholder="<?= lang('empresas.fields.contraCertificado') ?>" autocomplete="off">
        </div>
    </div>
</div>



<div class="form-group row">
    <label for="certificado" class="col-sm-2 col-form-label">Certificado CSD</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-award"></i></span>
            </div>
            <input type="file" name="certificadoCSD" id="certificadoCSD" class="form-control <?= session('error.certificadoCSD') ? 'is-invalid' : '' ?>" value="<?= old('certificadoCSD') ?>" placeholder="Certificado CSD" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="archivoKey" class="col-sm-2 col-form-label">Archivo Key CSD</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="file" name="archivoKeyCSD" id="archivoKeyCSD" class="form-control <?= session('error.archivoKeyCSD') ? 'is-invalid' : '' ?>" value="<?= old('archivoKeyCSD') ?>" placeholder="Archivo Key CSD" autocomplete="off">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="contraCertificado" class="col-sm-2 col-form-label">Contraseña CSD</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-unlock"></i></span>
            </div>
            <input type="password" name="contraCertificadoCSD" id="contraCertificadoCSD" class="form-control <?= session('error.contraCertificadoCSD') ? 'is-invalid' : '' ?>" value="<?= old('contraCertificadoCSD') ?>" placeholder="Contra Certificado CSD" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="contraCertificado" class="col-sm-2 col-form-label">Facturacion Republica Dominicana</label>
    <div class="col-sm-10">
        <div class="input-group">

            <input type="checkbox" id="facturacionRD" name="facturacionRD" class="facturacionRD" data-width="250" data-height="40" checked data-toggle="toggle" data-on="Activada" data-off="Desactivada" data-onstyle="success" data-offstyle="danger">
        </div>
    </div>
</div>

</p>