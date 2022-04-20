<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Menunggu Konfirmasi Pembayaran</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Bootstrap</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
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
                                        <th>Id Transaksi</th>
                                        <th>Atas Nama</th>
                                        <th>Tanggal/Waktu</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($konfirmasi as $key => $value) {
                                    ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><?= $value->id_transaksi ?></td>
                                            <td><?= $value->atas_nama ?></td>
                                            <td><span class="badge badge-primary"><?= $value->tgl_order ?></span>
                                            </td>
                                            <td class="color-primary">
                                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detail<?= $value->id_transaksi ?>">VIEW</button>

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
<?php
foreach ($konfirmasi as $key => $value) {
?>
    <!-- Modal -->
    <div class="modal fade" id="detail<?= $value->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <?php echo form_open('Admin/c_pesanan/pesanan_dikonfirmasi/' . $value->id_transaksi) ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <strong>No Order : <?= $value->id_transaksi ?></strong><br>
                                <p>Atas Nama : <?= $value->atas_nama ?></p>
                            </div>
                            <div class="col-md-4 ml-auto">Tanggal/Waktu : <?= $value->tgl_order ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-active">
                                    <tr>
                                        <th>Alamat Pengiriman</th>
                                        <th>Jasa Pengiriman</th>
                                    </tr>
                                    <tr>
                                        <td class="text-muted"><?= $value->alamat ?> <?= $value->kota ?> Prov <?= $value->provinsi ?></td>
                                        <td class="text-muted"><?= $value->expedisi ?> <?= $value->estimasi ?> <?= $value->paket ?></td>
                                    </tr>
                                </table>
                                <h3>Bukti Pembayaran</h3>
                                <hr>
                                <img style="width: 100%; height: 200px;" src="<?= base_url('asset/bukti_pembayaran/' . $value->bukti_bayar) ?>">
                                <hr><br>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 ml-auto">
                                <table class="table table-light">
                                    <tr>
                                        <td>SubTotal</td>
                                        <td class="text-muted">: Rp. <?= number_format($value->subtotal, 0) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ongkir</td>
                                        <td class="text-muted">: Rp. <?= number_format($value->ongkir, 0) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Bayar</td>
                                        <td class="text-muted">: Rp. <?= number_format($value->total_bayar, 0) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
<?php
}
?>