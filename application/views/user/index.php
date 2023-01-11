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
    <?php if (
        $this->session->userdata('email') == ''
    ) {
    ?>
        <h5>Mode lihat data, anda belum login</h5>
    <?php
    }
    ?>


    <?php if ($this->session->flashdata('login')) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('login');
            ?>
        </div>
    <?php } ?>
    <form action="<?= base_url('user/index') ?>" method="get">
        <div class="row">
            <div class="col-lg-4">
                <h1 class="h3 mb-4 text-gray-800">Data Donor</h1>
            </div>
            <div class="col-lg-2">
            </div>
            <div class="col-lg-6">
                <div class="search-bar">
                    <form class="d-lg-flex">
                        <input class="form-control border-2 col" type="text" name="cari_data" id="cari_data" placeholder="Cari nama">

                    </form>
                </div>
            </div>
        </div>
    </form><br>
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
    <?php
    $no = 0 + $this->uri->segment(3);
    foreach ((!empty($_GET['cari_data']) ? $hasil : $donor) as $didonor) {
    ?>
        <div class="card">
            <div class="card-body">
                <?php if ($didonor['urgent'] == '1') {
                    if ($didonor['done'] == '1') { ?>
                        <p class="text-success">Donor sudah terpenuhi. Terima kasih</p>
                    <?php } else { ?>
                        <p class="text-danger">Darurat! Donor dibutuhkan segera!</p>
                    <?php }
                } else {
                    if ($didonor['done'] == '1') { ?>
                        <p class="text-success">Donor sudah terpenuhi. Terima kasih</p>
                <?php }
                } ?>

                <h5 class="card-title"><?= $didonor['nama'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $didonor['umur'] . ' tahun' ?></h6>
                <p class="card-text"><?= "Golongan darah: " . $didonor['goldar'] ?></p>
                <a href="<?= base_url('user/detail/' . $didonor['id']) ?>" class="card-link">Detail</a><br>
            </div>
        </div> <br>

    <?php $no = $no + 1;
    } ?><center><?php
                if (!isset($hasil)) {
                    echo $this->pagination->create_links();
                } ?></center>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->load->view('template/footer_side');
?>