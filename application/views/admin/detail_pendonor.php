<?php
$this->load->view('template/header');
$this->load->view('template/topbar');

// print_r($donor);

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>">
        <button type="button" class="btn btn-primary"><i class="fa-solid fa-backward"></i> Kembali</button>
    </a>
    <!-- Page Heading -->

    <div class="card mx-5 mt-5">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                Nama : <?= $detail['nama'] ?>
            </li>
            <li class="list-group-item">
                Alamat : <?= $detail['alamat'] ?>
            </li>
            <li class="list-group-item">
                Umur : <?= $detail['umur'] ?>
            </li>
            <li class="list-group-item">
                Golongan Darah : <?= $detail['goldar'] ?>
            </li>
            <li class="list-group-item">
                Kantong darah didonor : <?= $detail['banyak_kantong'] ?>
            <li class="list-group-item">
                Alamat PMI : <?= $detail['alamat_pmi'] ?>
            </li>
            </li>
            <li class="list-group-item">
                Waktu input : <?= $detail['waktu'] ?>
            </li>
        </ul>
    </div>
    <br><br><br>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php $this->load->view('template/footer');
?>