<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashoard</a></li>
                        <li class="breadcrumb-item active">identitas</li>
                    </ol>
                </div>
                <h4 class="page-title">Identitas Desa</h4>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <button onclick="add()" type="button" class="btn btn-info btn-sm"><i
                    class="mdi mdi-message-plus-outline me-1"></i>
                <span>Tambah Cv</span>
            </button>
        </div>
        <div class="card-body">

            <table id="datatable" class="table table-sm  dt-responsive nowrap w-100">
                <thead class="bg-info">
                    <tr>
                        <th></th>
                        <th>NAMA</th>
                        <th>LINK</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

</div>

<div id="modalcv" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form id="form" class="form-horizontal">
                <div class="modal-body">
                    <input type="hidden" name="projek_id">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
                        <div class="col-9">
                            <input type="text" name="nama" class="form-control form-control-sm" id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label col-form-label-sm">Link</label>
                        <div class="col-9">
                            <input type="text" name="link" class="form-control form-control-sm" data-provide="typeahead"
                                id="the-basics" placeholder="Basic Example">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label col-form-label-sm">Foto</label>
                        <div class="col-9">
                            <input type="file" name="foto" class="form-control form-control-sm" data-provide="typeahead"
                                id="the-basics" placeholder="Basic Example">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" id="btnSave">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-right">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" id="uploadform">
                                <input type="hidden" name="projek_id">

                                <div class="col-sm-12">
                                    <input class="form-control" type="file" name="foto" id="formFileMultiple" multiple>
                                    <button type="submit" id="upload" class="btn btn-info mt-3">upload</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>


                <div class="row" id="img">


                </div>
            </div>
        </div>
    </div>
</div>
