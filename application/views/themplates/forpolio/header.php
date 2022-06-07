<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $judul ?></title>
    <meta name="description" content="Saepul anam, saya seorang programer web develpoer, saya juga seorang penyanyi, penulis, dan composer, saya lahir di sukabumi pada tanggal 03 oktober 1994, saya lulusan sekolah Madrasah aliah negri surade">
    <meta name="keywords" content="Saepul Anam, S Anam, Penulis, Puisi, Web Developer, Penyanyi,">

    <meta name="author" content="Saepul Anam">
    <meta name="title" content=" Saepul Anam Seorang Programer Penyanyi Dan Penulis">

    <meta property="og:locale" content="en_US" />


    <meta property="og:type" content="website">
    <meta property="og:url" content="https://anamsaepul.site/">
    <meta property="og:title" content="Saepul Anam">
    <meta property="og:description" content="Saepul anam, saya seorang programer web develpoer, saya juga seorang penyanyi, penulis, dan composer, saya lahir di sukabumi pada tanggal 03 oktober 1994, saya lulusan sekolah Madrasah aliah negri surade">
    <meta property="og:image" content="">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://anamsaepul.site/">
    <meta property="twitter:title" content="Saepul Anam">
    <meta property="twitter:description" content="Saepul anam, saya seorang programer web develpoer, saya juga seorang penyanyi, penulis, dan composer, saya lahir di sukabumi pada tanggal 03 oktober 1994, saya lulusan sekolah Madrasah aliah negri surade">
    <meta property="twitter:image" content="<?= base_url() ?>assets/upload/poto/<?= $foto ?>">



    <!-- Favicons -->
    <link href="<?= base_url() ?>assets/upload/logo/<?= $logo ?>" rel="icon">
    <link href="<?= base_url() ?>assets/upload/logo/<?= $logo ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets/frontend/porfolio/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/frontend/porfolio/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/frontend/porfolio/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/frontend/porfolio/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/frontend/porfolio/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/frontend/porfolio/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/frontend/porfolio/css/style.css" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/frontend/css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <script type="application/ld+json">
        {
            "name": "Saepul Anam",
            "description": "Saepul anam, saya seorang programer web develpoer, saya juga seorang penyanyi, penulis, dan composer, saya lahir di sukabumi pada tanggal 03 oktober 1994, saya lulusan sekolah Madrasah aliah negri surade",
            "author": {
                "@type": "Person",
                "name": "Saepul Anam"
            },
            "@type": "WebSite",
            "url": "https://anamsaepul.site/",
            "headline": "Saepul Anam",
            "@context": "http://schema.org"
        }
    </script>
    <!-- End SEO tag -->

    <!-- =======================================================
  * Template Name: iPortfolio - v3.7.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="d-flex flex-column">

            <div class="profile">
                <img src="<?= base_url() ?>assets/upload/poto/<?= $foto ?>" alt="" class="img-fluid rounded-circle">
                <h1 class="text-light"><a href="index.html"><?= $nama ?></a></h1>
                <div class="social-links mt-3 text-center">

                    <a href="<?= $facebook ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="<?= $instagram ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="<?= $telegram ?>" class="telegram"><i class="bx bxl-telegram"></i></a>
                    <a href="<?= $whatsap ?>" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                    <a href="<?= $github ?>" class="github"><i class="bx bxl-github"></i></a>
                </div>
            </div>

            <nav id="navbar" class="nav-menu navbar">
                <ul>
                    <li><a href="<?= base_url() ?>" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
                    <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>

                    <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>

                    <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->