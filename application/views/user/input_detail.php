<?php
$this->load->view('template/header');
$this->load->view('template/topbar');



?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>">
        <button type="button" class="btn btn-primary"><i class="fa-solid fa-backward"></i> Kembali</button>
    </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><br> Detail Pasien</h1>
    <?php
    // print_r($donor); 
    // print_r($donor);
    foreach ($donor_id as $patient) { ?>
        <?php if ($patient['urgent'] == '1') {
            if ($patient['done'] == '1') { ?>
                <div class="card text-white bg-success mx-5 mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Donor terpenuhi!</h5>
                        <p class="card-text">Donor sudah terpenuhi. Terima kasih</p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="card text-white bg-danger mx-5 mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Dibutuhkan segera!</h5>
                        <p class="card-text">Pasien membutuhkan darah secepatnya!</p>
                    </div>
                </div>
            <?php }
        } else {
            if ($patient['done'] == '1') { ?>
                <div class="card text-white bg-success mx-5 mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Donor terpenuhi!</h5>
                        <p class="card-text">Donor sudah terpenuhi. Terima kasih</p>
                    </div>
                </div>
        <?php }
        } ?>
        <div class="card mx-5">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    Nama : <?= $patient['nama'] ?>
                </li>
                <li class="list-group-item">
                    Alamat : <?= $patient['alamat'] ?>
                </li>
                <li class="list-group-item">
                    Umur : <?= $patient['umur'] ?>
                </li>
                <li class="list-group-item">
                    Kantong darah dibutuhkan : <?= $patient['banyak_kantong'] ?>
                </li>
                <li class="list-group-item">
                    Waktu input : <?= $patient['waktu'] ?>
                </li>
            </ul>
        </div>
        <br><br><br>
    <?php
    } ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php $this->load->view('template/footer');
?>