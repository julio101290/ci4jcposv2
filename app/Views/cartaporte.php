<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesCartaporte/modalCaptureCartaporte') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
 <div class="card-header">
     <div class="float-right">
         <div class="btn-group">

             <button class="btn btn-primary btnAddCartaporte" data-toggle="modal" data-target="#modalAddCartaporte"><i class="fa fa-plus"></i>

                 <?= lang('cartaporte.add') ?>

             </button>

         </div>
     </div>
 </div>
 <div class="card-body">
     <div class="row">
         <div class="col-md-12">
             <div class="table-responsive">
                 <table id="tableCartaporte" class="table table-striped table-hover va-middle tableCartaporte">
                     <thead>
                         <tr>

                             <th>#</th>
                             <th><?= lang('cartaporte.fields.idEmpresa') ?></th>
<th><?= lang('cartaporte.fields.idSucursal') ?></th>
<th><?= lang('cartaporte.fields.idCustumer') ?></th>
<th><?= lang('cartaporte.fields.folio') ?></th>
<th><?= lang('cartaporte.fields.idUser') ?></th>
<th><?= lang('cartaporte.fields.listProducts') ?></th>
<th><?= lang('cartaporte.fields.taxes') ?></th>
<th><?= lang('cartaporte.fields.IVARetenido') ?></th>
<th><?= lang('cartaporte.fields.ISRRetenido') ?></th>
<th><?= lang('cartaporte.fields.subTotal') ?></th>
<th><?= lang('cartaporte.fields.total') ?></th>
<th><?= lang('cartaporte.fields.balance') ?></th>
<th><?= lang('cartaporte.fields.date') ?></th>
<th><?= lang('cartaporte.fields.dateVen') ?></th>
<th><?= lang('cartaporte.fields.quoteTo') ?></th>
<th><?= lang('cartaporte.fields.delivaryTime') ?></th>
<th><?= lang('cartaporte.fields.generalObservations') ?></th>
<th><?= lang('cartaporte.fields.UUID') ?></th>
<th><?= lang('cartaporte.fields.idQuote') ?></th>
<th><?= lang('cartaporte.fields.tipoComprobanteRD') ?></th>
<th><?= lang('cartaporte.fields.folioCombrobanteRD') ?></th>
<th><?= lang('cartaporte.fields.RFCReceptor') ?></th>
<th><?= lang('cartaporte.fields.usoCFDI') ?></th>
<th><?= lang('cartaporte.fields.metodoPago') ?></th>
<th><?= lang('cartaporte.fields.formaPago') ?></th>
<th><?= lang('cartaporte.fields.razonSocialReceptor') ?></th>
<th><?= lang('cartaporte.fields.codigoPostalReceptor') ?></th>
<th><?= lang('cartaporte.fields.regimenFiscalReceptor') ?></th>
<th><?= lang('cartaporte.fields.idVehiculo') ?></th>
<th><?= lang('cartaporte.fields.idChofer') ?></th>
<th><?= lang('cartaporte.fields.tipoVehiculo') ?></th>
<th><?= lang('cartaporte.fields.idArqueoCaja') ?></th>
<th><?= lang('cartaporte.fields.TranspInternac') ?></th>
<th><?= lang('cartaporte.fields.TotalDistRec') ?></th>
<th><?= lang('cartaporte.fields.IDUbicacionOrigen') ?></th>
<th><?= lang('cartaporte.fields.RFCRemitenteDestinatarioOrigen') ?></th>
<th><?= lang('cartaporte.fields.FechaHoraSalidaLlegadaOrigen') ?></th>
<th><?= lang('cartaporte.fields.DistanciaRecorridaOrigen') ?></th>
<th><?= lang('cartaporte.fields.LocalidadOrigen') ?></th>
<th><?= lang('cartaporte.fields.ReferenciaOrigen') ?></th>
<th><?= lang('cartaporte.fields.MunicipioOrigen') ?></th>
<th><?= lang('cartaporte.fields.EstadoOrigen') ?></th>
<th><?= lang('cartaporte.fields.PaisOrigen') ?></th>
<th><?= lang('cartaporte.fields.CodigoPostalOrigen') ?></th>
<th><?= lang('cartaporte.fields.IDUbicacionDestino') ?></th>
<th><?= lang('cartaporte.fields.RFCRemitenteDestinatarioDestino') ?></th>
<th><?= lang('cartaporte.fields.FechaHoraSalidaLlegadaDestino') ?></th>
<th><?= lang('cartaporte.fields.DistanciaRecorridaDestino') ?></th>
<th><?= lang('cartaporte.fields.LocalidadDestino') ?></th>
<th><?= lang('cartaporte.fields.ReferenciaDestino') ?></th>
<th><?= lang('cartaporte.fields.MunicipioDestino') ?></th>
<th><?= lang('cartaporte.fields.EstadoDestino') ?></th>
<th><?= lang('cartaporte.fields.PaisDestino') ?></th>
<th><?= lang('cartaporte.fields.CodigoPostalDestino') ?></th>
<th><?= lang('cartaporte.fields.PesoBrutoTotal') ?></th>
<th><?= lang('cartaporte.fields.UnidadPeso') ?></th>
<th><?= lang('cartaporte.fields.NumTotalMercancias') ?></th>
<th><?= lang('cartaporte.fields.TipoFigura') ?></th>
<th><?= lang('cartaporte.fields.RFCFigura') ?></th>
<th><?= lang('cartaporte.fields.NumLicencia') ?></th>
<th><?= lang('cartaporte.fields.NombreFigura') ?></th>
<th><?= lang('cartaporte.fields.MunicipioFigura') ?></th>
<th><?= lang('cartaporte.fields.EstadoFigura') ?></th>
<th><?= lang('cartaporte.fields.PaisFigura') ?></th>
<th><?= lang('cartaporte.fields.CodigoPostalFigura') ?></th>
<th><?= lang('cartaporte.fields.PermSCT') ?></th>
<th><?= lang('cartaporte.fields.NumPermisoSCT') ?></th>
<th><?= lang('cartaporte.fields.ConfigVehicular') ?></th>
<th><?= lang('cartaporte.fields.PesoBrutoVehicular') ?></th>
<th><?= lang('cartaporte.fields.PlacaVM') ?></th>
<th><?= lang('cartaporte.fields.AnioModeloVM') ?></th>
<th><?= lang('cartaporte.fields.AseguraRespCivil') ?></th>
<th><?= lang('cartaporte.fields.PolizaRespCivil') ?></th>
<th><?= lang('cartaporte.fields.SubTipoRem') ?></th>
<th><?= lang('cartaporte.fields.PlacaSubTipoRemolque') ?></th>
<th><?= lang('cartaporte.fields.ColoniaOrigen') ?></th>
<th><?= lang('cartaporte.fields.CalleOrigen') ?></th>
<th><?= lang('cartaporte.fields.numInteriorOrigen') ?></th>
<th><?= lang('cartaporte.fields.coloniaDestino') ?></th>
<th><?= lang('cartaporte.fields.calleDestino') ?></th>
<th><?= lang('cartaporte.fields.numInteriorDestino') ?></th>
<th><?= lang('cartaporte.fields.nombreRazonSocialUbicacionOrigen') ?></th>
<th><?= lang('cartaporte.fields.nombreRazonSocialUbicacionDestino') ?></th>
<th><?= lang('cartaporte.fields.listMercancias') ?></th>
<th><?= lang('cartaporte.fields.remolqueCartaPorte') ?></th>
<th><?= lang('cartaporte.fields.numExteriorOrigen') ?></th>
<th><?= lang('cartaporte.fields.numExteriorDestino') ?></th>
<th><?= lang('cartaporte.fields.apellidoFigura') ?></th>
<th><?= lang('cartaporte.fields.created_at') ?></th>
<th><?= lang('cartaporte.fields.updated_at') ?></th>
<th><?= lang('cartaporte.fields.deleted_at') ?></th>
<th><?= lang('cartaporte.fields.AseguraMedAmbiente') ?></th>
<th><?= lang('cartaporte.fields.PolizaMedAmbiente') ?></th>

                             <th><?= lang('cartaporte.fields.actions') ?> </th>

                         </tr>
                     </thead>
                     <tbody>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
</div>
<!-- /.card -->

<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script>

 /**
  * Cargamos la tabla
  */

 var tableCartaporte = $('#tableCartaporte').DataTable({
     processing: true,
     serverSide: true,
     responsive: true,
     autoWidth: false,
     order: [[1, 'asc']],

     ajax: {
         url: '<?= base_url('admin/cartaporte') ?>',
         method: 'GET',
         dataType: "json"
     },
     columnDefs: [{
             orderable: false,
             targets: [94],
             searchable: false,
             targets: [94]

         }],
     columns: [{
             'data': 'id'
         },
        
          
{
    'data': 'idEmpresa'
},
 
{
    'data': 'idSucursal'
},
 
{
    'data': 'idCustumer'
},
 
{
    'data': 'folio'
},
 
{
    'data': 'idUser'
},
 
{
    'data': 'listProducts'
},
 
{
    'data': 'taxes'
},
 
{
    'data': 'IVARetenido'
},
 
{
    'data': 'ISRRetenido'
},
 
{
    'data': 'subTotal'
},
 
{
    'data': 'total'
},
 
{
    'data': 'balance'
},
 
{
    'data': 'date'
},
 
{
    'data': 'dateVen'
},
 
{
    'data': 'quoteTo'
},
 
{
    'data': 'delivaryTime'
},
 
{
    'data': 'generalObservations'
},
 
{
    'data': 'UUID'
},
 
{
    'data': 'idQuote'
},
 
{
    'data': 'tipoComprobanteRD'
},
 
{
    'data': 'folioCombrobanteRD'
},
 
{
    'data': 'RFCReceptor'
},
 
{
    'data': 'usoCFDI'
},
 
{
    'data': 'metodoPago'
},
 
{
    'data': 'formaPago'
},
 
{
    'data': 'razonSocialReceptor'
},
 
{
    'data': 'codigoPostalReceptor'
},
 
{
    'data': 'regimenFiscalReceptor'
},
 
{
    'data': 'idVehiculo'
},
 
{
    'data': 'idChofer'
},
 
{
    'data': 'tipoVehiculo'
},
 
{
    'data': 'idArqueoCaja'
},
 
{
    'data': 'TranspInternac'
},
 
{
    'data': 'TotalDistRec'
},
 
{
    'data': 'IDUbicacionOrigen'
},
 
{
    'data': 'RFCRemitenteDestinatarioOrigen'
},
 
{
    'data': 'FechaHoraSalidaLlegadaOrigen'
},
 
{
    'data': 'DistanciaRecorridaOrigen'
},
 
{
    'data': 'LocalidadOrigen'
},
 
{
    'data': 'ReferenciaOrigen'
},
 
{
    'data': 'MunicipioOrigen'
},
 
{
    'data': 'EstadoOrigen'
},
 
{
    'data': 'PaisOrigen'
},
 
{
    'data': 'CodigoPostalOrigen'
},
 
{
    'data': 'IDUbicacionDestino'
},
 
{
    'data': 'RFCRemitenteDestinatarioDestino'
},
 
{
    'data': 'FechaHoraSalidaLlegadaDestino'
},
 
{
    'data': 'DistanciaRecorridaDestino'
},
 
{
    'data': 'LocalidadDestino'
},
 
{
    'data': 'ReferenciaDestino'
},
 
{
    'data': 'MunicipioDestino'
},
 
{
    'data': 'EstadoDestino'
},
 
{
    'data': 'PaisDestino'
},
 
{
    'data': 'CodigoPostalDestino'
},
 
{
    'data': 'PesoBrutoTotal'
},
 
{
    'data': 'UnidadPeso'
},
 
{
    'data': 'NumTotalMercancias'
},
 
{
    'data': 'TipoFigura'
},
 
{
    'data': 'RFCFigura'
},
 
{
    'data': 'NumLicencia'
},
 
{
    'data': 'NombreFigura'
},
 
{
    'data': 'MunicipioFigura'
},
 
{
    'data': 'EstadoFigura'
},
 
{
    'data': 'PaisFigura'
},
 
{
    'data': 'CodigoPostalFigura'
},
 
{
    'data': 'PermSCT'
},
 
{
    'data': 'NumPermisoSCT'
},
 
{
    'data': 'ConfigVehicular'
},
 
{
    'data': 'PesoBrutoVehicular'
},
 
{
    'data': 'PlacaVM'
},
 
{
    'data': 'AnioModeloVM'
},
 
{
    'data': 'AseguraRespCivil'
},
 
{
    'data': 'PolizaRespCivil'
},
 
{
    'data': 'SubTipoRem'
},
 
{
    'data': 'PlacaSubTipoRemolque'
},
 
{
    'data': 'ColoniaOrigen'
},
 
{
    'data': 'CalleOrigen'
},
 
{
    'data': 'numInteriorOrigen'
},
 
{
    'data': 'coloniaDestino'
},
 
{
    'data': 'calleDestino'
},
 
{
    'data': 'numInteriorDestino'
},
 
{
    'data': 'nombreRazonSocialUbicacionOrigen'
},
 
{
    'data': 'nombreRazonSocialUbicacionDestino'
},
 
{
    'data': 'listMercancias'
},
 
{
    'data': 'remolqueCartaPorte'
},
 
{
    'data': 'numExteriorOrigen'
},
 
{
    'data': 'numExteriorDestino'
},
 
{
    'data': 'apellidoFigura'
},
 
{
    'data': 'created_at'
},
 
{
    'data': 'updated_at'
},
 
{
    'data': 'deleted_at'
},
 
{
    'data': 'AseguraMedAmbiente'
},
 
{
    'data': 'PolizaMedAmbiente'
},

         {
             "data": function (data) {
                 return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-warning btnEditCartaporte" data-toggle="modal" idCartaporte="${data.id}" data-target="#modalAddCartaporte">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
             }
         }
     ]
 });



 $(document).on('click', '#btnSaveCartaporte', function (e) {

     
var idCartaporte = $("#idCartaporte").val();
var idEmpresa = $("#idEmpresa").val();
var idSucursal = $("#idSucursal").val();
var idCustumer = $("#idCustumer").val();
var folio = $("#folio").val();
var idUser = $("#idUser").val();
var listProducts = $("#listProducts").val();
var taxes = $("#taxes").val();
var IVARetenido = $("#IVARetenido").val();
var ISRRetenido = $("#ISRRetenido").val();
var subTotal = $("#subTotal").val();
var total = $("#total").val();
var balance = $("#balance").val();
var date = $("#date").val();
var dateVen = $("#dateVen").val();
var quoteTo = $("#quoteTo").val();
var delivaryTime = $("#delivaryTime").val();
var generalObservations = $("#generalObservations").val();
var UUID = $("#UUID").val();
var idQuote = $("#idQuote").val();
var tipoComprobanteRD = $("#tipoComprobanteRD").val();
var folioCombrobanteRD = $("#folioCombrobanteRD").val();
var RFCReceptor = $("#RFCReceptor").val();
var usoCFDI = $("#usoCFDI").val();
var metodoPago = $("#metodoPago").val();
var formaPago = $("#formaPago").val();
var razonSocialReceptor = $("#razonSocialReceptor").val();
var codigoPostalReceptor = $("#codigoPostalReceptor").val();
var regimenFiscalReceptor = $("#regimenFiscalReceptor").val();
var idVehiculo = $("#idVehiculo").val();
var idChofer = $("#idChofer").val();
var tipoVehiculo = $("#tipoVehiculo").val();
var idArqueoCaja = $("#idArqueoCaja").val();
var TranspInternac = $("#TranspInternac").val();
var TotalDistRec = $("#TotalDistRec").val();
var IDUbicacionOrigen = $("#IDUbicacionOrigen").val();
var RFCRemitenteDestinatarioOrigen = $("#RFCRemitenteDestinatarioOrigen").val();
var FechaHoraSalidaLlegadaOrigen = $("#FechaHoraSalidaLlegadaOrigen").val();
var DistanciaRecorridaOrigen = $("#DistanciaRecorridaOrigen").val();
var LocalidadOrigen = $("#LocalidadOrigen").val();
var ReferenciaOrigen = $("#ReferenciaOrigen").val();
var MunicipioOrigen = $("#MunicipioOrigen").val();
var EstadoOrigen = $("#EstadoOrigen").val();
var PaisOrigen = $("#PaisOrigen").val();
var CodigoPostalOrigen = $("#CodigoPostalOrigen").val();
var IDUbicacionDestino = $("#IDUbicacionDestino").val();
var RFCRemitenteDestinatarioDestino = $("#RFCRemitenteDestinatarioDestino").val();
var FechaHoraSalidaLlegadaDestino = $("#FechaHoraSalidaLlegadaDestino").val();
var DistanciaRecorridaDestino = $("#DistanciaRecorridaDestino").val();
var LocalidadDestino = $("#LocalidadDestino").val();
var ReferenciaDestino = $("#ReferenciaDestino").val();
var MunicipioDestino = $("#MunicipioDestino").val();
var EstadoDestino = $("#EstadoDestino").val();
var PaisDestino = $("#PaisDestino").val();
var CodigoPostalDestino = $("#CodigoPostalDestino").val();
var PesoBrutoTotal = $("#PesoBrutoTotal").val();
var UnidadPeso = $("#UnidadPeso").val();
var NumTotalMercancias = $("#NumTotalMercancias").val();
var TipoFigura = $("#TipoFigura").val();
var RFCFigura = $("#RFCFigura").val();
var NumLicencia = $("#NumLicencia").val();
var NombreFigura = $("#NombreFigura").val();
var MunicipioFigura = $("#MunicipioFigura").val();
var EstadoFigura = $("#EstadoFigura").val();
var PaisFigura = $("#PaisFigura").val();
var CodigoPostalFigura = $("#CodigoPostalFigura").val();
var PermSCT = $("#PermSCT").val();
var NumPermisoSCT = $("#NumPermisoSCT").val();
var ConfigVehicular = $("#ConfigVehicular").val();
var PesoBrutoVehicular = $("#PesoBrutoVehicular").val();
var PlacaVM = $("#PlacaVM").val();
var AnioModeloVM = $("#AnioModeloVM").val();
var AseguraRespCivil = $("#AseguraRespCivil").val();
var PolizaRespCivil = $("#PolizaRespCivil").val();
var SubTipoRem = $("#SubTipoRem").val();
var PlacaSubTipoRemolque = $("#PlacaSubTipoRemolque").val();
var ColoniaOrigen = $("#ColoniaOrigen").val();
var CalleOrigen = $("#CalleOrigen").val();
var numInteriorOrigen = $("#numInteriorOrigen").val();
var coloniaDestino = $("#coloniaDestino").val();
var calleDestino = $("#calleDestino").val();
var numInteriorDestino = $("#numInteriorDestino").val();
var nombreRazonSocialUbicacionOrigen = $("#nombreRazonSocialUbicacionOrigen").val();
var nombreRazonSocialUbicacionDestino = $("#nombreRazonSocialUbicacionDestino").val();
var listMercancias = $("#listMercancias").val();
var remolqueCartaPorte = $("#remolqueCartaPorte").val();
var numExteriorOrigen = $("#numExteriorOrigen").val();
var numExteriorDestino = $("#numExteriorDestino").val();
var apellidoFigura = $("#apellidoFigura").val();
var AseguraMedAmbiente = $("#AseguraMedAmbiente").val();
var PolizaMedAmbiente = $("#PolizaMedAmbiente").val();

     $("#btnSaveCartaporte").attr("disabled", true);

     var datos = new FormData();
datos.append("idCartaporte", idCartaporte);
datos.append("idEmpresa", idEmpresa);
datos.append("idSucursal", idSucursal);
datos.append("idCustumer", idCustumer);
datos.append("folio", folio);
datos.append("idUser", idUser);
datos.append("listProducts", listProducts);
datos.append("taxes", taxes);
datos.append("IVARetenido", IVARetenido);
datos.append("ISRRetenido", ISRRetenido);
datos.append("subTotal", subTotal);
datos.append("total", total);
datos.append("balance", balance);
datos.append("date", date);
datos.append("dateVen", dateVen);
datos.append("quoteTo", quoteTo);
datos.append("delivaryTime", delivaryTime);
datos.append("generalObservations", generalObservations);
datos.append("UUID", UUID);
datos.append("idQuote", idQuote);
datos.append("tipoComprobanteRD", tipoComprobanteRD);
datos.append("folioCombrobanteRD", folioCombrobanteRD);
datos.append("RFCReceptor", RFCReceptor);
datos.append("usoCFDI", usoCFDI);
datos.append("metodoPago", metodoPago);
datos.append("formaPago", formaPago);
datos.append("razonSocialReceptor", razonSocialReceptor);
datos.append("codigoPostalReceptor", codigoPostalReceptor);
datos.append("regimenFiscalReceptor", regimenFiscalReceptor);
datos.append("idVehiculo", idVehiculo);
datos.append("idChofer", idChofer);
datos.append("tipoVehiculo", tipoVehiculo);
datos.append("idArqueoCaja", idArqueoCaja);
datos.append("TranspInternac", TranspInternac);
datos.append("TotalDistRec", TotalDistRec);
datos.append("IDUbicacionOrigen", IDUbicacionOrigen);
datos.append("RFCRemitenteDestinatarioOrigen", RFCRemitenteDestinatarioOrigen);
datos.append("FechaHoraSalidaLlegadaOrigen", FechaHoraSalidaLlegadaOrigen);
datos.append("DistanciaRecorridaOrigen", DistanciaRecorridaOrigen);
datos.append("LocalidadOrigen", LocalidadOrigen);
datos.append("ReferenciaOrigen", ReferenciaOrigen);
datos.append("MunicipioOrigen", MunicipioOrigen);
datos.append("EstadoOrigen", EstadoOrigen);
datos.append("PaisOrigen", PaisOrigen);
datos.append("CodigoPostalOrigen", CodigoPostalOrigen);
datos.append("IDUbicacionDestino", IDUbicacionDestino);
datos.append("RFCRemitenteDestinatarioDestino", RFCRemitenteDestinatarioDestino);
datos.append("FechaHoraSalidaLlegadaDestino", FechaHoraSalidaLlegadaDestino);
datos.append("DistanciaRecorridaDestino", DistanciaRecorridaDestino);
datos.append("LocalidadDestino", LocalidadDestino);
datos.append("ReferenciaDestino", ReferenciaDestino);
datos.append("MunicipioDestino", MunicipioDestino);
datos.append("EstadoDestino", EstadoDestino);
datos.append("PaisDestino", PaisDestino);
datos.append("CodigoPostalDestino", CodigoPostalDestino);
datos.append("PesoBrutoTotal", PesoBrutoTotal);
datos.append("UnidadPeso", UnidadPeso);
datos.append("NumTotalMercancias", NumTotalMercancias);
datos.append("TipoFigura", TipoFigura);
datos.append("RFCFigura", RFCFigura);
datos.append("NumLicencia", NumLicencia);
datos.append("NombreFigura", NombreFigura);
datos.append("MunicipioFigura", MunicipioFigura);
datos.append("EstadoFigura", EstadoFigura);
datos.append("PaisFigura", PaisFigura);
datos.append("CodigoPostalFigura", CodigoPostalFigura);
datos.append("PermSCT", PermSCT);
datos.append("NumPermisoSCT", NumPermisoSCT);
datos.append("ConfigVehicular", ConfigVehicular);
datos.append("PesoBrutoVehicular", PesoBrutoVehicular);
datos.append("PlacaVM", PlacaVM);
datos.append("AnioModeloVM", AnioModeloVM);
datos.append("AseguraRespCivil", AseguraRespCivil);
datos.append("PolizaRespCivil", PolizaRespCivil);
datos.append("SubTipoRem", SubTipoRem);
datos.append("PlacaSubTipoRemolque", PlacaSubTipoRemolque);
datos.append("ColoniaOrigen", ColoniaOrigen);
datos.append("CalleOrigen", CalleOrigen);
datos.append("numInteriorOrigen", numInteriorOrigen);
datos.append("coloniaDestino", coloniaDestino);
datos.append("calleDestino", calleDestino);
datos.append("numInteriorDestino", numInteriorDestino);
datos.append("nombreRazonSocialUbicacionOrigen", nombreRazonSocialUbicacionOrigen);
datos.append("nombreRazonSocialUbicacionDestino", nombreRazonSocialUbicacionDestino);
datos.append("listMercancias", listMercancias);
datos.append("remolqueCartaPorte", remolqueCartaPorte);
datos.append("numExteriorOrigen", numExteriorOrigen);
datos.append("numExteriorDestino", numExteriorDestino);
datos.append("apellidoFigura", apellidoFigura);
datos.append("AseguraMedAmbiente", AseguraMedAmbiente);
datos.append("PolizaMedAmbiente", PolizaMedAmbiente);


     $.ajax({

         url: "<?= base_url('admin/cartaporte/save') ?>",
         method: "POST",
         data: datos,
         cache: false,
         contentType: false,
         processData: false,
         success: function (respuesta) {
             if (respuesta.match(/Correctamente.*/)) {
        
                 Toast.fire({
                     icon: 'success',
                     title: "Guardado Correctamente"
                 });

                 tableCartaporte.ajax.reload();
                 $("#btnSaveCartaporte").removeAttr("disabled");


                 $('#modalAddCartaporte').modal('hide');
             } else {

                 Toast.fire({
                     icon: 'error',
                     title: respuesta
                 });

                 $("#btnSaveCartaporte").removeAttr("disabled");
                

             }

         }

     }

     ).fail(function (jqXHR, textStatus, errorThrown) {

        if (jqXHR.status === 0) {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "No hay conexión.!" + jqXHR.responseText
            });

            $("#btnSaveCartaporte").removeAttr("disabled");


        } else if (jqXHR.status == 404) {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Requested page not found [404]" + jqXHR.responseText
            });

            $("#btnSaveCartaporte").removeAttr("disabled");

        } else if (jqXHR.status == 500) {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Internal Server Error [500]." + jqXHR.responseText
            });


            $("#btnSaveCartaporte").removeAttr("disabled");

        } else if (textStatus === 'parsererror') {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Requested JSON parse failed." + jqXHR.responseText
            });

           $("#btnSaveCartaporte").removeAttr("disabled");

        } else if (textStatus === 'timeout') {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Time out error." + jqXHR.responseText
            });

           $("#btnSaveCartaporte").removeAttr("disabled");

        } else if (textStatus === 'abort') {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Ajax request aborted." + jqXHR.responseText
            });

            $("#btnSaveCartaporte").removeAttr("disabled");

        } else {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: 'Uncaught Error: ' + jqXHR.responseText
            });


            $("#btnSaveCartaporte").removeAttr("disabled");

        }
    })

 });



 /**
  * Carga datos actualizar
  */


 /*=============================================
  EDITAR Cartaporte
  =============================================*/
 $(".tableCartaporte").on("click", ".btnEditCartaporte", function () {

     var idCartaporte = $(this).attr("idCartaporte");
        
     var datos = new FormData();
     datos.append("idCartaporte", idCartaporte);

     $.ajax({

         url: "<?= base_url('admin/cartaporte/getCartaporte')?>",
         method: "POST",
         data: datos,
         cache: false,
         contentType: false,
         processData: false,
         dataType: "json",
         success: function (respuesta) {
             $("#idCartaporte").val(respuesta["id"]);
             
             $("#idEmpresa").val(respuesta["idEmpresa"]).trigger("change");
$("#idSucursal").val(respuesta["idSucursal"]);
$("#idCustumer").val(respuesta["idCustumer"]);
$("#folio").val(respuesta["folio"]);
$("#idUser").val(respuesta["idUser"]);
$("#listProducts").val(respuesta["listProducts"]);
$("#taxes").val(respuesta["taxes"]);
$("#IVARetenido").val(respuesta["IVARetenido"]);
$("#ISRRetenido").val(respuesta["ISRRetenido"]);
$("#subTotal").val(respuesta["subTotal"]);
$("#total").val(respuesta["total"]);
$("#balance").val(respuesta["balance"]);
$("#date").val(respuesta["date"]);
$("#dateVen").val(respuesta["dateVen"]);
$("#quoteTo").val(respuesta["quoteTo"]);
$("#delivaryTime").val(respuesta["delivaryTime"]);
$("#generalObservations").val(respuesta["generalObservations"]);
$("#UUID").val(respuesta["UUID"]);
$("#idQuote").val(respuesta["idQuote"]);
$("#tipoComprobanteRD").val(respuesta["tipoComprobanteRD"]);
$("#folioCombrobanteRD").val(respuesta["folioCombrobanteRD"]);
$("#RFCReceptor").val(respuesta["RFCReceptor"]);
$("#usoCFDI").val(respuesta["usoCFDI"]);
$("#metodoPago").val(respuesta["metodoPago"]);
$("#formaPago").val(respuesta["formaPago"]);
$("#razonSocialReceptor").val(respuesta["razonSocialReceptor"]);
$("#codigoPostalReceptor").val(respuesta["codigoPostalReceptor"]);
$("#regimenFiscalReceptor").val(respuesta["regimenFiscalReceptor"]);
$("#idVehiculo").val(respuesta["idVehiculo"]);
$("#idChofer").val(respuesta["idChofer"]);
$("#tipoVehiculo").val(respuesta["tipoVehiculo"]);
$("#idArqueoCaja").val(respuesta["idArqueoCaja"]);
$("#TranspInternac").val(respuesta["TranspInternac"]);
$("#TotalDistRec").val(respuesta["TotalDistRec"]);
$("#IDUbicacionOrigen").val(respuesta["IDUbicacionOrigen"]);
$("#RFCRemitenteDestinatarioOrigen").val(respuesta["RFCRemitenteDestinatarioOrigen"]);
$("#FechaHoraSalidaLlegadaOrigen").val(respuesta["FechaHoraSalidaLlegadaOrigen"]);
$("#DistanciaRecorridaOrigen").val(respuesta["DistanciaRecorridaOrigen"]);
$("#LocalidadOrigen").val(respuesta["LocalidadOrigen"]);
$("#ReferenciaOrigen").val(respuesta["ReferenciaOrigen"]);
$("#MunicipioOrigen").val(respuesta["MunicipioOrigen"]);
$("#EstadoOrigen").val(respuesta["EstadoOrigen"]);
$("#PaisOrigen").val(respuesta["PaisOrigen"]);
$("#CodigoPostalOrigen").val(respuesta["CodigoPostalOrigen"]);
$("#IDUbicacionDestino").val(respuesta["IDUbicacionDestino"]);
$("#RFCRemitenteDestinatarioDestino").val(respuesta["RFCRemitenteDestinatarioDestino"]);
$("#FechaHoraSalidaLlegadaDestino").val(respuesta["FechaHoraSalidaLlegadaDestino"]);
$("#DistanciaRecorridaDestino").val(respuesta["DistanciaRecorridaDestino"]);
$("#LocalidadDestino").val(respuesta["LocalidadDestino"]);
$("#ReferenciaDestino").val(respuesta["ReferenciaDestino"]);
$("#MunicipioDestino").val(respuesta["MunicipioDestino"]);
$("#EstadoDestino").val(respuesta["EstadoDestino"]);
$("#PaisDestino").val(respuesta["PaisDestino"]);
$("#CodigoPostalDestino").val(respuesta["CodigoPostalDestino"]);
$("#PesoBrutoTotal").val(respuesta["PesoBrutoTotal"]);
$("#UnidadPeso").val(respuesta["UnidadPeso"]);
$("#NumTotalMercancias").val(respuesta["NumTotalMercancias"]);
$("#TipoFigura").val(respuesta["TipoFigura"]);
$("#RFCFigura").val(respuesta["RFCFigura"]);
$("#NumLicencia").val(respuesta["NumLicencia"]);
$("#NombreFigura").val(respuesta["NombreFigura"]);
$("#MunicipioFigura").val(respuesta["MunicipioFigura"]);
$("#EstadoFigura").val(respuesta["EstadoFigura"]);
$("#PaisFigura").val(respuesta["PaisFigura"]);
$("#CodigoPostalFigura").val(respuesta["CodigoPostalFigura"]);
$("#PermSCT").val(respuesta["PermSCT"]);
$("#NumPermisoSCT").val(respuesta["NumPermisoSCT"]);
$("#ConfigVehicular").val(respuesta["ConfigVehicular"]);
$("#PesoBrutoVehicular").val(respuesta["PesoBrutoVehicular"]);
$("#PlacaVM").val(respuesta["PlacaVM"]);
$("#AnioModeloVM").val(respuesta["AnioModeloVM"]);
$("#AseguraRespCivil").val(respuesta["AseguraRespCivil"]);
$("#PolizaRespCivil").val(respuesta["PolizaRespCivil"]);
$("#SubTipoRem").val(respuesta["SubTipoRem"]);
$("#PlacaSubTipoRemolque").val(respuesta["PlacaSubTipoRemolque"]);
$("#ColoniaOrigen").val(respuesta["ColoniaOrigen"]);
$("#CalleOrigen").val(respuesta["CalleOrigen"]);
$("#numInteriorOrigen").val(respuesta["numInteriorOrigen"]);
$("#coloniaDestino").val(respuesta["coloniaDestino"]);
$("#calleDestino").val(respuesta["calleDestino"]);
$("#numInteriorDestino").val(respuesta["numInteriorDestino"]);
$("#nombreRazonSocialUbicacionOrigen").val(respuesta["nombreRazonSocialUbicacionOrigen"]);
$("#nombreRazonSocialUbicacionDestino").val(respuesta["nombreRazonSocialUbicacionDestino"]);
$("#listMercancias").val(respuesta["listMercancias"]);
$("#remolqueCartaPorte").val(respuesta["remolqueCartaPorte"]);
$("#numExteriorOrigen").val(respuesta["numExteriorOrigen"]);
$("#numExteriorDestino").val(respuesta["numExteriorDestino"]);
$("#apellidoFigura").val(respuesta["apellidoFigura"]);
$("#AseguraMedAmbiente").val(respuesta["AseguraMedAmbiente"]);
$("#PolizaMedAmbiente").val(respuesta["PolizaMedAmbiente"]);


         }

     })

 })


 /*=============================================
  ELIMINAR cartaporte
  =============================================*/
 $(".tableCartaporte").on("click", ".btn-delete", function () {

     var idCartaporte = $(this).attr("data-id");

     Swal.fire({
         title: '<?= lang('boilerplate.global.sweet.title') ?>',
         text: "<?= lang('boilerplate.global.sweet.text') ?>",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: '<?= lang('boilerplate.global.sweet.confirm_delete') ?>'
     })
             .then((result) => {
                 if (result.value) {
                     $.ajax({
                         url: `<?= base_url('admin/cartaporte') ?>/` + idCartaporte,
                         method: 'DELETE',
                     }).done((data, textStatus, jqXHR) => {
                         Toast.fire({
                             icon: 'success',
                             title: jqXHR.statusText,
                         });


                         tableCartaporte.ajax.reload();
                     }).fail((error) => {
                         Toast.fire({
                             icon: 'error',
                             title: error.responseJSON.messages.error,
                         });
                     })
                 }
             })
 })

 $(function () {
    $("#modalAddCartaporte").draggable();
    
});


</script>
<?= $this->endSection() ?>
        