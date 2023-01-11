<?php
$this->load->view('template/header');
$this->load->view('template/topbar');
// print_r(
// $this->session->userdata('id')
// );
?>

<!-- Begin Page Content -->
<div class="container-fluid" style="height:fit-content">

    <a href="<?= $_SERVER['HTTP_REFERER'] ?>">
        <button type="button" class="btn btn-primary"><i class="fa-solid fa-backward"></i> Kembali</button>
    </a>
    <div class="row pt-3 pb-5">

        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">

            <?php echo form_open_multipart('profile/edit'); ?>
            <div class="form-group">
                <label for="email" class="col-sm-6 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-6 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="goldar" class="col-sm-6 col-form-label">Golongan Darah</label>
                <div class="col-sm-10">
                    <select class="form-control" name="goldar" id="goldar">
                        <option value="0" disabled selected>--Pilih Golongan darah--</option>
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
            <div class="form-group">
                <label for="alamat" class="col-sm-6 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="textarea" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat'] ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="notelp" class="col-sm-6 col-form-label">No. Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $user['notelp'] ?>">
                    <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">Foto</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('asset/ui/img/') . $user['profile_pic'] ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Pilih file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8">
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary" style="margin-left: 14px;"> Edit </button>
                </div>
            </div>
            </form>
        </div>

    </div>
</div>
<!-- End of Main Content -->


<?php $this->load->view('template/footer');
?>