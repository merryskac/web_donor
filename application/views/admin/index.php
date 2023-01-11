<?php $this->load->view('template/header');
$this->load->view('template/topbar_sidebar');
// print_r(
//     $this->session->userdata()
// );
// print_r($user);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-8">
            <h1 class="h3 mb-2 text-gray-800">Data Donor</h1>
        </div>
        <div class="col-4">
            <h4 class="h3 mb-1 text-gray-800">Administrator Only</h4>
        </div>
    </div>

    <?php if ($this->session->flashdata('login')) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('login');
            ?>
        </div>
    <?php } ?><br>


    <form action="<?= base_url('admin/index') ?>" method="get">
        <div class="row">
            <div class="col-lg-6">
                <div class="search-bar">
                    <form class="d-lg-flex">
                        <input class="form-control border-2 col" type="text" name="cari_data" id="cari_data" placeholder="Cari nama">

                    </form>
                </div>
            </div>
            <div class="col-lg-2">
            </div>
            <div class="col-lg-4">
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

    <?php $no = 0;
    foreach ((!empty($_GET['cari_data']) ? $hasil : $donor) as $didonor) { ?>
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
                <a href="<?= base_url('admin/detail/' . $didonor['id']) ?>" class="card-link">Detail</a>
                <a href="<?= base_url('admin/edit/' . $didonor['id']) ?>" class="card-link">Edit</a>
                <a href="" data-toggle="modal" data-target="#delete<?= $didonor['id'] ?>" class="card-link">Hapus</a>
            </div>
        </div> <br>

    <?php $no++;
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
<?php foreach ((!empty($_GET['cari_data']) ? $hasil : $donor) as $data) { ?>
    <!-- Modal -->
    <div class="modal fade" id="delete<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    Yakin hapus data?
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('admin/hapus/' . $data['id']) ?>"><button type="button" class="btn btn-primary">Ya</button></a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>