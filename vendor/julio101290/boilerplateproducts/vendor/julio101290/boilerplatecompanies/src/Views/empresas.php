<?= $this->include('julio101290\boilerplate\Views\load/toggle') ?>
<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplatecompanies\Views\modulosEmpresas/modalCapturaEmpresas') ?>
<?= $this->include('julio101290\boilerplatecompanies\Views\modulosEmpresas/usuariosEmpresaModal') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddEmpresa" data-toggle="modal" data-target="#modalAddEmpresa"><i class="fa fa-plus"></i>

                    <?= lang('empresas.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableEmpresas" class="table table-striped table-hover va-middle tableEmpresas">
                        <thead>
                            <tr>



                                <th>#</th>
                                <th><?= lang('empresas.fields.nombre') ?></th>
                                <th><?= lang('empresas.fields.direccion') ?></th>
                                <th><?= lang('empresas.fields.rfc') ?></th>
                                <th><?= lang('empresas.fields.logo') ?></th>
                                <th><?= lang('empresas.fields.regimenFiscal') ?></th>
                                <th><?= lang('empresas.fields.razonSocial') ?></th>
                                <th><?= lang('empresas.fields.codigoPostal') ?></th>
                                <th><?= lang('empresas.fields.CURP') ?></th>
                                <th><?= lang('empresas.fields.Created_at') ?></th>
                                <th><?= lang('empresas.fields.Update_At') ?></th>
                                <th><?= lang('empresas.fields.acciones') ?> </th>


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

    var tableEmpresas = $('#tableEmpresas').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [
            [1, 'asc']
        ],

        ajax: {
            url: '<?= base_url('admin/empresas') ?>',
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
                'data': 'nombre'
            },

            {
                'data': 'direccion'
            },

            {
                'data': 'rfc'
            },

            {
                'data': 'logo'
            },

            {
                'data': 'regimenFiscal'
            },

            {
                'data': 'razonSocial'
            },

            {
                'data': 'codigoPostal'
            },

            {
                'data': 'CURP'
            },

            {
                'data': 'created_at'
            },

            {
                'data': 'updated_at'
            },



            {
                "data": function(data) {
                    return `<td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-warning btnEditEmpresa" data-toggle="modal" idEmpresa="${data.id}" data-target="#modalAddEmpresa">  <i class=" fa fa-edit"></i></button>
                                <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>

                                <button class="btn btn-success btn-users" data-id="${data.id}" data-toggle="modal" data-target="#modalUsuariosEmpresa"><i class="fas fa-users"></i></button>
                            </div>
                            </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveEmpresa', function(e) {



        var idEmpresa = $("#idEmpresa").val();
        var nombre = $("#nombre").val();
        var direccion = $("#direccion").val();
        var telefono = $("#telefono").val();
        var correoElectronico = $("#correoElectronico").val();
        var razonSocial = $("#razonSocial").val();

        var rfc = $("#rfc").val();
        var CURP = $("#CURP").val();
        var regimenFiscal = $("#regimenFiscal").val();
        var codigoPostal = $("#codigoPostal").val();

        var certificado = $("#certificado").prop("files")[0];
        var archivoKey = $("#archivoKey").prop("files")[0];
        var contraCertificado = $("#contraCertificado").val();
        
        
        var certificadoCSD = $("#certificadoCSD").prop("files")[0];
        var archivoKeyCSD = $("#archivoKeyCSD").prop("files")[0];
        var contraCertificadoCSD = $("#contraCertificadoCSD").val();
        
        var logo = $("#logo").prop("files")[0];

        var email = $("#email").val();
        var host = $("#host").val();
        var smtpDebug = $("#smtpDebug").val();
        var SMTPAuth = $("#SMTPAuth").val();
        var smptSecurity = $("#smptSecurity").val();

        var port = $("#port").val();
        var pass = $("#pass").val();

        if ($("#facturacionRD").is(':checked')) {

            var facturacionRD = "on";

        } else {

            var facturacionRD = "off";

        }




        $("#btnSaveEmpresa").attr("disabled", true);

        var datos = new FormData();
        datos.append("idEmpresa", idEmpresa);
        datos.append("nombre", nombre);
        datos.append("direccion", direccion);
        datos.append("telefono", telefono);
        datos.append("correoElectronico", correoElectronico);
        datos.append("razonSocial", razonSocial);
        datos.append("codigoPostal", codigoPostal);

        datos.append("rfc", rfc);
        datos.append("CURP", CURP);
        datos.append("regimenFiscal", regimenFiscal);
        
        datos.append("certificado", certificado);
        datos.append("archivoKey", archivoKey);
        datos.append("contraCertificado", contraCertificado);
        
        datos.append("certificadoCSD", certificadoCSD);
        datos.append("archivoKeyCSD", archivoKeyCSD);
        datos.append("contraCertificadoCSD", contraCertificadoCSD);
        
        datos.append("logo", logo);

        datos.append("email", email);
        datos.append("host", host);
        datos.append("smtpDebug", smtpDebug);
        datos.append("SMTPAuth", SMTPAuth);
        datos.append("smptSecurity", smptSecurity);
        datos.append("port", port);
        datos.append("pass", pass);
        datos.append("facturacionRD", facturacionRD);

        $.ajax({

                url: "<?= base_url('admin/empresas/save') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                //dataType:"json",
                success: function(respuesta) {


                    if (respuesta.match(/Correctamente.*/)) {


                        Toast.fire({
                            icon: 'success',
                            title: "<?= lang('empresas..msg.msg_save') ?>"
                        });


                        tableEmpresas.ajax.reload();
                        $("#btnSaveEmpresa").removeAttr("disabled");


                        $('#modalAddEmpresa').modal('hide');
                    } else {

                        Toast.fire({
                            icon: 'error',
                            title: respuesta
                        });

                        $("#btnSaveEmpresa").removeAttr("disabled");
                        //  $('#modalAgregarPaciente').modal('hide');

                    }

                }

            }

        )




    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR PACIENTE
     =============================================*/
    $(".tableEmpresas").on("click", ".btnEditEmpresa", function() {

        var idEmpresa = $(this).attr("idEmpresa");



        var datos = new FormData();
        datos.append("idEmpresa", idEmpresa);

        $.ajax({

            url: "<?= base_url('admin/empresas/obtenerEmpresa') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                console.log(respuesta);
                $("#idEmpresa").val(respuesta["id"]);
                $("#nombre").val(respuesta["nombre"]);
                $("#direccion").val(respuesta["direccion"]);
                $("#rfc").val(respuesta["rfc"]);
                $("#telefono").val(respuesta["telefono"]);
                $("#diasEntrega").val(respuesta["diasEntrega"]);
                $("#caja").val(respuesta["caja"]);
                $("#contraCertificado").val(respuesta["contraCertificado"]);
                $("#regimenFiscal").val(respuesta["regimenFiscal"]);
                $("#regimenFiscal").trigger("change");
                $("#razonSocial ").val(respuesta["razonSocial"]);
                $("#codigoPostal").val(respuesta["codigoPostal"]);
                $("#CURP").val(respuesta["CURP"]);
                $("#correoElectronico").val(respuesta["correoElectronico"]);

                $("#email").val(respuesta["email"]);
                $("#host").val(respuesta["host"]);
                $("#smtpDebug").val(respuesta["smtpDebug"]);
                $("#SMTPAuth").val(respuesta["SMTPAuth"]);
                $("#smptSecurity").val(respuesta["smptSecurity"]);
                $("#port").val(respuesta["port"]);
                $("#pass").val(respuesta["pass"]);

                $("#smtpDebug").trigger("change");
                $("#SMTPAuth").trigger("change");
                $("#smptSecurity").trigger("change");
                
                $("#contraCertificadoCSD").val(respuesta["contraCertificadoCSD"]);

                $("#facturacionRD").bootstrapToggle(respuesta["facturacionRD"]);

                if (respuesta["logo"] != "") {


                    $(".previsualizarLogo").attr('src', '<?= base_URL("images/logo") ?>' + '/' + respuesta["logo"]);

                }


            }

        })

    })


    /*=============================================
     ELIMINAR PACIENTE
     =============================================*/
    $(".tableEmpresas").on("click", ".btn-delete", function() {

        var idEmpresa = $(this).attr("data-id");


        console.log("eliminar");

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
                        url: `<?= base_url('admin/empresas') ?>/` + idEmpresa,
                        method: 'DELETE',
                    }).done((data, textStatus, jqXHR) => {
                        Toast.fire({
                            icon: 'success',
                            title: jqXHR.statusText,
                        });


                        tableEmpresas.ajax.reload();
                    }).fail((error) => {
                        Toast.fire({
                            icon: 'error',
                            title: error.responseJSON.messages.error,
                        });
                    })
                }
            })
    });


    $('#regimenFiscal').select2();


    /*=============================================
     SUBIENDO LA FOTO DEL USUARIO
     =============================================*/
    $(".logo").change(function() {

        var imagen = this.files[0];

        /*=============================================
         VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
         =============================================*/

        if (imagen["type"] != "image/png") {

            $(".logo").val("");

            Toast.fire({
                icon: 'error',
                title: "<?= lang('empresas.imagenesFormato') ?>",
            });


        } else if (imagen["size"] > 2000000) {

            $(".logo").val("");

            Toast.fire({
                icon: 'error',
                title: "<?= lang('empresas.imagenesPeso') ?>",
            });


        } else {

            var datosImagen = new FileReader;
            datosImagen.readAsDataURL(imagen);

            $(datosImagen).on("load", function(event) {

                var rutaImagen = event.target.result;

                $(".previsualizarLogo").attr("src", rutaImagen);

            })

        }
    })
</script>
<?= $this->endSection() ?>
