<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                Projek Sekarang
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-default.html">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Projek</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-actions float-right">
                            <a href="#" onclick="reload_table('')" class="mr-1">
                                <i class="align-middle" data-feather="refresh-cw"></i>
                            </a>

                        </div>
                        <h5 class="card-title mb-0">Projek</h5>
                        <button onclick="tambah('')" class="btn mb-1 mt-2 btn-facebook btn-sm"><i
                                class="align-middle fas fa-plus"></i> Tambah
                            Projek</button>
                        <a href="<?= base_url() ?>administrasi/projek/data_projek/"><button
                                class="btn mb-1 mt-2 btn-facebook btn-sm"><i class="align-middle fas fa-file"></i> Data
                                Projek</button></a>
                    </div>
                    <div class="card-body">
                        <table id="table_projek" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Projek</th>
                                    <th>Jenis</th>
                                    <th>Type</th>
                                    <th>Kota</th>
                                    <th>Alamat</th>
                                    <th>Timeline</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Tahun</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3">
                <div id="detaillist"></div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="modalprojek" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form">
                <div class="modal-body m-3">
                    <input type="hidden" name="projek_id" class="form-control">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Tahun</label>
                        <div class="col-sm-10">
                            <input type="number" name="tahun" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Nama Projek</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_projek" class="form-control" placeholder="Nama Projek">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Jenis Projek</label>
                        <div class="col-sm-10">
                            <select class="custom-select mb-3" name="jenis">
                                <option selected>Open this select menu</option>
                                <option value="Pembuatan">Pembuatan</option>
                                <option value="Perbaikan">Perbaikan</option>
                                <option value="Perawatan">Perawatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Type</label>
                        <div class="col-sm-10">
                            <select class="custom-select mb-3" name="type">
                                <option selected>Open this select menu</option>
                                <option value="TERALIS">TERALIS</option>
                                <option value="PAGAR">PAGAR</option>
                                <option value="CANOPY">CANOPY</option>
                                <option value="RELING TANGGA">RELING TANGGA</option>
                                <option value="GORDEN">GORDEN</option>
                                <option value="BALKON">BALKON</option>
                                <option value="FOLDING GATE">FOLDING GATE</option>
                                <option value="ALUMUNIUM">ALUMUNIUM</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Durasi</label>
                        <div class="col-sm-10">
                            <input type="text" name="durasi" class="form-control"
                                placeholder="Durasi - contoh( 8 bulan )">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <input type="date" name="tgl_mulai" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Tanggal Akhir</label>
                        <div class="col-sm-10">
                            <input type="date" name="tgl_akhir" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" name="harga" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Kota</label>
                        <div class="col-sm-10">
                            <input type="text" name="kota" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="alamat" placeholder="Alamat" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btnSave" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
