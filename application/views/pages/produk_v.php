<style>
* {
    box-sizing: border-box;
}

.column {
    float: left;
    width: 33.33%;
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
        width: 50%;
    }
}





/* a {
    text-decoration: none;
    color: #555;
} */

.pe {
    color: #555;
    margin-left: 450px;
}

.box {
    width: 100%;
    height: 400px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
    background-color: #3fbabf;
}




.imgpk {
    max-width: 100%;
    height: 400px;
    padding: 10px;
}

.ha {
    font-size: 50px;
    line-height: 60px;
    margin: 45px 0;
    margin-left: 450px;
}

.btn {
    display: inline-block;
    background: #ff523b;
    color: #ffffff;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
    transition: background 0.5s;
    margin-left: 450px;
}

.btn:hover {
    background: #563434;
}

.header {
    background: radial-gradient(#fff, #ffd6d6);
}

.header .row {
    margin-top: 70px;
}

@media screen and (max-width: 500px) {
    .box {
        height: 750px;
    }

    .col-22 {
        width: 40%;
        height: 200px;
        margin-bottom: 50px;
    }



    .pe {
        color: #555;
        margin: 45px;

    }

    .ha {
        font-size: 50px;
        line-height: 60px;
        margin: 45px;

    }

    .btn {

        margin: 45px;
    }

    .breadcrumbs {

        margin-top: 100px;
    }


}

</style>
<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container-xxl">

            <div class="d-flex justify-content-between align-items-center ">
                <h2>Produk</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li>Produk</li>
                </ol>
            </div>

        </div>
    </section>


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



    <div class="box">
        <div class="row">
            <div class="col-md-8">
                <h1 class="text ha">
                    Give A New Style, <br />
                    For You!
                </h1>
                <p class="pe">
                    Sukses tidak selalu tentang kehebatan. Ini tentang konsistensi. <br /> Konsisten
                    kerja keras memperoleh kesuksesan. Kehebatan akan datang.
                </p>
                <a href="#" rel="noopener noreferrer" class="btn">Explore Now &#8594;</a>
            </div>
            <div class="col-lg-4">
                <img src="<?= base_url() ?>assets/frontend/baner2.png" class="imgpk" alt="" />
            </div>
        </div>
    </div>


    <section class="inner-page">
        <div class="container">
            <div class="single">
                <div class="container ">
                    <div class="row ">
                        <div class="col-lg-8">

                            <section id="doctors" class="doctors section-bg ">
                                <div class="container " data-aos="fade-up">

                                    <div class="section-title">
                                        <h2>Produk</h2>
                                    </div>


                                    <!-- <div class="row">
                                        <?php foreach ($kategori as $kat) : ?>
                                        <div class="col-lg-2 ">
                                            <a href="#" rel="noopener noreferrer"
                                                class="btn btn-sm"><?= $kat->kategori ?></a>
                                        </div>
                                        <?php endforeach ?>
                                    </div> -->
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                                aria-selected="true">All</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pagar-tab" data-bs-toggle="tab"
                                                data-bs-target="#pagar" type="button" role="tab" aria-controls="pagar"
                                                aria-selected="false">Pagar</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="tangga-tab" data-bs-toggle="tab"
                                                data-bs-target="#tangga" type="button" role="tab" aria-controls="tangga"
                                                aria-selected="false">Raling Tangga</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="canopi-tab" data-bs-toggle="tab"
                                                data-bs-target="#canopi" type="button" role="tab" aria-controls="canopi"
                                                aria-selected="false">Canopi</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="tralis-tab" data-bs-toggle="tab"
                                                data-bs-target="#tralis" type="button" role="tab" aria-controls="tralis"
                                                aria-selected="false">Tralis</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="row">
                                                <?php
                                                foreach ($produkiner->result() as $row) : ?>
                                                <?php $id = $row->produk_id ?>
                                                <?php $lihat = $this->db->query("SELECT * FROM produk_visit WHERE produk_id='" . $id . "'")->num_rows(); ?>

                                                <div class="column">

                                                    <div class="member shadow p-3 mb-5 bg-body rounded"
                                                        data-aos="fade-up" data-aos-delay="100">
                                                        <div class="member-img">
                                                            <a
                                                                href="<?= base_url() ?>produk/detail_produk/<?= $row->slug ?>/<?= $row->produk_id ?>/">
                                                                <img src="<?= base_url() ?>assets/upload/gallery/<?= $row->foto ?>"
                                                                    class="img-fluid" alt="">

                                                                <div class="social">

                                                                    <a href="#"><i
                                                                            class="fas fa-eye"></i><?= $lihat ?></a>


                                                                </div>
                                                        </div>
                                                        <div class="member-info">
                                                            <h4><?= $row->nama_produk ?></h4>
                                                            <span>
                                                                <a href="#"><i class="fas fa-clock">
                                                                        <?= waktu_lalu($row->date_post) ?></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php endforeach ?>
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="pagar" role="tabpanel"
                                            aria-labelledby="pagar-tab">
                                            <?php
                                            foreach ($pagar as $pagar) : ?>
                                            <?php $id = $pagar->produk_id ?>
                                            <?php $lihat = $this->db->query("SELECT * FROM produk_visit WHERE produk_id='" . $id . "'")->num_rows(); ?>

                                            <div class="column">

                                                <div class="member shadow p-3 mb-5 bg-body rounded" data-aos="fade-up"
                                                    data-aos-delay="100">
                                                    <div class="member-img">
                                                        <a
                                                            href="<?= base_url() ?>produk/detail_produk/<?= $pagar->slug ?>/<?= $pagar->produk_id ?>/">
                                                            <img src="<?= base_url() ?>assets/upload/gallery/<?= $pagar->foto ?>"
                                                                class="img-fluid" alt="">

                                                            <div class="social">

                                                                <a href="#"><i class="fas fa-eye"></i><?= $lihat ?></a>


                                                            </div>
                                                    </div>
                                                    <div class="member-info">
                                                        <h4><?= $pagar->nama_produk ?></h4>
                                                        <span>
                                                            <a href="#"><i class="fas fa-clock">
                                                                    <?= waktu_lalu($pagar->date_post) ?></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php endforeach ?>
                                        </div>


                                        <div class="tab-pane fade" id="tangga" role="tabpanel"
                                            aria-labelledby="tangga-tab">
                                            <?php
                                            foreach ($tangga as $tangga) : ?>
                                            <?php $id = $tangga->produk_id ?>
                                            <?php $lihat = $this->db->query("SELECT * FROM produk_visit WHERE produk_id='" . $id . "'")->num_rows(); ?>

                                            <div class="column">

                                                <div class="member shadow p-3 mb-5 bg-body rounded" data-aos="fade-up"
                                                    data-aos-delay="100">
                                                    <div class="member-img">
                                                        <a
                                                            href="<?= base_url() ?>produk/detail_produk/<?= $tangga->slug ?>/<?= $tangga->produk_id ?>/">
                                                            <img src="<?= base_url() ?>assets/upload/gallery/<?= $tangga->foto ?>"
                                                                class="img-fluid" alt="">

                                                            <div class="social">

                                                                <a href="#"><i class="fas fa-eye"></i><?= $lihat ?></a>


                                                            </div>
                                                    </div>
                                                    <div class="member-info">
                                                        <h4><?= $tangga->nama_produk ?></h4>
                                                        <span>
                                                            <a href="#"><i class="fas fa-clock">
                                                                    <?= waktu_lalu($tangga->date_post) ?></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php endforeach ?>
                                        </div>
                                        <div class="tab-pane fade" id="canopi" role="tabpanel"
                                            aria-labelledby="canopi-tab">
                                            <?php
                                            foreach ($canopi as $canopi) : ?>
                                            <?php $id = $canopi->produk_id ?>
                                            <?php $lihat = $this->db->query("SELECT * FROM produk_visit WHERE produk_id='" . $id . "'")->num_rows(); ?>

                                            <div class="column">

                                                <div class="member shadow p-3 mb-5 bg-body rounded" data-aos="fade-up"
                                                    data-aos-delay="100">
                                                    <div class="member-img">
                                                        <a
                                                            href="<?= base_url() ?>produk/detail_produk/<?= $canopi->slug ?>/<?= $canopi->produk_id ?>/">
                                                            <img src="<?= base_url() ?>assets/upload/gallery/<?= $canopi->foto ?>"
                                                                class="img-fluid" alt="">

                                                            <div class="social">

                                                                <a href="#"><i class="fas fa-eye"></i><?= $lihat ?></a>


                                                            </div>
                                                    </div>
                                                    <div class="member-info">
                                                        <h4><?= $canopi->nama_produk ?></h4>
                                                        <span>
                                                            <a href="#"><i class="fas fa-clock">
                                                                    <?= waktu_lalu($canopi->date_post) ?></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php endforeach ?>
                                        </div>
                                        <div class="tab-pane fade" id="tralis" role="tabpanel"
                                            aria-labelledby="tralis-tab">
                                            <?php
                                            foreach ($tralis as $tralis) : ?>
                                            <?php $id = $tralis->produk_id ?>
                                            <?php $lihat = $this->db->query("SELECT * FROM produk_visit WHERE produk_id='" . $id . "'")->num_rows(); ?>

                                            <div class="column">

                                                <div class="member shadow p-3 mb-5 bg-body rounded" data-aos="fade-up"
                                                    data-aos-delay="100">
                                                    <div class="member-img">
                                                        <a
                                                            href="<?= base_url() ?>produk/detail_produk/<?= $tralis->slug ?>/<?= $tralis->produk_id ?>/">
                                                            <img src="<?= base_url() ?>assets/upload/gallery/<?= $tralis->foto ?>"
                                                                class="img-fluid" alt="">

                                                            <div class="social">

                                                                <a href="#"><i class="fas fa-eye"></i><?= $lihat ?></a>


                                                            </div>
                                                    </div>
                                                    <div class="member-info">
                                                        <h4><?= $tralis->nama_produk ?></h4>
                                                        <span>
                                                            <a href="#"><i class="fas fa-clock">
                                                                    <?= waktu_lalu($tralis->date_post) ?></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php endforeach ?>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col">
                                            <!--Tampilkan pagination-->
                                            <?php echo $pagination; ?>
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
    <section id="gallery" class="gallery">
        <div class="container" data-aos="fade-up">
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
</main>
