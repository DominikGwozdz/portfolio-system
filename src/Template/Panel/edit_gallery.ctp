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
        <?= $this->Form->control('Dodaj do galerii', ['type' => 'submit', 'class' => 'btn btn-success mt-3']) ?>
        <?= $this->Form->end() ?>
    </div>

    <div class="mt-5">
        <hr />
        <p class="font-weight-bold h4">Zmień dane tej galerii:</p>
        <?= $this->Form->create("edit_gallery", ['url' => '/panel/edit_gallery_data/' . $single_gallery->id, 'enctype' => 'multipart/form-data']) ?>
        <?= $this->Form->control('name', ['type' => 'text', 'class' => 'form-control mb-4', 'label' => __('Nazwa galerii'), 'value' => $single_gallery->name]) ?>
        <?= $this->Form->control('is_visible', ['type' => 'checkbox', 'label' => __('Czy ma być widoczna? (Tak/Nie)'), 'checked' => $single_gallery->is_visible]) ?>
        Kategoria: <?= $this->Form->select('category', $categories_gallery) ?>
        <?= $this->Form->control('Zapisz zmiany', ['type' => 'submit', 'class' => 'btn btn-primary mt-3']) ?>
        <?= $this->Form->end() ?>

        <div class="mt-5">
            <hr />
            <p class="font-weight-bold h4">Usuwanie galerii</p>
            <span class="text-muted d-block">Uwaga!!! Usuwa galerie razem ze zdjęciami</span>
            <a href="#" class="btn btn-danger mt-2">Usuń galerie</a>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
