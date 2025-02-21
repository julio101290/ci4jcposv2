<?= $this->include('julio101290\boilerplate\Views\load/toggle') ?>
<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplateinventory\Views\modulesInventory/dataHeadInventory') ?>
<?= $this->include('julio101290\boilerplateinventory\Views\modulesInventory/productosModalInventory') ?>
<?= $this->include('julio101290\boilerplateinventory\Views\modulesInventory/modalPayment') ?>
<?= $this->include('julio101290\boilerplateinventory\Views\modulesInventory/moreInfoRow') ?>
<?= $this->include('julio101290\boilerplateproducts\Views\modulesProducts/modalCaptureProducts') ?>
<?= $this->include('julio101290\boilerplatecustumers\Views\modulesCustumers/modalCaptureCustumers') ?>

<?= $this->endSection() ?>
