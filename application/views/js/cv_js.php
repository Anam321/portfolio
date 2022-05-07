<script src="<?= base_url() ?>assets/backend/js/vendor/dropzone.min.js"></script>
<!-- init js -->
<!-- <script src="<?= base_url() ?>assets/backend/js/ui/component.fileupload.js"></script> -->

<script type="text/javascript">
var save_method; //for save method string
var table;
var tablenotif;
var type, msg; // for alert

function showAlert(type, msg) {

    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.extendedTimeOut = 1000; //1000

    toastr.options.timeOut = 3000;
    toastr.options.fadeOut = 250;
    toastr.options.fadeIn = 250;

    toastr.options.positionClass = 'toast-top-full-width';
    toastr[type](msg);
}

function reload_table() {
    table.ajax.reload(null, false); //reload datatable ajax
}

// $(document).ready(function() {
//     $('.summernote').summernote();
// });


$(document).ready(function() {

    table = $("#datatable").DataTable({
        lengthChange: !1,
        // buttons: ["copy", "print"],
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            }
        },
        "processing": true,
        'paging': true,
        'lengthChange': true,
        'info': true,
        'autoWidth': false,
        "ajax": "<?= base_url("administrasi/cv/data_cv/") ?>",
        stateSave: true,
        "order": [],
        drawCallback: function() {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    });
});

function add() {
    save_method = 'add';
    $('#form')[0].reset();
    $('#modalcv').modal('show');
}


// function images() {

//     $('#img').empty();
//     $.ajax({
//         url: "<?php echo site_url('administrasi/cv/editcv/') ?>" + idgal,
//         type: "POST",
//         dataType: "JSON",
//         success: function(dataimg) {
//             $('#img').html(dataimg);
//         },
//         error: function(jqXHR, textStatus, errorThrown) {
//             alert('Error get data from ajax');
//         }
//     });
// }




function addfoto(id) {

    // $('#uploadform')[0].reset();
    $('#right-modal').modal('show');
    $('#img').empty();
    id_projek = id;

    $.ajax({
        url: "<?php echo site_url('administrasi/cv/img/') ?>" + id,
        type: "POST",
        dataType: "JSON",

        success: function(data) {

            $('[name="projek_id"]').val(id_projek);
            $('#img').html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function edit(id) {
    $('#form')[0].reset();
    $('#modalcv').modal('show');
    $.ajax({
        url: "<?php echo site_url('administrasi/cv/editcv/') ?>" + id,
        type: "POST",
        dataType: "JSON",

        success: function(data) {

            $('[name="projek_id"]').val(data.projek_id);
            $('[name="nama"]').val(data.nama);
            $('[name="link"]').val(data.link);
            $('[name="foto"]').val(data.foto);

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

    var url;

    if (save_method == 'add') {
        url = "<?php echo site_url('administrasi/cv/input') ?>";
    } else {
        url = "<?php echo site_url('administrasi/cv/update') ?>";
    }

    $.ajax({
        url: url,
        type: "POST",
        //contentType: 'multipart/form-data',
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        data: data,
        dataType: "JSON",

        success: function(data) {
            if (data.status == '00') //if success close modal and reload ajax table
            {
                $.NotificationApp.send("Success", data.mess, "top-center",
                    "rgba(0,0,0,0.2)", "success");

                $('#modalcv').modal('hide');
                $('#form')[0].reset();
                reload_table();
            } else {
                $.NotificationApp.send("error", data.mess, "top-center",
                    "rgba(0,0,0,0.2)", "danger");
            }

            $('#btnSave').text('Simpan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function(jqXHR, textStatus, errorThrown) {
            type = 'error';
            msg = 'Error adding / update data';
            $.NotificationApp.send("error", msg, "top-center",
                "rgba(0,0,0,0.2)", "danger"); //utk show alert
            $('#btnSave').text('Simpan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });

});



$('#uploadform').submit(function(e) {
    e.preventDefault();
    var form = $('#uploadform')[0];
    var data = new FormData(form);
    $('#upload').text('Sedang Proses, Mohon tunggu...'); //change button text
    $('#upload').attr('disabled', true); //set button disable
    $.ajax({
        url: "<?php echo site_url('administrasi/cv/upload') ?>",
        type: "POST",
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        data: data,
        dataType: "JSON",

        success: function(data) {
            if (data.status == '00') {
                $.NotificationApp.send("Success", data.mess, "top-center",
                    "rgba(0,0,0,0.2)", "success");
                $('#uploadform')[0].reset();
                $('#right-modal').modal('hide');


            } else {

                $.NotificationApp.send("error", data.mess, "top-center",
                    "rgba(0,0,0,0.2)", "danger");
            }

            $('#upload').text('upload'); //change button text
            $('#upload').attr('disabled', false); //set button enable
        },
        error: function(jqXHR, textStatus, errorThrown) {
            type = 'error';
            msg = 'Error adding / upload data';
            $.NotificationApp.send("error", msg, "top-center",
                "rgba(0,0,0,0.2)", "danger");
            $('#upload').text('upload'); //change button text
            $('#upload').attr('disabled', false); //set button enable
        }
    });

});




function delete_data(id) {
    if (confirm('Apakah Anda yakin menghapus  ini ?')) {
        // ajax delete data to database
        $.ajax({
            url: "<?php echo site_url('administrasi/cv/delete_data/') ?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                if (data.status == '00') {
                    $.NotificationApp.send("Success", data.mess, "top-center",
                        "rgba(0,0,0,0.2)", "success");
                    reload_table();

                } else {
                    $.NotificationApp.send("error", data.mess, "top-center",
                        "rgba(0,0,0,0.2)", "danger");
                    reload_table();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
            }
        });
    }
}



// function jumlahnotif() {
//     $('#jumlah').empty();
//     $.ajax({
//         url: "<?php echo site_url('administrasi/contact/jumlahnotif/') ?>",
//         type: "POST",
//         dataType: "JSON",
//         success: function(data) {
//             $('#jumlah').text(data);


//         },
//         error: function(jqXHR, textStatus, errorThrown) {
//             alert('Error get data from ajax');
//         }
//     });
// }
// jumlahnotif();

// function notif() {
//     $('#notif').modal('show');
//     $('.modal-title').text('New');
//     $('#listnotif').empty();
//     $.ajax({
//         url: "<?php echo site_url('administrasi/contact/new_testi/') ?>",
//         type: "POST",
//         dataType: "JSON",
//         success: function(data) {
//             $('#listnotif').html(data);


//         },
//         error: function(jqXHR, textStatus, errorThrown) {
//             alert('Error get data from ajax');
//         }
//     });
// }
</script>
