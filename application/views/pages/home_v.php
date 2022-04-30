<style>
* {
    box-sizing: border-box;
}

.column {
    float: left;
    width: 20.33%;
    padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
    content: "";
    clear: both;
    display: table;
}

/* Tata letak responsif - membuat ketiga kolom bertumpuk, bukan bersebelahan */
@media screen and (max-width: 500px) {
    .column {
        width: 45%;
        padding: 5px;
        margin: auto;
    }
}

</style>

<?php
function waktu_lalu($timestamp)
{
    $selisih = time() - strtotime($timestamp);
    $detik = $selisih;
    $menit = round($selisih / 60);
    $jam = round($selisih / 3600);
    $hari = round($selisih / 86400);
    $minggu = round($selisih / 604800);
    $bulan = round($selisih / 2419200);
    $tahun = round($selisih / 29030400);
    if ($detik <= 60) {
        $waktu = $detik . ' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit . ' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam . ' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari . ' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu . ' minggu yang lalu';
    } else if ($bulan <= 12) {
        $waktu = $bulan . ' bulan yang lalu';
    } else {
        $waktu = $tahun . ' tahun yang lalu';
    }
    return $waktu;
}
?>




<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <?php foreach ($slideparent as $parent) : ?>
            <div class="carousel-item active"
                style="background-image: url(<?= base_url() ?>assets/upload/hero/<?= $parent['gambar'] ?>)">
                <div class="container">
                    <h2><?= $parent['judul_slid'] ?></h2>
                    <p><?= $parent['paragraf'] ?></p>
                    <a href="<?= $parent['link'] ?>" class="btn-get-started scrollto">Read More</a>
                </div>
            </div>
            <?php endforeach ?>
            <?php foreach ($slide as $hero) : ?>
            <div class="carousel-item"
                style="background-image: url(<?= base_url() ?>assets/upload/hero/<?= $hero['gambar'] ?>)">
                <div class="container">
                    <h2><?= $hero['judul_slid'] ?></h2>
                    <p><?= $hero['paragraf'] ?></p>
                    <a href="<?= base_url() ?><?= $hero['link'] ?>" class="btn-get-started scrollto">Read More</a>
                </div>
            </div>
            <?php endforeach ?>


        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>
</section>

<main id="main">


    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

            <div class="text-center">
                <h3>Keadaan Darurat? Bingung Cari Jasa Bengkel Las Yang Professional?</h3>
                <p> Kami akan membantu anda kapan pun anda butuhkan, dan kami siap melayani anda dengan baik.</p>
                <a class="cta-btn scrollto" href="<?= base_url() ?>contact_us">Make an Make an Appointment</a>
            </div>

        </div>
    </section>


    <section id="about" class="about">
        <div class="container shadow p-3 mb-5 bg-body rounded" data-aos="fade-up">

            <div class="section-title">
                <h2>About Us</h2>
            </div>

            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="<?= base_url() ?>assets/upload/poto/<?= $foto ?>" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <?= $deskripsi ?>
                </div>
            </div>

        </div>
    </section>


    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

            <div class="row no-gutters">

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="fas fa-shopping-cart"></i>

                        <?php foreach ($roadmap as $row) : ?>
                        <span data-purecounter-start="0" data-purecounter-end="<?= $row->pesanan ?>"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <?php endforeach ?>
                        <p><strong>Pesanan</strong> Untuk Semua Custumer</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="fas fa-cogs"></i>

                        <?php foreach ($roadmap as $row) : ?>
                        <span data-purecounter-start="0" data-purecounter-end="<?= $row->perbaikan ?>"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <?php endforeach ?>
                        <p><strong>Perbaikan</strong> Semua Produk</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="fas fa-map"></i>

                        <?php foreach ($roadmap as $row) : ?>
                        <span data-purecounter-start="0" data-purecounter-end="<?= $row->wilayah ?>"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <?php endforeach ?>
                        <p><strong>Wilayah Kota</strong> Jangkauan Dan Track map</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="fas fa-edit"></i>
                        <?php foreach ($roadmap as $row) : ?>
                        <span data-purecounter-start="0" data-purecounter-end="<?= $row->design ?>"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <?php endforeach ?>
                        <p><strong>Design</strong> Untuk Pesanan Custum</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <section id="doctors" class="doctors section-bg">
        <div class="container" data-aos="fade-up">



            <div class="section-title">
                <h2>Produk</h2>
                <a href="<?= base_url('produk') ?>">
                    <p>Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></p>
                </a>
            </div>

            <div class="row">
                <?php foreach ($produk as $row) : ?>
                <?php $id = $row->produk_id ?>
                <?php $lihat = $this->db->query("SELECT * FROM produk_visit WHERE produk_id='" . $id . "'")->num_rows(); ?>
                <div class="column">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <a href="<?= base_url() ?>produk/detail_produk/<?= $row->slug ?>/<?= $row->produk_id ?>">
                                <img src="<?= base_url() ?>assets/upload/gallery/<?= $row->foto ?>" class="img-fluid"
                                    alt=""></a>
                            <div class="social">
                                <a href="#"><i class="fas fa-eye"></i><?= $lihat ?></a>
                                <!-- <a href="#"><i class="fas fa-comment-alt"></i> 12 comment</a> -->
                                <!-- <a href=""><i class="fas fa-clock">2 menit</i></a> -->

                            </div>
                        </div>
                        <div class="member-info">
                            <h4><?= $row->nama_produk ?></h4>
                            <span>
                                <a href="#"><i class="fas fa-clock"> <?= waktu_lalu($row->date_post) ?></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>

        </div>
    </section><!-- End Doctors Section -->


    <section id="services" class="services services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Services</h2>
                <p>Dapatkan Akses Mudah Pelayanan Kami. Kami Akan Membantu Anda Untuk Mewujud kan Impian Anda Dan
                    Nikmati Keindahan Nya</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="fas fa-briefcase"></i></div>
                    <h4 class="title"><a href="">Perbaikan</a></h4>

                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon"><i class="fas fa-wrench"></i></div>
                    <h4 class="title"><a href="">Pembuatan</a></h4>

                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon"><i class="fas fa-briefcase-medical"></i></div>
                    <h4 class="title"><a href="">Perawatan</a></h4>

                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    <h4 class="title"><a href="">Konsultasi</a></h4>

                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon"><i class="fas fa-diagnoses"></i></div>
                    <h4 class="title"><a href="">Design</a></h4>

                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon"><i class="fas fa-ruler-combined"></i></div>
                    <h4 class="title"><a href="">Pemasangan</a></h4>

                </div>
            </div>

        </div>
    </section>


    <section id="gallery" class="gallery">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Gallery</h2>
                <p>Gallery foto yang di ambil dari histori kerja dan kinerja kami, yang tersebarpngerjaan di beberapa
                    tempat atau wilayah</p>
            </div>

            <div class="gallery-slider swiper">
                <div class="swiper-wrapper align-items-center">



                    <?php foreach ($histori as $gallery) : ?>
                    <div class="swiper-slide"><a class="gallery-lightbox"
                            href="<?= base_url() ?>assets/upload/gallery/<?= $gallery->foto ?>"><img
                                src="<?= base_url() ?>assets/upload/gallery/<?= $gallery->foto ?>" class="img-fluid"
                                alt=""></a>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="swiper-pagination"></div>
                <a href="<?= base_url('gallery') ?>">
                    <p>Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></p>
                </a>
            </div>

        </div>
    </section>


    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Testimonials</h2>
                <p>Beberapa feedback dan penilaian clien kami yang kami, yang sudah mencoba pelayanan dan menggunakan
                    jasa kami</p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <?php foreach ($testimoni as $fed) : ?>

                    <div class="swiper-slide">
                        <div class="testimonial-item shadow p-3 mb-5 bg-body rounded">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                <?= $fed->testi ?>
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="<?= base_url() ?>assets/upload/poto/<?= $fed->foto ?>" class="testimonial-img"
                                alt="">
                            <h3> <?= $fed->nama ?></h3>
                            <h4> <?= $fed->email ?></h4>
                        </div>
                    </div><!-- End testimonial item -->
                    <?php endforeach ?>


                </div>
                <div class="swiper-pagination"></div>
                <div class="mt-5">
                    <a href="<?= base_url('testimoni') ?>">
                        <p>Beri kami penilaian, atau lihat testimoni lainya <i class="fas fa-arrow-right"></i></p>
                    </a>
                </div>

            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Blog Artikel</h2>
                <div class="mt-5">
                    <a href="<?= base_url('artikel') ?>">
                        <p>Berita Lainnya <i class="fas fa-arrow-right"></i></p>
                    </a>
                </div>
            </div>

            <div class="blog">


                <div class="row">

                    <?php foreach ($artikel as $blog) : ?>
                    <?php $text = $blog->konten;
                        $limitext = word_limiter($text, 35);
                        ?>
                    <?php $id = $blog->artikel_id ?>
                    <?php $lihat = $this->db->query("SELECT * FROM artikel_visit WHERE artikel_id='" . $id . "'")->num_rows(); ?>



                    <div class="column">
                        <div class="blog-item shadow p-3 mb-5 bg-body rounded">
                            <div class="blog-img">
                                <img src="<?= base_url() ?>assets/upload/artikel/<?= $blog->foto ?>" alt="Image">

                            </div>
                            <div class="blog-text">
                                <h3><a
                                        href="<?= base_url('artikel/single/') ?><?= $blog->slug ?>/<?= $blog->artikel_id ?>"><?= $blog->judul_artikel ?></a>
                                </h3>
                                <p>
                                    <?= $limitext ?>
                                </p>
                            </div>
                            <div class="blog-meta">
                                <p><i class="fa fa-user"></i><a href=""><?= $blog->penerbit ?></a></p>
                                <p><i class="fa fa-eye"></i><a href=""><?= $lihat ?> View</a></p>
                                <p><i class="fa fa-comments"></i><a href="">Not Fitures</a></p>
                            </div>

                        </div>
                        <div class="mb-5">
                            <blockquote class="blockquote mb-0">
                                <footer class="blockquote-footer"><cite
                                        title="Source Title"><?= waktu_lalu($blog->date_post) ?></cite></footer>
                            </blockquote>
                        </div>
                    </div>




                    <?php endforeach ?>
                </div>

            </div>

        </div>
    </section>



</main>
