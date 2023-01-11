<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=
                                                                                        $this->session->userdata('role_id') == 1 ? base_url('admin/index') : base_url('user/index');
                                                                                        ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa-solid fa-file-medical"></i>
            </div>
            <div class="judul sidebar-brand-text mx-3">Data Donor Darah</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">


            <a class="nav-link" href="<?=
                                        $this->session->userdata('role_id') == 1 ? base_url('admin/index') : base_url('user/index');
                                        ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <?php if (
            $this->session->userdata('role_id') == 2
        ) { ?>
            <div class="sidebar-heading">
                User
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('user/butuh_darah') ?>" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-hand-holding-droplet"></i>
                    <span>Butuh Darah</span>
                </a>

            </li>


        <?php } else if (
            $this->session->userdata('role_id') == null
        ) { ?>
            <div class="sidebar-heading">
                User
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('user/butuh_darah') ?>" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-hand-holding-droplet"></i>
                    <span>Butuh Darah</span>
                </a>

            </li>


        <?php } else { ?>
            <div class="sidebar-heading">
                Admin
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('admin/pendonor') ?>" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-droplet"></i>
                    <span>Pendonor</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('admin/member') ?>" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-users"></i>
                    <span>Member</span>
                </a>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                User
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('admin/butuh_darah') ?>" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-hand-holding-droplet"></i>
                    <span>Butuh Darah</span>
                </a>

            </li>

        <?php } ?>

        <!-- Nav Item - Utilities Collapse Menu -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('user/syarat_donor') ?>" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-solid fa-file-contract"></i>
                <span>Syarat Pendonor</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('user/inputanSaya') ?>" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-solid fa-keyboard"></i>
                <span>Inputan saya</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('user/map') ?>" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-solid fa-map-location-dot"></i>
                <span> <b> Peta Lokasi </b> </span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('user/latar_belakang') ?>" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-solid fa-heart"></i>
                <span>Latar Belakang Program</span>
            </a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <?php if ($this->session->userdata('email') == '') { ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('auth/login') ?>" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Log In</span>
                </a>

            </li>
        <?php } else { ?>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa-solid fa-circle-left"></i>
                    <span>Log Out</span>
                </a>

            </li>
        <?php } ?>

        <hr class="sidebar-divider d-none d-md-block">
        <div class="sidebar-heading">
            About
        </div>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/about_dev') ?>" aria-expanded="true" aria-controls="collapsePages">
                <i class="fa-solid fa-terminal"></i>
                <span>About</span>
            </a>

        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <ul class="navbar-nav ml-auto">



                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <?php if (isset($user['name'])) { ?>
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600"><?= $user['name'] ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('asset/ui/img/') . $user['profile_pic'] ?>">
                            <?php } else { ?>
                                <a style="text-decoration:none" href="<?= base_url('auth/login') ?>">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        <?= 'login' ?></span></a>
                            <?php } ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="<?= base_url('profile/index') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    My Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                    </li>


                </ul>


            </nav>