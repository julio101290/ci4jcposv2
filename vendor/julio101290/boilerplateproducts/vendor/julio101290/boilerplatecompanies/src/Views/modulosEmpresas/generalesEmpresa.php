<p>
<h3>Datos Generales</h3>

<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label"><?= lang('empresas.fields.nombre') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="hidden" name="idEmpresa" id="idEmpresa" value="0">
            <input type="text" name="nombre" id="nombre" class="form-control <?= session('error.nombre') ? 'is-invalid' : '' ?>" value="<?= old('nombre') ?>" placeholder="<?= lang('empresas.fields.nombre') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label"><?= lang('empresas.fields.direccion') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
            </div>
            <input type="text" name="direccion"  id="direccion"class="form-control <?= session('error.direccion') ? 'is-invalid' : '' ?>" value="<?= old('direccion') ?>" placeholder="<?= lang('empresas.fields.direccion') ?>" autocomplete="off">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="telefono" class="col-sm-2 col-form-label"><?= lang('empresas.fields.telefono') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-mobile"></i></span>
            </div>
            <input type="text" name="telefono" id="telefono" class="form-control <?= session('error.telefono') ? 'is-invalid' : '' ?>" value="<?= old('telefono') ?>" placeholder="<?= lang('empresas.fields.telefono') ?>" autocomplete="off">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="correoElectronico" class="col-sm-2 col-form-label"><?= lang('empresas.fields.correoElectronico') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-envelope"></i></span>
            </div>
            <input type="text" name="correoElectronico" id="correoElectronico" class="form-control <?= session('error.correoElectronico') ? 'is-invalid' : '' ?>" value="<?= old('correoElectronico') ?>" placeholder="<?= lang('empresas.fields.correoElectronico') ?>" autocomplete="off">
        </div>
    </div>
</div>

</p>