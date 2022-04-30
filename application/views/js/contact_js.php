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

$(document).ready(function() {
    $('.summernote').summernote();
});

function table_contact() {

    table = $('#contact').DataTable({

        "processing": true,
        'paging': true,
        'lengthChange': true,
        'info': true,
        'autoWidth': false,
        "ajax": "<?= base_url("administrasi/contact/list_contact/") ?>",
        stateSave: true,
        "order": []


    });
}
table_contact();


function section() {
    $('#sectionid').empty();
    $.ajax({
        url: "<?php echo site_url('administrasi/contact/section/') ?>",
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            $('#sectionid').html(data);
            $('#sectionid2').html('hide');
            table_contact();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}
section();

function section2(id) {
    $('#sectionid2').empty();
    $.ajax({
        url: "<?php echo site_url('administrasi/contact/section2/') ?>" + id,
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            $('#sectionid2').html(data);
            $('#sectionid').html('hide');


        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}


function delete_data(id) {
    if (confirm('Apakah Anda yakin menghapus  ini ?')) {
        // ajax delete data to database
        $.ajax({
            url: "<?php echo site_url('administrasi/contact/delete_data/') ?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                if (data.status == '00') {
                    showAlert(data.type, data.mess);
                    reload_table();

                } else {
                    showAlert(data.type, data.mess);
                    reload_table();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
            }
        });
    }
}



function jumlahnotif() {
    $('#jumlah').empty();
    $.ajax({
        url: "<?php echo site_url('administrasi/contact/jumlahnotif/') ?>",
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            $('#jumlah').text(data);


        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}
jumlahnotif();

function notif() {
    $('#notif').modal('show');
    $('.modal-title').text('New');
    $('#listnotif').empty();
    $.ajax({
        url: "<?php echo site_url('administrasi/contact/new_testi/') ?>",
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            $('#listnotif').html(data);


        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}
</script>
