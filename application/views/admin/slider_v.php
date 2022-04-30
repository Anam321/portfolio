<style>
.container {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
}

.container .Slider {
    position: absolute;
    width: 100%;
    height: 400vh;
    transition: all 1s ease-in-out;
    top: 0vh;
}

.container .Slider .slide {
    position: relative;
    width: 100%;
    height: 25%;
    display: flex;
    flex-wrap: wrap;
}

.container .Slider .slide:nth-child(even) {
    flex-direction: row-reverse;
}

.container .Slider .slide .Content {
    width: 50%;
    height: 100%;
    display: table;
}

.container .Slider .slide .Content div {
    display: table-cell;
    vertical-align: middle;
    padding: 50px;
    text-align: center;
    color: #222;
}

.container .Slider .slide .Content div h2 {
    font-size: 40px;
    margin: 20px;
}

.container .Slider .slide .Content div a {
    display: inline-block;
    margin: 20px;
    width: 180px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    text-decoration: none;
    background-color: #262626;
    color: #fff;
    transition-property: background-color, color;
    transition-duration: .5s, .5s;
}

.container .Slider .slide .Content div a:hover {
    background-color: #fff;
    border: 2px solid #262626;
    color: #262626;
    line-height: 46px;
}

.container .Slider .slide .ImageContent {
    width: 50%;
    height: 100%;
}

.container .Slider .slide .ImageContent img {
    width: 100%;
    height: 100%;
    cursor: pointer;
    transition: 1s;
}

.container .Slider .slide .ImageContent img:hover {
    filter: brightness(.3);
}

.container input {
    display: none;
}

.container .Navigation {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
}

.container .Navigation label {
    position: relative;
    display: block;
    width: 18px;
    height: 18px;
    margin: 5px;
    border-radius: 50%;
    cursor: pointer;
    transition: .5s;
}

.container .Navigation label span {
    position: absolute;
    display: inline-block;
    width: 50%;
    height: 50%;
    top: 50%;
    left: 50%;
    border-radius: 100%;
    transform: translate(-50%, -50%);
    transition: .5s;
}

.container #r1:checked~.Slider {
    top: 0vh;
}

.container #r2:checked~.Slider {
    top: -100vh;
}

.container #r3:checked~.Slider {
    top: -200vh;
}

.container #r4:checked~.Slider {
    top: -300vh;
}

.container #r1:checked~.Navigation label:first-child span {
    background: #fff;
}

.container #r1:checked~.Navigation label {
    border: 2px solid #fff;
}

.container #r2:checked~.Navigation label:nth-child(2) span {
    background: #222;
}

.container #r2:checked~.Navigation label {
    border: 2px solid #222;
}

.container #r3:checked~.Navigation label:nth-child(3) span {
    background: #fff;
}

.container #r3:checked~.Navigation label {
    border: 2px solid #fff;
}

.container #r4:checked~.Navigation label:last-child span {
    background: #222;
}

.container #r4:checked~.Navigation label {
    border: 2px solid #222;
}

@media (max-width:762px) {
    .container {
        height: 100vh;
    }

    .container .Slider .slide .Content div {
        padding: 10px;
    }

    .container .Slider .slide .Content div h2 {
        font-size: 25px;
        margin: 10px;
    }

    .container .Slider .slide {
        flex-direction: column-reverse;
    }

    .container .Slider .slide:nth-child(even) {
        flex-direction: column-reverse;
    }

    .container .Slider .slide .Content {
        width: 100%;
        height: 50%;
        display: table;
    }

    .container .Slider .slide .ImageContent {
        width: 100%;
        height: 50%;
    }

    .container .Navigation {
        position: absolute;
        top: 20%;
        right: 5px;
    }

    .container .Navigation label {
        border: 2px solid #fff !important;
    }

    .container #r1:checked~.Navigation label:first-child span,
    .container #r2:checked~.Navigation label:nth-child(2) span,
    .container #r3:checked~.Navigation label:nth-child(3) span,
    .container #r4:checked~.Navigation label:last-child span {
        background: #fff !important;
    }

    .container .Slider .slide .Content div a {
        margin: 5px;
        width: 120px;
        height: 50px;
        line-height: 50px;
    }
}

@media (max-width:315px) {
    .container .Slider .slide .Content div {
        padding: 5px;
    }

    .container .Slider .slide .Content div {
        padding: 5px;
    }

    .container .Slider .slide .Content div h2 {
        font-size: 20px;
        margin: 5px;
    }

    .container .Slider .slide .Content {
        width: 100%;
        height: 60%;
        display: block;
    }

    .container .Slider .slide .ImageContent {
        width: 100%;
        height: 40%;
    }
}

</style>

<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                Slider
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-default.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Slider</a></li>

                </ol>
            </nav>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <a href="javascript:void(0);" onclick="add_new('')" class="btn btn-danger mb-2"><i
                                        class="align-middle fas fa-plus"></i> Add Slider</a>
                                <a href="javascript:void(0);" onclick="reload_table('')"
                                    class="btn btn-danger mb-2"></i>
                                    relod</a>
                            </div>

                        </div>

                        <div class="table-responsive">
                            <table id="tableslider" class="table  table-centered w-100 table-sm dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>JUDUL SLIDER</th>

                                        <th>LINK</th>
                                        <th>ACTIVASI</th>
                                        <th>GAMBAR</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>




<div class="modal fade" id="slidmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <form action="" id="formslid">
                    <div class="row">
                        <div class="col-md">
                            <input type="hidden" name="slid_id" class="form-control">
                            <div class="form-group">
                                <label class="form-label">Judul Slider</label>
                                <input type="text" name="judul_slid" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Link</label>
                                <input type="text" name="link" class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <button class="btn btn-secondary" type="button">Add foto</button>
                                    </span>
                                    <input type="file" name="gambar" id="file" onchange="return fileValidation()"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div id="imagePreview"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Keterangan Produk</label>
                        <textarea class="form-control" name="paragraf" placeholder="paragraf" rows="3"></textarea>
                    </div>




                    <button type="submit" id="btnSave" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Small modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <div id="detaillist"></div>
            </div>

        </div>
    </div>
</div>


<div class="modal modal-colored modal-danger fade" id="modalon" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Activasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="formon">
                <div class="modal-body m-3">
                    <input type="hidden" name="slid_id">
                    <p class="mb-0">Anda yakin Akan Mengaktifkan Konten ini ?...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" id="on" class="btn btn-light">Lanjutkan..?</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal modal-colored modal-danger fade" id="modalof" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Activasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="formof">
                <div class="modal-body m-3">
                    <input type="hidden" name="slid_id">
                    <p class="mb-0">Anda yakin Akan Metifkan Konten ini ?...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" id="of" class="btn btn-light">Lanjutkan..?</button>
                </div>
            </form>
        </div>
    </div>
</div>
