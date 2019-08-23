<?php
$this->layout = 'panel';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ulubione zdjęcia</h1>
    </div>

    <div>
        <?= $this->Flash->render() ?>
    </div>

    <img src="/assets/<?= $favourites_footer->url ?>" class="img-fluid" />

    <div class="mt-5">
        <?= $this->Form->create("favourites_footer", ['url' => '/panel/update_favourites_footer/' . $favourites_footer->id]) ?>
        <?= $this->Form->control('is_visible', ['type' => 'checkbox', 'label' => __('Czy ma być widoczne? (Tak/Nie)'), 'checked' => $favourites_footer->is_visible]) ?>
        <?= $this->Form->control('Zapisz', ['type' => 'submit', 'class' => 'btn btn-success mt-3']) ?>
        <?= $this->Form->end() ?>
    </div>

    <p class="mt-5">Usuwanie zdjęcia</p>
    <a href="/panel/removeFavouritesFooter/<?= $favourites_footer->id ?>" class="btn btn-danger mb-5">Usun to zdjęcie</a>

</div>
<!-- /.container-fluid -->
