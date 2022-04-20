Content body start
***********************************-->
<div class="content-body">

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Card</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Bootstrap</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Card</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Detail Order</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <?php
                                        foreach ($data as $key => $value) {
                                        ?>

                                            <div class="col-md-6 text-dark">
                                                Id Transaksi : <strong><?= $value->id_transaksi ?></strong><br>
                                                Atas Nama : <?= $value->atas_nama ?>
                                            </div>
                                            <div class="col-md-4 ml-auto text-dark">Tanggal/Waktu <br>
                                                <?= $value->tgl_order ?></div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-responsive-sm text-dark">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Produk</th>
                                                    <th>Size</th>
                                                    <th>Harga</th>
                                                    <th>Qty</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $subtotal = 0;
                                                foreach ($detail as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <th><?= $no++ ?></th>
                                                        <td><?= $value->id_barang ?></td>
                                                        <td><?= $value->nama_barang ?></td>
                                                        <td><span class="badge badge-primary"><?= $value->size ?></span>
                                                        </td>
                                                        <td>Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga), 0) ?></td>
                                                        <td><?= $value->jumlah ?></td>
                                                        <td class="color-primary"><span class="badge badge-success">Rp. <?php echo number_format(($value->harga - ($value->diskon / 100 * $value->harga)) * $value->jumlah, 0)  ?></span></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <table class="table table-light text-dark">
                                            <tr>
                                                <td>Alamat Pengiriman</td>
                                                <td><strong><?= $value->alamat ?> <?= $value->kota ?> Prov. <?= $value->provinsi ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Jasa Pengiriman</td>
                                                <td><?= $value->expedisi ?> <?= $value->paket ?> <?= $value->estimasi ?></td>
                                            </tr>
                                        </table>

                                    </div>
                                    <div class="col-md-4 ml-auto">
                                        <table class="table table-light text-dark">
                                            <tr>
                                                <td>Subtotal</td>
                                                <td>: Rp. <?= number_format($value->subtotal, 0) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Ongkir</td>
                                                <td>: Rp. <?= number_format($value->ongkir, 0)  ?></td>
                                            </tr>
                                            <tr>
                                                <td>Total Bayar</td>
                                                <td>: <strong>Rp. <?= number_format($value->total_bayar, 0) ?></strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <?php if ($value->status_order == '2') {
                            ?>
                                <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#exampleModalCenter"><span class="btn-icon-left text-success"><i class="fa fa-plus color-success"></i>
                                    </span>No Resi</button>
                            <?php
                            } ?>

                            <a href="<?= base_url('admin/c_laporan/detail_pemesanan/' . $value->id_transaksi) ?>"><button type="button" class="btn btn-rounded btn-warning"><span class="btn-icon-left text-warning"><i class="fa fa-download color-warning"></i>
                                    </span>Print</button></a>
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
<form action="<?= base_url('Admin/c_pesanan/no_resi/' . $value->id_transaksi) ?>" method="POST">
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">No Resi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-dark">No Resi Pada Pesanan Id Transaksi <strong class="text-success"><?= $value->id_transaksi ?></strong></p>
                    <input type="text" name="no_resi" class="form-control" placeholder="Masukkan No Resi" autofocus>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>