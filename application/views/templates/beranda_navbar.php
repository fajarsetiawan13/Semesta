<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center <?php if ($this->uri->segment(1) != '') : echo ' header-inner-pages' ?><?php endif; ?>">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo">
                <a href="<?= base_url() ?>" title="Semesta Bilingual Boarding School - Sekolah International Terbaik di Semarang">
                    <img src="<?= base_url('assets/') ?>img/logo.png" alt="">
                </a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="<?php echo ($this->uri->segment(1) == '') ? '#' : base_url(); ?>">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#kampus">Kampus</a></li>
                    <li class="dropdown"><a href="#"><span>Pendaftaran</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Pendaftaran Online Kampus 1 (SMP-SMA)</a></li>
                            <li><a href="#">Pendaftaran Online Kampus 2 (SD)</a></li>
                            <li><a href="#">Pendaftaran Online Kampus 3 (PG TK SMP)</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="#faq">FAQs</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url('beranda/kontak') ?>">Kontak</a></li>
                    <li><a class="nav-link scrollto" href="#">Covid-19</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url('sys/login') ?>">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->