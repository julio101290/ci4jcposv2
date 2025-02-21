<p>
<h3>Precios e Impuestos</h3>

<div class="form-group row ">
    <div class="col-sm-6 ">
        <label for="buyPrice" class="col-sm-12 col-form-label">
            <?= lang('products.fields.buyPrice') ?>
        </label>
        <div class="col-sm-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                </div>
                <input type="number" name="buyPrice" id="buyPrice" class="form-control form-controlProducts <?= session('error.buyPrice') ? 'is-invalid' : '' ?>" value="<?= old('buyPrice') ?>" step=".01" placeholder="<?= lang('products.fields.buyPrice') ?>" autocomplete="off">
            </div>
        </div>
    </div>


    <div class="col-sm-6 ">
        <label for="salePrice" class="col-sm-12 col-form-label">
            <?= lang('products.fields.salePrice') ?>
        </label>
        <div class="col-sm-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                </div>
                <input type="number" name="salePrice" id="salePrice" class="form-control form-controlProducts <?= session('error.salePrice') ? 'is-invalid' : '' ?>" value="<?= old('salePrice') ?>" step=".01" pattern="^\d*(\.\d{0,2})?$" placeholder="<?= lang('products.fields.salePrice') ?>" autocomplete="off">
            </div>
        </div>
    </div>





</div>

<div class="form-group row ">

    <div class="col-sm-6"></div>



    <div class="col-sm-6 ">
        <label for="porcentSale" class="col-sm-12 col-form-label">
            <?= lang('products.fields.porcentSale') ?>
        </label>
        <div class="col-sm-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-percent"></i></span>
                </div>
                <input type="number" name="porcentSale" id="porcentSale" class="form-control form-controlProducts <?= session('error.porcentSale') ? 'is-invalid' : '' ?>" value="<?= old('porcentSale') ?>" placeholder="<?= lang('products.fields.porcentSale') ?>" autocomplete="off" min="0" value="40">
            </div>
        </div>
    </div>

</div>


<div class="form-group row">
    <label for="stock" class="col-sm-2 col-form-label">
        Tasa Exenta
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">

            </div>
            <input type="checkbox" id="tasaExcenta" name="tasaExcenta" class="tasaExcenta" data-width="250" data-height="40" checked data-toggle="toggle" data-on="Exenta" data-off="No exenta" data-onstyle="success" data-offstyle="danger">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="porcentTax" class="col-sm-2 col-form-label">
        <?= lang('products.fields.porcentTax') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-percent"></i></span>
            </div>
            <input type="number" name="porcentTax" id="porcentTax" class="form-control  form-controlProducts <?= session('error.porcentTax') ? 'is-invalid' : '' ?>" value="<?= old('porcentTax') ?>" placeholder="<?= lang('products.fields.porcentTax') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="porcentTax" class="col-sm-2 col-form-label">
        Iva Retenido
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-percent"></i></span>
            </div>
            <input type="number" name="porcentIVARetenido" id="porcentIVARetenido" class="form-control form-controlProducts <?= session('error.porcentIVARetenido') ? 'is-invalid' : '' ?>" value="<?= old('porcentIVARetenido') ?>" placeholder="Iva Retenido" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="porcentTax" class="col-sm-2 col-form-label">
        ISR Retenido
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-percent"></i></span>
            </div>
            <input type="number" name="porcentISRRetenido" id="porcentISRRetenido" class="form-control form-controlProducts <?= session('error.porcentISRRetenido') ? 'is-invalid' : '' ?>" value="<?= old('porcentISRRetenido') ?>" placeholder="ISR Retenido" autocomplete="off">
        </div>
    </div>
</div>
</p>