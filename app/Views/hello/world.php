<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1>Hello World</h1>
<h4>Hai
    <?php
    echo session()->get('username');
    ?>
</h4>

<?php echo $this->endSection() ?>