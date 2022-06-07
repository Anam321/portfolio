  <main id="main">

      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">

              <div class="d-flex justify-content-between align-items-center">
                  <h2>Portfoio Details</h2>
                  <ol>
                      <li><a href="index.html">Home</a></li>
                      <li>Portfoio Details</li>
                  </ol>
              </div>

          </div>
      </section><!-- End Breadcrumbs -->

      <!-- ======= Portfolio Details Section ======= -->
      <section id="portfolio-details" class="portfolio-details">
          <div class="container">
              <?php foreach ($portfolioid as $folio) : ?>
                  <div class="row gy-4">

                      <div class="col-lg-8">
                          <div class="portfolio-details-slider swiper">
                              <div class="swiper-wrapper align-items-center">

                                  <div class="swiper-slide">
                                      <img src="<?= base_url() ?>assets/upload/gallery/<?= $folio->foto ?>" alt="">
                                  </div>

                                  <?php foreach ($listfoto as $foto) : ?>
                                      <div class="swiper-slide">
                                          <img src="<?= base_url() ?>assets/upload/gallery/<?= $foto->foto ?>" alt="">
                                      </div>
                                  <?php endforeach ?>

                              </div>
                              <div class="swiper-pagination"></div>
                          </div>
                      </div>

                      <div class="col-lg-4">
                          <div class="portfolio-info">
                              <h3>Project information</h3>
                              <ul>
                                  <li><strong>Category</strong>: <?= $folio->kategori ?></li>
                                  <li><strong>Client</strong>: <?= $folio->client ?></li>
                                  <li><strong>Project date</strong>: <?= $folio->projek_date ?></li>
                                  <li><strong>Project URL</strong>: <a href="#"><?= $folio->link ?></a></li>
                              </ul>
                          </div>
                          <div class="portfolio-description">
                              <h2>This of portfolio detail</h2>
                              <p>
                                  <?= $folio->deskripsi ?>
                              </p>
                          </div>
                      </div>

                  </div>
              <?php endforeach ?>
          </div>
      </section><!-- End Portfolio Details Section -->

  </main>