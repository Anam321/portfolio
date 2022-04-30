<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                Data Projek
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-default.html">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Projek</li>
                    <li class="breadcrumb-item active" aria-current="page">Data Projek</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-actions float-right">
                            <a href="#" onclick="reload_data('')" class="mr-1">
                                <i class="align-middle" data-feather="refresh-cw"></i>
                            </a>

                        </div>
                        <h5 class="card-title mb-0">Data Projek</h5>
                        <a href="<?= base_url() ?>administrasi/projek/"><button
                                class="btn mb-1 mt-2 btn-facebook btn-sm"><i class="align-middle fas fa-arrow-left"></i>
                                Kembali</button></a>

                        <!-- 
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">

                                        <select class="form-control jenis_kelamin" name="">
                                            <option>-- Pilih --</option>
                                            <option value="laki-laki"></option>
                                            <option value="perempuan"></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> -->


                    </div>
                    <div class="card-body">
                        <table id="data_projek" class="table table-striped table-hover" style="width:100%">
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
