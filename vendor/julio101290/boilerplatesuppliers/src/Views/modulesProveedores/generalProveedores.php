<p>
<h3>Datos Generales</h3>
<div class="form-group row">
    <label for="idEmpresaProveedor" class="col-sm-2 col-form-label">Empresa</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control idEmpresaProveedor form-controlProveedores" name="idEmpresaProveedor" id="idEmpresaProveedor" style="width:80%;">
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
    <label for="firstname" class="col-sm-2 col-form-label">
        <?= lang('proveedores.fields.firstname') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="firstname" id="firstname" class="form-control form-controlProveedores<?= session('error.firstname') ? 'is-invalid' : '' ?>" value="<?= old('firstname') ?>" placeholder="<?= lang('proveedores.fields.firstname') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="lastname" class="col-sm-2 col-form-label">
        <?= lang('proveedores.fields.lastname') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="lastname" id="lastname" class="form-control form-controlProveedores<?= session('error.lastname') ? 'is-invalid' : '' ?>" value="<?= old('lastname') ?>" placeholder="<?= lang('proveedores.fields.lastname') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">
        <?= lang('proveedores.fields.email') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="email" id="email" class="form-control form-controlProveedores<?= session('error.email') ? 'is-invalid' : '' ?>" value="<?= old('email') ?>" placeholder="<?= lang('proveedores.fields.email') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="direction" class="col-sm-2 col-form-label">
        <?= lang('proveedores.fields.direction') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="direction" id="direction" class="form-control form-controlProveedores <?= session('error.direction') ? 'is-invalid' : '' ?>" value="<?= old('direction') ?>" placeholder="<?= lang('proveedores.fields.direction') ?>" autocomplete="off">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="codigoPostal" class="col-sm-2 col-form-label">
    <?= lang('proveedores.fields.postalCode') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="number" name="codigoPostal" id="codigoPostal" class="form-control form-controlProveedores <?= session('error.codigoPostal') ? 'is-invalid' : '' ?>" value="<?= old('codigoPostal') ?>" placeholder="Código Postal" autocomplete="off">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="birthdate" class="col-sm-2 col-form-label">
        <?= lang('proveedores.fields.birthdate') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <input type="datetime-local" name="birthdate" id="birthdate" class="form-control form-controlProveedores <?= session('error.birthdate') ? 'is-invalid' : '' ?>" value="<?= $fecha ?>" placeholder="<?= lang('proveedores.fields.birthdate') ?>" autocomplete="off">
        </div>
    </div>
</div>




</p>