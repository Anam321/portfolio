<main id="main">

    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Gallery</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li>Gallery</li>
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

    <section class="inner-page">
        <div class="container">
            <div class="single">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">

                            <section id="pricing" class="pricing">
                                <div class="container" data-aos="fade-up">

                                    <div class="section-title">
                                        <h2>Gallery Histori</h2>
                                    </div>
                                    <div class="blog">
                                        <div class="row">

                                            <?php foreach ($histori->result() as $row) : ?>
                                            <?php $text = $row->keterangan;
                                                $limitext = word_limiter($text, 10);
                                                ?>
                                            <div class="col-lg-4">
                                                <div class="blog-item shadow p-3 mb-5 bg-body rounded">
                                                    <a href="#" type="button"
                                                        onclick="viewimg('<?= $row->histori_id ?>')">
                                                        <div class="blog-img">
                                                            <img src="<?= base_url() ?>assets/upload/gallery/<?= $row->foto ?>"
                                                                alt="Image">

                                                        </div>
                                                    </a>

                                                    <div class="blog-text">
                                                        <h3><a href="#"><?= $row->judul_histori ?></a></h3>
                                                        <p>
                                                            <?= $limitext ?>
                                                        </p>
                                                    </div>
                                                    <div class="blog-meta">
                                                        <p><i class="fa fa-map"></i><a href=""><?= $row->alamat ?></a>
                                                        </p>

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



    <div class="modal fade" id="modalview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #343a40;">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="detaildata"></div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
    function viewimg(id) {
        $('#modalview').modal('show');
        $('#detaildata').empty();
        $.ajax({
            url: "<?php echo site_url('gallery/detailhistori/') ?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                $('#detaildata').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }
    </script>
</main>
