<?php
$this->layout = 'panel';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div>
        <?= $this->Flash->render() ?>
    </div>


    <img src="/assets/<?= h($gallery_item->url) ?>" class="img-fluid w-25" />



    <div class="mt-5">
        <a href="/panel/edit_gallery_item_delete/<?= h($gallery_item->id) ?>" class="btn btn-danger">Usuń zdjęcie</a>
    </div>
</div>

<!-- /.container-fluid -->
