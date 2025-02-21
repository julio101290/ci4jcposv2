<p>
<h3>Datos Carta Porte</h3>


<div class="form-group row">
    <label for="permisoSCT" class="col-sm-2 col-form-label"><?= lang('vehiculos.fields.permisoSCT') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control permisoSCT form-controlVehiculos " name="permisoSCT" id="permisoSCT" style="width:80%;">
                <option value="0">Seleccione tipo permiso</option>

                <option value="TPAF01">TPAF01 - Autotransporte Federal de carga general</option>
                <option value="TPAF02">TPAF02 - Transporte privado de carga</option>
                <option value="TPAF03">TPAF03 - Autotransporte Federal de Carga Especializada de materiales y residuos peligrosos</option>
                <option value="TPAF04">TPAF04 - Transporte de automóviles sin rodar en vehículo tipo góndola</option>
                <option value="TPAF05">TPAF05 - Transporte de carga de gran peso y/o volumen de hasta 90 toneladas</option>
                <option value="TPAF06">TPAF06 - Transporte de carga especializada de gran peso y/o volumen de más 90 toneladas</option>
                <option value="TPAF07">TPAF07 - Transporte Privado de materiales y residuos peligrosos</option>
                <option value="TPAF08">TPAF08 - Autotransporte internacional de carga de largo recorrido</option>
                <option value="TPAF09">TPAF09 - Autotransporte internacional de carga especializada de materiales y residuos peligrosos de largo recorrido</option>
                <option value="TPAF10">TPAF10 - Autotransporte Federal de Carga General cuyo ámbito de aplicación comprende la franja fronteriza con Estados Unidos</option>
                <option value="TPAF11">TPAF11 - Autotransporte Federal de Carga Especializada cuyo ámbito de aplicación comprende la franja fronteriza con Estados Unidos</option>
                <option value="TPAF12">TPAF12 - Servicio auxiliar de arrastre en las vías generales de comunicación</option>
                <option value="TPAF13">TPAF13 - Servicio auxiliar de servicios de arrastre, arrastre y salvamento, y depósito de vehículos en las vías generales de comunicación</option>
                <option value="TPAF14">TPAF14 - Servicio de paquetería y mensajería en las vías generales de comunicación</option>
                <option value="TPAF15">TPAF15 - Transporte especial para el tránsito de grúas industriales con peso máximo de 90 toneladas</option>
                <option value="TPAF16">TPAF16 - Servicio federal para empresas arrendadoras servicio público federal</option>
                <option value="TPAF17">TPAF17 - Empresas trasladistas de vehículos nuevos</option>
                <option value="TPAF18">TPAF18 - Empresas fabricantes o distribuidoras de vehículos nuevos</option>
                <option value="TPAF19">TPAF19 - Autorización expresa para circular en los caminos y puentes de jurisdicción federal con configuraciones de tractocamión doblemente articulado</option>
                <option value="TPAF20">TPAF20 - Autotransporte Federal de Carga Especializada de fondos y valores</option>
                <option value="TPTM01">TPTM01 - Permiso temporal para navegación de cabotaje</option>
                <option value="TPTA01">TPTA01 - Concesión y/o autorización para el servicio regular nacional y/o internacional para empresas mexicanas</option>
                <option value="TPTA02">TPTA02 - Permiso para el servicio aéreo regular de empresas extranjeras</option>
                <option value="TPTA03">TPTA03 - Permiso para el servicio nacional e internacional no regular de fletamento</option>
                <option value="TPTA04">TPTA04 - Permiso para el servicio nacional e internacional no regular de taxi aéreo</option>
                <option value="TPXX00">TPXX00 - Permiso no contemplado en el catálogo</option>
            </select>

        </div>
    </div>
</div>

<?php



?>

<div class="form-group row">
    <label for="numPermisoSCT" class="col-sm-2 col-form-label"><?= lang('vehiculos.fields.numPermisoSCT') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="numPermisoSCT" id="numPermisoSCT" class="form-control datosVehiculos <?= session('error.numPermisoSCT') ? 'is-invalid' : '' ?>" value="<?= old('numPermisoSCT') ?>" placeholder="<?= lang('vehiculos.fields.numPermisoSCT') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="configVehicular" class="col-sm-2 col-form-label"><?= lang('vehiculos.fields.configVehicular') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control configVehicular form-controlVehiculos " name="configVehicular" id="configVehicular" style="width:80%;">
                <option value="0">Seleccione Configuracion Vehicular</option>
                <option value="VL">VL - Vehículo ligero de carga</option>
                <option value="C2">C2 - Camión Unitario</option>
                <option value="C3">C3 - Camión Unitario</option>
                <option value="C2R2">C2R2 - Camión-Remolque</option>
                <option value="C3R2">C3R2 - Camión-Remolque</option>
                <option value="C2R3">C2R3 - Camión-Remolque</option>
                <option value="C3R3">C3R3 - Camión-Remolque</option>
                <option value="T2S1">T2S1 - Tractocamión Articulado</option>
                <option value="T2S2">T2S2 - Tractocamión Articulado</option>
                <option value="T2S3">T2S3 - Tractocamión Articulado</option>
                <option value="T3S1">T3S1 - Tractocamión Articulado</option>
                <option value="T3S2">T3S2 - Tractocamión Articulado</option>
                <option value="T3S3">T3S3 - Tractocamión Articulado</option>
                <option value="T2S1R2">T2S1R2 - Tractocamión Semirremolque-Remolque</option>
                <option value="T2S2R2">T2S2R2 - Tractocamión Semirremolque-Remolque</option>
                <option value="T2S1R3">T2S1R3 - Tractocamión Semirremolque-Remolque</option>
                <option value="T3S1R2">T3S1R2 - Tractocamión Semirremolque-Remolque</option>
                <option value="T3S1R3">T3S1R3 - Tractocamión Semirremolque-Remolque</option>
                <option value="T3S2R2">T3S2R2 - Tractocamión Semirremolque-Remolque</option>
                <option value="T3S2R3">T3S2R3 - Tractocamión Semirremolque-Remolque</option>
                <option value="T3S2R4">T3S2R4 - Tractocamión Semirremolque-Remolque</option>
                <option value="T2S2S2">T2S2S2 - Tractocamión Semirremolque-Semirremolque</option>
                <option value="OTROEVGP">OTROEVGP - Especializado de carga Voluminosa y/o Gran Peso</option>
                <option value="OTROSG">OTROSG - Servicio de Grúas</option>
                <option value="GPLUTA">GPLUTA - Grúa de Pluma Tipo A</option>
                <option value="GPLUTB">GPLUTB - Grúa de Pluma Tipo B</option>
                <option value="GPLUTC">GPLUTC - Grúa de Pluma Tipo C</option>
                <option value="GPLUTD">GPLUTD - Grúa de Pluma Tipo D</option>
                <option value="GPLATA">GPLATA - Grúa de Plataforma Tipo A</option>
                <option value="GPLATB">GPLATB - Grúa de Plataforma Tipo B</option>
                <option value="GPLATC">GPLATC - Grúa de Plataforma Tipo C</option>
                <option value="GPLATD">GPLATD - Grúa de Plataforma Tipo D</option>

            </select>
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="pesoBrutoVehicular" class="col-sm-2 col-form-label"><?= lang('vehiculos.fields.pesoBrutoVehicular') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="pesoBrutoVehicular" id="pesoBrutoVehicular" class="form-control datosVehiculos <?= session('error.pesoBrutoVehicular') ? 'is-invalid' : '' ?>" value="<?= old('pesoBrutoVehicular') ?>" placeholder="<?= lang('vehiculos.fields.pesoBrutoVehicular') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="anioModelo" class="col-sm-2 col-form-label"><?= lang('vehiculos.fields.anioModelo') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="anioModelo" id="anioModelo" class="form-control datosVehiculos <?= session('error.anioModelo') ? 'is-invalid' : '' ?> anioModelo" value="<?= old('anioModelo') ?>" placeholder="<?= lang('vehiculos.fields.anioModelo') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="aseguraRespCivil" class="col-sm-2 col-form-label"><?= lang('vehiculos.fields.aseguraRespCivil') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="aseguraRespCivil" id="aseguraRespCivil" class="form-control datosVehiculos <?= session('error.aseguraRespCivil') ? 'is-invalid' : '' ?>" value="<?= old('aseguraRespCivil') ?>" placeholder="<?= lang('vehiculos.fields.aseguraRespCivil') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="polizaRespCivil" class="col-sm-2 col-form-label"><?= lang('vehiculos.fields.polizaRespCivil') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="polizaRespCivil" id="polizaRespCivil" class="form-control datosVehiculos <?= session('error.polizaRespCivil') ? 'is-invalid' : '' ?>" value="<?= old('polizaRespCivil') ?> polizaRespCivil" placeholder="<?= lang('vehiculos.fields.polizaRespCivil') ?>" autocomplete="off">
        </div>
    </div>
</div>

</p>