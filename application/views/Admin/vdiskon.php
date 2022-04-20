<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, Selamat Datang di Data Diskon!</h4>
                    <br>
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success"><strong>Success! </strong>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Tambah Data Diskon</button>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Datatable</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Diskon</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($produk as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $value->nama_barang ?></td>
                                            <td class="text-center"><?= $value->diskon ?> %</td>
                                            <td class="text-center"><a href="<?= base_url('Admin/c_diskon/detail_diskon/' . $value->id_barang) ?>"><button type="button" class="btn btn-square btn-outline-warning">Detail</button></a>
                                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#edit<?= $value->id_barang ?>">Edit</button>
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapus<?= $value->id_barang ?>">Hapus</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">DISKON</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Masukkan Data Diskon</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="<?= base_url('Admin/c_diskon/update_diskon') ?>" method="POST">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <select class="form-control" name="id_barang">
                                            <option>---Pilih Barang---</option>
                                            <?php foreach ($barang as $key => $value) {
                                            ?>
                                                <option value="<?= $value->id_barang ?>"><?= $value->nama_barang ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Besar Diskon</label>
                                        <input type="text" name="besar_diskon" class="form-control" placeholder="Masukkan Besar Diskon">
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>
    </div>
</div>
<?php
foreach ($produk as $key => $value) {
?>
    <!-- Modal edit -->
    <div class="modal fade" id="edit<?= $value->id_barang ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Diskon <?= $value->nama_barang ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Masukkan Data Diskon</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?= base_url('Admin/c_diskon/perbaharui/' . $value->id_barang) ?>" method="POST">
                                        <div class="form-group">
                                            <label>Besar Diskon</label>
                                            <input type="text" value="<?= $value->diskon ?>" name="besar_diskon" class="form-control" placeholder="Masukkan Besar Diskon">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </form>
        </div>
    </div>
<?php
}
?>
<?php foreach ($produk as $key => $value) {
?>
    <!-- Modal -->
    <div class="modal fade" id="hapus<?= $value->id_barang ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Admin/c_diskon/hapus/' . $value->id_barang) ?>" method="POST">
                    <div class="modal-body">Anda Yakin Untuk Menghapus Data Diskon <?= $value->nama_barang ?></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
} ?>