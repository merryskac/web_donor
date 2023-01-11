<?php $this->load->view('template/header');
$this->load->view('template/topbar_sidebar');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800">Inputan Saya</h1>

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
    if (empty($donor)) {
    ?>
        <h5>Inputan belum ada</h5>
        <?php
    } else {
        foreach ($donor as $didonor) { ?>
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
                    <h5 class="card-title">
                        <?= $didonor['nama'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $didonor['umur'] . ' tahun' ?></h6>
                    <p class="card-text"><?= "Golongan darah: " . $didonor['goldar'] ?></p>
                    <a href="<?= base_url('user/detailInput/' . $didonor['id']) ?>" class="card-link">Detail</a>
                    <a href="<?= base_url('user/edit/' . $didonor['id']) ?>" class="card-link">Edit</a>
                    <a href="" data-toggle="modal" data-target="#delete<?= $didonor['id'] ?>" class="card-link">Hapus</a>


                </div>
            </div> <br>

    <?php $no++;
        }
    } ?>

</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->

<?php $this->load->view('template/footer_side');
?>

<?php foreach ($donor as $data) { ?>
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
                    Yakin hapus data? <?= $data['nama'] ?>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('user/hapus/' . $data['id']) ?>"><button type="button" class="btn btn-primary">Ya</button></a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>