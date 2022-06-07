<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Profile 2</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile 2</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-4 col-lg-5">

            <div id="profil"></div>


        </div>







        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="border rounded mt-2 mb-3">
                        <form action="#" class="comment-area-box">
                            <textarea rows="3" class="form-control border-0 resize-none" placeholder="Write something...."></textarea>
                            <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-account-circle"></i></a>
                                    <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-map-marker"></i></a>
                                    <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-camera"></i></a>
                                    <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-emoticon-outline"></i></a>
                                </div>
                                <button type="submit" class="btn btn-sm btn-dark waves-effect">Post</button>
                            </div>
                        </form>
                    </div> <!-- end .border-->
                    <!-- end comment box -->

                    <!-- Story Box-->
                    <div class="border border-light rounded p-2 mb-3">
                        <div class="d-flex">
                            <img class="me-2 rounded-circle" src="assets/images/users/avatar-3.jpg" alt="Generic placeholder image" height="32">
                            <div>
                                <h5 class="m-0">Jeremy Tomlinson</h5>
                                <p class="text-muted"><small>about 2 minuts ago</small></p>
                            </div>
                        </div>
                        <p>Story based around the idea of time lapse, animation to post soon!</p>

                        <img src="assets/images/small/small-1.jpg" alt="post-img" class="rounded me-1" height="60">
                        <img src="assets/images/small/small-2.jpg" alt="post-img" class="rounded me-1" height="60">
                        <img src="assets/images/small/small-3.jpg" alt="post-img" class="rounded" height="60">

                        <div class="mt-2">
                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-heart-outline"></i> Like</a>
                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


<div id="modalupload" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form action="" id="formlogo">
                    <input type="hidden" name="profil_id" value="1">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="social-sky" class="form-label">Upload Logo</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="logo" id="file" onchange="return falidatelogo()">
                                    <button type="submit" id="uplogo" class="btn btn-info"><i class="mdi mdi-cloud-upload"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form action="" id="formcove">
                    <input type="hidden" name="profil_id" value="1">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="social-sky" class="form-label">Upload Cover</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="foto" id="cove" onchange="return falidatecove()">
                                    <button type="submit" id="upcove" class="btn btn-info"><i class="mdi mdi-cloud-upload"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-md">
                        <div id="imagePreview"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <div id="imagePreview2"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form id="formedit">
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal
                        Info</h5>
                    <input type="hidden" name="profil_id" value="1">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="nama" id="firstname" placeholder="Enter  name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Tanggal Lahir</label>
                                <input type="text" class="form-control" name="tgl_lahir" id="lastname" placeholder="Enter last name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Kelamin</label>
                                <select class="form-select mb-3" name="kelamin">
                                    <option selected>Open this select menu</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="lastname" placeholder="Enter last name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="userbio" class="form-label">Bio</label>
                                <textarea class="form-control" id="userbio" name="deskripsi" rows="4" placeholder="Write something..."></textarea>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="companyname" class="form-label">Company Name</label>
                                <input type="text" class="form-control" name="company_name" id="companyname" placeholder="Enter company name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cwebsite" class="form-label">Website</label>
                                <input type="text" class="form-control" id="cwebsite" name="web_url" placeholder="Enter website url">
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="text-end">
                        <button type="submit" id="simpan" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i>
                            Save</button>
                    </div>
                </form>

                <form id="formeditkon">
                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Social
                    </h5>
                    <input type="hidden" name="kontak_id" value="1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" id="useremail" placeholder="Enter email">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="userpassword" class="form-label">No Telpon</label>
                                <input type="number" class="form-control" name="telpon" id="userpassword" placeholder="Enter password">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="social-fb" class="form-label">Facebook</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                                    <input type="text" class="form-control" name="facebook" id="social-fb" placeholder="Url">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="social-tw" class="form-label">Whatsapp</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-whatsapp"></i></span>
                                    <input type="text" class="form-control" name="whatsap" id="social-tw" placeholder="Number">
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="social-insta" class="form-label">Instagram</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
                                    <input type="text" class="form-control" name="instagram" id="social-insta" placeholder="Url">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="social-gh" class="form-label">Github</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-github"></i></span>
                                    <input type="text" class="form-control" name="github" id="social-gh" placeholder="Username">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" id="save" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i>
                            Save</button>
                    </div>
                </form>
            </div>



            </form>
        </div>
    </div>
</div>