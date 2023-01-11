<?php $this->load->view('template/header'); ?>

<body class="bg-gradient-primary">
<?php print_r(
$this->session->userdata('role_id')); ?>
    <div class="container ">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <a style="text-decoration:none; color:red" href="<?= base_url() ?>"><i class="ml-1 fa-solid fa-backward"></i> Landing Page</a>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>

                                    <?php if ($this->session->flashdata('succ')) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= $this->session->flashdata('succ');
                                            ?>
                                        </div>
                                    <?php } ?>

                                    <?php if ($this->session->flashdata('fail')) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $this->session->flashdata('fail');
                                            ?>
                                        </div>
                                    <?php } ?>

                                    <form action="<?= base_url('auth/login'); ?>" method="post">
                                        <div class="form-group">
                                            <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            <?= form_error('email', '<small class="text-danger ml-2">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass1" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                            <?= form_error('pass1', '<small class="text-danger ml-2">', '</small>') ?>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>

                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/signup') ?>">Buat akun baru!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script src="<?= base_url('asset/ui') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('asset/ui') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('asset/ui') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('asset/ui') ?>js/sb-admin-2.min.js"></script>