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

    <div class="mt-5">
        <?= $this->Form->create("top_slider_homepage", ['url' => '/panel/update_slider/' . $top_slider_homepage->id]) ?>
        <?= $this->Form->control('title', ['type' => 'text', 'class' => 'form-control', 'label' => __('Tytuł zdjęcia'), 'value' => $top_slider_homepage->title]) ?>
        <?= $this->Form->control('description', ['type' => 'text', 'class' => 'form-control', 'label' => __('Opis zdjęcia'), 'value' => $top_slider_homepage->description]) ?>
        <?= $this->Form->control('is_visible', ['type' => 'checkbox', 'label' => __('Czy ma być widoczne? (Tak/Nie)'), 'checked' => $top_slider_homepage->is_visible]) ?>
        <?= $this->Form->control('Zapisz', ['type' => 'submit', 'class' => 'btn btn-success mt-3']) ?>
        <?= $this->Form->end() ?>
    </div>

    <p class="mt-5">Usuwanie zdjęcia</p>
    <a href="/panel/removeSlider/<?= $top_slider_homepage->id ?>" class="btn btn-danger mb-5">Usun to zdjęcie</a>

</div>
<!-- /.container-fluid -->
