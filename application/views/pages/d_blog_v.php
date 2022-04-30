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
                       <li><a href="<?= base_url() ?>artikel">Artikel</a></li>
                       <li>Single Artikel</li>
                   </ol>
               </div>

           </div>
       </section><!-- End Breadcrumbs -->

       <section class="inner-page">
           <div class="container">
               <div class="single">
                   <div class="container">
                       <div class="row">
                           <div class="col-lg-8 shadow p-3 mb-5 bg-body rounded">

                               <?php foreach ($artikelbyid as $artikel) : ?>
                               <div class="single-content">
                                   <img src="<?= base_url() ?>assets/upload/artikel/<?= $artikel->foto ?>" />
                                   <h2><?= $artikel->judul_artikel ?></h2>
                                   <p>
                                       <?= $artikel->konten ?>
                                   </p>

                               </div>
                               <div class="mb-5">
                                   <blockquote class="blockquote mb-0">
                                       <p>Created By</p>
                                       <footer class="blockquote-footer"><?= $artikel->penerbit ?> <br><cite
                                               title="Source Title"><?= waktu_lalu($artikel->date_post) ?></cite>
                                       </footer>
                                   </blockquote>
                               </div>

                               <?php endforeach ?>

                               <div class="single-related">
                                   <h2>Related Post</h2>
                                   <div class="owl-carousel related-slider">
                                       <?php foreach ($art as $blog) : ?>
                                       <div class="post-item">
                                           <div class="post-img">
                                               <img src="<?= base_url() ?>assets/upload/artikel/<?= $blog->foto ?>" />
                                           </div>
                                           <div class="post-text">
                                               <a href=""><?= $blog->judul_artikel ?></a>
                                               <div class="post-meta">
                                                   <p>By<a href=""><?= $blog->penerbit ?></a></p>
                                                   <p>In<a href=""><?= waktu_lalu($blog->date_post) ?></a></p>
                                               </div>
                                           </div>
                                       </div>
                                       <?php endforeach ?>
                                   </div>
                               </div>

                               <!-- <div class="single-comment">
                                <h2>3 Comments</h2>
                                <ul class="comment-list">
                                    <li class="comment-item">
                                        <div class="comment-body">
                                            <div class="comment-img">
                                                <img src="img/user.jpg" />
                                            </div>
                                            <div class="comment-text">
                                                <h3><a href="">Josh Dunn</a></h3>
                                                <span>01 Jan 2045 at 12:00pm</span>
                                                <p>
                                                    Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis
                                                    sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac
                                                    vel justo. In hac platea dictumst.
                                                </p>
                                                <a class="btn" href="">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="comment-item">
                                        <div class="comment-body">
                                            <div class="comment-img">
                                                <img src="img/user.jpg" />
                                            </div>
                                            <div class="comment-text">
                                                <h3><a href="">Josh Dunn</a></h3>
                                                <p><span>01 Jan 2045 at 12:00pm</span></p>
                                                <p>
                                                    Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis
                                                    sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac
                                                    vel justo. In hac platea dictumst.
                                                </p>
                                                <a class="btn" href="">Reply</a>
                                            </div>
                                        </div>
                                        <ul class="comment-child">
                                            <li class="comment-item">
                                                <div class="comment-body">
                                                    <div class="comment-img">
                                                        <img src="img/user.jpg" />
                                                    </div>
                                                    <div class="comment-text">
                                                        <h3><a href="">Josh Dunn</a></h3>
                                                        <p><span>01 Jan 2045 at 12:00pm</span></p>
                                                        <p>
                                                            Lorem ipsum dolor sit amet elit. Integer lorem augue purus
                                                            mollis sapien, non eros leo in nunc. Donec a nulla vel
                                                            turpis tempor ac vel justo. In hac platea dictumst.
                                                        </p>
                                                        <a class="btn" href="">Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div> -->
                               <div class="comment-form">
                                   <h2>Leave a comment</h2>
                                   <form>
                                       <div class="form-group">
                                           <label for="name">Name *</label>
                                           <input type="text" class="form-control" id="name">
                                       </div>
                                       <div class="form-group">
                                           <label for="email">Email *</label>
                                           <input type="email" class="form-control" id="email">
                                       </div>
                                       <div class="form-group">
                                           <label for="website">Website</label>
                                           <input type="url" class="form-control" id="website">
                                       </div>

                                       <div class="form-group">
                                           <label for="message">Message *</label>
                                           <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                       </div>
                                       <div class="form-group">
                                           <input type="submit" value="Post Comment" class="btn btn-custom">
                                       </div>
                                   </form>
                               </div>
                           </div>


                           <?php $this->load->view('pages/right_v') ?>

                       </div>
                   </div>
               </div>
           </div>
       </section>
   </main>
