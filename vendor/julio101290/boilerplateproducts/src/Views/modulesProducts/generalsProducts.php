<p>
<h3>Datos Generales</h3>
<div class="form-group row">
    <label for="emitidoRecibido" class="col-sm-2 col-form-label">Empresa</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control idEmpresa form-controlProducts" name="idEmpresa" id="idEmpresa" style="width:80%;">
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
    <label for="idCategory" class="col-sm-2 col-form-label">
        <?= lang('products.fields.idCategory') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <select name="idCategory" id="idCategory" style="width: 90%;" class="form-control idCategory form-controlProducts">
                <option value="0" selected>
                    <?= lang('products.fields.idSelectCategory') ?>
                </option>



            </select>


        </div>
    </div>

</div>
<div class="form-group row">
    <label for="code" class="col-sm-2 col-form-label">
        Clave
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="code" id="code" class="form-control form-controlProducts <?= session('error.code') ? 'is-invalid' : '' ?>" value="" placeholder="Clave" autocomplete="off" readonly>
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="barcode" class="col-sm-2 col-form-label">
        <?= lang('products.fields.barcode') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="barcode" id="barcode" class="form-control form-controlProducts <?= session('error.barcode') ? 'is-invalid' : '' ?>" value="<?= old('barcode') ?>" placeholder="<?= lang('products.fields.barcode') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">
        <?= lang('products.fields.description') ?>
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="description" id="description" class="form-control form-controlProducts <?= session('error.description') ? 'is-invalid' : '' ?>" value="<?= old('description') ?>" placeholder="<?= lang('products.fields.description') ?>" autocomplete="off">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="unidad" class="col-sm-2 col-form-label">
        Unidad
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="unidad" id="unidad" class="form-control form-controlProducts <?= session('error.unidad') ? 'is-invalid' : '' ?>" value="<?= old('unidad') ?>" placeholder="Unidad" autocomplete="off">
        </div>
    </div>
</div>



</p>