<?php
$this->layout = 'panel';

use App\Controller\HelperController; ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Galerie</h1>
    </div>

    <div>
        <?= $this->Flash->render() ?>
    </div>

    <?php if (!$categories_gallery): ?>
    <p>Najpierw dodaj kategorie!</p>
    <?php else: ?>

        <h5>Lista galerii:</h5>

        <table class="table">

            <thead>
            <tr>
                <th scope="col">Numer galerii</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Okładka</th>
                <th scope="col">Czy widoczna?</th>
                <th scope="col">Kategoria</th>
                <th scope="col">Edycja</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($galleries as $gallery): ?>
                <tr>
                    <th scope="row"><?= h($gallery->id) ?></th>
                    <td><?= h($gallery->name) ?></td>
                    <td><?php if (!$gallery->picture): ?><a href="/panel/edit_gallery_label/<?= h($gallery->id) ?>">Wgraj okładkę</a> <?php else: ?><a href="/panel/edit_gallery_label/<?= h($gallery->id) ?>"><img class="w-25 img-fluid" src="/assets/<?= h($gallery->picture) ?>" /></a><?php endif; ?></td>
                    <td><?php if($gallery->is_visible == '1'): ?>Tak<?php else: ?>Nie<?php endif; ?></td>
                    <td><?= h(HelperController::getCategoryNameById($gallery->category_id)) ?></td>

                    <td><a href="/panel/edit_gallery/<?= h($gallery->id) ?>">Zmień</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>



        <div class="mt-5">
            <hr />
            <p class="font-weight-bold h3">Tworzenie nowej galerii:</p>
            <?= $this->Form->create("new_gallery", ['url' => '/panel/add_new_gallery/', 'enctype' => 'multipart/form-data']) ?>
            <?= $this->Form->control('name', ['type' => 'text', 'class' => 'form-control mb-4', 'label' => __('Nazwa galerii')]) ?>
            <p>Okładka galerii:</p> <?= $this->Form->control('image_path', ['type' => 'file', 'label' => __('Wybierz zdjęcie: ')]) ?>
            <?= $this->Form->control('is_visible', ['type' => 'checkbox', 'label' => __('Czy ma być widoczna? (Tak/Nie)')]) ?>
            Kategoria: <?= $this->Form->select('category', $categories_gallery) ?>
            <?= $this->Form->control('Dodaj galerie', ['type' => 'submit', 'class' => 'btn btn-success mt-3']) ?>
            <?= $this->Form->end() ?>
        </div>

    <?php endif; ?>


</div>
<!-- /.container-fluid -->
