<?php
$this->load->view('template/header');
$this->load->view('template/topbar');
// print_r(
// $this->session->userdata('id')
// );
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h4 class="h3 mb-1 text-gray-800">Administrator Only</h4>
    <?php if ($this->session->flashdata('fail')) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('fail');
            ?>
        </div>
    <?php } ?>
    <div class="col-lg-6 pt-2">
        <a href="<?= base_url("admin/member") ?>">
            <button type="button" class="btn btn-primary"><i class="fa-solid fa-backward"></i> Kembali</button>
        </a>
    </div>

    <form action="<?= base_url('admin/editmember/<?=$id?>') ?>" method="post">
        <div class="row">
            <div class="col-12 ml-5">
                <!--  -->
                <div class="row pt-3 pb-5">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-4">
                        <input type="hidden" name="id" value=<?= $member['id'] ?>>
                        <div class="form-group">
                            <label for="email" class="col-sm-6 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="<?= $member['email'] ?>" readonly>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="<?= $member['name'] ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-6 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" value="<?= $member['username'] ?>">
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="goldar" class="col-sm-6 col-form-label">Golongan Darah</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="goldar" id="goldar">
                                    <option value="<?= $member['goldar'] ?>" selected><?= $member['goldar'] ?></option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                                <?= form_error('goldar', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                    </div>
                    <!--  kiri akhir -->
                    <!--  -->
                    <!--  kanan awal -->
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label for="role" class="col-sm-6 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="role" id="role">
                                    <?php if ($member['role'] == 1) { ?>
                                        <option selected value="1">Admin</option>
                                        <option value="2">Member</option>

                                    <?php } else { ?>
                                        <option value="1">Admin</option>
                                        <option selected value="2">Member</option>
                                    <?php } ?>
                                </select>
                                </select>
                                <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-sm-6 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="textarea" class="form-control" id="alamat" name="alamat" value="<?= $member['alamat'] ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notelp" class="col-sm-6 col-form-label">No. Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $member['notelp'] ?>">
                                <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-7">
                            </div>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-primary" style="margin-left: 14px; width:70px;"> Edit </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->

<?php $this->load->view('template/footer_side');
?>