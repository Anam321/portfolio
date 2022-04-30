<script type="text/javascript">
var table; // for table
var foor; // for table
var save_method; // untuk metode save data varible global

// itu yang buat add udah jalan ga bakalan bener soalna harus satu file lamun banyak pati menumpuk di file footer.php
function reload_data() {
    foor.ajax.reload(null, false); //reload datatable ajax
}

function reload_table() {
    table.ajax.reload(null, false); //reload datatable ajax
}

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

$(document).ready(function() {
    $('.summernote').summernote();
});

function fileValidation() {
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(filePath)) {
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    } else {
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img style="max-width:350px;" src="' + e.target
                    .result + '"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function artikel_table() {

    table = $('#artikeltable').DataTable({

        "processing": true,
        'paging': true,
        'lengthChange': true,
        'info': true,
        'autoWidth': false,
        "ajax": "<?= base_url("administrasi/artikel/listartikel") ?>",
        stateSave: true,
        "order": []


    });
}
artikel_table();

function tambah() {
    save_method = 'add';
    $('#forms')[0].reset(); // reset form on modal
    $('#slidmodal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Artikel');
}


function detail(id) {
    $('#detailmodal').modal('show');
    $('#detaillist').empty();
    $.ajax({
        url: "<?php echo site_url('administrasi/artikel/detail/') ?>" + id,
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            $('#detaillist').html(data);


        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function delete_data(id) {
    if (confirm('Apakah Anda yakin menghapus data ini ?')) {
        // ajax delete data to database
        $.ajax({
            url: "<?php echo site_url('administrasi/artikel/delete_data/') ?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                if (data.status == '00') {
                    // reload_list_produk();

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

function on(id) {
    // alert('you can edit here !');

    $('#formon')[0].reset();
    $('#modalon').modal('show'); //show modal bootstrap


    $.ajax({
        url: "<?php echo site_url('administrasi/artikel/ajax_edit/') ?>" + id,
        type: "POST",
        dataType: "JSON",

        success: function(data) {

            $('[name="artikel_id"]').val(data.artikel_id);


        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });

}

function of (id) {
    // alert('you can edit here !');

    $('#formof')[0].reset();
    $('#modalof').modal('show'); //show modal bootstrap


    $.ajax({
        url: "<?php echo site_url('administrasi/artikel/ajax_edit/') ?>" + id,
        type: "POST",
        dataType: "JSON",

        success: function(data) {

            $('[name="artikel_id"]').val(data.artikel_id);


        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });

}

$('#forms').submit(function(e) {
    // alert("Form submitted!");
    e.preventDefault();
    // Get form
    var form = $('#forms')[0];

    // Create an FormData object
    //var data = new FormData(form);
    var data = new FormData(form);
    //var data = $(this).serialize();


    $('#btnSave').text('Sedang Proses, Mohon tunggu...'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable

    // ajax adding data to database
    // console.log($('#forms').serialize());
    var url;

    if (save_method == 'add') {
        url = "<?php echo site_url('administrasi/artikel/input_artikel') ?>";
    } else {
        url = "<?php echo site_url('administrasi/artikel/update_artikel') ?>";
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
                // get_list_produk();
                showAlert(data.type, data.mess);
                $('#slidmodal').modal('hide');
                $('#forms')[0].reset();
                reload_table();
            } else {

                showAlert(data.type, data.mess);


            }

            $('#btnSave').text('Simpan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        },
        error: function(jqXHR, textStatus, errorThrown) {
            type = 'error';
            msg = 'Error adding / update data';
            showAlert(type, msg); //utk show alert
            $('#btnSave').text('Simpan'); //change button text
            $('#btnSave').attr('disabled', false); //set button enable
        }
    });

});


$('#formon').submit(function(e) {

    // alert("Form submitted!");
    e.preventDefault();
    var form = $('#formon')[0];
    var data = new FormData(form);

    $('#on').text('Mohon tunggu..'); //change button text
    $('#on').attr('disabled', true); //set button disable


    $.ajax({
        url: "<?php echo site_url('administrasi/artikel/on') ?> ",
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
                // get_list_produk();
                showAlert(data.type, data.mess);
                $('#modalon').modal('hide');
                $('#formon')[0].reset();
                reload_table();
            } else {

                showAlert(data.type, data.mess);


            }

            $('#on').text('on'); //change button text
            $('#on').attr('disabled', false); //set button enable
        },
        error: function(jqXHR, textStatus, errorThrown) {
            type = 'error';
            msg = 'Error adding / update data';
            showAlert(type, msg); //utk show alert
            $('#on').text('on'); //change button text
            $('#on').attr('disabled', false); //set button enable
        }
    });

});

$('#formof').submit(function(e) {

    // alert("Form submitted!");
    e.preventDefault();

    var form = $('#formof')[0];
    var data = new FormData(form);
    $('#of').text('Mohon tunggu..'); //change button text
    $('#of').attr('disabled', true); //set button disable

    $.ajax({
        url: "<?php echo site_url('administrasi/artikel/of') ?>",
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
                // get_list_produk();
                showAlert(data.type, data.mess);
                $('#modalof').modal('hide');
                $('#formof')[0].reset();
                reload_table();
            } else {

                showAlert(data.type, data.mess);
            }

            $('#of').text('on'); //change button text
            $('#of').attr('disabled', false); //set button enable
        },
        error: function(jqXHR, textStatus, errorThrown) {
            type = 'error';
            msg = 'Error adding / update data';
            showAlert(type, msg); //utk show alert
            $('#of').text('on'); //change button text
            $('#of').attr('disabled', false); //set button enable
        }
    });

});
</script>
