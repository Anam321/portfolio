  <section id="hero" style=" width: 100%; height: 100vh; background: url('<?= base_url() ?>assets/upload/poto/<?= $foto ?>') top center; background-size: cover;" class="d-flex flex-column justify-content-center align-items-center">
      <div class="hero-container" data-aos="fade-in">
          <h1><?= $nama ?></h1>
          <p>I'm <span class="typed" data-typed-items="Web Developer, Programing, Freelancer, Composer, Singer, Writer"></span></p>
      </div>
  </section><!-- End Hero -->

  <main id="main">

      <!-- ======= About Section ======= -->
      <section id="about" class="about">
          <div class="container">

              <div class="section-title">
                  <h2>About</h2>
                  <p><?= $deskripsi ?></p>
              </div>

              <div class="row">
                  <div class="col-lg-4" data-aos="fade-right">
                      <img src="<?= base_url() ?>assets/upload/poto/<?= $foto ?>" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                      <h3>UI/UX Designer &amp; Web Developer.</h3>
                      <p class="fst-italic">
                          I am an IT project with holistic knowladge of software development and design. In the worlrd of programming, i am very interested in one of them is designing. i'm a curious person wo loves to learn and to explore something new as well as to look for solution to my problem
                      </p>
                      <div class="row">
                          <div class="col-lg-6">
                              <ul>
                                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?= $tgl_lahir ?></span></li>
                                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?= $email ?></span></li>
                                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?= $telpon ?></span></li>
                                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?= $alamat ?></span></li>
                              </ul>
                          </div>
                          <div class="col-lg-6">
                              <ul>
                                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?= $umur ?></span></li>
                                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Master</span></li>

                                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
                              </ul>
                          </div>
                      </div>
                      <p>
                          From creating your first project, to managing delivery of a large program, SpiraPlan has your back. Best practices are baked-in, so you can focus on meeting your goals, not worrying about what is falling through the cracks. Powerful, straightforward, and flexible--SpiraPlan adapts to you: your methodology, your workflow, your toolchain, your reporting needs.
                      </p>
                  </div>
              </div>

          </div>
      </section><!-- End About Section -->

      <!-- ======= Facts Section ======= -->

      </section><!-- End Facts Section -->

      <!-- ======= Skills Section ======= -->
      <section id="skills" class="skills section-bg">
          <div class="container">

              <div class="section-title">
                  <h2>Skills</h2>
                  <p>My skills in to program language</p>
              </div>

              <div class="row skills-content">

                  <div class="col-lg-6" data-aos="fade-up">

                      <div class="progress">
                          <span class="skill">HTML <i class="val">100%</i></span>
                          <div class="progress-bar-wrap">
                              <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>

                      <div class="progress">
                          <span class="skill">CSS <i class="val">90%</i></span>
                          <div class="progress-bar-wrap">
                              <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>

                      <div class="progress">
                          <span class="skill">JavaScript <i class="val">75%</i></span>
                          <div class="progress-bar-wrap">
                              <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>

                  </div>

                  <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

                      <div class="progress">
                          <span class="skill">PHP <i class="val">80%</i></span>
                          <div class="progress-bar-wrap">
                              <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>

                      <div class="progress">
                          <span class="skill">WordPress/CMS <i class="val">90%</i></span>
                          <div class="progress-bar-wrap">
                              <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>

                      <div class="progress">
                          <span class="skill">Photoshop <i class="val">55%</i></span>
                          <div class="progress-bar-wrap">
                              <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>

                  </div>

              </div>

          </div>
      </section><!-- End Skills Section -->



      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio section-bg">
          <div class="container">

              <div class="section-title">
                  <h2>Portfolio</h2>

              </div>

              <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">


                  <?php foreach ($portfolio as $port) : ?>
                      <div class="col-lg-4 col-md-6 portfolio-item filter-<?= $port->client ?>">
                          <div class="portfolio-wrap">
                              <img src="<?= base_url() ?>assets/upload/gallery/<?= $port->foto ?>" class="img-fluid" alt="">
                              <div class="portfolio-links">
                                  <a href="<?= base_url() ?>assets/upload/gallery/<?= $port->foto ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                                  <a href="<?= base_url() ?>porfolio/detailfolio/<?= $port->projek_id ?>" title="More Details"><i class="bx bx-link"></i></a>
                              </div>
                          </div>
                      </div>
                  <?php endforeach ?>


              </div>

          </div>
      </section><!-- End Portfolio Section -->



      <!-- <section id="testimonials" class="testimonials section-bg">
          <div class="container">

              <div class="section-title">
                  <h2>Testimonials</h2>
                  <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
              </div>

              <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                  <div class="swiper-wrapper">

                      <div class="swiper-slide">
                          <div class="testimonial-item" data-aos="fade-up">
                              <p>
                                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                              </p>
                              <img src="<?= base_url() ?>assets/frontend/porfolio/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                              <h3>Saul Goodman</h3>
                              <h4>Ceo &amp; Founder</h4>
                          </div>
                      </div>

                      <div class="swiper-slide">
                          <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100">
                              <p>
                                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                              </p>
                              <img src="<?= base_url() ?>assets/frontend/porfolio/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                              <h3>Sara Wilsson</h3>
                              <h4>Designer</h4>
                          </div>
                      </div>

                      <div class="swiper-slide">
                          <div class="testimonial-item" data-aos="fade-up" data-aos-delay="200">
                              <p>
                                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                              </p>
                              <img src="<?= base_url() ?>assets/frontend/porfolio/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                              <h3>Jena Karlis</h3>
                              <h4>Store Owner</h4>
                          </div>
                      </div>

                      <div class="swiper-slide">
                          <div class="testimonial-item" data-aos="fade-up" data-aos-delay="300">
                              <p>
                                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                              </p>
                              <img src="<?= base_url() ?>assets/frontend/porfolio/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                              <h3>Matt Brandon</h3>
                              <h4>Freelancer</h4>
                          </div>
                      </div>

                      <div class="swiper-slide">
                          <div class="testimonial-item" data-aos="fade-up" data-aos-delay="400">
                              <p>
                                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                              </p>
                              <img src="<?= base_url() ?>assets/frontend/porfolio/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                              <h3>John Larson</h3>
                              <h4>Entrepreneur</h4>
                          </div>
                      </div>

                  </div>
                  <div class="swiper-pagination"></div>
              </div>

          </div>
      </section> -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
          <div class="container">

              <div class="section-title">
                  <h2>Contact</h2>

              </div>

              <div class="row" data-aos="fade-in">

                  <div class="col-lg-5 d-flex align-items-stretch">
                      <div class="info">
                          <div class="address">
                              <i class="bi bi-geo-alt"></i>
                              <h4>Location:</h4>
                              <p><?= $alamat ?></p>
                          </div>

                          <div class="email">
                              <i class="bi bi-envelope"></i>
                              <h4>Email:</h4>
                              <p><?= $email ?></p>
                          </div>

                          <div class="phone">
                              <i class="bi bi-phone"></i>
                              <h4>Call:</h4>
                              <p>+62 <?= $telpon ?></p>
                          </div>

                          <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> -->
                          <div class="mapouter">
                              <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=talagamurni&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://putlocker-is.org"></a><br>
                                  <style>
                                      .mapouter {
                                          position: relative;
                                          text-align: right;
                                          height: 500px;
                                          width: 450px;
                                      }
                                  </style><a href="https://www.embedgooglemap.net">google map html code</a>
                                  <style>
                                      .gmap_canvas {
                                          overflow: hidden;
                                          background: none !important;
                                          height: 500px;
                                          width: 450px;
                                      }
                                  </style>
                              </div>
                          </div>
                      </div>

                  </div>

                  <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">

                      <form id="contactForm" method="post" role="form" class="php-email-form">
                          <div id="notifalert"></div>
                          <div class="row">
                              <div class="form-group col-md-6">
                                  <label for="name">Your Name</label>
                                  <input type="text" name="nama" class="form-control" id="name" required>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="name">Your Email</label>
                                  <input type="email" class="form-control" name="email" id="email" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="name">Subject</label>
                              <input type="text" class="form-control" name="subject" id="subject" required>
                          </div>
                          <div class="form-group">
                              <label for="name">Message</label>
                              <textarea id="summernote" class="form-control" name="message" rows="10" required></textarea>
                          </div>

                          <div class="text-center"><button id="btnSave" type="submit">Send Message</button></div>
                      </form>
                  </div>

              </div>

          </div>
      </section><!-- End Contact Section -->

  </main><!-- End #main -->