<!-- ****** Welcome Slides Area Start ****** -->
<section class="welcome_area">
    <div class="welcome_slides owl-carousel">
        <!-- Single Slide Start -->
        <?php
        foreach ($diskon as $key => $value) {
        ?>
            <div class="single_slide height-800 bg-img background-overlay" style="background-image: url(<?= base_url('asset/karl-master/') ?>img/bg-img/bg-1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="welcome_slide_text">
                                <h6 data-animation="bounceInDown" data-delay="0" data-duration="500ms">* DISKON <?= $value->diskon ?> %</h6>
                                <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms"><?= $value->nama_barang ?></h2>
                                <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">Rp.</small><?= number_format($value->harga - ($value->diskon / 100 * $value->harga), 0) ?> <del>Rp. <?= number_format($value->harga, 0)  ?></del> </h2>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</section>
<!-- ****** Welcome Slides Area End ****** -->

<!-- ****** Top Catagory Area End ****** -->
<section class="shop_grid_area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">

                    <div class="widget catagory mb-50">
                        <!--  Side Nav  -->
                        <div class="nav-side-menu">
                            <h6 class="mb-0">Catagories</h6>
                            <div class="menu-list">
                                <ul id="menu-content2" class="menu-content collapse out">
                                    <!-- Single Item -->
                                    <ul class="sub-menu collapse show" id="women2">
                                        <li><a href="<?= base_url('pelanggan/c_katalog/produk_list') ?>"> All</a></li>
                                        <?php
                                        foreach ($kategori as $key => $value) {
                                        ?>

                                            <li><a href="<?= base_url('Pelanggan/c_katalog/kategori/' . $value->id_kategori) ?>"> <?= $value->nama_kategori ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <?php
                        foreach ($list as $key => $value) {
                            echo form_open('Pelanggan/c_cart/add');
                        ?>
                            <input type="hidden" name="price" value="<?= $value->harga - ($value->diskon / 100 * $value->harga) ?>">
                            <input type="hidden" name="name" value="<?= $value->nama_barang ?>">
                            <input type="hidden" name="id" value="<?= $value->id_size ?>">
                            <input type="hidden" name="qty" value="1">
                            <input type="hidden" name="size" value="<?= $value->size ?>">
                            <input type="hidden" name="netto" value="<?= $value->berat ?>">
                            <input type="hidden" name="picture" value="<?= $value->gambar ?>">
                            <input type="hidden" name="size" value="<?= $value->size ?>">
                            <input type="hidden" name="qty_barang" value="<?= $value->stok ?>">
                            <!-- Single gallery Item -->
                            <div class="col-12  single_gallery_item wow fadeInUpBig" data-wow-delay="0.2s">
                                <!-- Product Image -->
                                <div class="product-img">
                                      <img style="width: 250px; height: 250px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="">
                                    <div class="product-quicview">
                                        <a href="<?= base_url('Pelanggan/c_katalog/detail_produk/' . $value->id_barang) ?>"><i class="ti-plus"></i></a>
                                    </div>
                                </div>
                                <!-- Product Description -->
                                <div class="product-description">
                                    <h4><?= $value->nama_barang ?></h4>
                                    <h4 class="product-price"><small>Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga), 0)  ?></small> <?php if ($value->diskon != '0') {
                                                                                                                                                                    ?>
                                            <del>Rp. <?= number_format($value->harga, 0)  ?></del>
                                        <?php
                                                                                                                                                                    }  ?>
                                    </h4>
                                    <p><?= $value->deskripsi ?></p><br>
                                    <!-- Add to Cart -->
                                    <button type="submit" class="btn btn-success" <?php if ($value->stok <= 1) {
                                                                                        echo 'disabled';
                                                                                    } ?>>Add To Cart</button>
                                </div>
                            </div>

                        <?php echo form_close();
                        } ?>

                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<!-- ****** Popular Brands Area Start ****** -->
<section class="karl-testimonials-area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading text-center">
                    <h2>Testimonials</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="karl-testimonials-slides owl-carousel">
                    <?php
                    foreach ($testimoni as $key => $value) {
                    ?>
                        <!-- Single Testimonial Area -->
                        <div class="single-testimonial-area text-center">
                            <span class="quote">"</span>
                            <h6><?= $value->isi ?> </h6>
                            <div class="testimonial-info d-flex align-items-center justify-content-center">

                                <div class="testi-data">
                                    <p><?= $value->nama_pelanggan ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <?php
                if ($this->session->userdata('id_pelanggan') != '') {
                ?>
                    <div class="subscribtion_form">
                        <form action="<?= base_url('pelanggan/c_katalog/kritik') ?>" method="POST">
                            <input type="text" name="kritik" class="mail" placeholder="Masukkan Testimoni Anda" required>
                            <button type="submit" class="submit">KIRIM</button>
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
</section>
<!-- ****** Popular Brands Area End ****** -->