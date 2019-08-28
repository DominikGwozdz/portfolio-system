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

            <tr>
                <th scope="row"><?= h($single_category->id) ?></th>
                <td><?= h($single_category->name) ?></td>
                <td><img src="/assets/<?= h($single_category->url) ?>" alt="<?= h($single_category->name) ?>" class="img-fluid w-25" /></td>
                <td><?php if($single_category->is_visible == '1'): ?>Tak<?php else: ?>Nie<?php endif; ?></td>
                <td><a href="/panel/edit_category/<?= h($single_category->id) ?>">Zmień</a></td>
            </tr>

        </tbody>

    </table>

</div>
<!-- /.container-fluid -->
