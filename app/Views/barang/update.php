<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<?php

$nama = [
    'name' => 'nama',
    'id' => 'nama',
    'value' => $barang->nama,
    'class' => 'form-control'
];

$harga = [
    'name' => 'harga',
    'id' => 'harga',
    'value' => $barang->harga,
    'class' => 'form-control',
    'type' => 'number',
    'min' => 0
];

$stok = [
    'name' => 'stok',
    'id' => 'stok',
    'value' => $barang->stok,
    'class' => 'form-control',
    'type' => 'number',
    'min' => 0
];

$gambar = [
    'name' => 'gambar',
    'id' => 'gambar',
    'value' => null,
    'class' => 'form-control'
];

$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Submit',
    'class' => 'btn btn-success',
    'type' => 'submit'
];


?>

<h1>Update Barang</h1>

<?= form_open_multipart('barang/update/' . $barang->id); ?>
<div class="form-group">
    <?= form_label("Nama", "nama"); ?>
    <?= form_input($nama); ?>
</div>
<div class="form-group">
    <?= form_label("Harga", "harga"); ?>
    <?= form_input($harga); ?>
</div>
<div class="form-group">
    <?= form_label("Stok", "stok"); ?>
    <?= form_input($stok); ?>
</div>

<img src="<?= base_url('uploads/' . $barang->gambar) ?>" class="img-fluid" alt="image">

<div class="form-group">
    <?= form_label("Gambar", "gambar"); ?>
    <?= form_upload($gambar); ?>
</div>
<div class="text-right">
    <?= form_submit($submit); ?>
    <hr>
</div>
<?= form_close(); ?>

<?= $this->endSection(); ?>