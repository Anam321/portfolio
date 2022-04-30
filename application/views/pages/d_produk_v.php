<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Detail Produk</h2>
            <ol>
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li><a href="<?= base_url() ?>produk">Produk</a></li>
                <li>Detail Produk</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<section id="doctors" class="doctors section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <a href="<?= base_url('produk') ?>">
                <p>Kembali <i class="fas fa-undo"></i></p>
            </a>
        </div>
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

        <div class="row">
            <?php $no = 1;
            foreach ($produk as $row) : ?>
            <div class="col-lg-4  d-flex align-items-stretch">
                <div class="preview-pic tab-content">
                    <img src="<?= base_url() ?>assets/upload/gallery/<?= $row->foto ?>" />
                </div>
            </div>
            <div class="details col-md-8">
                <h3 class="product-title"><?= $row->nama_produk ?></h3>
                <div class="rating">

                    <span class="review-no"><?= $lihat ?>
                        reviews</span>
                </div>
                <p class="product-description"><?= $row->keterangan ?></p>

                <h5 class="colors">Tab:
                    <a href="https://<?= $facebook ?>"><button class="btn mb-1 btn-facebook"><i
                                class="align-middle fab my-1 fa-facebook"></i></button></a>
                    <a onclick="klikwa()"
                        href="https://api.whatsapp.com/send?phone=<?= $telpon ?>&text=Halo%20<?= $perusahaan ?>,%20Saya%20mau%20order%20produk%20ini%20<?= base_url() ?>produk/detail_produk/<?= $row->slug ?>"
                        target="_blank"><button class="btn mb-1 btn-success"><i
                                class="align-middle fab my-1 fa-whatsapp"></i></button></a>
                    <a href="https://<?= $instagram ?>"><button class="btn mb-1 btn-instagram"><i
                                class="align-middle fab my-1 fa-instagram"></i></button></a>
                </h5>

            </div>
        </div>
        <?php endforeach ?>
    </div>
</section>


<section id="doctors" class="doctors section-bg">
    <div class="container" data-aos="fade-up">


        <div class="row">

            <?php foreach ($subfoto as $gallery) : ?>
            <div class="col-4">
                <div class="member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-img">
                        <a href="#" onclick="view('<?= $gallery->id_gallery ?>')"> <img
                                src="<?= base_url() ?>assets/upload/gallery/<?= $gallery->foto ?>" class="img-fluid"
                                alt=""></a>
                    </div>

                </div>
            </div>
            <?php endforeach ?>
        </div>

    </div>
</section>





<div class="modal fade" id="viewimg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="imgviewe" class="modal-body">

            </div>


        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script>
function view(id) {
    $('#viewimg').modal('show');
    $('#imgviewe').empty();
    $.ajax({
        url: "<?php echo site_url('produk/viewimg/') ?>/" + id,
        type: "POST",
        dataType: "JSON",

        success: function(data) {

            $('#imgviewe').html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function klikwa() {
    $.ajax({
        url: "<?php echo site_url('home/klikwa') ?>",
        type: "POST",
    });
}
</script>
