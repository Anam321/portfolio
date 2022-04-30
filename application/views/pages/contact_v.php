<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Contact Us</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li>Contact Us</li>
                </ol>
            </div>

        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>

            </div>

        </div>



        <div class="container">
            <div id="notifalert"></div>
            <div class="row mt-5">

                <div class="col-lg-6">
                    <div class="mb-2" style="width: 100%"><iframe width="100%" height="600" frameborder="0"
                            scrolling="no" marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Jl.%20M.%20Jali%20No.9,%20RT.001/RW.002,%20Kunciran%20Jaya,%20Kec.%20Pinang,%20Kota%20Tangerang,%20Banten%2015144+(Bengkel%20Las%20RIZKI)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                                href="https://www.gps.ie/marine-gps/">ship tracker</a></iframe></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Our Address</h3>
                                <p><?= $alamat ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email Us</h3>
                                <p><?= $email ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Call Us</h3>
                                <p>+62 <?= $telpon ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <div class="social-links mt-3">
                                    <a href="<?= $whatsap ?>" class="twitter"><i class="bx bxl-whatsapp"></i></a>
                                    <h3>Get Us</h3>
                                    <p>+62 <?= $whatsap ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <div class="social-links mt-3">
                                    <a href="<?= $instagram ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
                                    <h3>Click Us</h3>
                                    <a href="<?= $instagram ?>">
                                        <p><?= $instagram ?></p>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <form id="form">
                        <div class="row">
                            <div class="col form-group">
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap"
                                    required>
                            </div>
                            <div class="col form-group mt-3">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Email Valid" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                        </div>

                        <div class="text-center mt-2"><button type="submit" class="btn appointment-btn"
                                id="btnSave">Send
                                Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section>




    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
    function showAlert(type, msg) {

        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.extendedTimeOut = 1000; //1000

        toastr.options.timeOut = 3000;
        toastr.options.fadeOut = 250;
        toastr.options.fadeIn = 250;

        toastr.options.positionClass = 'toast-top-center';
        toastr[type](msg);
    }

    function notif() {
        $('#notifalert').empty();
        $.ajax({
            url: "<?php echo site_url('contact_us/alertnotif') ?>",
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

    $('#form').submit(function(e) {
        // alert("Form submitted!");
        e.preventDefault();
        var form = $('#form')[0];
        var data = new FormData(form);

        $('#btnSave').text('Sedang Proses, Mohon tunggu...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable


        $.ajax({
            url: "<?php echo site_url('contact_us/input') ?>",
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
                    showAlert(data.type, data.mess);
                    $('#form')[0].reset();
                    notif();
                } else {
                    showAlert(data.type, data.mess);
                }

                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable
                $('#btnSave').attr('hide', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                type = 'error';
                msg = 'Error adding / update data';
                showAlert(type, msg); //utk show alert
                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable
                $('#btnSave').attr('hide', false); //set button enable
            }
        });

    });
    </script>
</main>
