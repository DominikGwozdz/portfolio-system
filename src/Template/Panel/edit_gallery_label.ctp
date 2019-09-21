<?php
$this->layout = 'panel';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Galeria <?= h($gallery->name) ?></h1>
    </div>

    <div>
        <?= $this->Flash->render() ?>
    </div>

    <?php if($gallery->picture): ?>
    <img src="/assets/<?= h($gallery->picture) ?>" class="img-fluid w-25" />
    <?php else: ?>
    <p>Brak okładki</p>
    <?php endif; ?>


    <div class="mt-5">
        <?= $this->Form->create("single_gallery", ['url' => '/panel/update_gallery_label/' . $gallery->id, 'enctype' => 'multipart/form-data']) ?>
        <?= $this->Form->control('image_path', ['type' => 'file', 'label' => __('Wybierz zdjęcie: ')]) ?>
        <?php if($gallery->picture): ?>
            <?= $this->Form->control('Zmień', ['type' => 'submit', 'class' => 'btn btn-success mt-3']) ?>
        <?php else: ?>
            <?= $this->Form->control('Dodaj', ['type' => 'submit', 'class' => 'btn btn-success mt-3']) ?>
        <?php endif; ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<!-- /.container-fluid -->
