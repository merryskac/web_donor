<?php $this->load->view('template/header');
$this->load->view('template/topbar_sidebar');
// print_r(
//     $this->session->userdata()
// );
//  print_r($pendonor);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-8">
            <h1 class="h3 mb-2 text-gray-800">Data Pendonor</h1>
        </div>
        <div class="col-4">
            <h4 class="h3 mb-1 text-gray-800">Administrator Only</h4>
        </div>
    </div>


    <?php
    if ($this->session->flashdata('fail')) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('fail');
            ?>
        </div>
    <?php }

    if ($this->session->flashdata('succ')) { ?>

        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('succ');
            ?>
        </div>

    <?php } ?>
    <a class="btn btn-primary mb-3" href="<?= 'tambah_pendonor' ?>" role="button">Tambah data pendonor</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Goldar</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <?php $no = 1;
        foreach ($pendonor as $data) { ?>

            <tbody>
                <tr>
                    <th scope="row"><?= $no ?></th>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['goldar'] ?></td>
                    <td>
                        <a class="btn btn-success" href="<?= base_url('admin/detail_pendonor/' . $data['id']) ?>">Detail</a>
                        <a class="btn btn-warning" href="<?= base_url('admin/editpendonor/' . $data['id']) ?>">Edit</a>
                        <a a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $data['id'] ?>">Hapus</a>
                    </td>
                </tr>

            <?php $no++;
        } ?>
            </tbody>
    </table>


</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->

<?php $this->load->view('template/footer_side');
?>
<?php $no = 1;
foreach ($pendonor as $data) { ?>
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
                    <a href="<?= base_url('admin/hapusPendonor/' . $data['id']) ?>"><button type="button" class="btn btn-primary">Ya</button></a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>