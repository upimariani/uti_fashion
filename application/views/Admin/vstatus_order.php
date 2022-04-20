<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Status Order</h4><br>
                    <a href="<?= base_url('Admin/c_laporan/order') ?>"><button type="button" class="btn btn-outline-success">Laporan</button></a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Bootstrap</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Tab</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Vertical Nav Pill</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="nav flex-column nav-pills">
                                    <a href="#v-pills-home" data-toggle="pill" class="nav-link active show">Dikemas</a>
                                    <a href="#v-pills-profile" data-toggle="pill" class="nav-link">Dikirim</a>
                                    <a href="#v-pills-selesai" data-toggle="pill" class="nav-link">Selesai</a>
                                </div>
                            </div>
                            <div class="col-xl-9">
                                <div class="tab-content">
                                    <div id="v-pills-home" class="tab-pane fade active show">
                                        <div class="card-body">
                                            <h4>Laporan Order Dikemas</h4>
                                            <div class="table-responsive">
                                                <table class="table table-responsive-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Atas Nama</th>
                                                            <th>Id Transaksi</th>
                                                            <th>Tgl Order</th>
                                                            <th>Detail Pemesanan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($dikemas as $key => $value) {
                                                        ?>
                                                            <tr>
                                                                <th><?= $no++ ?></th>
                                                                <td><?= $value->atas_nama ?></td>
                                                                <td><span class="badge badge-primary"><?= $value->id_transaksi ?></span>
                                                                </td>
                                                                <td><span class="badge badge-success"><?= $value->tgl_order ?></span></td>
                                                                <td class="text-center"><a href="<?= base_url('Admin/c_pesanan/detail_pemesanan/' . $value->id_transaksi) ?>" type="button" class="btn btn-warning btn-xs">Detail</a></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="v-pills-profile" class="tab-pane fade">
                                        <div class="card-body">
                                            <h4>Laporan Order Dikirim</h4>
                                            <div class="table-responsive">
                                                <table id="example" class="display">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Atas Nama</th>
                                                            <th>Id Transaksi</th>
                                                            <th>Tgl Order</th>
                                                            <th>Detail Pemesanan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($dikirim as $key => $value) {
                                                        ?>
                                                            <tr>
                                                                <th><?= $no++ ?></th>
                                                                <td><?= $value->atas_nama ?></td>
                                                                <td><span class="badge badge-primary"><?= $value->id_transaksi ?></span>
                                                                </td>
                                                                <td><span class="badge badge-success"><?= $value->tgl_order ?></span></td>
                                                                <td class="text-center"><a href="<?= base_url('Admin/c_pesanan/detail_pemesanan/' . $value->id_transaksi) ?>" type="button" class="btn btn-warning btn-xs">Detail</a></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="v-pills-selesai" class="tab-pane fade">
                                        <div class="card-body">
                                            <h4>Laporan Order Selesai</h4>
                                            <br>

                                            <div class="table-responsive">
                                                <table class="table table-responsive-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Atas Nama</th>
                                                            <th>Id Transaksi</th>
                                                            <th>Tgl Order</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($selesai as $key => $value) {
                                                        ?>
                                                            <tr>
                                                                <th><?= $no++ ?></th>
                                                                <td><?= $value->atas_nama ?></td>
                                                                <td><span class="badge badge-primary"><?= $value->id_transaksi ?></span>
                                                                </td>
                                                                <td><span class="badge badge-success"><?= $value->tgl_order ?></span></td>
                                                                <td class="text-center"><a href="<?= base_url('Admin/c_pesanan/detail_pemesanan/' . $value->id_transaksi) ?>" type="button" class="btn btn-warning btn-xs">Detail</a></td>

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
                </div>
            </div>
        </div>

    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->