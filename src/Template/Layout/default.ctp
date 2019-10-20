<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Portfolio System';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700|Playfair+Display:400,700,900" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <?= $this->Html->css('animate') ?>
    <?= $this->Html->css('main') ?>
    <?= $this->Html->css('base') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark cyan fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/images/nav-logo.png" alt="nav-logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php if($this->request->getParam('controller') == 'Pages'): ?>active<?php endif; ?>">
                    <a class="nav-link" href="/">Strona Główna</a>
                </li>
                <li class="nav-item <?php if($this->request->getParam('controller') == 'About'): ?>active<?php endif; ?>">
                    <a class="nav-link" href="/about">O mnie</a>
                </li>
                <li class="nav-item <?php if($this->request->getParam('controller') == 'Achievements'): ?>active<?php endif; ?>">
                    <a class="nav-link" href="/achievements">Osiągnięcia</a>
                </li>
                <li class="nav-item <?php if($this->request->getParam('controller') == 'Offer'): ?>active<?php endif; ?>">
                    <a class="nav-link" href="/offer">Cennik</a>
                </li>
                <li class="nav-item <?php if($this->request->getParam('controller') == 'Gallery'): ?>active<?php endif; ?>">
                    <a class="nav-link" href="/gallery">Galeria </a>
                </li>
                <li class="nav-item <?php if($this->request->getParam('controller') == 'Contact'): ?>active<?php endif; ?>">
                    <a class="nav-link" href="/contact">Kontakt </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- /.navbar -->


    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>


    <!-- Footer -->
    <footer>
        <section class="footer-top">
            <!--Container-->
            <div class="container">
                <h2>Moje ulubione zdjęcia</h2>
                <div class="row text-center text-lg-left">
                    <?php foreach ($favourites_footer as $favourite): ?>
                        <?php if ($favourite->is_visible == '1'): ?>
                            <div class="col-lg-2 col-md-4 col-xs-6">
                                <a href="/assets/<?= $favourite->url ?>" data-toggle="lightbox" data-gallery="favourites-gallery" class="d-block h-100"><img class="img-fluid img-thumbnail" src="/assets/<?= $favourite->url ?>" alt=""></a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            </div>
            <!-- /.container -->
        </section>
        <section class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li><a href="/">Strona Główna</a></li>
                            <li class="hidden">/</li>
                            <li><a href="about">O mnie</a></li>
                            <li class="hidden">/</li>
                            <li><a href="achievements">Osiągnięcia</a></li>
                            <li class="hidden">/</li>
                            <li><a href="offer">Cennik</a></li>
                            <li class="hidden">/</li>
                            <li><a href="gallery">Galeria</a></li>
                            <li class="hidden">/</li>
                            <li><a href="contact">Kontakt</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <p>Wszelkie prawa zastrzeżone 2019<span>/</span> Developed by <a href="https://dgdev.pl">DGDEV.PL</a></p>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </section>
    </footer>
    <!-- /.footer -->

    <!-- Return to Top -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    <!-- Custom JavaScript -->
    <?= $this->Html->script('animate') ?>
    <?= $this->Html->script('custom') ?>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>

</body>
</html>
