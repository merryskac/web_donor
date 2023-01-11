<?php
$this->load->view('template/header');
$this->load->view('template/topbar');
// print_r(
// $this->session->userdata('id')
// );
?>

<!-- Begin Page Content -->
<div class="container-fluid" style="height:fit-content">

    <!-- SEARCH AREA START -->
    <div class="row">

        <div class="col-lg-6 pt-2">
            <?php if ($user['role'] == 1) { ?>
                <a href="<?= base_url("admin") ?>">
                    <button type="button" class="btn btn-primary"><i class="fa-solid fa-backward"></i> Kembali</button>
                </a>
            <?php } else { ?>
                <a href="<?= base_url("user") ?>">
                    <button type="button" class="btn btn-primary"><i class="fa-solid fa-backward"></i> Kembali</button>
                </a>
            <?php } ?>
        </div>
        <div class="col-lg-2">
        </div>
        <div class="col-lg-4">
            <!-- <div class="search-bar">
                <form class="d-lg-flex">
                    <input class="form-control border-2 col" type="search" name="search" placeholder="Search">
                </form>
            </div> -->
        </div>
        <!-- SEARCH AREA END -->
    </div>


    <!-- flashdata -->
    <div class="mt-2">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <!-- CARD MEMBER -->
    <section class="section dashboard">
        <div class="row">

            <!-- KOLOM KIRI START-->
            <div class="col-lg-12 py-4">
                <div class="row">

                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">
                            <?php if ($this->session->flashdata('fail')) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $this->session->flashdata('fail');
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('succ')) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $this->session->flashdata('succ');
                                    ?>
                                </div>
                            <?php } ?>

                            <div class="card-body px-4 py-3">
                                <h5 class="card-title py-0">Admin <small>| Donor</small></h5>
                                <!-- parent -->
                                <div class="row">

                                    <?php foreach ($akun as $user) : ?>
                                        <!-- son -->
                                        <?php if ($user['role'] == 1) { ?>

                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                                                <div class="card mb-4" style="width: 17rem;">
                                                    <img src="<?= base_url('asset/ui/img/') . $user['profile_pic'] ?>" class="img-thumbnail img-fluid" style="width: max-content;">
                                                    <ul class="list-group list-group-flush mt-0 text-center mb-3">
                                                        <li class="list-group-item"><strong><?= $user['name'] ?></strong></li>
                                                        <li class="list-group-item"><?= $user['goldar'] ?></li>
                                                        <li class="list-group-item"><?= $user['email'] ?></li>
                                                        <?php if ($user['role'] == 1) { ?>
                                                            <li class="list-group-item">Admin</li>
                                                        <?php } else { ?>
                                                            <li class="list-group-item">Member</li>
                                                        <?php } ?>

                                                    </ul>
                                                    <div class="card-body pt-0">
                                                        <a href="<?= base_url('admin/editmember/' . $user['id']) ?>" class="card-link bg-dark-light d-grid gap-2">
                                                            <button type="submit" class="btn btn-primary btn-outline-secondary btn-sm">Edit</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                    <!-- son end -->
                                </div>
                                <!-- parent end -->

                                <!-- END Status keanggotaan -->
                            </div>
                            <!--  -->
                            <!--  -->
                            <!--  -->
                            <div class="card-body px-4 py-3">
                                <h5 class="card-title py-0">Member <small>| Donor</small></h5>
                                <!-- parent -->
                                <div class="row">

                                    <?php foreach ($akun as $user) : ?>
                                        <!-- son -->
                                        <?php if ($user['role'] == 2) { ?>

                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                                                <div class="card mb-4" style="width: 17rem;">
                                                    <img src="<?= base_url('asset/ui/img/') . $user['profile_pic'] ?>" class="img-thumbnail img-fluid" style="width: max-content;">
                                                    <ul class="list-group list-group-flush mt-0 text-center mb-3">
                                                        <li class="list-group-item"><strong><?= $user['name'] ?></strong></li>
                                                        <li class="list-group-item"><?= $user['goldar'] ?></li>
                                                        <li class="list-group-item"><?= $user['email'] ?></li>
                                                        <?php if ($user['role'] == 1) { ?>
                                                            <li class="list-group-item">Admin</li>
                                                        <?php } else { ?>
                                                            <li class="list-group-item">Member</li>
                                                        <?php } ?>

                                                    </ul>
                                                    <div class="card-body pt-0">
                                                        <a href="<?= base_url('admin/editmember/' . $user['id']) ?>" class="card-link bg-dark-light d-grid gap-2">
                                                            <button type="submit" class="btn btn-primary btn-outline-secondary btn-sm">Edit</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                    <!-- son end -->
                                </div>
                                <!-- parent end -->

                                <!-- END Status keanggotaan -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- KOLOM KIRI END -->

                <!-- KOLOM KANAN START -->
                <!-- <div class="col-lg-4">

                        </div> -->
                <!-- KOLOM KANAN END -->
            </div>
    </section>



</div>
<!-- End of Main Content -->


<?php $this->load->view('template/footer');
?>