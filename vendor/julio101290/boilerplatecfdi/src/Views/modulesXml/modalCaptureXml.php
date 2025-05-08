<!-- Modal Xml -->
<div class="modal fade" id="modalAddXml" tabindex="-1" role="dialog" aria-labelledby="modalAddXml" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('xml.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-xml" class="form-horizontal">
                    <input type="hidden" id="idXml" name="idXml" value="0">


                    <div class="form-group row">
                        <label for="emitidoRecibido" class="col-sm-2 col-form-label">Empresa</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control" name="idEmpresaModal" id="idEmpresaModal" style = "width:80%;">
                                    <option value="0">Seleccione empresa</option>
                                    <?php
                                    foreach ($empresas as $key => $value) {

                                        echo "<option value='$value[id]' selected>$value[id] - $value[nombre] </option>  ";
                                    }
                                    ?>

                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="archivoXML" class="col-sm-2 col-form-label">Archivo XML</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>


                                <input type="file" name="archivoXML[]" id="archivoXML" accept="text/xml" class="form-control <?= session('error.archivoXML') ? 'is-invalid' : '' ?>" value="<?= old('archivoXML') ?>" placeholder="<?= lang('xml.fields.archivoXML') ?> " multiple autocomplete="off">

                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveXml"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddXml', function (e) {


        $(".form-control").val("");

        $("#idXml").val("0");

        $("#btnSaveXml").removeAttr("disabled");


        $("#idEmpresaModal").val(0).trigger("change");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditXml', function (e) {


        var idXml = $(this).attr("idXml");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idXml").val(idXml);
        $("#btnGuardarXml").removeAttr("disabled");

    });


    $("#idEmpresaModal").select2();




    $(document).on('click', '#btnSaveXml', function (e) {

        var idXML = $("#idXml").val();
        var idEmpresa = $("#idEmpresaModal").val();
       
        var archivos = $("#archivoXML").prop("files");





        var archivo = $("#archivoXML").html();
        //VALIDA QUE SE ALLA CARGADO EL ARCHIVO


        console.log("Archivo XML:", archivo);

        if (idEmpresa == "0") {

            Toast.fire({
                icon: 'error',
                title: "Selecciona la Empresa"
            });
            return;


        }


        if ($("#archivoXML").val() == "") {


            Toast.fire({
                icon: 'error',
                title: "Selecciona el archivo"
            });
            return;
        }


        $("#btnSaveProducts").attr("disabled", true);

        var datos = new FormData();
        datos.append("idEmpresa", idEmpresa);
        
        for (var i = 0; i < archivos.length; i++) {
            datos.append("txt_archivo[]", archivos[i]);
        }
        datos.append("idXML", idXML);




        $.ajax({

            url: "<?= base_url('admin/xml/save') ?>",
            method: "post",
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

                    tableProducts.ajax.reload();
                    $("#btnSaveProducts").removeAttr("disabled");


                    $('#modalAddProducts').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveProducts").removeAttr("disabled");

                }
            }

        });

    });

</script>


<?= $this->endSection() ?>
        