<div class="leftside-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="<?= base_url() ?>assets/backend/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="<?= base_url() ?>assets/backend/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="<?= base_url() ?>assets/backend/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="<?= base_url() ?>assets/backend/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="javascript:void(0)" aria-expanded="false"
                    aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>

                    <span> Dashboards </span>
                </a>

            </li>

            <li class="side-nav-title side-nav-item">Apps</li>

            <li class="side-nav-item">
                <a href="<?= base_url('administrasi/profil') ?>" aria-expanded="false" aria-controls="sidebarEcommerce"
                    class="side-nav-link">
                    <i class="mdi mdi-account-lock text-primary"></i>
                    <span> Profil </span>

                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false"
                    aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="mdi mdi-file-document-edit text-primary"></i>
                    <span> Info Desa </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="<?= base_url('identitasDesa') ?>">Identitas Desa</a>
                        </li>
                        <li>
                            <a href="<?= base_url('wilayahAdministrasi') ?>">Wilayah administrasi</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products-details.html">Pemerintahan Desa</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail"
                    class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span> Email </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-email-inbox.html">Inbox</a>
                        </li>
                        <li>
                            <a href="apps-email-read.html">Read Email</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>

        <div class="clearfix"></div>

    </div>


</div>
