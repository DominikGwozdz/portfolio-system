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

    Tytuł <?= $top_slider_homepage->title ?>
    <?= $top_slider_homepage->description ?>




</div>
<!-- /.container-fluid -->
