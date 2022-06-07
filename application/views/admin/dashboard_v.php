<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">CRM</li>
                    </ol>
                </div>
                <h4 class="page-title">CRM</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xxl-3 col-lg-6">

            <?php $date = date("Y-m-d");
            foreach ($pengunjung as $col) : ?>
                <?php $pengunjungHariini = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "'")->num_rows(); ?>
            <?php endforeach ?>

            <div class="card widget-flat bg-primary text-white">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-account-multiple widget-icon bg-white text-success"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Pengunjung Porfolio</h6>
                    <h3 class="mt-3 mb-3"><?= $pengunjungHariini ?> Hari Ini</h3>
                    <p class="mb-0">
                        <span class="badge badge-light-lighten me-1">
                            <i class="mdi mdi-arrow-up-bold"></i> <?= $allpengunjung ?></span>
                        <span class="text-nowrap">Total Pengunjung</span>
                    </p>
                </div>
            </div>

        </div>




    </div>
    <!-- end row -->






</div> <!-- container -->