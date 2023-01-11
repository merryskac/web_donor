<?php $this->load->view('template/header');
$this->load->view('template/topbar_sidebar');
// print_r(
//     $this->session->userdata()
// );
// print_r($donor);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h4 class="h3 mb-1 text-gray-800">Administrator Only</h4>
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Pendonor</h1>
    <?php if($this->session->flashdata('fail')
    ){?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('fail');
            ?>
        </div>
    <?php }?>
     
    <form action="<?= base_url('admin/editpendonor/<?=$id?>')?>" method="post">
        <div class="row">
            <div class="col-8 ml-5">
                <div class="form-group mr-3">
                    <input type="hidden" name="id" value=<?= $donor['id']?>>
                    <input type="hidden" name="id_account" value=<?= $donor['id_account']?>>
                    <label for="Nama">Nama lengkap:</label>
                    <input type="text" name="nama" class="form-control" id="exampleFormControlInput1"value="<?= $donor['nama']?>">
                    <?=form_error('nama','<small class="text-danger ml-2">','</small>')?>
                </div>
                <div class="form-group mr-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" placeholder="contoh: Jl. Dewi Sartika"value="<?= $donor['alamat']?>">
                    <?=form_error('alamat','<small class="text-danger ml-2">','</small>')?>
                    
                </div>
                <div class="form-group mr-3">
                    <label for="Nama">Umur</label>
                    <input type="text" name="umur" class="form-control" id="exampleFormControlInput1"value="<?= $donor['umur']?>">
                    <?=form_error('umur','<small class="text-danger ml-2">','</small>')?>
                </div>
                <div class="form-group mr-3">
                    <label for="Nama">Golongan darah</label>
                    <select class="form-control required" name="goldar"  id="exampleFormControlSelect1">
                        <option value="0" disabled selected>--Pilih Golongan darah--</option>
                        <option value="A+" >A+</option>
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
                    <label for="Nama">Lokasi PMI</label>
                    <input type="text" name="lokasi" class="form-control" id="exampleFormControlInput1"value="<?= $donor['alamat_pmi']?>">
                    <?=form_error('lokasi','<small class="text-danger ml-2">','</small>')?>
                </div>
                <div class="form-group mr-3">
                    <label for="Nama">Banyak Kantong</label>
                    <input type="text" value="<?= $donor['banyak_kantong']?>"name="kantong" class="form-control" id="exampleFormControlInput1">
                </div>
                <?=form_error('kantong','<small class="text-danger ml-2">','</small>')?>
                
                <input class="form-control mt-3 mb-5 btn btn-primary" type="submit" value="submit">
            </div>
        </div>
    </form>
    

</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->

<?php $this->load->view('template/footer_side');
?>