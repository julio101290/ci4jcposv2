<!-- Modal Sapservicelayer -->
  <div class="modal fade" id="modalAddSapservicelayer" tabindex="-1" role="dialog" aria-labelledby="modalAddSapservicelayer" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"><?= lang('sapservicelayer.createEdit') ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="form-sapservicelayer" class="form-horizontal">
                      <input type="hidden" id="idSapservicelayer" name="idSapservicelayer" value="0">

                                  <div class="form-group row">
                <label for="emitidoRecibido" class="col-sm-2 col-form-label">Empresa</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        </div>

                        <select class="form-control idEmpresa" name="idEmpresa" id="idEmpresa" style = "width:80%;">
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
    <label for="description" class="col-sm-2 col-form-label"><?= lang('sapservicelayer.fields.description') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="description" id="description" class="form-control <?= session('error.description') ? 'is-invalid' : '' ?>" value="<?= old('description') ?>" placeholder="<?= lang('sapservicelayer.fields.description') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label"><?= lang('sapservicelayer.fields.url') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="url" id="url" class="form-control <?= session('error.url') ? 'is-invalid' : '' ?>" value="<?= old('url') ?>" placeholder="<?= lang('sapservicelayer.fields.url') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="port" class="col-sm-2 col-form-label"><?= lang('sapservicelayer.fields.port') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="port" id="port" class="form-control <?= session('error.port') ? 'is-invalid' : '' ?>" value="<?= old('port') ?>" placeholder="<?= lang('sapservicelayer.fields.port') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="companyDB" class="col-sm-2 col-form-label"><?= lang('sapservicelayer.fields.companyDB') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="companyDB" id="companyDB" class="form-control <?= session('error.companyDB') ? 'is-invalid' : '' ?>" value="<?= old('companyDB') ?>" placeholder="<?= lang('sapservicelayer.fields.companyDB') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label"><?= lang('sapservicelayer.fields.password') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="password" id="password" class="form-control <?= session('error.password') ? 'is-invalid' : '' ?>" value="<?= old('password') ?>" placeholder="<?= lang('sapservicelayer.fields.password') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label"><?= lang('sapservicelayer.fields.username') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="username" id="username" class="form-control <?= session('error.username') ? 'is-invalid' : '' ?>" value="<?= old('username') ?>" placeholder="<?= lang('sapservicelayer.fields.username') ?>" autocomplete="off">
        </div>
    </div>
</div>

        
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                  <button type="button" class="btn btn-primary btn-sm" id="btnSaveSapservicelayer"><?= lang('boilerplate.global.save') ?></button>
              </div>
          </div>
      </div>
  </div>

  <?= $this->section('js') ?>


  <script>

      $(document).on('click', '.btnAddSapservicelayer', function (e) {


          $(".form-control").val("");

          $("#idSapservicelayer").val("0");

          $("#btnSaveSapservicelayer").removeAttr("disabled");

      });

      /* 
       * AL hacer click al editar
       */



      $(document).on('click', '.btnEditSapservicelayer', function (e) {


          var idSapservicelayer = $(this).attr("idSapservicelayer");

          //LIMPIAMOS CONTROLES
          $(".form-control").val("");

          $("#idSapservicelayer").val(idSapservicelayer);
          $("#btnGuardarSapservicelayer").removeAttr("disabled");

      });


    $("#idEmpresa").select2();

  </script>


  <?= $this->endSection() ?>
        