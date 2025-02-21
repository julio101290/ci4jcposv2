<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>



<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?= lang('settings.settings.title') ?></h3>
                    </div>
                    <form action="<?= base_url('admin/settings') ?>/save" method="post">
                        <?= csrf_field() ?>

                        <div class="card-body">


                            <div class="form-group">
                                <label for="nombreEmpresa"><?= lang('settings.settings.nameCorporation') ?></label>
                                <input type="text" class="form-control" id="nameCompanie" value="<?= $data["nameCompanie"] ?>"  name="nameCompanie" placeholder="<?= lang('settings.nameCompanie') ?>">
                            </div>

                            <div class="form-group">
                                <label for="correoElectronico"><?= lang('settings.settings.email') ?></label>
                                <input type="email" class="form-control" value="<?= $data["email"] ?>" id="email" name="email" placeholder="<?= lang('settings.email') ?>">
                            </div>

                            <div class="form-group">
                                <label for="RFC"><?= lang('settings.settings.ID') ?></label>
                                <input type="text" class="form-control" value="<?= $data["idTax"] ?>" id="idTax" name="idTax" placeholder="<?= lang('settings.idTaxPlaceholder') ?>">
                            </div>


                            <div class="form-group">
                                <label for="telefono"><?= lang('settings.settings.phone') ?></label>
                                <input type="text" class="form-control" value="<?= $data["phoneNumber"] ?>" id="phoneNumber" name="phoneNumber" placeholder="<?= lang('settings.phoneNumberPlaceholder') ?>">
                            </div>

                            <div class="form-group">
                                <label for="languaje"><?= lang('settings.settings.languaje') ?></label>
                               
                                <select type="select2" class="form-control"  id="languaje" name="languaje" >

                                    <option value="en"><?= lang('settings.settings.languajeOptionEN') ?></option>
                                    <option value="es"><?= lang('settings.settings.languajeOptionES') ?></option>
                                    <option value="it"><?= lang('settings.settings.languajeOptionIT') ?></option>
                                    <option value="de"><?= lang('settings.settings.languajeOptionDE') ?></option>
                                    <option value="eo"><?= lang('settings.settings.languajeOptionEP') ?></option>

                                </select>
                            </div>


                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btnSave"><?= lang('settings.settings.save') ?></button>
                        </div>
                    </form>
                </div>





            </div>



        </div>

    </div>
</section>


<?= $this->endSection() ?>


<?= $this->section('js') ?>

<script>
    
    $("#languaje").val("<?= $data["languaje"] ?>");

</script>

<?= $this->endSection() ?>
        