<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title><?= $judul ?></title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


        <!-- Favicons -->
        <link href="<?= base_url() ?>assets/upload/larasati.png" rel="icon">
        <link href="<?= base_url() ?>assets/upload/larasati.png" rel="larasati.png">

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="<?= base_url() ?>assets/frontend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/frontend/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/frontend/vendor/aos/aos.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/frontend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="<?= base_url() ?>assets/frontend/css/style.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/frontend/css/styledua.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/frontend/css/mystyle.css" rel="stylesheet">


        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css"
            href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />



        <style>
        .cs-demo-switcher {
            position: fixed;
            display: block;
            top: 50%;
            right: 1rem;
            z-index: 100;
        }

        .cs-demo-switcher-inner {
            width: 3rem;
            height: 3rem;
            border: 1px solid #e5e8ed;
            border-radius: 50%;
            background-color: #fff;
            color: #1e212c;
            font-size: 1.25rem;
            line-height: 3rem;
            text-align: center;
            text-decoration: none;
            box-shadow: 0px 10px 15px 0px rgba(30, 33, 44, 0.10);
        }

        </style>

        <!-- =======================================================
  * Template Name: Medicio - v4.7.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    </head>

    <body>
        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <a onclick="klikwa()"
            href="https://api.whatsapp.com/send?phone=+62<?= $whatsap ?>&text=Halo%20rizkilas.com%20Mohon%20informasi%20produk%20produk%20dan%20pemesanan"
            target="_blank" class="cs-demo-switcher">
            <div class="cs-demo-switcher-inner bg-success" data-toggle="tooltip" data-placement="left"
                title="Hubungi ahh..">
                <img src="<?= base_url('assets/frontend/iconwa.png'); ?>" alt="">
            </div>
        </a>

        <!-- ======= Top Bar ======= -->
        <div id="topbar" class="d-flex align-items-center fixed-top">
            <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
                <div class="align-items-center d-none d-md-flex">
                    <i class="bi bi-clock"></i> Monday - Saturday, 8AM to 10PM
                </div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-phone"></i> Hubungi Kami Sekarang +62 <?= $telpon ?>
                </div>
            </div>
        </div>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">

                <a href="<?= base_url() ?>" class="logo me-auto"><img
                        src="<?= base_url() ?>assets/upload/logo/<?= $logo ?>" alt=""></a>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a class="nav-link scrollto " href="<?= base_url() ?>">Beranda</a></li>
                        <li><a class="nav-link scrollto" href="<?= base_url('about') ?>">About</a></li>
                        <li><a class="nav-link scrollto" href="<?= base_url('produk') ?>">Produk</a></li>
                        <li><a class="nav-link scrollto" href="<?= base_url('gallery') ?>">Gallery</a></li>
                        <li><a class="nav-link scrollto" href="<?= base_url('artikel') ?>">Artikel</a></li>
                        <li><a class="nav-link scrollto" href="<?= base_url('testimoni') ?>">Testimoni</a></li>
                        <li><a class="nav-link scrollto" href="<?= base_url('contact_us') ?>">Contact</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

                <a href="<?= base_url('contact_us') ?>" class="appointment-btn scrollto"><span
                        class="d-none d-md-inline">Make
                        an</span>
                    Appointment</a>

            </div>
        </header><!-- End Header -->
        <script>
        function klikwa() {
            $.ajax({
                url: "<?php echo site_url('home/klikwa') ?>",
                type: "POST",
            });

        }
        </script>
