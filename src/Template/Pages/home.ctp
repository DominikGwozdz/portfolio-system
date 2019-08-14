<!--Carousel Wrapper-->
<div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <?php foreach ($top_slider_homepage as $slider): ?>
            <div class="carousel-item <?php if ($slider->id == '1'): ?>active<?php endif; ?>">
                <img class="d-block w-100" src="assets/<?= h($slider->url) ?>" alt="First slide">
                <div class="gradient"></div>
                <div class="carousel-caption">
                    <h1><?= h($slider->title) ?></h1>
                    <p class="lead"><?= h($slider->description) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!--/.Slides-->
    <!--/.Controls-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-thumb" data-slide-to="0" class="active"> <img class="d-block w-100" src="assets/banner-image-4.jpg" class="img-fluid">
            <span>Woman walking in the green fields</span>
        </li>
        <li data-target="#carousel-thumb" data-slide-to="1"><img class="d-block w-100" src="assets/banner-image-3.jpg" class="img-fluid">
            <span>Remainings of old boat in the beach of bali.</span>
        </li>
        <li data-target="#carousel-thumb" data-slide-to="2"><img class="d-block w-100" src="assets/banner-image-2.jpg" class="img-fluid">
            <span>Beautiful sunsetting in the mountains.</span>
        </li>
        <li data-target="#carousel-thumb" data-slide-to="3"><img class="d-block w-100" src="assets/banner-image-1.jpg" class="img-fluid">
            <span>Snow white mountain of east china.</span>
        </li>
    </ol>
</div>
<!--/.Carousel Wrapper-->

<!-- Page Content -->

<section id="portfolio">
    <div class="container">
        <h2>Recently Added Photographs</h2>
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


