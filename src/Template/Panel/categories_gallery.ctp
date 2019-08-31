<?php
$this->layout = 'panel';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategorie galerii</h1>
    </div>

    <div>
        <?= $this->Flash->render() ?>
    </div>

    <h5>Lista kategorii:</h5>





    <table class="table">

        <thead>
        <tr>
            <th scope="col">Numer kategorii</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Okładka</th>
            <th scope="col">Czy widoczna?</th>
            <th scope="col">Edycja</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories_gallery as $category): ?>
        <tr>
            <th scope="row"><?= h($category->id) ?></th>
            <td><?= h($category->name) ?></td>
            <td><img src="/assets/<?= h($category->url) ?>" alt="<?= h($category->name) ?>" class="img-fluid w-25" /></td>
            <td><?php if($category->is_visible == '1'): ?>Tak<?php else: ?>Nie<?php endif; ?></td>
            <td><a href="/panel/edit_category/<?= h($category->id) ?>">Zmień</a></td>
        </tr>
        <?php endforeach; ?>
        </tbody>

    </table>

    <div class="mt-5">
        <hr />
        <p class="font-weight-bold h3">Dodawanie kategorii:</p>
        <?= $this->Form->create("categories_gallery", ['url' => '/panel/add_new_category/', 'enctype' => 'multipart/form-data']) ?>
        <?= $this->Form->control('name', ['type' => 'text', 'class' => 'form-control mb-4', 'label' => __('Nazwa kategorii')]) ?>
        <?= $this->Form->control('image_path', ['type' => 'file', 'class' => 'form-control-file pt-3 pb-3', 'label' => __('Obrazek okładki dla kategorii')]) ?>
        <?= $this->Form->control('is_visible', ['type' => 'checkbox', 'label' => __('Czy ma być widoczna? (Tak/Nie)')]) ?>
        <?= $this->Form->control('Dodaj kategorię', ['type' => 'submit', 'class' => 'btn btn-success mt-3']) ?>
        <?= $this->Form->end() ?>
    </div>


</div>
<!-- /.container-fluid -->
