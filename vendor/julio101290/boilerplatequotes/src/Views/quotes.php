<?= $this->include('julio101290\boilerplate\Views\load/daterangapicker') ?>
<?= $this->include('julio101290\boilerplate\Views\load/toggle') ?>
<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplatequotes\Views\modulesQuotes/modaSendMail') ?>


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


        </div>
        <div class="float-right">
            <div class="btn-group">

                <a href="<?= base_url("admin/newQuotes") ?>" class="btn btn-primary btnAddCustumers" data-target="#modalAddCustumers"><i class="fa fa-plus"></i>

                   <?= lang("quotes.add") ?>

                </a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableQuotes" class="table table-striped table-hover va-middle tableQuotes">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>
                                    <?= lang("quotes.fields.custumer") ?>
                                </th>
                                <th>
                                    <?= lang("quotes.fields.date") ?>
                                </th>

                                <th>
                                    <?= lang("quotes.fields.expirationDate") ?>
                                </th>
                                <th>
                                    <?= lang("quotes.fields.subTotal") ?>
                                </th>
                                <th>
                                    <?= lang("quotes.fields.tax") ?>
                                </th>
                                <th>
                                    <?= lang("quotes.fields.total") ?>
                                </th>
                                <th>
                                    <?= lang("quotes.fields.timeDelevery") ?>
                                </th>
                                <th>
                                    <?= lang("quotes.fields.created_at") ?>
                                </th>
                                <th>
                                    <?= lang("quotes.fields.updated_at") ?>
                                </th>
                                <th>
                                     <?= lang("quotes.fields.deleted_at") ?>
                                </th>

                                <th>
                                    <?= lang("quotes.fields.actions") ?>
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

    var tableQuotes = $('#tableQuotes').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [
            [1, 'desc']
        ],

        ajax: {
            url: '<?= base_url('admin/quotes') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
            orderable: false,
            targets: [10],
            searchable: false,
            targets: [10]

        }],
        columns: [{
                'data': 'id'
            },


            {
                'data': 'nameCustumer'
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



                "data": function(data) {

                    if (data.idSell > 0) {

                        return `<td class="text-right py-0 align-middle">
                         <div disabled class="btn-group btn-group-sm">
                            
                             <button  class="btn btn-success btnSendMail" data-toggle="modal" correoCliente ="${data.correoCliente}" uuid="${data.UUID}" folio="${data.folio}" data-toggle="modal" data-target="#modalSendMail"  >  <i class=" fas fa-envelope"></i></button>
                             <button  class="btn bg-warning btnImprimirCotizacion" uuid="${data.UUID}" ><i class="far fa-file-pdf"></i></button>
                           
                         </div>
                         </td>`

                    } else {

                        return `<td class="text-right py-0 align-middle">
                         <div disabled class="btn-group btn-group-sm">
                             <a href="<?= base_url('admin/editQuote') ?>/${data.UUID}" class="btn btn-primary btn-edit"><i class="fas fa-pencil-alt"></i></a>
                             <a  href="<?= base_url('admin/convertQuote') ?>/${data.UUID}" class="btn bg-navy"><i class="fas fa-comments-dollar"></i></a>
                             <button  class="btn btn-success btnSendMail" data-toggle="modal" correoCliente ="${data.correoCliente}" uuid="${data.UUID}" folio="${data.folio}" data-toggle="modal" data-target="#modalSendMail"  >  <i class=" fas fa-envelope"></i></button>
                             <button  class="btn bg-warning btnImprimirCotizacion" uuid="${data.UUID}" ><i class="far fa-file-pdf"></i></button>
                             <button  class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                    }

                }
            }
        ]
    });



    /*=============================================
      ENVIAR CORREO  
     =============================================*/

    $(".tableQuotes").on("click", '.btnSendMail', function() {

        var uuid = $(this).attr("uuid");
        var folio = $(this).attr("folio");
        var correo = $(this).attr("correocliente");

        var newOption = new Option(correo, correo, true, true);
        $('#correos').append(newOption).trigger('change');

        $("#uuidMail").val(uuid);
        $("#folioCotizacionMail").val(folio);


    });



    /*=============================================
  IMPRIMIR COTIZACIÓN
  =============================================*/

    $(".tableQuotes").on("click", '.btnImprimirCotizacion', function() {

        var uuid = $(this).attr("uuid");


        window.open("<?= base_url('admin/quotes/report') ?>" + "/" + uuid, "_blank");

    });


    /*=============================================
     DELETE QUOTES
     =============================================*/
    $(".tableQuotes").on("click", ".btn-delete", function() {

        var idQuote = $(this).attr("data-id");

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
                        url: `<?= base_url('admin/quotes') ?>/` + idQuote,
                        method: 'DELETE',
                    }).done((data, textStatus, jqXHR) => {
                        Toast.fire({
                            icon: 'success',
                            title: jqXHR.statusText,
                        });


                        tableQuotes.ajax.reload();
                    }).fail((error) => {
                        Toast.fire({
                            icon: 'error',
                            title: error.responseJSON.messages.error,
                        });
                    })
                }
            })
    })

    $(function() {
        //  $("#modalAddCustumers").draggable();

    });



    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();
        var todas = true;

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));





            var desdeFecha = start.format('YYYY-MM-DD');
            var hastaFecha = end.format('YYYY-MM-DD');

            tableQuotes.ajax.url(`<?= base_url('admin/quotes') ?>/` + desdeFecha + '/' + hastaFecha).load();


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