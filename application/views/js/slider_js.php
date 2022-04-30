<script type="text/javascript">
var save_method; //for save method string
var table;

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

function slider_table() {

    table = $('#tableslider').DataTable({

        "processing": true,
        'paging': true,
        'lengthChange': true,
        'info': true,
        'autoWidth': false,
        "ajax": "<?= base_url("administrasi/slider/listslider") ?>",
        stateSave: true,
        "order": []


    });
}
slider_table();


function add_new() {
    save_method = "add";
    $('#formslid')[0].reset();
    $('#slidmodal').modal('show'); //show modal bootstrap
    // $('#paragraf').summernote('code', '');
    $('.modal-title').text('Tambah Slider'); //show modal bootstrap
}


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


// function foto(id) {
//     $('#listfoto').empty();
//     $.ajax({
//         url: "<?php echo site_url('administrasi/produk/listfoto/') ?>" + id,
//         type: "POST",
//         dataType: "JSON",
//         success: function(data) {
//             $('#listfoto').html(data);
//         },
//         error: function(jqXHR, textStatus, errorThrown) {
//             alert('Error get data from ajax');
//         }
//     });
// }
// foto();

function detail(id) {
    $('#detailmodal').modal('show');
    $('#detaillist').empty();
    $.ajax({
        url: "<?php echo site_url('administrasi/slider/detail/') ?>" + id,
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


function edit(id) {
    save_method = "update";
    $('#formslid')[0].reset();
    $('#slidmodal').modal('show'); //show modal bootstrap
    // $('#paragraf').summernote('code', '');
    $('.modal-title').text('Edit Slider'); //show modal bootstrap
    $.ajax({
        url: "<?php echo site_url('administrasi/slider/ajax_editslide/') ?>" + id,
        type: "POST",
        dataType: "JSON",

        success: function(data) {

            $('[name="slid_id"]').val(data.slid_id);
            $('[name="judul_slid"]').val(data.judul_slid);
            $('[name="link"]').val(data.link);
            $('[name="gambar"]').val(data.gambar);
            $('[name="paragraf"]').val(data.paragraf);



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
            url: "<?php echo site_url('administrasi/slider/delete_data/') ?>" + id,
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
    save_method = "update";
    $('#formon')[0].reset();
    $('#modalon').modal('show'); //show modal bootstrap


    $.ajax({
        url: "<?php echo site_url('administrasi/slider/ajax_editslide/') ?>" + id,
        type: "POST",
        dataType: "JSON",

        success: function(data) {

            $('[name="slid_id"]').val(data.slid_id);


        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });

}

function of (id) {
    // alert('you can edit here !');
    save_method = "update";
    $('#formof')[0].reset();
    $('#modalof').modal('show'); //show modal bootstrap


    $.ajax({
        url: "<?php echo site_url('administrasi/slider/ajax_editslide/') ?>" + id,
        type: "POST",
        dataType: "JSON",

        success: function(data) {

            $('[name="slid_id"]').val(data.slid_id);


        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });

}

$('#formslid').submit(function(e) {
    // alert("Form submitted!");
    e.preventDefault();
    // Get form
    var form = $('#formslid')[0];

    // Create an FormData object
    //var data = new FormData(form);
    var data = new FormData(form);
    //var data = $(this).serialize();

    if ($('[name="foto"]').val() == '') {
        alert('Pilih Foto Produk Yang Akan di Upload !');
        return false;
    }

    $('#btnSave').text('Sedang Proses, Mohon tunggu...'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable

    // ajax adding data to database
    // console.log($('#formslid').serialize());
    var url;

    if (save_method == 'add') {
        url = "<?php echo site_url('administrasi/slider/input_slider') ?>";
    } else {
        url = "<?php echo site_url('administrasi/slider/update') ?>";
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
                $('#formslid')[0].reset();
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
    // Get form
    var form = $('#formon')[0];

    // Create an FormData object
    //var data = new FormData(form);
    var data = new FormData(form);
    //var data = $(this).serialize();

    $('#on').text('Mohon tunggu..'); //change button text
    $('#on').attr('disabled', true); //set button disable

    // ajax adding data to database
    // console.log($('#on').serialize());
    var url;

    if (save_method == 'on') {
        url = "<?php echo site_url('administrasi/slider/on') ?>";
    } else {
        url = "<?php echo site_url('administrasi/slider/on') ?>";
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
    // Get form
    var form = $('#formof')[0];

    // Create an FormData object
    //var data = new FormData(form);
    var data = new FormData(form);
    //var data = $(this).serialize();

    $('#of').text('Mohon tunggu..'); //change button text
    $('#of').attr('disabled', true); //set button disable

    // ajax adding data to database
    // console.log($('#on').serialize());
    var url;

    if (save_method == 'of') {
        url = "<?php echo site_url('administrasi/slider/of') ?>";
    } else {
        url = "<?php echo site_url('administrasi/slider/of') ?>";
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
