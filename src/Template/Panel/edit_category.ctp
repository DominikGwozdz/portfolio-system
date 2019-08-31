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
        </tr>
        </thead>
        <tbody>

            <tr>
                <th scope="row"><?= h($single_category->id) ?></th>
                <td><?= h($single_category->name) ?></td>
                <td><img src="/assets/<?= h($single_category->url) ?>" alt="<?= h($single_category->name) ?>" class="img-fluid w-25" /></td>
                <td><?php if($single_category->is_visible == '1'): ?>Tak<?php else: ?>Nie<?php endif; ?></td>

            </tr>

        </tbody>

    </table>

    <div class="mt-5">
        <hr />
        <p class="font-weight-bold h3">Edycja kategorii:</p>
        <?= $this->Form->create("categories_gallery", ['url' => '/panel/edit_existing_category/' . $single_category->id, 'enctype' => 'multipart/form-data']) ?>
        <?= $this->Form->control('name', ['type' => 'text', 'class' => 'form-control mb-4', 'label' => __('Nazwa kategorii'), 'value' => $single_category->name]) ?>
        <?= $this->Form->control('is_visible', ['type' => 'checkbox', 'label' => __('Czy ma być widoczna? (Tak/Nie)'), 'checked' => $single_category->is_visible]) ?>
        <?= $this->Form->control('Zapisz zmiany', ['type' => 'submit', 'class' => 'btn btn-success mt-3']) ?>
        <?= $this->Form->end() ?>
    </div>

    <p class="mt-5">Usuwanie zdjęcia</p>
    <a href="/panel/remove_existing_category/<?= $single_category->id ?>" class="btn btn-danger mb-5">Usuń ta kategorie</a>

</div>
<!-- /.container-fluid -->
