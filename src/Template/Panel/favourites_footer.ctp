<?php
$this->layout = 'panel';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Moje ulubione zdjęcia w stopce (zalecane maksymalnie 9)</h1>
    </div>

    <div>
        <?= $this->Flash->render() ?>
    </div>

    <p class="pt-5 pb-5">Wszystkie zdjęcia w stopce:</p>
    <?php foreach($favourites_footer as $favourite): ?>
        <a href="/panel/edit_favourites_footer/<?= $favourite->id ?>">
            <img src="/assets/<?= $favourite->url ?>" class="img-fluid w-25" />
        </a>
    <?php endforeach; ?>

    <p class="pt-5 pb-5">Dodaj nowe zdjęcia:</p>

    <?= $this->Form->create("favourites_footer", ['url' => '/panel/favourites_upload', 'enctype' => 'multipart/form-data']) ?>
    <?= $this->Form->control('image_path', ['type' => 'file', 'label' => __('Wybierz zdjęcie: ')]) ?>
    <?= $this->Form->control('is_visible', ['type' => 'checkbox', 'label' => __('Czy ma być widoczne? (Tak/Nie)')]) ?>
    <?= $this->Form->control('Wyślij zdjęcie', ['type' => 'submit']) ?>
    <?= $this->Form->end() ?>
</div>
<!-- /.container-fluid -->
