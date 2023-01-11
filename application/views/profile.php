<?php
$this->load->view('template/header');
$this->load->view('template/topbar');
// print_r(
// $this->session->userdata('id')
// );
?>

<!-- Begin Page Content -->
<div class="container-fluid" style="height:fit-content">
    <?php if ($user['role'] == 1) { ?>
        <a href="<?= base_url("admin") ?>">
            <button type="button" class="btn btn-primary"><i class="fa-solid fa-backward"></i> Kembali</button>
        </a>
    <?php } else { ?>
        <a href="<?= base_url("user") ?>">
            <button type="button" class="btn btn-primary"><i class="fa-solid fa-backward"></i> Kembali</button>
        </a>
    <?php } ?>
    <div class="mt-2">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <div class="row" style="height: 387px; ;">
        <div class="col-6 pl-3 pt-3">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex pt-3 justify-content-center">
                        <img src="<?= base_url('asset/ui/img/') . $user['profile_pic'] ?>" alt="<?= $user['name'] ?>" style="width:180px; height:180px">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title align-content-center"><strong><?= $user['name'] ?></strong></h5>
                            <p class="card-text">Golongan Darah : <?= $user['goldar'] ?></p>
                            <p class="card-text">Alamat : <?= $user['alamat'] ?></p>
                            <p class="card-text">No. Telpon : <?= $user['notelp'] ?></p>
                            <p class="card-text">Email : <?= $user['email'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-1 pt-lg-2 align-bottom">
                        <a href="<?= base_url('profile/edit') ?>" class=" btn btn-primary "><i class="fa fa-pencil"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
</div>
<!-- End of Main Content -->


<?php $this->load->view('template/footer');
?>