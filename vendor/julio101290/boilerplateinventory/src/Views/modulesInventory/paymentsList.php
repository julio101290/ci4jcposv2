<!-- Modal Pacientes -->
<div class="modal fade" id="modalPaymentsList" tabindex="-1" role="dialog" aria-labelledby="modalPaymentsList"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Seleccione Articulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table-payments" class="table table-striped table-hover va-middle tablePayments">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Importe Pagado</th>
                                        <th>Importe Devuelto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <?= lang('boilerplate.global.close') ?>
                </button>

            </div>
        </div>
    </div>
</div>



<?= $this->section('js') ?>


<script>


/*

    var tableProducts = $('#table-payments').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url('admin/payments/getPayments') ?>/0',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
            orderable: false,
            targets: [2],
            searchable: false,
            targets: [2]

        }],
        columns: [{
            'data': 'id'
        },
        {
            'data': 'datePayment'
        },

        {
            'data': 'importPayment'
        },

        {
            'data': 'importBack'
        },

        {
            "data": function (data) {
                return `<td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <button class="btn-danger btn-delete btnDeletePayment" data-id="${data.id}" ><i class="fas fa-trash"></i></button>
                            </div>
                            </td>`
            }
        }
        ]
    });

*/
    /**
     * Evento al hacer click al boton btnAgregarDiagnostico
     */


    $("#table-products").on("click", ".btnAddProduct", function () {



        var idProduct = $(this).attr("data-id");
        var description = $(this).attr("description");
        var codeProduct = $(this).attr("code");
        var salePrice = $(this).attr("price");
        var porcentTax = $(this).attr("porcentTax");

        var tax = ((porcentTax * 0.01)) * salePrice;
        var neto = ((porcentTax * 0.01) + 1) * salePrice;


        /**
         * Agregando registros
         */
        var renglon = "<div class=\"form-group row nuevoProduct\">";
        renglon = renglon + "<div class =\"col-1\"> <button type=\"button\" class=\"btn btn-danger quitProduct\" ><strong>X</strong></button>  </div>";
        renglon = renglon + "<div class =\"col-1\"> <input type=\"text\" id=\"codeProduct\" class=\"form-control codeProduct\"  name=\"codeProduct\" value=\"" + codeProduct + "\" required=\"\"> </div>";
        renglon = renglon + "<div class =\"col-7\"> <input type=\"text\" id=\"description\" class=\"form-control description\" idProducto =\"" + idProduct + "\" name=\"description\" value=\"" + description + "\" required=\"\"> </div>";
        renglon = renglon + "<div class =\"col-1\"> <input type=\"number\" id=\"cant\" class=\"form-control cant\"name=\"cant\" value=\"1\" required=\"\"> <input type=\"hidden\" id=\"porcentTax\" class=\"form-control porcentTax\"name=\"porcentTax\" value=\"" + porcentTax + "\" required=\"\"></div>";
        renglon = renglon + "<div class =\"col-1\"> <input type=\"number\" id=\"price\" class=\"form-control price\"name=\"price\" value=\"" + salePrice + "\" required=\"\"> <input type=\"hidden\" id=\"tax\" class=\"form-control tax\"name=\"tax\" value=\"" + tax + "\" required=\"\"> </div>";


        renglon = renglon + "<div class =\"col-1\"> <input readonly type=\"number\" id=\"total\" class=\"form-control total\" name=\"total\" value=\"" + salePrice + "\" required=\"\"> <input type=\"hidden\" id=\"neto\" class=\"form-control neto\" name=\"neto\" value=\"" + neto + "\" required=\"\"></div></div>";


        console.log(renglon);

        $(".rowProducts").append(renglon);

        listProducts();

    });




    /**
     * Eliminar Renglon Diagnostico
     */

    $(".rowProducts").on("click", ".quitProduct", function () {

        $(this).parent().parent().remove();

        listProducts();

    });



    /**
     * Cambia Cantidad
     */

    $(".rowProducts").on("change", ".cant", function () {

        
        var cant = Number($(this).val());
        
        

        precio = $(this).parent().parent().find(".price").val();

        total = Number(cant) * Number(precio);

        porcIva = Number($(this).parent().parent().find(".porcentTax").val())*0.01;

        neto = (porcIva+1)*Number(total);

        impuesto = (porcIva)*Number(total);

        $(this).parent().parent().find(".total").val(total);

        $(this).parent().parent().find(".neto").val(neto);

        $(this).parent().parent().find(".tax").val(impuesto);
        
        listProducts();

    });


        /**
     * Cambia Cantidad
     */

    $(".rowProducts").on("change", ".price", function () {

        
        var precio = Number($(this).val());
        
        

        cant = $(this).parent().parent().find(".cant").val();

        total = Number(cant) * Number(precio);

        porcIva = Number($(this).parent().parent().find(".porcentTax").val())*0.01;

        neto = (porcIva+1)*Number(total);

        impuesto = (porcIva)*Number(total);

        $(this).parent().parent().find(".total").val(total);

        $(this).parent().parent().find(".neto").val(neto);

        $(this).parent().parent().find(".tax").val(impuesto);
        
        listProducts();

    });


</script>


<?= $this->endSection() ?>