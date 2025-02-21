<p>
<h3>Imagenes</h3>

<div class="form-group">

    <div class="panel"><?= lang("empresas.fields.logo") ?></div>

    <input type="file" class="logo" name="logo" id="logo">

    <p class="help-block"><?= lang("empresas.imagenesPesoMaximo") ?></p>

    <img src="<?= base_url("images/logo/default.png") ?>" class="img-thumbnail previsualizarLogo" width="100px">

    <input type="hidden" name="logoActual" id="logoActual">

</div>

</p>