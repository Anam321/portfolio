<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3><?= $perusahaan ?></h3>
                        <p>
                            Indonesia <br>
                            <?= $alamat ?><br><br>
                            <strong>Phone:</strong> +62 <?= $telpon ?><br>
                            <strong>Email:</strong> <?= $email ?><br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="<?= $whatsap ?>" class="twitter"><i class="bx bxl-whatsapp"></i></a>
                            <a href="<?= $facebook ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="<?= $instagram ?>" class="instagram"><i class="bx bxl-instagram"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Perbaikan</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Pembuatan</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Perawatan</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Konsultasi</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span><?= $perusahaan ?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
            Designed by <a href="#">AnbomekerDev</a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets/frontend/vendor/purecounter/purecounter.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/aos/aos.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets/frontend/js/main.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/myjs.js"></script>

</body>

</html>