<!--Carousel Wrapper-->
<div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <?php foreach ($top_slider_homepage as $slider): ?>
            <?php if ($slider->is_visible == '1'): ?>
                <div class="carousel-item <?php if ($slider->id == '1'): ?>active<?php endif; ?>">
                    <img class="d-block w-100" src="assets/<?= h($slider->url) ?>">
                    <div class="gradient"></div>
                    <div class="carousel-caption">
                        <h1><?= h($slider->title) ?></h1>
                        <p class="lead"><?= h($slider->description) ?></p>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <!--/.Slides-->
    <!--/.Controls-->
    <ol class="carousel-indicators">
        <?php $counter = 0; ?>
        <?php foreach ($top_slider_homepage as $slider_indicator): ?>
            <?php if ($slider_indicator->is_visible == '1'): ?>
                <li class="<?php if ($slider_indicator->id == '1'): ?>active<?php endif; ?>" data-target="#carousel-thumb" data-slide-to="<?= h($counter++) ?>">
                    <img class="d-block w-100 img-fluid" src="assets/<?= h($slider_indicator->url) ?>">
                    <span><?= h($slider_indicator->title) ?></span>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ol>
</div>
<!--/.Carousel Wrapper-->

<!-- Page Content -->

<section id="portfolio">
    <div class="container">
        <h2>Rozgość się na mojej stronie, <br />pooglądaj zdjęcia, zapoznaj sie z ofertą</h2>
        <div class="row text-center mt-5 mb-5">
            <div class="col-sm-12 col-md-4">
                <p class="font-weight-bold">Zastanawiasz się nad sesją zdjęciową?</p>
                <p>Mam dla Ciebie <a href="/offer" class="btn-link">ofertę</a>, <br>obejrzyj najpierw moją <a href="/gallery" class="btn-link">galerię</a></p>
            </div>
            <div class="col-sm-12 col-md-4">
                <p class="font-weight-bold">Spodobały Ci się zdjęcia?</p>
                <p>Jeśli tak to bardzo się ciesze, <br>zachęcam do <a href="/contact" class="btn-link">skontaktowania</a> sie ze mna w celu umówienia terminu i warunków sesji zdjęciowej</p>
            </div>
            <div class="col-sm-12 col-md-4">
                <p class="font-weight-bold">Zainteresowała Cię moja oferta?</p>
                <p>Wszystkie zdjęcia, które widzisz na tej stronie, zostały wykonane przeze mnie</p>
            </div>
        </div>
    </div>
</section>


