<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, Selamat Datang di Data Size Barang!</h4>
                    <br>
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalCenter">Tambah Data Size</button>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('Admin/c_barang') ?>">Barang</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Size</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Data Size Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">NO</th>
                                        <th class="text-center">Kode Barang</th>
                                        <th class="text-center">Size</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($size as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><span class="text-center"><?= $no++ ?></span></td>
                                            <td><span class="text-center"><?= $value->id_barang ?></span></td>
                                            <td><span class="text-muted"><?= $value->size ?></span></td>
                                            <td><span class="text-muted">Rp. <?= number_format($value->harga, 0)  ?></span></td>
                                            <td><span class="badge badge-success"><?= $value->stok ?></span></td>
                                            <td><span type="button" class="badge badge-info" data-toggle="modal" data-target="#edit<?= $value->id_size ?>">EDIT</span>
                                                <a href="<?= base_url('Admin/c_barang/hapus_size/' . $value->id_size . '/' . $value->id_barang) ?>"><span class="badge badge-danger">HAPUS</span></a>
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


<!-- Modal Tambah Size -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="<?= base_url('Admin/c_barang/insert') ?>" method="POST">
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input type="text" name="id_barang" value="<?= $id_barang ?>" class="form-control input-rounded" readonly>
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <input type="text" name="size" class="form-control input-rounded" placeholder="Masukkan Size Barang" required>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="harga" class="form-control input-rounded" placeholder="Masukkan Harga Barang" required>
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" name="stok" class="form-control input-rounded" placeholder="Masukkan Stok Barang" required>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<?php
foreach ($size as $key => $value) {
?>
    <div class="modal fade" id="edit<?= $value->id_size ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?= base_url('Admin/c_barang/insert') ?>" method="POST">
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" name="id_barang" value="<?= $value->id_barang ?>" class="form-control input-rounded" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Size</label>
                                    <input type="text" name="size" value="<?= $value->size ?>" class="form-control input-rounded" placeholder="Masukkan Size Barang" required>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" name="harga" value="<?= $value->harga ?>" class="form-control input-rounded" placeholder="Masukkan Harga Barang" required>
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="text" name="stok" value="<?= $value->stok ?>" class="form-control input-rounded" placeholder="MAsukkan Stok Barang" required>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>