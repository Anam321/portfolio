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



<main id="main">

    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Artikel</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li>Artikel</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->



    <section class="inner-page">
        <div class="container-xl">
            <div class="single">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <section id="pricing" class="pricing">
                                <div class="container" data-aos="fade-up">
                                    <div class="section-title">
                                        <h2>Blog Artikel</h2>
                                    </div>
                                    <div class="blog">
                                        <div class="row">

                                            <?php foreach ($artikel->result() as $blog) : ?>
                                            <?php $text = $blog->konten;
                                                $limitext = word_limiter($text, 35);
                                                ?>
                                            <?php $id = $blog->artikel_id ?>
                                            <?php $lihat = $this->db->query("SELECT * FROM artikel_visit WHERE artikel_id='" . $id . "'")->num_rows(); ?>
                                            <div class="col-lg-4">
                                                <div class="blog-item shadow p-3 mb-5 bg-body rounded">
                                                    <div class="blog-img">
                                                        <img src="<?= base_url() ?>assets/upload/artikel/<?= $blog->foto ?>"
                                                            alt="Image">

                                                    </div>
                                                    <div class="blog-text">
                                                        <h3><a
                                                                href="<?= base_url() ?>artikel/single/<?= $blog->artikel_id ?>"><?= $blog->judul_artikel ?></a>
                                                        </h3>
                                                        <p>
                                                            <?= $limitext ?>
                                                        </p>
                                                    </div>
                                                    <div class="blog-meta">
                                                        <p><i class="fa fa-user"></i><a
                                                                href=""><?= $blog->penerbit ?></a></p>
                                                        <p><i class="fa fa-eye"></i><a href=""><?= $lihat ?> View</a>
                                                        </p>
                                                        <p><i class="fa fa-comments"></i><a href="">Not Fitures</a></p>
                                                        <p><i class="fa fa-clock"></i><a
                                                                href=""><?= waktu_lalu($blog->date_post) ?> </a></p>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!--Tampilkan pagination-->
                                                <?php echo $pagination; ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </section>

                        </div>


                        <?php $this->load->view('pages/right_v') ?>



                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
