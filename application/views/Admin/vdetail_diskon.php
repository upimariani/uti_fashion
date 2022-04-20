<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, Selamat Datang di Detail Data Diskon!</h4>
                    <br>
                    <a href="<?= base_url('Admin/c_diskon') ?>"><button type="button" class="btn btn-primary">Kembali</button></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Size</th>
                                        <th>Harga</th>
                                        <th>Harga Diskon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($detail as $key => $value) {
                                    ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><?= $value->size ?></td>
                                            <td><span class="badge badge-primary">Rp. <?= number_format($value->harga, 0) ?></span><br>
                                                <span class="badge badge-success">Diskon <?= $value->diskon ?>%</span>
                                            </td>
                                            <td>Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga)) ?></td>
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
    <!--**********************************
            Content body end
        ***********************************-->