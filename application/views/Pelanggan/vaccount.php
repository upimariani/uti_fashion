<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Karl - Fashion Ecommerce Template | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="<?= base_url('asset/karl-master/') ?>img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?= base_url('asset/karl-master/') ?>css/core-style.css">
    <link rel="stylesheet" href="<?= base_url('asset/karl-master/') ?>style.css">

    <!-- Responsive CSS -->
    <link href="<?= base_url('asset/karl-master/') ?>css/responsive.css" rel="stylesheet">

</head>

<body>
    <div class="catagories-side-menu">
        <!-- Close Icon -->
        <div id="sideMenuClose">
            <i class="ti-close"></i>
        </div>
    </div>

    <div id="wrapper">

        <!-- ****** Header Area Start ****** -->
        <header class="header_area bg-img background-overlay-white" style="background-image: url(<?= base_url('asset/karl-master/') ?>img/bg-img/bg-1.jpg);">
            <!-- Top Header Area Start -->
            <div class="top_header_area">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-end">

                        <div class="col-12 col-lg-7">
                            <div class="top_single_area d-flex align-items-center">
                                <!-- Logo Area -->
                                <div class="top_logo">
                                    <a href="#"><img src="<?= base_url('asset/karl-master/') ?>img/core-img/logo.png" alt=""></a>
                                </div>
                                <!-- Cart & Menu Area -->
                                <div class="header-cart-menu d-flex align-items-center ml-auto">
                                    <!-- Cart Area -->
                                    <?php
                                    $qty = 0;
                                    foreach ($this->cart->contents() as $value) {
                                        $qty = $qty + $value['qty'];
                                    }
                                    if ($qty == 0) {
                                    ?>
                                        <div class="cart">
                                            <a href="#" id="header-cart-btn" target="_blank"> <i class="ti-bag"></i></a>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="cart">
                                            <a href="#" id="header-cart-btn" target="_blank"><span class="cart_quantity"><?= $qty ?></span> <i class="ti-bag"></i> Your Bag Rp. <?= $this->cart->format_number($this->cart->total()); ?> </a>
                                            <!-- Cart List Area Start -->
                                            <ul class="cart-list">
                                                <?php
                                                $i = 1;
                                                foreach ($this->cart->contents() as $value) :
                                                ?>
                                                    <li>
                                                        <a href="#" class="image"><img src="<?= base_url('asset/foto-produk/' . $value['picture']) ?>" class="cart-thumb" alt=""></a>
                                                        <div class="cart-item-desc">
                                                            <h6><a href="#"><?= $value['name']; ?></a></h6>
                                                            <p><?= $value['qty'] ?>x - <span class="price">Rp. <?= number_format($value['price'], 0); ?></span></p>
                                                        </div>
                                                        <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                                    </li>
                                                <?php
                                                    $i++;
                                                endforeach;
                                                ?>
                                                <li class="total">
                                                    <span class="pull-right">Total: Rp. <?= $this->cart->format_number($this->cart->total()); ?></span>
                                                    <a href="<?= base_url('pelanggan/c_cart') ?>" class="btn btn-sm btn-cart">Cart</a>
                                                    <a href="<?= base_url('pelanggan/c_checkout') ?>" class="btn btn-sm btn-checkout">Checkout</a>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Top Header Area End -->
            <div class="main_header_area">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 d-md-flex justify-content-between">
                            <!-- Header Social Area -->
                            <div class="header-social-area">
                                <a href="#"><span class="karl-level">Share</span> <i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                            <!-- Menu Area -->
                            <div class="main-menu-area">
                                <nav class="navbar navbar-expand-lg align-items-start">

                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

                                    <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                        <ul class="navbar-nav animated" id="nav">
                                            <li class="nav-item active"><a class="nav-link" href="<?= base_url('Pelanggan/c_katalog/produk_list') ?>">Home</a></li>

                                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Pelanggan/c_account') ?>">Pesanan Saya</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Pelanggan/c_katalog/chat/' . $this->session->userdata('id_pelanggan')) ?>">Chat</a></li>

                                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Pelanggan/c_account/profil') ?>">Profil</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- Help Line -->
                            <div class="help-line">
                                <a href="tel:+346573556778"><i class="ti-headphone-alt"></i> +34 657 3556 778</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ****** Header Area End ****** -->
        <!-- ****** Top Discount Area End ****** -->
        <!-- ****** Header Area End ****** -->


        <!-- ****** Checkout Area Start ****** -->
        <div class="checkout_area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="checkout_details_area mt-50 clearfix">
                            <?php
                            $no = 1;
                            foreach ($bayar as $key => $value) {
                            ?>
                                <!-- REVIEW PEOPLE 1 -->
                                <div class="media">
                                    <div class="media-left">
                                        <!--  Image -->
                                        <div class="avatar"> <a href="#"> <img class="media-object" src="images/avatar-1.jpg" alt=""> </a> </div>
                                    </div>
                                    <!--  Details -->
                                    <div class="media-body">
                                        <ul class="row">
                                            <li class="col-sm-6 text-left"><strong class="ion-ios-barcode-outline"> <?= $value->id_transaksi ?></strong></li>
                                            <li class="col-sm-6 text-left"><strong class="ion-android-calendar"> <?= $value->tgl_order ?></strong></li>
                                            <li class="col-sm-6 text-left">
                                                <p class="ion-android-person"> <?= $value->atas_nama ?></p>
                                            </li>
                                            <li class="col-sm-6 text-left">
                                                <h5 class="ion-information">
                                                    <?php
                                                    if ($value->status_order == '0') {
                                                    ?>
                                                        <span class="label label-danger">Belum Bayar</span>
                                                </h5>
                                                <p>Silahkan melakukan pembayaran <a class="btn btn-success" href="<?= base_url('Pelanggan/c_account/upload_bayar/' . $value->id_transaksi) ?>">BAYAR!!!</a></p>
                                            <?php
                                                    }
                                                    if ($value->status_order == '1') {
                                            ?>
                                                <span class="label label-primary">Menunggu Konfirmasi</span>
                                            <?php
                                                    }
                                                    if ($value->status_order == '2') {
                                            ?>
                                                <span class="label label-info">Dikemas</span>
                                            <?php
                                                    }
                                                    if ($value->status_order == '3') {
                                            ?>
                                                <span class="label label-warning">Dikirim</span>
                                            <?php
                                                    }
                                                    if ($value->status_order == '4') {
                                            ?>
                                                <span class="label label-success">Selesai</span>
                                            <?php
                                                    }
                                            ?>

                                            </h5>
                                            </li>
                                            <li class="col-sm-12 text-left">
                                                <p class="ion-android-pin"> <?= $value->alamat ?>, <?= $value->kota ?> Provinsi.<?= $value->provinsi ?></p>
                                            </li>
                                            <li class="col-sm-12 text-left">
                                                <p class="ion-android-car"> <?= $value->expedisi ?>, <?= $value->paket ?> <?= $value->estimasi ?> Ongkos Kirim : Rp.<?= number_format($value->ongkir, 0) ?></p>
                                            </li>
                                            <?php
                                            if ($value->no_resi != null) {
                                            ?>
                                                <li class="col-sm-12 text-left">

                                                    <p>No Resi: <a href="https://pluginongkoskirim.com/cek-resi/"><strong><?= $value->no_resi ?></strong></a></p>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($value->bukti_bayar == '0') {
                                            ?>
                                                <li class="col-sm-12 text-left">

                                                    <p>No Rekening: <a href="https://pluginongkoskirim.com/cek-resi/"><strong>010 642 703 5</strong></a></p>
                                                </li>
                                            <?php
                                            }
                                            ?>

                                            <br>
                                            <li class="col-sm-12 text-left">
                                                <h4 class="ion-calculator">Rp. <?= number_format($value->total_bayar, 0)  ?></h4>
                                            </li>
                                            <li>
                                                <?php if ($value->status_order == '0') {
                                                ?>
                                                    <a href="<?= base_url('Pelanggan/c_account/batalkan_pemesanan/' . $value->id_transaksi) ?>" class="btn btn-danger">BATALKAN</a>
                                                <?php
                                                } ?>
                                                <?php
                                                if ($value->status_order == '3') {
                                                ?>
                                                    <a href="<?= base_url('Pelanggan/c_account/pesanan_diterima/' . $value->id_transaksi) ?>" class="btn btn-success">OK</a>
                                                <?php
                                                }
                                                ?>
                                                <a href="<?= base_url('Pelanggan/c_account/detail_order/' . $value->id_transaksi) ?>" class="btn btn-warning">DETAIL ORDER</a>
                                            </li>
                                        </ul>
                                        <hr>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ****** Checkout Area End ****** -->

        <!-- ****** Footer Area Start ****** -->
        <footer class="footer_area">
            <div class="container">

                <div class="line"></div>

                <!-- Footer Bottom Area Start -->
                <div class="footer_bottom_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer_social_area text-center">
                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ****** Footer Area End ****** -->
    </div>
    <!-- /.wrapper end -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="<?= base_url('asset/karl-master/') ?>js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?= base_url('asset/karl-master/') ?>js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= base_url('asset/karl-master/') ?>js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="<?= base_url('asset/karl-master/') ?>js/plugins.js"></script>
    <!-- Active js -->
    <script src="<?= base_url('asset/karl-master/') ?>js/active.js"></script>

</body>

</html>