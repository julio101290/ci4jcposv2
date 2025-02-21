<p>
<h3>Datos Generales</h3>


<div class="row">



    <div class="col-3">
        <div class="form-group">
            <label for="idEmpresaInventory">Empresa </label>
            <select id='idEmpresaInventory' name='idEmpresaInventory' class="idEmpresaInventory" style='width: 80%;'>

                <?php


                if (isset($idEmpresa)) {

                    echo "   <option value='$idEmpresa'>$idEmpresa - $nombreEmpresa</option>";
                } else {

                    echo "  <option value=''>Seleccione Empresa</option>";

                    foreach ($empresas as $key => $value) {

                        echo "<option value='$value[id]'>$value[id] - $value[nombre] </option>  ";
                    }
                }


                ?>

            </select>
        </div>
    </div>

    <div class="col-3">
        <div class="form-group">
            <label for="idStorage">Almacen </label>
            <select id='idStorage' name='idStorage' class="idStorage" style='width: 80%;'>

                <?php


                if (isset($idStorage)) {

                    echo "   <option value='$idStorage'>$idStorage - $nombreAlmacen</option>";
                } else {

                    echo "  <option value=''>Seleccione Almacen</option>";

                }


                ?>

            </select>
        </div>
    </div>

    <div class="col-3">
        <div class="form-group">
            <label for="idTipoMovimientoInventario">Tipo Mov </label>
            <select id='idTipoMovimientoInventario' name='idTipoMovimientoInventario' class="idEmpresaSells" style='width: 80%;'>

                <?php


                if (isset($idTipoInventario)) {

                    echo "   <option value='$idTipoInventario'>$idTipoInventario - $nombreTipoInventario</option>";
                } else {

                    echo "  <option value=''>Seleccione tipo Mov</option>";

                }


                ?>

            </select>
        </div>
    </div>

    <div class="col-3" hidden>
        <div class="form-group">
            <label for="datetime">Fecha Vencimiento.</label>
            <input type="date" id="dateVen" name="dateVen" value="<?= $fecha ?>">

            <input type="hidden" id="titulo" name="titulo" value="<?= $title ?>">
        </div>
    </div>

    <div class="col-3 pull-right" style="
                         text-align: right;
                         ">
        <div class="form-group ">
            <label for="codeSell">Folio No.</label>


            <input type="text" id="codeInventory" name="codeInventory" disabled value="<?= $folio ?>">
        </div>
    </div>


</div>


<div class="row comprobantesRD" hidden>

    <div class="col-6">
        <div class="form-group">
            <label for="tipoComprobanteRD">Tipo Comprobante </label>
            <select id='tipoComprobanteRD' name='tipoComprobanteRD' class="tipoComprobanteRD" style='width: 100%;'>

                <?php
                if (isset($tipoComprobanteRDID)) {

                    echo "   <option value='$tipoComprobanteRDID'>$tipoComprobanteRDPrefijo - $tipoComprobanteRDNombre</option>";
                } else {

                    echo "  <option value=''>Seleccione Proveedor</option>";
                }
                ?>

            </select>
        </div>
    </div>


    <div class="col-6 pull-right" style="text-align: right;">
        <div class="form-group ">
            <label for="folioComprobanteRD">Comprobante No.</label>


            <input type="text" id="folioComprobanteRD" name="folioComprobanteRD" disabled value="<?= $folioComprobanteRD ?>">
        </div>
    </div>

</div>


<div class="row">

    <div class="col-4">
        <div class="form-group">
            <label for="ProveedorInventory">Proveedor </label>
            <select id='ProveedorInventory' name='ProveedorInventory' class="ProveedorInventory" style='width: 100%;'>

                <?php
                if (isset($idProveedor)) {

                    echo "   <option value='$idProveedor'>$idProveedor - $nameProveedor</option>";
                } else {

                    echo "  <option value=''>Seleccione Proveedor</option>";
                }
                ?>

            </select>
        </div>
    </div>

    <div class="col-1">
        <div class="form-group">
            <label for="datetime">Fecha</label>
            <input type="date" id="date" name="date" value="<?= $fecha ?>">
        </div>
    </div>


    <div class="col-7 pull-right" style="
                         text-align: right;
                         ">
        <div class="form-group ">
            <label for="doctor">Realizada por </label>
            <input type="text" id="user" name="user" disabled value="<?= $userName ?>">
            <input type="hidden" id="idUser" name="idUser" value="<?= $idUser ?>">
            <input type="hidden" id="idRegister" name="idRegister" value="0">
            <input type="hidden" id="idinventory" name="idinventory" value="<?= $idInventory?>">
            <input type="hidden" id="uuid" name="uuid" value="<?= $uuid ?>">
        </div>
    </div>

</div>

<div class="row">

    <div class="col-6">
        <div class="form-group">

    
            <button type="button" class="btn btn-default btnAddArticle" data-toggle="modal" data-target="#modalAddbtnAddArticle">Agregar Articulo</button>

            <button class="btn btn-primary btnAddProducts" data-toggle="modal" data-target="#modalAddProducts"><i class="fa fa-plus"></i>

                Nuevo Articulo

            </button>

            <button class="btn btn-primary btnAddProveedor" data-toggle="modal" data-target="#modalAddProveedor"><i class="fa fa-plus"></i>

                Proveedor Nuevo

            </button>
        </div>
    </div>




</div>
</p>