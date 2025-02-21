<!-- Modal Usuarios por tipo nomina -->
<div class="modal fade" id="modalUsuariosEmpresa" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioEmpresa" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('usuariosempresa.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="tabla-usuariosEmpresa" class="table table-striped table-hover va-middle tabla-usuariosEmpresa">
                                <thead>
                                    <tr>
                                        <th><?= lang('usuariosempresa.fields.idUsuario') ?></th>
                                        <th><?= lang('empresas.fields.acciones') ?></th>
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
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>

            </div>
        </div>
    </div>
</div>



<?= $this->section('js') ?>


<script>
    var tablaUsuarios = $('#tabla-usuariosEmpresa').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        order: [
            [0, 'asc']
        ],


        ajax: {
            url: `<?= base_url('admin/empresa/usuariosPorEmpresa') ?>/` + "0",
            method: 'GET',
            dataType: "json"

        },
        columnDefs: [{
            orderable: false,
            targets: [1],
            searchable: false,
            targets: [1]

        }],
        columns: [{
                'data': 'username'
            },

            {
                "data": function(data) {

                    if (data.status == "on") {

                        return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-success btnActivate" status="on"  idEmpresa="${data.idEmpresa}"  idUser="${data.id}" idEmpresaUsuario="${data.idNombreEmpresa}">ON</button>
                             
                         </div>
                         </td>`;


                    } else {

                        return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-danger btnActivate" status="off" idEmpresa="${data.idEmpresa}"  idUser="${data.id}" idEmpresaUsuario="${data.idNombreEmpresa}">OFF</button>
                             
                         </div>
                         </td>`;


                    }

                }
            }
        ]
    });


    //CARGA CONSULTAS ANTERIORES
    /**
     * Carga datos actualizar
     */
    $(".tableEmpresas").on("click", ".btn-users", function() {

        var empresa = $(this).attr("data-id");

        console.log("asd");
        tablaUsuarios.ajax.url(`<?= base_url('admin/empresa/usuariosPorEmpresa') ?>/` + empresa).load();


    });


    /**
     * Guarda derecho
     */

    $(".tabla-usuariosEmpresa").on("click", ".btnActivate", function() {


        var statusActual = $(this).attr("status");
        var idEmpresaUsuario = $(this).attr("idEmpresaUsuario");
        var idUsuario = $(this).attr("iduser");
        var idEmpresa = $(this).attr("idEmpresa");
      

        if (statusActual == "on") {

            var status = "off";
        } else {

            var status = "on";

        }



        var datos = new FormData();
        datos.append("idUsuario", idUsuario);
        datos.append("id", idEmpresaUsuario);
        datos.append("idEmpresa", idEmpresa);
        datos.append("status", status);


        $.ajax({

            url: "<?= base_url('admin/empresa/activarDesactivar') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                if (respuesta == "ok") {
                    tablaUsuarios.ajax.url(`<?= base_url('admin/empresa/usuariosPorEmpresa') ?>/` + idEmpresa).load();
                    console.log(respuesta);

                } else {

                    Toast.fire({
                            icon: 'error',
                            title: respuesta,
                        });

                   
                }



            }
        });
    })
</script>


<?= $this->endSection() ?>