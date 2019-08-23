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
        <h2>Wyróżnione zdjęcia (tutaj będą wyróżnione w galeriach)</h2>
        <div class="row justify-content-center">
            <div class="col-md-12 col-12">
                <div class="row">
                    <a href="https://unsplash.it/1200/768.jpg?image=251" data-toggle="lightbox" data-gallery="example-gallery" class="col-xl-6 col-md-4 box-1">
                        <img src="https://unsplash.it/600.jpg?image=251" class="img-fluid">
                        <div class="overlay">
                            <img src="images/comment.png" alt="plus-icon">
                            <div class="text">Man standing on the middle of the road in the morning <span>Landscapes</span></div>
                            <div class="count">45</div>
                        </div>
                    </a>
                    <a href="https://unsplash.it/1200/768.jpg?image=252" data-toggle="lightbox" data-gallery="example-gallery" class="col-xl-3 col-md-4 box-2">
                        <img src="https://unsplash.it/600.jpg?image=252" class="img-fluid">
                        <div class="overlay">
                            <img src="images/comment.png" alt="plus-icon">
                            <div class="text">Man standing on the middle of the road in the morning <span>Landscapes</span></div>
                            <div class="count">45</div>
                        </div>
                    </a>
                    <a href="https://unsplash.it/1200/768.jpg?image=253" data-toggle="lightbox" data-gallery="example-gallery" class="col-xl-3 col-md-4 box-2">
                        <img src="https://unsplash.it/600.jpg?image=253" class="img-fluid">
                        <div class="overlay">
                            <img src="images/comment.png" alt="plus-icon">
                            <div class="text">Man standing on the middle of the road in the morning <span>Landscapes</span></div>
                            <div class="count">45</div>
                        </div>
                    </a>
                </div>
                <div class="row">
                    <a href="https://unsplash.it/1200/768.jpg?image=254" data-toggle="lightbox" data-gallery="example-gallery" class="col-xl-3 col-md-4 box-2">
                        <img src="https://unsplash.it/600.jpg?image=254" class="img-fluid">
                        <div class="overlay">
                            <img src="images/comment.png" alt="plus-icon">
                            <div class="text">Man standing on the middle of the road in the morning <span>Landscapes</span></div>
                            <div class="count">45</div>
                        </div>
                    </a>
                    <a href="https://unsplash.it/1200/768.jpg?image=255" data-toggle="lightbox" data-gallery="example-gallery" class="col-xl-3 col-md-4 box-2">
                        <img src="https://unsplash.it/600.jpg?image=255" class="img-fluid">
                        <div class="overlay">
                            <img src="images/comment.png" alt="plus-icon">
                            <div class="text">Man standing on the middle of the road in the morning <span>Landscapes</span></div>
                            <div class="count">45</div>
                        </div>
                    </a>
                    <a href="https://unsplash.it/1200/768.jpg?image=256" data-toggle="lightbox" data-gallery="example-gallery" class="col-xl-6 col-md-4 box-1">
                        <img src="https://unsplash.it/600.jpg?image=256" class="img-fluid">
                        <div class="overlay">
                            <img src="images/comment.png" alt="plus-icon">
                            <div class="text">Man standing on the middle of the road in the morning <span>Landscapes</span></div>
                            <div class="count">45</div>
                        </div>
                    </a>
                </div>
                <div class="row">
                    <a href="https://unsplash.it/1200/768.jpg?image=257" data-toggle="lightbox" data-gallery="example-gallery" class="col-xl-6 col-md-4 box-1">
                        <img src="https://unsplash.it/600.jpg?image=257" class="img-fluid">
                        <div class="overlay">
                            <img src="images/comment.png" alt="plus-icon">
                            <div class="text">Man standing on the middle of the road in the morning <span>Landscapes</span></div>
                            <div class="count">45</div>
                        </div>
                    </a>
                    <a href="https://unsplash.it/1200/768.jpg?image=258" data-toggle="lightbox" data-gallery="example-gallery" class="col-xl-3 col-md-4 box-2">
                        <img src="https://unsplash.it/600.jpg?image=258" class="img-fluid">
                        <div class="overlay">
                            <img src="images/comment.png" alt="plus-icon">
                            <div class="text">Man standing on the middle of the road in the morning <span>Landscapes</span></div>
                            <div class="count">45</div>
                        </div>
                    </a>
                    <a href="https://unsplash.it/1200/768.jpg?image=259" data-toggle="lightbox" data-gallery="example-gallery" class="col-xl-3 col-md-4 box-2">
                        <img src="https://unsplash.it/600.jpg?image=259" class="img-fluid">
                        <div class="overlay">
                            <img src="images/comment.png" alt="plus-icon">
                            <div class="text">Man standing on the middle of the road in the morning <span>Landscapes</span></div>
                            <div class="count">45</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


