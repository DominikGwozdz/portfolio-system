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
                <figure class="figure">
                    <img src="/assets/<?= $about_me->photo ?>" alt="about">
                </figure>
            </div>
            <div class="col-sm-12">
                <?= $about_me->description ?>
            </div>
        </div>
    </div>
</div>
