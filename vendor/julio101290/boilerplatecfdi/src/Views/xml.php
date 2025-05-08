<?= $this->include('julio101290\boilerplate\Views\load/daterangapicker') ?>
<?= $this->include('julio101290\boilerplate\Views\load/toggle') ?>
<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load/extrasDatatable') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplateCFDI\Views\modulesXml/modalCaptureXml') ?>
<?= $this->include('julio101290\boilerplateCFDI\Views\modulesXml/modalCancelarCFDI') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">



        <div class="float-left">
            <div class="btn-group">

                <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>


            </div>



            <div class="btn-group">



                <div class="form-group">
                    <label for="idEmpresa"><?= lang('xml.companie') ?> </label>
                    <select id='idEmpresa' name='idEmpresa' class="idEmpresa" style='width: 80%;'>

                        <?php
                        if (isset($idEmpresa)) {

                            echo "   <option value='$idEmpresa'>$idEmpresa - $nombreEmpresa</option>";
                        } else {

                            echo "  <option value='0'>Todas las empresas</option>";

                            foreach ($empresas as $key => $value) {

                                echo "<option value='$value[id]'>$value[id] - $value[nombre] </option>  ";
                            }
                        }
                        ?>

                    </select>
                </div>

            </div>


            <div class="btn-group">

                <div class="form-group">
                    <label for="tipoComprobante"><?= lang('xml.tipoComprobante') ?> </label>
                    <select id='tiposComprobante' name='tiposComprobante' class="tiposComprobante" style='width: 80%;'>

                        <option value="0"><?= lang('xml.selectTipoComprobante') ?></option>
                        <?php
                        foreach ($tiposComprobante as $key => $value) {

                            echo "<option value='" . $value->id() . "'>" . $value->id() . " - " . $value->texto();
                        }
                        ?>

                    </select>
                </div>

            </div>



            <div class="btn-group">

                <div class="form-group">
                    <label for="emitidoRecibido"><?= lang('xml.emitidoRecibido') ?> </label>
                    <select id='emitidoRecibido' name='emitidoRecibido' class="emitidoRecibido" style='width: 80%;'>

                        <option value="0"><?= lang('xml.emitidoRecibidoAlls') ?></option>
                        <option value="emitido"><?= lang('xml.emitido') ?></option>
                        <option value="recibido"><?= lang('xml.recibido') ?></option>
                    </select>
                </div>

            </div>


            <div class="btn-group">


                <div class="form-group">
                    <label for="idEmpresa"><?= lang('xml.RFCEmisor') ?></label>
                    <select id='RFCEmisor' name='RFCEmisor' class="RFCEmisor" style='width: 80%;'>

                        <option value="0"><?= lang('xml.selectRFCEmisor') ?> </option>

                    </select>
                </div>

            </div>


            <div class="btn-group">

                <div class="form-group">
                    <label for="idEmpresa"><?= lang('xml.RFCReceptor') ?></label>
                    <select id='RFCReceptor' name='RFCReceptor' class="RFCReceptor" style='width: 80%;'>


                        <option value="0"><?= lang('xml.selectRFCReceptor') ?></option>

                    </select>
                </div>

            </div>



            <div class="btn-group">

                <div class="form-group">
                    <label for="idEmpresa"><?= lang('xml.usoCFDI') ?> </label>
                    <select id='usoCFDI' name='usoCFDI' class="usoCFDI" style='width: 80%;'>

                        <option value="0"><?= lang('xml.selectUsoCFDI') ?></option>
                        <?php
                        foreach ($usoCFDI as $key => $value) {

                            echo "<option value='" . $value->id() . "'>" . $value->id() . " - " . $value->texto();
                        }
                        ?>

                    </select>
                </div>

            </div>


            <div class="btn-group">

                <div class="form-group">
                    <label for="metodoPago"><?= lang('xml.metodoPago') ?> </label>
                    <select id='metodoPago' name='metodoPago' class="metodoPago" style='width: 80%;'>

                        <option value="0"><?= lang('xml.selectMetodoPago') ?> </option>
                        <?php
                        foreach ($metodoPago as $key => $value) {

                            echo "<option value='" . $value->id() . "'>" . $value->id() . " - " . $value->texto();
                        }
                        ?>

                    </select>
                </div>

            </div>


            <div class="btn-group">

                <div class="form-group">
                    <label for="formaPago"><?= lang('xml.formaPago') ?> </label>
                    <select id='formaPago' name='formaPago' class="formaPago" style='width: 80%;'>

                        <option value="0"><?= lang('xml.selectFormaPago') ?></option>
                        <?php
                        foreach ($formaPago as $key => $value) {

                            echo "<option value='" . $value->id() . "'>" . $value->id() . " - " . $value->texto();
                        }
                        ?>

                    </select>
                </div>

            </div>


            <div class="btn-group">

                <div class="form-group">
                    <label for="status"><?= lang('xml.status') ?> </label>
                    <select id='status' name='status' class="status" style='width: 80%;'>

                        <option value="0"><?= lang('xml.statusAlls') ?></option>
                        <option value="vigente"><?= lang('xml.statusVigente') ?></option>
                        <option value="cancelado"><?= lang('xml.statusCancelado') ?></option>

                    </select>
                </div>

            </div>

            <div class="btn-group" hidden>



                <input type="checkbox" id="chkTodasLosXML" name="chkTodasLosXML" class="chkTodasLosXML" data-width="250" data-height="40" checked data-toggle="toggle" data-on="Todos los XML" data-off="Solo Emitidos" data-onstyle="success" data-offstyle="danger">

            </div>


            <div class="btn-group">



                <button class="btn btn-primary btnSearch"><i class="fas fa-search"></i>



                </button>

            </div>


            <div class="btn-group">



                <button class="btn btn-success  btnDownload"><i class="fas fa-download"></i>



                </button>

            </div>


        </div>


        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddXml" data-toggle="modal" data-target="#modalAddXml"><i class="fa fa-plus"></i>

                    <?= lang('xml.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                <div class="table-responsive">
                    <table id="tableXml" class="table table-striped table-hover va-middle tableXml">
                        <thead>
                            <tr>

                                <th>
                                    
                                <?= lang('xml.fields.select') ?>

                                </th>
                                <th>
                                    <?= lang('xml.fields.uuidTimbre') ?>
                                </th>

                                <th>
                                    <?= lang('xml.fields.serie') ?>
                                </th>
                                <th>
                                    <?= lang('xml.fields.folio') ?>
                                </th>

                                <th>
                                    <?= lang('xml.fields.RFCEmisor') ?>
                                </th>

                                <th>
                                    <?= lang('xml.fields.RFCReceptor') ?>
                                </th>

                                <th>
                                    <?= lang('xml.fields.nombreReceptor') ?>
                                </th>

                                <th>
                                    <?= lang('xml.fields.nombreReceptor') ?>
                                </th>

                                <th>
                                    <?= lang('xml.fields.tipoComprobante') ?>
                                </th>
                                <th>
                                    <?= lang('xml.fields.fecha') ?>
                                </th>
                                <th>
                                    <?= lang('xml.fields.fechaTimbrado') ?>
                                </th>
                                <th>
                                    <?= lang('xml.fields.total') ?>
                                </th>
                                <th>
                                    <?= lang('xml.fields.created_at') ?>
                                </th>

                                <th>
                                    <?= lang('xml.fields.uuidPaquete') ?>
                                </th>


                                <th>
                                    Base 16
                                </th>

                                <th>
                                    Importe 16
                                </th>

                                <th>
                                    Base 8
                                </th>

                                <th>
                                    Importe 8
                                </th>


                                <th>
                                    Status
                                </th>



                                <th>
                                    <?= lang('xml.fields.actions') ?>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot align="right">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
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

    var tableXml = $('#tableXml').DataTable({

        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'pageLength'],
        lengthMenu: [
            [150, 200, 500, -1],
            ['150 renglones', '200 renglones', '500 renglones', 'Todo']
        ],
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [
            [10, 'desc']
        ],

        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(), data;

            // converting to interger to find total
            var intVal = function (i) {
                return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
            };


            var importeTotal = api
                    .column(11)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);


            importeTotal = parseFloat(importeTotal).toFixed(2);
            // Update footer by showing the total with the reference of the column index 
            $(api.column(0).footer()).html();
            $(api.column(1).footer()).html('');
            $(api.column(2).footer()).html('');
            $(api.column(3).footer()).html('');
            $(api.column(4).footer()).html('');
            $(api.column(5).footer()).html('');
            $(api.column(6).footer()).html('');
            $(api.column(7).footer()).html('');
            $(api.column(8).footer()).html('');
            $(api.column(9).footer()).html('');
            $(api.column(10).footer()).html('Total');
            $(api.column(11).footer()).html(importeTotal);
            $(api.column(12).footer()).html();
            $(api.column(13).footer()).html();
            $(api.column(14).footer()).html();
            $(api.column(14).footer()).html();
        },

        ajax: {
            url: '<?= base_url('admin/xml') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [0, 19],
                searchable: false,
                targets: [0, 19]

            }],
        columns: [{
                "data": function (data) {
                    return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <input type = "checkbox" class="chkSeleccionar" idFactura="${data.id}" id="chkSeleccionar" name ="chkSeleccionar" 
                              idXml="${data.uuidTimbre}" >
                           
                         </div>
                         </td>`
                }
            },

            {
                'data': 'uuidTimbre'
            },

            {
                'data': 'serie'
            },

            {
                'data': 'folio'
            },

            {
                'data': 'rfcEmisor'
            },

            {
                'data': 'rfcReceptor'
            },

            {
                'data': 'nombreEmisor'
            },

            {
                'data': 'nombreReceptor'
            },

            {
                'data': 'tipoComprobante'
            },

            {
                'data': 'fecha'
            },

            {
                'data': 'fechaTimbrado'
            },

            {
                'data': 'total'
            },

            {
                'data': 'created_at'
            },

            {
                'data': 'uuidPaquete'
            },

            {
                'data': 'base16'
            },

            {
                'data': 'totalImpuestos16'
            },

            {
                'data': 'base8'
            },

            {
                'data': 'totalImpuestos8'
            },

            {
                'data': 'status'
            },

            {
                "data": function (data) {
                    return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-success btnPDF" idXml="${data.uuidTimbre}" >  <i class=" far fa-file-pdf"></i></button>
                             <button class="btn btn-primary btn-descargarXML" uuid="${data.uuidTimbre}"><i class="fas fa-download"></i></button>
                             <button class="btn btn-danger btn-cancelaCFDI" data-toggle="modal"  uuid="${data.uuidTimbre}" data-toggle="modal" data-target="#modalCancelaCFDI"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    /**@abstract
     * 
     * Al cambiar la el rango de fecha
     */

    $("#chkTodasLosXML").on("change", function () {

        var datePicker = $('#reportrange').data('daterangepicker');
        var desdeFecha = datePicker.startDate.format('YYYY-MM-DD');
        var hastaFecha = datePicker.endDate.format('YYYY-MM-DD');
        var RFCEmisor = $("#RFCEmisor").val();
        var RFCReceptor = $("#RFCReceptor").val();
        var usoCFDI = $("#usoCFDI").val();
        var metodoPago = $("#metodoPago").val();
        var formaPago = $("#formaPago").val();
        var tipoComprobante = $("#tiposComprobante").val();
        var emitidoRecibido = $("#emitidoRecibido").val();
        var status = $("#status").val();



        if ($('#chkTodasLosXML').is(':checked')) {

            var todas = true;

        } else {

            var todas = false;

        }

        tableXml.ajax.url(`<?= base_url('admin/xmlFilters') ?>/`
                + desdeFecha
                + '/' + hastaFecha
                + '/' + todas
                + '/' + RFCEmisor
                + '/' + RFCReceptor
                + '/' + usoCFDI
                + '/' + metodoPago
                + '/' + formaPago
                + '/' + tipoComprobante
                + '/' + emitidoRecibido
                + '/' + status

                ).load();

    });

    /**
     * DESCARGAR XML
     */

    $(".tableXml").on("click", ".btn-descargarXML", function () {

        var uuid = $(this).attr("uuid");

        window.open("<?= base_url('admin/xml/descargaXML') ?>" + "/" + uuid, "_blank");

    })


    /*=============================================
     EDITAR Xml
     =============================================*/
    $(".tableXml").on("click", ".btnPDF", function () {

        var idXml = $(this).attr("idXml");

        window.open("<?= base_url('admin/xml/generarPDF') ?>" + "/" + idXml, "_blank");

    })


    /*=============================================
     EDITAR XML
     =============================================*/
    $(".tableXml").on("click", ".btn-cancelaCFDI", function () {

        $("#uuidACancelar").val("");
        var idXml = $(this).attr("uuid");
        $("#uuidACancelar").val(idXml);



    });




    /*=============================================
     ELIMINAR xml
     =============================================*/
    $(".tableXml").on("click", ".btn-delete", function () {

        var idXml = $(this).attr("data-id");

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
                            url: `<?= base_url('admin/xml') ?>/` + idXml,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableXml.ajax.reload();
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
        $("#modalAddXml").draggable();

    });


    $(function () {

        var start = moment().subtract(29, 'days');
        var end = moment();
        var todas = true;
        var RFCEmisor = $("#RFCEmisor").val();
        var RFCReceptor = $("#RFCReceptor").val();
        var usoCFDI = $("#usoCFDI").val();
        var metodoPago = $("#metodoPago").val();
        var formaPago = $("#formaPago").val();
        var tipoComprobante = $("#tiposComprobante").val();
        var emitidoRecibido = $("#emitidoRecibido").val();
        var status = $("#status").val();


        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

            if ($('#chkTodasLosXML').is(':checked')) {

                todas = true;

            } else {

                todas = false;

            }



            var desdeFecha = start.format('YYYY-MM-DD');
            var hastaFecha = end.format('YYYY-MM-DD');

            tableXml.ajax.url(`<?= base_url('admin/xmlFilters') ?>/`
                    + desdeFecha
                    + '/' + hastaFecha
                    + '/' + todas
                    + '/' + RFCEmisor
                    + '/' + RFCReceptor
                    + '/' + usoCFDI
                    + '/' + metodoPago
                    + '/' + formaPago
                    + '/' + tipoComprobante
                    + '/' + emitidoRecibido
                    + '/' + status

                    ).load();
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Hoy': [moment(), moment()],
                'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Ultimos 7 Dias': [moment().subtract(6, 'days'), moment()],
                'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
                'Este Mes': [moment().startOf('month'), moment().endOf('month')],
                'Último Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'Todo': [moment().subtract(100, 'year').startOf('month'), moment().add(100, 'year').endOf('year')]
            }
        }, cb);

        cb(start, end);



    });


    $("#idEmpresa").select2();


    // Initialize select2 storages
    $("#RFCEmisor").select2({
        ajax: {
            url: "<?= site_url('admin/xml/getRFCEmisorAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var idEmpresa = $('.idEmpresa').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                    idEmpresa: idEmpresa // search term
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);

                return {
                    results: response.data
                };
            },
            cache: true
        }
    });



    // Initialize select2 storages
    $("#RFCReceptor").select2({
        ajax: {
            url: "<?= site_url('admin/xml/getRFCReceptorAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var idEmpresa = $('.idEmpresa').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                    idEmpresa: idEmpresa // search term
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);

                return {
                    results: response.data
                };
            },
            cache: true
        }
    });



    /**
     * Cancela Timbre
     */

    $(".btnCancelarTimbre").on("click", function () {

        var uuidACancelar = $("#uuidACancelar").val();
        var motivoCancelacion = $("#motivoCancelacion").val();
        var observacionesCancelacion = $("#observacionesCancelacion").val();
        var uuidRelacionado = $("#uuidRelacionado").val();

        var datos = new FormData();
        datos.append("uuidACancelar", uuidACancelar);
        datos.append("motivoCancelacion", motivoCancelacion);
        datos.append("observacionesCancelacion", observacionesCancelacion);
        datos.append("uuidRelacionado", uuidRelacionado);


        $.ajax({

            url: "<?= base_url('admin/xml/cancelaCFDI') ?>",
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

                    tableCustumers.ajax.reload();
                    $("#btnSaveCustumers").removeAttr("disabled");


                    $('#modalAddCustumers').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveCustumers").removeAttr("disabled");


                }

            }
        })



    });


    $(".btnDownload").on("click", function () {



        var datePicker = $('#reportrange').data('daterangepicker');
        var desdeFecha = datePicker.startDate.format('YYYY-MM-DD');
        var hastaFecha = datePicker.endDate.format('YYYY-MM-DD');
        var RFCEmisor = $("#RFCEmisor").val();
        var RFCReceptor = $("#RFCReceptor").val();
        var usoCFDI = $("#usoCFDI").val();
        var metodoPago = $("#metodoPago").val();
        var formaPago = $("#formaPago").val();
        var tipoComprobante = $("#tiposComprobante").val();
        var emitidoRecibido = $("#emitidoRecibido").val();
        var status = $("#status").val();
        var seleccionados = "0";


        $("#chkSeleccionar:checked").each(function () {

            seleccionados = seleccionados + ',' + $(this).attr("idFactura");

        });


        seleccionados = JSON.stringify(seleccionados);


        var todas = true;


        window.open("<?= base_url('admin/xml/descargarXMLS') ?>" + "/" + desdeFecha
                + '/' + hastaFecha
                + '/' + todas
                + '/' + RFCEmisor
                + '/' + RFCReceptor
                + '/' + usoCFDI
                + '/' + metodoPago
                + '/' + formaPago
                + '/' + tipoComprobante
                + '/' + emitidoRecibido
                + '/' + status
                + '/' + seleccionados, "_blank");

    });

    $(".btnSearch").on("click", function () {

        cargaInformacion();

    });


    function cargaInformacion() {


        var datePicker = $('#reportrange').data('daterangepicker');
        var desdeFecha = datePicker.startDate.format('YYYY-MM-DD');
        var hastaFecha = datePicker.endDate.format('YYYY-MM-DD');
        var RFCEmisor = $("#RFCEmisor").val();
        var RFCReceptor = $("#RFCReceptor").val();
        var usoCFDI = $("#usoCFDI").val();
        var metodoPago = $("#metodoPago").val();
        var formaPago = $("#formaPago").val();
        var tipoComprobante = $("#tiposComprobante").val();
        var emitidoRecibido = $("#emitidoRecibido").val();
        var status = $("#status").val();


        var todas = true;


        tableXml.ajax.url(`<?= base_url('admin/xmlFilters') ?>/`
                + desdeFecha
                + '/' + hastaFecha
                + '/' + todas
                + '/' + RFCEmisor
                + '/' + RFCReceptor
                + '/' + usoCFDI
                + '/' + metodoPago
                + '/' + formaPago
                + '/' + tipoComprobante
                + '/' + emitidoRecibido
                + '/' + status
                ).load();


    }

    $("#usoCFDI").select2();
    $("#metodoPago").select2();
    $("#formaPago").select2();
    $("#tiposComprobante").select2();
    $("#emitidoRecibido").select2();
    $("#status").select2();
    $("#motivoCancelacion").select2();

<?php
if (isset($gastosFacturados)) {



    $filtrosGastrosFacturados = <<<EOT
                
                        var datePicker = $('#reportrange').data('daterangepicker');
                        var desdeFecha = moment().subtract(1, 'years'); 
                        var hastaFecha = moment();
                        var RFCEmisor = $("#RFCEmisor").val();
                        var RFCReceptor = $("#RFCReceptor").val();
                        var usoCFDI = $("#usoCFDI").val();
                        var metodoPago = $("#metodoPago").val();
                        var formaPago = $("#formaPago").val();
                        var tipoComprobante = $("#tiposComprobante").val();
                        var emitidoRecibido = "recibido";
                        var status = $("#status").val();

                        tableXml.ajax.url(`<?= base_url('admin/xmlFilters') ?>/`
                        + desdeFecha
                        + '/' + hastaFecha
                        + '/' + "I"
                        + '/' + RFCEmisor
                        + '/' + RFCReceptor
                        + '/' + usoCFDI
                        + '/' + metodoPago
                        + '/' + formaPago
                        + '/' + tipoComprobante
                        + '/' + emitidoRecibido
                        + '/' + status
                        ).load();
                        
            
                        $(".tiposComprobante").val("I").trigger("change");
                        $(".emitidoRecibido").val("recibido").trigger("change");
                        
                        EOT;

    echo $filtrosGastrosFacturados;
}


if (isset($ingresosNomina)) {



    $filtrosIngresosNominas = <<<EOT
                
                        var datePicker = $('#reportrange').data('daterangepicker');
                        
                        var desdeFecha = moment().subtract(1, 'years'); 
                        var hastaFecha = moment();
                        var RFCEmisor = $("#RFCEmisor").val();
                        var RFCReceptor = $("#RFCReceptor").val();
                        var usoCFDI = $("#usoCFDI").val();
                        var metodoPago = $("#metodoPago").val();
                        var formaPago = $("#formaPago").val();
                        var tipoComprobante = $("#tiposComprobante").val();
                        var emitidoRecibido = "recibido";
                        var status = $("#status").val();

                        tableXml.ajax.url(`<?= base_url('admin/xmlFilters') ?>/`
                        + desdeFecha
                        + '/' + hastaFecha
                        + '/' + "N"
                        + '/' + RFCEmisor
                        + '/' + RFCReceptor
                        + '/' + usoCFDI
                        + '/' + metodoPago
                        + '/' + formaPago
                        + '/' + tipoComprobante
                        + '/' + emitidoRecibido
                        + '/' + status
                        ).load();
            
                        $(".tiposComprobante").val("N").trigger("change");
                        $(".emitidoRecibido").val("recibido").trigger("change");

                        EOT;

    echo $filtrosIngresosNominas;
}

if (isset($facturasEmitidas)) {



    $filtrosFacturasEmitidas = <<<EOT
                
                        var datePicker = $('#reportrange').data('daterangepicker');
                        
                        var desdeFecha = moment().subtract(1, 'years'); 
                        var hastaFecha = moment();
                        var RFCEmisor = $("#RFCEmisor").val();
                        var RFCReceptor = $("#RFCReceptor").val();
                        var usoCFDI = $("#usoCFDI").val();
                        var metodoPago = $("#metodoPago").val();
                        var formaPago = $("#formaPago").val();
                        var tipoComprobante = "0";
                        var emitidoRecibido = "emitido";
                        var status = $("#status").val();

                        tableXml.ajax.url(`<?= base_url('admin/xmlFilters') ?>/`
                        + desdeFecha
                        + '/' + hastaFecha
                        + '/' + "N"
                        + '/' + RFCEmisor
                        + '/' + RFCReceptor
                        + '/' + usoCFDI
                        + '/' + metodoPago
                        + '/' + formaPago
                        + '/' + tipoComprobante
                        + '/' + emitidoRecibido
                        + '/' + status
                        ).load();
            
                        $(".tiposComprobante").val("0").trigger("change");
                        $(".emitidoRecibido").val("emitido").trigger("change");

                        EOT;

    echo $filtrosFacturasEmitidas;
}
?>



</script>
<?= $this->endSection() ?>