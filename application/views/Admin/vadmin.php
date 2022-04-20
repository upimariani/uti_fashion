<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, Selamat Datang di Data Admin!</h4>
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
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalCenter">Tambah Data Admin</button>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th class="text-center">NO</th>
                                        <th class="text-center">Nama Admin</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Password</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($admin as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $value->nama ?></td>
                                            <td><?= $value->username ?></td>
                                            <td><?= $value->password ?></td>
                                            <td class="text-center"><button type="button" class="btn btn-square btn-outline-success" data-toggle="modal" data-target="#edit<?= $value->id_admin ?>">Edit</button>
                                                <button type=" button" class="btn btn-square btn-outline-danger" data-toggle="modal" data-target="#hapus<?= $value->id_admin ?>">Hapus</button>
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
                <h5 class="modal-title">ADMIN</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Masukkan Data Admin</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="<?= base_url('Admin/c_admin/insert_admin') ?>" method="POST">
                                    <div class="form-group">
                                        <label>Nama Admin</label>
                                        <input type="text" name="nama" class="form-control input-rounded" placeholder="Masukkan Data Nama Admin" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control input-rounded" placeholder="Masukkan Data Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control input-rounded" placeholder="Masukkan Data Password" required>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
foreach ($admin as $key => $value) {
?>

    <!-- Modal -->
    <div class="modal fade" id="hapus<?= $value->id_admin ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Kamu Yakin Menghapus Data Barang <?= $value->nama ?></div>
                <div class="modal-footer">
                    <a href="<?= base_url('Admin/c_admin/delete_admin/' . $value->id_admin) ?>"><button type="button" class="btn btn-danger">OK</button></a>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>



<?php
foreach ($admin as $key => $value) {
?>
    <!-- Modal Edit Admin -->
    <div class="modal fade" id="edit<?= $value->id_admin ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ADMIN</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Masukkan Data Admin</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?= base_url('Admin/c_admin/update/' . $value->id_admin) ?>" method="POST">
                                        <div class="form-group">
                                            <label>Nama Admin</label>
                                            <input type="text" name="nama" class="form-control input-rounded" value="<?= $value->nama ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control input-rounded" value="<?= $value->username ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" name="password" class="form-control input-rounded" value="<?= $value->password ?>" required>
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