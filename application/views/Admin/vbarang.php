<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, Selamat Datang Di Data Barang!</h4>
                    <br>
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success"><strong>Success! </strong>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    if ($this->session->flashdata('error')) {
                        echo '<div class="alert alert-secondary"><strong>Info! </strong>';
                        echo $this->session->flashdata('error');
                        echo '</div>';
                    }
                    ?>
                    <br>
                    <a href="<?= base_url('Admin/c_laporan/barang') ?>"> <button type="button" class="btn btn-outline-success">Laporan</button></a>

                </div>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">

                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalCenter">Tambah Data Produk</button><br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($barang as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><img style="width: 100px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>"><br>
                                                <?= $value->nama_barang ?><br>
                                                <?= $value->id_barang ?><br>
                                                Berat Barang: <?= $value->berat ?> gram</td>
                                            <td><?= $value->deskripsi ?></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"><i class="fa fa-star"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void()"><button type="button" class="btn btn-rounded btn-outline-success" data-toggle="modal" data-target="#edit<?= $value->id_barang ?>">Edit</button></a>
                                                        <a class="dropdown-item" href="javascript:void()"><button type="button" class="btn btn-rounded btn-outline-danger" data-toggle="modal" data-target="#hapus<?= $value->id_barang ?>">Hapus</button></a>
                                                        <hr>
                                                        <a class="dropdown-item" href="<?= base_url('Admin/c_barang/size/' . $value->id_barang) ?>">Detail Barang</button></a>
                                                    </div>
                                                </div>
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
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#kategori">Tambah Data Kategori</button><br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Kategori</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kategori as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_kategori ?></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"><i class="fa fa-star"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void()"><button type="button" class="btn btn-rounded btn-outline-success" data-toggle="modal" data-target="#edit_kategori<?= $value->id_kategori ?>">Edit</button></a>
                                                        <a class="dropdown-item" href="javascript:void()"><button type="button" class="btn btn-rounded btn-outline-danger" data-toggle="modal" data-target="#hapus_kategori<?= $value->id_kategori ?>">Hapus</button></a>
                                                    </div>
                                                </div>
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

<!-- Modal Tambah Data Barang -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">BARANG</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Masukkan Data Barang</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <?php echo form_open_multipart('Admin/c_barang/insert_barang'); ?>
                                <?php
                                $id = 'UF' . strtoupper(random_string('alnum', 5));
                                ?>
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" name="id_barang" class="form-control input-rounded" value="<?= $id ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" name="nama" class="form-control input-rounded" placeholder="Masukkan Nama Barang" required>
                                </div>
                                <div class="form-group">
                                    <label>Kategori Barang</label>
                                    <select name="kategori" class="form-control input-rounded">
                                        <option>---Pilih Kategori Barang---</option>
                                        <?php foreach ($kategori as $key => $value) {
                                        ?>
                                            <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                                        <?php
                                        } ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control input-rounded" placeholder="Masukkan Deskripsi Barang" required>
                                </div>
                                <div class="form-group">
                                    <label>Berat</label>
                                    <input type="text" name="berat" class="form-control input-rounded" placeholder="Masukkan Berat Barang" required>
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" name="gambar" class="form-control input-rounded" placeholder="Masukkan Gambar Barang" required>
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
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<?php
foreach ($barang as $key => $value) {
?>
    <!-- Modal Hapus Data-->
    <div class="modal fade" id="hapus<?= $value->id_barang ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Kamu Yakin Menghapus Data Barang <?= $value->nama_barang ?></div>
                <div class="modal-footer">
                    <a href="<?= base_url('Admin/c_barang/hapus/' . $value->id_barang) ?>"><button type="button" class="btn btn-danger">OK</button></a>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
<?php
}
?>

<?php
foreach ($barang as $key => $value) {
?>
    <!-- Modal Edit Data Barang -->
    <div class="modal fade" id="edit<?= $value->id_barang ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT BARANG</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Masukkan Data Barang</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <?php echo form_open_multipart('Admin/c_barang/update_barang/' . $value->id_barang); ?>
                                    <?php
                                    $id = 'UF' . strtoupper(random_string('alnum', 5));
                                    ?>
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <input type="text" name="id_barang" class="form-control input-rounded" value="<?= $id ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" name="nama" class="form-control input-rounded" value="<?= $value->nama_barang ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Barang</label>
                                        <select name="kategori" class="form-control input-rounded">
                                            <option>---Pilih Kategori Barang---</option>
                                            <?php foreach ($kategori as $key => $row) {
                                            ?>
                                                <option value="<?= $row->id_kategori ?>" <?php if ($value->id_kategori == $row->id_kategori) {
                                                                                                echo 'selected';
                                                                                            } ?>><?= $row->nama_kategori ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <input type="text" name="deskripsi" class="form-control input-rounded" value="<?= $value->deskripsi ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Berat</label>
                                        <input type="text" name="berat" class="form-control input-rounded" value="<?= $value->berat ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <img style="width: 100px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>"><br>
                                        <input type="file" value="<?= $value->gambar ?>" name="gambar" class="form-control input-rounded" value="<?= $value->gambar ?>">
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
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php
}
?>


<!-- Modal Tambah Data Kategori -->
<div class="modal fade" id="kategori">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">KATEGORI</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Masukkan Data Kategori</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="<?= base_url('admin/c_barang/insert_kategori') ?>" method="POST">
                                    <div class="form-group">
                                        <label>Nama Kategori</label>
                                        <input type="text" name="nama" class="form-control input-rounded" placeholder="Masukkan Nama Barang" required>
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
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Data Kategori -->
<?php
foreach ($kategori as $key => $value) {
?>

    <div class="modal fade" id="edit_kategori<?= $value->id_kategori ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">KATEGORI</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Data Kategori</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?= base_url('admin/c_barang/update_kategori/' . $value->id_kategori) ?>" method="POST">
                                        <div class="form-group">
                                            <label>Nama Kategori</label>
                                            <input type="text" name="nama" value="<?= $value->nama_kategori ?>" class="form-control input-rounded" placeholder="Masukkan Nama Barang" required>
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
                </form>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
foreach ($kategori as $key => $value) {
?>
    <!-- Modal Hapus Data-->
    <div class="modal fade" id="hapus_kategori<?= $value->id_kategori ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Kamu Yakin Menghapus Data Kategori <?= $value->nama_kategori ?></div>
                <div class="modal-footer">
                    <a href="<?= base_url('Admin/c_barang/hapus_kategori/' . $value->id_kategori) ?>"><button type="button" class="btn btn-danger">OK</button></a>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
<?php
}
?>