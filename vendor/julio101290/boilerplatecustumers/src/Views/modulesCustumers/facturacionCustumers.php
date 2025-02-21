<p>
<h3>Facturación MX</h3>


<div class="form-group row">
    <label for="razonSocial" class="col-sm-2 col-form-label">
       Razón Social
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="razonSocial" id="razonSocial" class="form-control form-controlCustumers <?= session('error.direction') ? 'is-invalid' : '' ?>" value="<?= old('razonSocial') ?>" placeholder="Razón Social" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="taxID" class="col-sm-2 col-form-label">
        <?= lang('custumers.fields.taxID') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="taxID" id="taxID" class="form-control form-controlCustumers<?= session('error.taxID') ? 'is-invalid' : '' ?>" value="<?= old('taxID') ?>" placeholder="<?= lang('custumers.fields.taxID') ?>" autocomplete="off">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="formaPago" class="col-sm-2 col-form-label">Forma de pago</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control formaPago form-controlCustumers" name="formaPago" id="formaPago" style="width:80%;">
                <option value="0">Seleccione forma pago</option>
                <?php

                foreach ($formaPago as $key => $value) {

                    echo "<option value='".$value->id()."'>".$value->id()." - ". $value->texto();
                }

                ?>

            </select>

        </div>
    </div>
</div>


<div class="form-group row">
    <label for="metodoPago" class="col-sm-2 col-form-label">Método de Pago</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control metodoPago form-controlCustumers" name="metodoPago" id="metodoPago" style="width:80%;">
                <option value="0">Seleccione método de pago</option>
                <?php

                foreach ($metodoPago as $key => $value) {

                    echo "<option value='".$value->id()."'>".$value->id()." - ". $value->texto();
                }

                ?>

            </select>

        </div>
    </div>
</div>

<div class="form-group row">
    <label for="usoCFDI" class="col-sm-2 col-form-label">Uso CFDI</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control usoCFDI form-controlCustumers" name="usoCFDI" id="usoCFDI" style="width:80%;">
                <option value="0">Seleccione Uso del CFDI</option>
                <?php

                foreach ($usoCFDI as $key => $value) {

                    echo "<option value='".$value->id()."'>".$value->id()." - ". $value->texto();

                }

                ?>

            </select>

        </div>
    </div>
</div>


<div class="form-group row">
    <label for="usoCFDI" class="col-sm-2 col-form-label">Regimen Fiscal</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control regimenFiscal form-controlCustumers" name="regimenFiscal" id="regimenFiscal" style="width:80%;">
                <option value="0">Seleccione regimen fiscal</option>
                <?php

                foreach ($regimenFiscal as $key => $value) {

                    echo "<option value='".$value->id()."'>".$value->id()." - ". $value->texto();

                }

                ?>

            </select>

        </div>
    </div>
</div>

</p>