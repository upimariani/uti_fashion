<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-id-badge text-success border-success"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Pelanggan</div>
                            <div class="stat-digit"><?= $pelanggan ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-shopping-cart text-primary border-primary"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Order Masuk</div>
                            <div class="stat-digit"><?= $order ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-layout-grid2 text-pink border-pink"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Barang</div>
                            <div class="stat-digit"><?= $barang ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-money text-danger border-danger"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Pemasukan</div>
                            <div class="stat-digit">Rp. <?= number_format($pemasukan->total, 0)  ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 col-xxl-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">LAPORAN STOK BARANG</h4>
                    </div>
                    <div class="card-body">
                        <div class="widget-timeline">
                            <ul class="timeline">
                                <?php
                                foreach ($list_barang as $key => $value) {
                                ?>
                                    <li>
                                        <div class="timeline-badge <?php if ($value->stok <= 2) {
                                                                        echo 'danger';
                                                                    } else {
                                                                        echo 'success';
                                                                    } ?>"></div>
                                        <a class="timeline-panel text-muted" href="#">
                                            <span><?= $value->id_barang ?></span>
                                            <h6 class="m-t-5"><?= $value->nama_barang ?></h6>
                                            <p>Size: <?= $value->size ?>, Stok: <span class="badge badge-<?php if ($value->stok <= 2) {
                                                                                                                echo 'danger';
                                                                                                            } else {
                                                                                                                echo 'success';
                                                                                                            } ?>"><?= $value->stok ?></span></p>

                                        </a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-xxl-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">CHAT</h4>
                    </div>
                    <div class="card-body">
                        <div class="recent-comment m-t-15">
                            <?php
                            foreach ($chat as $key => $value) {
                            ?>
                                <div class="media">
                                    <div class="media-body">
                                        <p class="ti-time"> <?= $value->time ?></p>
                                        <h4 class="media-heading text-primary"><a href="<?= base_url('Admin/c_dashboard/chatting/' . $value->id_pelanggan) ?>"><?= $value->nama_pelanggan ?></a></h4>
                                        <p><?php if ($value->admin_send != '0') {
                                                echo $value->admin_send;
                                            } else {
                                                echo $value->pelanggan_send;
                                            } ?></p>

                                    </div>
                                </div>
                            <?php
                            }
                            ?>
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