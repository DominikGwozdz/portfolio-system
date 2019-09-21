<?php

$this->layout = 'default';

?>

<!--/.Navbar -->
<!-- Blog-Section -->
<div class="about-page pb-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>Kategoria - <?= h($gallery_category->name) ?></h3>
            </div>
        </div>
    </div>
</div>


<section id="portfolio">
    <div class="container">
        <a href="/gallery" class="text-muted d-flex mb-4"> <- Wróć do listy kategorii</a>
        <div class="row justify-content-center">
            <div class="col-md-12 col-12">
                <div class="row">
                    <?php foreach($galleries as $gallery) : ?>
                        <a href="/gallery/items/<?= h($gallery->id) ?>" class="col-xl-3 col-md-4 box-2">
                            <img src="/assets/<?= h($gallery->picture) ?>" class="img-fluid">
                            <div class="overlay">
                                <div class="text"><?= h($gallery->name) ?></div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
