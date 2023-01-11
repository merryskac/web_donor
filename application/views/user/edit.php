<?php
$this->load->view('template/header');
$this->load->view('template/topbar');
// print_r(
//     $this->session->userdata()

// );
// print_r($donor);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>">
        <button type="button" class="btn btn-primary mb-3"><i class="fa-solid fa-backward"></i> Kembali</button>
    </a><br>
    <?php if($this->session->flashdata('fail')
    ){?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('fail');
            ?>
        </div>
    <?php }?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 mx-5 text-gray-800"><br>Edit Penerima Darah</h1>

    <form action="<?= base_url('user/edit/<?=$id?>') ?>" method="post">
        <div class="row">
            <div class="col-8 ml-5">
                <div class="form-group mr-3">
                    <input type="hidden" name="id" value="<?= $donor[0]['id'] ?>">
                    <input type="hidden" name="id_account" value="<?= $donor[0]['id_account'] ?>">
                    <label for="Nama">Nama lengkap:</label>
                    <input type="text" name="nama" value="<?= $donor[0]['nama'] ?>" class=" form-control" id="exampleFormControlInput1">
                    <?= form_error('nama', '<small class="text-danger ml-2">', '</small>') ?>
                </div>
                <div class="form-group mr-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" value="<?= $donor[0]['alamat'] ?>" name=" alamat" class="form-control" id="exampleFormControlInput1" placeholder="contoh: Jl. Dewi Sartika">
                    <?= form_error('alamat', '<small class="text-danger ml-2">', '</small>') ?>

                </div>
                <div class="form-group mr-3">
                    <label for="Nama">Umur</label>
                    <input type="text" value="<?= $donor[0]['umur'] ?>" name=" umur" class="form-control" id="exampleFormControlInput1">
                    <?= form_error('umur', '<small class="text-danger ml-2">', '</small>') ?>
                </div>
                <div class="form-group mr-3">
                    <label for="Nama">Golongan darah</label>
                    <select class="form-control" name="goldar" id="exampleFormControlSelect1">
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
                </div>

                <div class="form-group mr-3">
                    <label for="Nama">Banyak Kantong</label>
                    <input type="text" value="<?= $donor[0]['banyak_kantong'] ?>" name=" kantong" class="form-control" id="exampleFormControlInput1">
                </div>
                <?= form_error('kantong', '<small class="text-danger ml-2">', '</small>') ?>
                <div class="form-group mr-3 mt-3">

                    <input type="checkbox" name="urgent" id="urgent" value=1> Urgent! Darah dibutuhkan segera! <br>
                    <input type="checkbox" name="done" id="urgent" value=1> Kebutuhan Darah sudah terpenuhi. Terima kasih!
                </div>
                <input class="form-control mt-3 mb-5 btn btn-primary" type="submit" value="submit">
            </div>
        </div>
    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php $this->load->view('template/footer');
?>