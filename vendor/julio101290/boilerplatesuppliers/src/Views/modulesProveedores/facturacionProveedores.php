<p>
<h3>Facturación MX</h3>


<div class="form-group row">
    <label for="razonSocial" class="col-sm-2 col-form-label">
    <?= lang('proveedores.fields.razonSocial') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="razonSocial" id="razonSocial" class="form-control form-controlProveedores <?= session('error.direction') ? 'is-invalid' : '' ?>" value="<?= old('razonSocial') ?>" placeholder="Razón Social" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="taxID" class="col-sm-2 col-form-label">
        <?= lang('proveedores.fields.taxID') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="taxID" id="taxID" class="form-control form-controlProveedores<?= session('error.taxID') ? 'is-invalid' : '' ?>" value="<?= old('taxID') ?>" placeholder="<?= lang('proveedores.fields.taxID') ?>" autocomplete="off">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="formaPago" class="col-sm-2 col-form-label"><?= lang('proveedores.fields.formasDePago') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control formaPago form-controlProveedores" name="formaPago" id="formaPago" style="width:80%;">
                <option value="0"><?= lang('proveedores.fields.seleccioneFormaDePago') ?></option>
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
    <label for="metodoPago" class="col-sm-2 col-form-label"><?= lang('proveedores.fields.metodoDePago') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control metodoPago form-controlProveedores" name="metodoPago" id="metodoPago" style="width:80%;">
                <option value="0"><?= lang('proveedores.fields.seleccioneMetodoDePago') ?></option>
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
    <label for="usoCFDI" class="col-sm-2 col-form-label"><?= lang('proveedores.fields.usoCFDI') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control usoCFDI form-controlProveedores" name="usoCFDI" id="usoCFDI" style="width:80%;">
                <option value="0"><?= lang('proveedores.fields.seleccioneUsoDelCFDI') ?></option>
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
    <label for="usoCFDI" class="col-sm-2 col-form-label"><?= lang('proveedores.fields.regimenFiscal') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control regimenFiscal form-controlProveedores" name="regimenFiscal" id="regimenFiscal" style="width:80%;">
                <option value="0"><?= lang('proveedores.fields.seleccioneRegimenFiscal') ?></option>
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