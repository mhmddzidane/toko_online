<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <?php foreach ($model as $m) : ?>
            <div class="col-4">
                <div class="card text-center" style="margin-bottom:30px">
                    <div class="card-header">
                        <span class="text-success"><strong><?= $m->nama; ?></strong></span>
                    </div>
                    <div class="card-body">
                        <img src="<?= base_url('uploads/' . $m->gambar) ?>" class="img-thumbnail" style="height :200px; " alt="">
                        <h5 class="mt-3 text-success"><?= "Rp. " . number_format($m->harga, 2, ',', '.'); ?></h5>
                        <p class="text-info">Stok : <?= $m->stok ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= site_url('etalase/beli/' . $m->id) ?>" style="width:100%" class="btn btn-success">Beli</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection(); ?>