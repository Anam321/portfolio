<!-- ======= Footer ======= -->


<script>
    // function showAlert(type, msg) {

    //     toastr.options.closeButton = true;
    //     toastr.options.progressBar = true;
    //     toastr.options.extendedTimeOut = 1000; //1000

    //     toastr.options.timeOut = 3000;
    //     toastr.options.fadeOut = 250;
    //     toastr.options.fadeIn = 250;

    //     toastr.options.positionClass = 'toast-top-center';
    //     toastr[type](msg);
    // }
    $(document).ready(function() {
        $('#summernote').summernote();
    });


    function notif() {
        $('#notifalert').empty();
        $.ajax({
            url: "<?php echo site_url('porfolio/alertnotif') ?>",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $('#notifalert').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    $('#contactForm').submit(function(e) {
        e.preventDefault();
        var form = $('#contactForm')[0];
        var data = new FormData(form);
        $('#btnSave').text('Sedang Proses, Mohon tunggu...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable
        $.ajax({
            url: "<?php echo site_url('porfolio/input_message') ?>",
            type: "POST",
            //contentType: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            data: data,
            dataType: "JSON",

            success: function(data) {
                if (data.status == '00') {
                    // showAlert(data.type, data.mess);
                    $('#contactForm')[0].reset();
                    $('#summernote').summernote('code', '');
                    notif();

                } else {
                    // showAlert(data.type, data.mess);
                }
                $('#btnSave').text('Send Message'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable
                $('#btnSave').attr('hide', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                type = 'error';
                msg = 'Error adding / update data';
                showAlert(type, msg); //utk show alert
                $('#btnSave').text('Send Message'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable
                $('#btnSave').attr('hide', false); //set button enable
            }
        });

    });
</script>



<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span><?= $nama ?></span></strong>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
            Designed by <a href="<?= $web_url ?>"><?= $nama ?></a>
        </div>
    </div>
</footer><!-- End  Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets/frontend/porfolio/vendor/purecounter/purecounter.js"></script>
<script src="<?= base_url() ?>assets/frontend/porfolio/vendor/aos/aos.js"></script>
<script src="<?= base_url() ?>assets/frontend/porfolio/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/porfolio/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/porfolio/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/porfolio/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/porfolio/vendor/typed.js/typed.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/porfolio/vendor/waypoints/noframework.waypoints.js"></script>
<script src="<?= base_url() ?>assets/frontend/porfolio/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets/frontend/porfolio/js/main.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

</body>

</html>