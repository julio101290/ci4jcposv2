<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesSapservicelayer/modalCaptureSapservicelayer') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
 <div class="card-header">
     <div class="float-right">
         <div class="btn-group">

             <button class="btn btn-primary btnAddSapservicelayer" data-toggle="modal" data-target="#modalAddSapservicelayer"><i class="fa fa-plus"></i>

                 <?= lang('sapservicelayer.add') ?>

             </button>

         </div>
     </div>
 </div>
 <div class="card-body">
     <div class="row">
         <div class="col-md-12">
             <div class="table-responsive">
                 <table id="tableSapservicelayer" class="table table-striped table-hover va-middle tableSapservicelayer">
                     <thead>
                         <tr>

                             <th>#</th>
                             <th><?= lang('sapservicelayer.fields.idEmpresa') ?></th>
<th><?= lang('sapservicelayer.fields.description') ?></th>
<th><?= lang('sapservicelayer.fields.url') ?></th>
<th><?= lang('sapservicelayer.fields.port') ?></th>
<th><?= lang('sapservicelayer.fields.companyDB') ?></th>
<th><?= lang('sapservicelayer.fields.password') ?></th>
<th><?= lang('sapservicelayer.fields.username') ?></th>
<th><?= lang('sapservicelayer.fields.created_at') ?></th>
<th><?= lang('sapservicelayer.fields.updated_at') ?></th>
<th><?= lang('sapservicelayer.fields.deleted_at') ?></th>

                             <th><?= lang('sapservicelayer.fields.actions') ?> </th>

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

 var tableSapservicelayer = $('#tableSapservicelayer').DataTable({
     processing: true,
     serverSide: true,
     responsive: true,
     autoWidth: false,
     order: [[1, 'asc']],

     ajax: {
         url: '<?= base_url('admin/sapservicelayer') ?>',
         method: 'GET',
         dataType: "json"
     },
     columnDefs: [{
             orderable: false,
             targets: [11],
             searchable: false,
             targets: [11]

         }],
     columns: [{
             'data': 'id'
         },
        
          
{
    'data': 'idEmpresa'
},
 
{
    'data': 'description'
},
 
{
    'data': 'url'
},
 
{
    'data': 'port'
},
 
{
    'data': 'companyDB'
},
 
{
    'data': 'password'
},
 
{
    'data': 'username'
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
                 return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-warning btnEditSapservicelayer" data-toggle="modal" idSapservicelayer="${data.id}" data-target="#modalAddSapservicelayer">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
             }
         }
     ]
 });



 $(document).on('click', '#btnSaveSapservicelayer', function (e) {

     
var idSapservicelayer = $("#idSapservicelayer").val();
var idEmpresa = $("#idEmpresa").val();
var description = $("#description").val();
var url = $("#url").val();
var port = $("#port").val();
var companyDB = $("#companyDB").val();
var password = $("#password").val();
var username = $("#username").val();

     $("#btnSaveSapservicelayer").attr("disabled", true);

     var datos = new FormData();
datos.append("idSapservicelayer", idSapservicelayer);
datos.append("idEmpresa", idEmpresa);
datos.append("description", description);
datos.append("url", url);
datos.append("port", port);
datos.append("companyDB", companyDB);
datos.append("password", password);
datos.append("username", username);


     $.ajax({

         url: "<?= base_url('admin/sapservicelayer/save') ?>",
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

                 tableSapservicelayer.ajax.reload();
                 $("#btnSaveSapservicelayer").removeAttr("disabled");


                 $('#modalAddSapservicelayer').modal('hide');
             } else {

                 Toast.fire({
                     icon: 'error',
                     title: respuesta
                 });

                 $("#btnSaveSapservicelayer").removeAttr("disabled");
                

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

            $("#btnSaveSapservicelayer").removeAttr("disabled");


        } else if (jqXHR.status == 404) {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Requested page not found [404]" + jqXHR.responseText
            });

            $("#btnSaveSapservicelayer").removeAttr("disabled");

        } else if (jqXHR.status == 500) {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Internal Server Error [500]." + jqXHR.responseText
            });


            $("#btnSaveSapservicelayer").removeAttr("disabled");

        } else if (textStatus === 'parsererror') {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Requested JSON parse failed." + jqXHR.responseText
            });

           $("#btnSaveSapservicelayer").removeAttr("disabled");

        } else if (textStatus === 'timeout') {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Time out error." + jqXHR.responseText
            });

           $("#btnSaveSapservicelayer").removeAttr("disabled");

        } else if (textStatus === 'abort') {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Ajax request aborted." + jqXHR.responseText
            });

            $("#btnSaveSapservicelayer").removeAttr("disabled");

        } else {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: 'Uncaught Error: ' + jqXHR.responseText
            });


            $("#btnSaveSapservicelayer").removeAttr("disabled");

        }
    })

 });



 /**
  * Carga datos actualizar
  */


 /*=============================================
  EDITAR Sapservicelayer
  =============================================*/
 $(".tableSapservicelayer").on("click", ".btnEditSapservicelayer", function () {

     var idSapservicelayer = $(this).attr("idSapservicelayer");
        
     var datos = new FormData();
     datos.append("idSapservicelayer", idSapservicelayer);

     $.ajax({

         url: "<?= base_url('admin/sapservicelayer/getSapservicelayer')?>",
         method: "POST",
         data: datos,
         cache: false,
         contentType: false,
         processData: false,
         dataType: "json",
         success: function (respuesta) {
             $("#idSapservicelayer").val(respuesta["id"]);
             
             $("#idEmpresa").val(respuesta["idEmpresa"]).trigger("change");
$("#description").val(respuesta["description"]);
$("#url").val(respuesta["url"]);
$("#port").val(respuesta["port"]);
$("#companyDB").val(respuesta["companyDB"]);
$("#password").val(respuesta["password"]);
$("#username").val(respuesta["username"]);


         }

     })

 })


 /*=============================================
  ELIMINAR sapservicelayer
  =============================================*/
 $(".tableSapservicelayer").on("click", ".btn-delete", function () {

     var idSapservicelayer = $(this).attr("data-id");

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
                         url: `<?= base_url('admin/sapservicelayer') ?>/` + idSapservicelayer,
                         method: 'DELETE',
                     }).done((data, textStatus, jqXHR) => {
                         Toast.fire({
                             icon: 'success',
                             title: jqXHR.statusText,
                         });


                         tableSapservicelayer.ajax.reload();
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
    $("#modalAddSapservicelayer").draggable();
    
});


</script>
<?= $this->endSection() ?>
        