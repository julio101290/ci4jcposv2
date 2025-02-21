<p>
<h3>Datos Inventario</h3>
<div class="form-group row">
    <label for="stock" class="col-sm-2 col-form-label">
        <?= lang('products.fields.stock') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="number" name="stock" id="stock" class="form-control form-controlProducts <?= session('error.stock') ? 'is-invalid' : '' ?>" value="<?= old('stock') ?>" placeholder="<?= lang('products.fields.stock') ?>" autocomplete="off" min="0">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="stock" class="col-sm-2 col-form-label">
        Valida Stock
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">

            </div>
            <input type="checkbox" id="validateStock" name="validateStock" class="validateStock" data-width="250" data-height="40" checked data-toggle="toggle" data-on="Valida Stock" data-off="No valida stock" data-onstyle="success" data-offstyle="danger">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="stock" class="col-sm-2 col-form-label">
        Inventario Riguroso
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">

            </div>
            <input type="checkbox" id="inventarioRiguroso" name="inventarioRiguroso" class="inventarioRiguroso" data-width="250" data-height="40" checked data-toggle="toggle" data-on="Inventario Riguroso" data-off="Inventario básico" data-onstyle="success" data-offstyle="danger">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="stock" class="col-sm-2 col-form-label">
        Inmueble Ocupado
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">

            </div>
            <input type="checkbox" id="inmuebleOcupado" name="inmuebleOcupado" class="inmuebleOcupado" data-width="250" data-height="40" checked data-toggle="toggle" data-on="Libre" data-off="Ocupado" data-onstyle="success" data-offstyle="danger">
        </div>
    </div>
</div>


</p>