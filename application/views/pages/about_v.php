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
                 <h2>About</h2>
                 <ol>
                     <li><a href="<?= base_url() ?>">Home</a></li>
                     <li>About</li>
                 </ol>
             </div>
         </div>
     </section>

     <section class="inner-page">
         <div class="container">
             <div class="single">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-8">
                             <section id="about" class="about shadow p-3 mb-5 bg-body rounded">
                                 <div class="container" data-aos="fade-up">

                                     <div class="section-title">
                                         <h2>About Us</h2>
                                     </div>
                                     <div class="row">
                                         <div class="col-lg-6" data-aos="fade-right">
                                             <img src="<?= base_url() ?>assets/upload/poto/<?= $foto ?>"
                                                 class="img-fluid" alt="">
                                         </div>
                                         <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
                                             <?= $deskripsi ?>
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
