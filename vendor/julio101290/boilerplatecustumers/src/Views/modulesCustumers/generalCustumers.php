<p>
<h3>Datos Generales</h3>
<div class="form-group row">
    <label for="idEmpresaCustumer" class="col-sm-2 col-form-label">Empresa</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control idEmpresaCustumer form-controlCustumers" name="idEmpresaCustumer" id="idEmpresaCustumer" style="width:80%;">
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
        <?= lang('custumers.fields.firstname') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="firstname" id="firstname" class="form-control form-controlCustumers<?= session('error.firstname') ? 'is-invalid' : '' ?>" value="<?= old('firstname') ?>" placeholder="<?= lang('custumers.fields.firstname') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="lastname" class="col-sm-2 col-form-label">
        <?= lang('custumers.fields.lastname') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="lastname" id="lastname" class="form-control form-controlCustumers<?= session('error.lastname') ? 'is-invalid' : '' ?>" value="<?= old('lastname') ?>" placeholder="<?= lang('custumers.fields.lastname') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">
        <?= lang('custumers.fields.email') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="email" id="email" class="form-control form-controlCustumers<?= session('error.email') ? 'is-invalid' : '' ?>" value="<?= old('email') ?>" placeholder="<?= lang('custumers.fields.email') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="direction" class="col-sm-2 col-form-label">
        <?= lang('custumers.fields.direction') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="direction" id="direction" class="form-control form-controlCustumers <?= session('error.direction') ? 'is-invalid' : '' ?>" value="<?= old('direction') ?>" placeholder="<?= lang('custumers.fields.direction') ?>" autocomplete="off">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="codigoPostal" class="col-sm-2 col-form-label">
        Código Postal
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="number" name="codigoPostal" id="codigoPostal" class="form-control form-controlCustumers <?= session('error.codigoPostal') ? 'is-invalid' : '' ?>" value="<?= old('codigoPostal') ?>" placeholder="Código Postal" autocomplete="off">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="birthdate" class="col-sm-2 col-form-label">
        <?= lang('custumers.fields.birthdate') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <input type="datetime-local" name="birthdate" id="birthdate" class="form-control form-controlCustumers <?= session('error.birthdate') ? 'is-invalid' : '' ?>" value="<?= $fecha ?>" placeholder="<?= lang('custumers.fields.birthdate') ?>" autocomplete="off">
        </div>
    </div>
</div>




</p>