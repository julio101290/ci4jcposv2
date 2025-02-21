<!-- Modal Usuarios por tipo nomina -->
<div class="modal fade" id="modalUsuariosAlmacen" tabindex="-1" role="dialog" aria-labelledby="modalUsuariosAlmacen" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal Usuarios Por Almacen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="tabla-usuariosAlmacen" class="table table-striped table-hover va-middle tabla-usuariosAlmacen">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
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
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>

            </div>
        </div>
    </div>
</div>



<?= $this->section('js') ?>


<script>
    var tablaUsuarios = $('#tabla-usuariosAlmacen').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        order: [
            [0, 'asc']
        ],


        ajax: {
            url: `<?= base_url('admin/almacen/usuariosPorAlmacen') ?>/` + "0",
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
                             <button class="btn btn-success btnActivate" status="on"  idEmpresa="${data.idEmpresa}" idStorage="${data.idStorage}"  idUser="${data.id}" idAlmacenUsuario="${data.idAlmacenUsuario}">ON</button>
                             
                         </div>
                         </td>`;


                    } else {

                        return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-danger btnActivate" status="off" idEmpresa="${data.idEmpresa}"  idStorage="${data.idStorage}"  idUser="${data.id}" idAlmacenUsuario="${data.idAlmacenUsuario}">OFF</button>
                             
                         </div>
                         </td>`;


                    }

                }
            }
        ]
    });



    /**
     * Carga datos actualizar
     */
    $(".tableStorages").on("click", ".btn-users", function() {

        var almacen = $(this).attr("data-id");

        console.log("almacen:", almacen);

        tablaUsuarios.ajax.url(`<?= base_url('admin/almacen/usuariosPorAlmacen') ?>/` + almacen).load();


    });


    /**
     * Guarda derecho
     */

    $(".tabla-usuariosAlmacen").on("click", ".btnActivate", function() {


        var statusActual = $(this).attr("status");
        var idAlmacenUsuario = $(this).attr("idAlmacenUsuario");
        var idUsuario = $(this).attr("iduser");
        var idEmpresa = $(this).attr("idEmpresa");
        var idStorage = $(this).attr("idStorage");


        if (statusActual == "on") {

            var status = "off";
        } else {

            var status = "on";

        }



        var datos = new FormData();
        datos.append("idUsuario", idUsuario);
        datos.append("id", idAlmacenUsuario);
        datos.append("idEmpresa", idEmpresa);
        datos.append("idStorage", idStorage);
        datos.append("status", status);


        $.ajax({

            url: "<?= base_url('admin/almacen/activarDesactivar') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                if (respuesta == "ok") {

                    tablaUsuarios.ajax.url(`<?= base_url('admin/almacen/usuariosPorAlmacen') ?>/` + idStorage).load();


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