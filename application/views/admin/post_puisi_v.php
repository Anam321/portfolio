 <div class="container-fluid">
     <div class="row">
         <div class="col-12">
             <div class="page-title-box">
                 <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                         <li class="breadcrumb-item"><a href="javascript: void(0);">Puisi</a></li>

                     </ol>
                 </div>
                 <h4 class="page-title">Puisi</h4>
             </div>
         </div>
     </div>

     <div class="row mb-2">
         <div class="col-sm-4">
             <a href="javascript: void(0);" onclick="addpuisi()" class="btn btn-danger btn-sm btn-rounded mb-3"><i class="mdi mdi-plus"></i> Create Puisi</a>

         </div>
         <div class="col-sm-8">
             <div class="text-sm-end">

                 <div class="btn-group mb-3 ms-1">
                     <button onclick="listpuisi()" type="button" class="btn btn-light btn-sm">Puisi</button>
                     <button onclick="musikal()" type="button" class="btn btn-light btn-sm">Musical</button>
                 </div>
                 <div class="btn-group mb-3 ms-2 d-none d-sm-inline-block">
                     <button type="button" class="btn btn-secondary btn-sm"><i class="dripicons-view-apps"></i></button>
                 </div>
                 <div class="btn-group mb-3 d-none d-sm-inline-block">
                     <button type="button" class="btn btn-link text-muted btn-sm"><i class="dripicons-checklist"></i></button>
                 </div>
             </div>
         </div>
     </div>



     <div class="row" id="datapuisi">

     </div>
 </div>



 <div class="modal fade" id="modalpuisi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
             </div>
             <form id="form">
                 <div class="modal-body">
                     <input type="hidden" name="puisi_id" class="form-control form-control-sm">
                     <input type="hidden" id="old_foto" name="old_foto">
                     <div class="mb-3">
                         <label for="example-input-small" class="form-label">Judul puisi</label>
                         <input type="text" name="judul_puisi" class="form-control form-control-sm">
                     </div>
                     <div class="mb-3">
                         <label for="example-input-small" class="form-label">Pencipta</label>
                         <input type="text" name="cipta" class="form-control form-control-sm">
                     </div>
                     <div class="mb-3">
                         <label for="example-input-small" class="form-label">Tanggal Terbit</label>
                         <input type="date" name="tgl_rilis" class="form-control form-control-sm">
                     </div>
                     <div class="mb-3">
                         <label for="example-input-small" class="form-label">Kategori</label>
                         <select name="kategori" class="form-select form-select-sm mb-3">
                             <option selected>Open this select menu</option>
                             <?php foreach ($kategori as $kat) : ?>
                                 <option value="<?= $kat->kategori ?>"><?= $kat->kategori ?></option>
                             <?php endforeach ?>
                         </select>
                     </div>

                     <div class="mb-3">
                         <label for="example-input-small" class="form-label">Foto</label>
                         <input type="file" name="file" class="form-control form-control-sm">
                     </div>
                     <!-- <div class="row">
                         <div class="col-md">
                             <div id="imagePreview"></div>
                         </div>
                     </div> -->
                     <div class="mb-3">
                         <label for="example-input-small" class="form-label">puisi</label>
                         <textarea name="puisi" id="summernote" class="form-control form-control-sm" cols="30" rows="10" style="height:200px ;"></textarea>
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" id="btnSave" class="btn btn-primary">simpan</button>
                 </div>
             </form>
         </div>
     </div>
 </div>