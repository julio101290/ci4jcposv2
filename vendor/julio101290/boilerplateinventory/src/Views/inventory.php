<?= $this->include('julio101290\boilerplate\Views\load/daterangapicker') ?>
<?= $this->include('julio101290\boilerplate\Views\load/toggle') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>


<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>


<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplateinventory\Views\modulesInventory/modaSendMail') ?>
<?= $this->include('julio101290\boilerplateinventory\Views\modulesInventory/modalPaymentList') ?>
<?= $this->include('julio101290\boilerplateinventory\Views\modulesInventory/paymentsList') ?>



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



                <input type="checkbox" id="chkTodasLasVentas" name="chkTodasLasVentas" class="chkTodasLasVentas" data-width="250" data-height="40" checked data-toggle="toggle" data-on="Todas las ventas" data-off="Pendientes de Pago" data-onstyle="success" data-offstyle="danger">

            </div>


        </div>

        <div class="float-right">
            <div class="btn-group">

                <a href="<?= base_url("admin/newInventory") ?>" class="btn btn-primary btnAddCustumers" data-target="#modalAddCustumers"><i class="fa fa-plus"></i>

                    Nueva Entrada/Salida
                   
                </a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-md-12">

                <div class="table-responsive">

                    <table id="tableInventory" class="table table-striped table-hover va-middle tableInventory">

                        <thead>

                            <tr>

                                <th>#</th>
                                <th>
                                    <?= lang("inventory.fields.firstname") ?> 
                                </th>

                                <th>
                                     <?= lang("inventory.fields.lastname") ?> 
                                </th>
                                <th>
                                     <?= lang("inventory.fields.date") ?> 
                                </th>

                                <th>
                                     <?= lang("inventory.fields.expirationDate") ?> 
                                </th>
                                <th>
                                     <?= lang("inventory.fields.subTotal") ?> 
                                </th>
                                <th>
                                     <?= lang("inventory.fields.subTotal") ?> 
                                </th>
                                <th>
                                    <?= lang("inventory.fields.Total") ?> 
                                </th>

                                <th>
                                    <?= lang("inventory.fields.pendingPayment") ?> 
                                </th>
                                <th>
                                   <?= lang("inventory.fields.timeDelevery") ?> 
                                </th>
                                <th>
                                    <?= lang("inventory.fields.created_at") ?> 
                                </th>
                                <th>
                                    <?= lang("inventory.fields.updated_at") ?> 
                                </th>
                                <th>
                                    <?= lang("inventory.fields.deleted_at") ?> 
                                </th>

                                <th>
                                    <?= lang("inventory.fields.actions") ?> 
                                </th>

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

    var tableInventory = $('#tableInventory').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [
            [1, 'desc']
        ],

        ajax: {
            url: '<?= base_url('admin/inventory') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [13],
                searchable: false,
                targets: [13]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'firstname'
            },
            {
                'data': 'lastname'
            },

            {
                'data': 'date'
            },

            {
                'data': 'dateVen'
            },

            {
                'data': 'subTotal'
            },

            {
                'data': 'taxes'
            },

            {
                'data': 'total'
            },

            {
                'data': 'balance'
            },

            {
                'data': 'delivaryTime'
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
                "data": function (data) {

                    var buttonPayment = "";

                    if (data.balance > 0) {

                        buttonPayment = `<button class="btn btn-success btnSetPayment" data-toggle="modal" balance ="${data.balance}" uuid="${data.UUID}" folio="${data.folio}" data-toggle="modal" data-target="#modalPayment"  >  <i class="fab fa-cc-visa"></i></button> `;

                    } else {

                        buttonPayment = `<button class="btn btn-success "   uuid="${data.UUID}" folio="${data.folio}">  <i class="far fa-check-square"></i></button> `;

                    }

                    return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <a href="<?= base_url('admin/editInventory') ?>/${data.UUID}" class="btn btn-primary btn-edit"><i class="fas fa-pencil-alt"></i></a>
                             <button class="btn btn-success btnSendMail" data-toggle="modal" correoCliente ="${data.correoCliente}" uuid="${data.UUID}" folio="${data.folio}" data-toggle="modal" data-target="#modalSendMail"  >  <i class=" fas fa-envelope"></i></button>
                             <button class="btn bg-warning btnImprimirVenta" uuid="${data.UUID}" ><i class="far fa-file-pdf"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                             ${buttonPayment}
                             <button class="btn bg-maroon btnPaymentsList" data-toggle="modal"  uuid="${data.UUID}" data-toggle="modal" data-target="#modalPaymentsList"  >  <i class="fas fa-search"></i></button>
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

    $("#chkTodasLasVentas").on("change", function () {

        var datePicker = $('#reportrange').data('daterangepicker');
        var desdeFecha = datePicker.startDate.format('YYYY-MM-DD');
        var hastaFecha = datePicker.endDate.format('YYYY-MM-DD');


        if ($(this).is(':checked')) {

            todas = true;

        } else {

            todas = false;

        }

        tableInventory.ajax.url(`<?= base_url('admin/inventory') ?>/` + desdeFecha + '/' + hastaFecha + '/' + todas).load();

    });

    /*=============================================
     Load Payment List 
     =============================================*/

    $(".tableSells").on("click", '.btnPaymentsList', function () {


        var uuid = $(this).attr("uuid");

        console.log(uuid);

        // tableProducts.ajax.url(`<?= base_url('admin/payments/getPayments') ?>/` + uuid).load();

    });


    /*=============================================
     ENVIAR CORREO  
     =============================================*/

    $(".tableInventory").on("click", '.btnSendMail', function () {

        var uuid = $(this).attr("uuid");
        var folio = $(this).attr("folio");
        var correo = $(this).attr("correocliente");


        var newOption = new Option(correo, correo);
        $('#correos').append(newOption).trigger('change');

        $("#uuidMail").val(uuid);
        $("#folioVentanMail").val(folio);


    });


    /*=============================================
     ENVIAR CORREO  
     =============================================*/

    $(".tableInventory").on("click", '.btnSetPayment', function () {

        var uuid = $(this).attr("uuid");
        var balance = $(this).attr("balance");

        $("#uuidSellPayment").val(uuid);
        $("#granTotal").val(balance);


    });




    /*=============================================
     IMPRIMIR VEnta
     =============================================*/

    $(".tableInventory").on("click", '.btnImprimirVenta', function () {

        var uuid = $(this).attr("uuid");


        window.open("<?= base_url('admin/inventory/report') ?>" + "/" + uuid, "_blank");

    });


    /*=============================================
     ELIMINAR custumers
     =============================================*/
    $(".tableInventory").on("click", ".btn-delete", function () {

        var idInventory = $(this).attr("data-id");

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
                            url: `<?= base_url('admin/inventory') ?>/` + idInventory,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableInventory.ajax.reload();
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

        var start = moment().subtract(29, 'days');
        var end = moment();
        var todas = true;

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

            if ($('#chkTodasLasVentas').is(':checked')) {

                todas = true;

            } else {

                todas = false;

            }



            var desdeFecha = start.format('YYYY-MM-DD');
            var hastaFecha = end.format('YYYY-MM-DD');

            tableInventory.ajax.url(`<?= base_url('admin/inventory') ?>/` + desdeFecha + '/' + hastaFecha + '/' + todas).load();


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
</script>
<?= $this->endSection() ?>