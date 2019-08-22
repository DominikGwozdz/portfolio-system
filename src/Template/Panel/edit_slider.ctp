<?php
$this->layout = 'panel';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Górny slider</h1>
    </div>

    <div>
        <?= $this->Flash->render() ?>
    </div>

    <img src="/assets/<?= $top_slider_homepage->url ?>" class="img-fluid" />

    <?= $this->Form->create("top_slider_homepage", ['url' => '/panel/update_slider/' . $top_slider_homepage->id]) ?>
    <?= $this->Form->control('title', ['type' => 'text', 'label' => __('Tytuł zdjęcia'), 'value' => $top_slider_homepage->title]) ?>
    <?= $this->Form->control('description', ['type' => 'text', 'label' => __('Opis zdjęcia'), 'value' => $top_slider_homepage->description]) ?>
    <?= $this->Form->control('is_visible', ['type' => 'checkbox', 'label' => __('Czy ma być widoczne? (Tak/Nie)'), 'checked' => $top_slider_homepage->is_visible]) ?>
    <?= $this->Form->control('Zapisz (jeszcze nie ma metody)', ['type' => 'submit']) ?>
    <?= $this->Form->end() ?>

    <p>Usuń to zdjęcie</p>
    <a href="#" class="btn btn-danger">Usun to zdjęcie (jeszcze nie ma metody)</a>

</div>
<!-- /.container-fluid -->
