<?php

$this->layout = 'default';

?>

<!--/.Navbar -->
<!-- Blog-Section -->
<div class="about-page pb-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>Galeria</h3>
            </div>
        </div>
    </div>
</div>


<section id="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-12">
                <div class="row">
                    <?php foreach ($gallery_category as $single_category): ?>
                        <?php if ($single_category->is_visible == '1'): ?>
                            <a href="#" class="col-xl-3 col-md-4 box-2">
                                <img src="/assets/<?= h($single_category->url) ?>" class="img-fluid">
                                <div class="overlay">
                                    <div class="text"><?= h($single_category->name) ?></div>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
