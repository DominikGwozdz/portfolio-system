<?php
$this->layout = 'panel';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Galeria <?= h($single_gallery->name) ?></h1>
    </div>

    <div>
        <?= $this->Flash->render() ?>
    </div>

    <?php foreach ($gallery_items as $item) : ?>
        <img src="/assets/<?= h($item->url) ?>" class="img-fluid w-25" />
    <?php endforeach; ?>

    <div class="mt-5">
        <?= $this->Form->create("single_gallery", ['url' => '/panel/update_gallery/' . $single_gallery->id, 'enctype' => 'multipart/form-data']) ?>
        <?= $this->Form->control('image_path', ['type' => 'file', 'label' => __('Wybierz zdjęcie: ')]) ?>
        <?= $this->Form->control('Dodaj', ['type' => 'submit', 'class' => 'btn btn-success mt-3']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<!-- /.container-fluid -->
