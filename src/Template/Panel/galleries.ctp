<?php
$this->layout = 'panel';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Galerie</h1>
    </div>

    <div>
        <?= $this->Flash->render() ?>
    </div>

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
                <td><img class="w-25 img-fluid" src="/assets/<?= h($gallery->picture) ?>" </td>
                <td><?php if($gallery->is_visible == '1'): ?>Tak<?php else: ?>Nie<?php endif; ?></td>
                <td>To trzeba zaprogramować</td>
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
        <?= $this->Form->control('image_path', ['type' => 'file', 'label' => __('Wybierz zdjęcie: ')]) ?>
        <?= $this->Form->control('is_visible', ['type' => 'checkbox', 'label' => __('Czy ma być widoczna? (Tak/Nie)')]) ?>
        Kategoria: <?= $this->Form->select('category', $categories_gallery) ?>
        <?= $this->Form->control('Dodaj galerie', ['type' => 'submit', 'class' => 'btn btn-success mt-3']) ?>
        <?= $this->Form->end() ?>
    </div>


</div>
<!-- /.container-fluid -->
