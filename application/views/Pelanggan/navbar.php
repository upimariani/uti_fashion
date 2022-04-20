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
                                    <a href="#"><img src="<?= base_url('asset/foto-katalog/new.png') ?>" alt=""></a>
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
                                            <?php
                                            if ($this->session->userdata('id_pelanggan') != '') {
                                            ?>
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('Pelanggan/c_katalog/chat/' . $this->session->userdata('id_pelanggan')) ?>">Chat</a></li>

                                            <?php
                                            }
                                            ?>
                                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Pelanggan/c_account/profil') ?>">Profil</a></li>
                                            <?php
                                            if ($this->session->userdata('username') == '') {
                                            ?>
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('Pelanggan/c_login_pelanggan') ?>">Login</a></li>

                                            <?php
                                            } else {
                                            ?>
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('Pelanggan/c_login_pelanggan/logout_pelanggan') ?>">LogOut</a></li>
                                            <?php
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- Help Line -->
                            <div class="help-line">
                                <a href="#"><i class="ti-headphone-alt"></i> +628 1221 3323 04</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ****** Header Area End ****** -->
        <!-- ****** Top Discount Area End ****** -->