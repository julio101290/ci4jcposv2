<p>
<h3>Datos Generales</h3>
<div class="form-group row">
    <label for="idEmpresa" class="col-sm-2 col-form-label">Empresa</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control idEmpresaVehiculos form-controlVehiculos" name="idEmpresaVehiculos" id="idEmpresaVehiculos" style="width:80%;">
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
    <label for="idEmpresa" class="col-sm-2 col-form-label">Tipo Vehiculo</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control idTipoVehiculo form-controlVehiculos " name="idTipoVehiculo" id="idTipoVehiculo" style="width:80%;">
                <option value="0">Seleccione tipo Vehiculo</option>


            </select>

        </div>
    </div>
</div>
<div class="form-group row">
    <label for="descripcion" class="col-sm-2 col-form-label"><?= lang('vehiculos.fields.descripcion') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="descripcionVehiculo" id="descripcionVehiculo" class="form-control datosVehiculos <?= session('error.descripcion') ? 'is-invalid' : '' ?>" value="<?= old('descripcion') ?>" placeholder="<?= lang('vehiculos.fields.descripcion') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="placas" class="col-sm-2 col-form-label"><?= lang('vehiculos.fields.placas') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="placas" id="placas" class="form-control datosVehiculos <?= session('error.placas') ? 'is-invalid' : '' ?>" value="<?= old('placas') ?>" placeholder="<?= lang('vehiculos.fields.placas') ?>" autocomplete="off">
        </div>
    </div>
</div>


</p>