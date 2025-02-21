<p>
<h3>Datos CFDI V4</h3>


<div class="form-group row">
    <label for="idCategory" class="col-sm-2 col-form-label">
        Clave Unidad SAT
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <select name="unidadSAT" id="unidadSAT" style="width: 90%;" class="form-control unidadSAT form-controlProducts">
                <option value="0" selected>
                    Seleccione Clave De Unidad SAT
                </option>
            </select>


        </div>
    </div>

</div>

<div class="form-group row">
    <label for="idCategory" class="col-sm-2 col-form-label">
        Clave Producto SAT
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <select name="claveProductoSAT" id="claveProductoSAT" style="width: 90%;" class="form-control claveProductoSAT form-controlProducts">
                <option value="0" selected>
                    Seleccione Clave de Producto SAT
                </option>

            </select>


        </div>
    </div>

</div>



<div class="form-group row">
    <label for="porcentTax" class="col-sm-2 col-form-label">
        Predial
    </label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="predial" id="predial" class="form-control form-controlProducts <?= session('error.porcentISRRetenido') ? 'is-invalid' : '' ?>" value="<?= old('porcentISRRetenido') ?>" placeholder="Predial" autocomplete="off">
        </div>
    </div>
</div>

</p>