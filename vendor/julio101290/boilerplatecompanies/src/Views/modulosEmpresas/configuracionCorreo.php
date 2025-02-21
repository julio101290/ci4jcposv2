<p>
<h3>Configuración Correo</h3>


<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label"><?= lang('empresas.fields.correoElectronico') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
            </div>
            <input type="text" name="email" id="email" class="form-control <?= session('error.email') ? 'is-invalid' : '' ?>" value="<?= old('email') ?>" placeholder="<?= lang('empresas.fields.correoElectronico') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label"><?= lang('empresas.fields.host') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
            </div>
            <input type="text" name="host" id="host" class="form-control <?= session('error.host') ? 'is-invalid' : '' ?>" value="<?= old('host') ?>" placeholder="<?= lang('empresas.fields.host') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="inputSkills" class="col-sm-2 col-form-label"><?= lang('empresas.fields.debugClient') ?></label>
    <div class="col-sm-8">
        <select class="form-control select" name="smtpDebug" id="smtpDebug" style="width: 100%;">

            <option value="0">DEBUG_OFF</option>
            <option value="1">DEBUG_CLIENT</option>
            <option value="2">DEBUG_SERVER</option>

        </select>
    </div>
</div>

<div class="form-group row">
    <label for="inputSkills" class="col-sm-2 col-form-label"><?= lang('empresas.fields.SMTPAuth') ?></label>
    <div class="col-sm-8">
        <select class="form-control select" name="SMTPAuth" id="SMTPAuth" style="width: 100%;">

            <option value=""></option>
            <option value="0"><?= lang('empresas.fields.NoAuthentication') ?></option>
            <option value="1"><?= lang('empresas.fields.WithAuthentication') ?></option>

        </select>
    </div>
</div>


<div class="form-group row">
    <label for="smptSecurity" class="col-sm-2 col-form-label"><?= lang('empresas.fields.Security') ?></label>
    <div class="col-sm-8">
        <select class="form-control select" name="smptSecurity" id="smptSecurity" style="width: 100%;">

        <option value=""><?= lang('empresas.fields.WithoutSecurity') ?></option>
        <option value="ssl"><?= lang('empresas.fields.SSLSecurity') ?></option>
        <option value="tls"><?= lang('empresas.fields.TLSSecurity') ?></option>

        </select>
    </div>
</div>


<div class="form-group row">
    <label for="port" class="col-sm-2 col-form-label"><?= lang('empresas.fields.port') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
            </div>
            <input type="number" name="port" id="port" class="form-control <?= session('error.port') ? 'is-invalid' : '' ?>" value="<?= old('port') ?>" placeholder="Puerto" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="pass" class="col-sm-2 col-form-label">Contraseña</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
            </div>
            <input type="password" name="pass" id="pass" class="form-control <?= session('error.port') ? 'is-invalid' : '' ?>" value="<?= old('pass') ?>" placeholder="Contraseña" autocomplete="off">
        </div>
    </div>
</div>



</p>