<?php

$this->layout = 'default';

?>

<!--/.Navbar -->
<!-- Blog-Section -->
<div class="about-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>O mnie</h3>
                <div class="d-flex justify-content-center">
                    <img class="img-fluid w-25 mb-5" src="/assets/<?= $about_me->photo ?>" alt="about">
                </div>
            </div>
            <div class="col-sm-12">
                <?= $about_me->description ?>
            </div>
        </div>
    </div>
</div>
