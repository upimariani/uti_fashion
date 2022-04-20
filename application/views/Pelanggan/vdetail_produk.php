<!-- Content -->
<div id="content">

    <!-- Popular Products -->
    <section class="padding-top-100 padding-bottom-100">
        <div class="container">

            <!-- SHOP DETAIL -->
            <div class="shop-detail">
                <div class="row">

                    <!-- Popular Images Slider -->
                    <div class="col-md-7">

                        <!-- Images Slider -->
                        <div class="images-slider">
                            <ul class="slides">
                                <li data-thumb="images/large-img-1.jpg"> <img class="img-responsive" src="<?= base_url('asset/foto-produk/' . $detail['detail']->gambar) ?>" alt=""> </li>

                            </ul>
                        </div>
                    </div>

                    <form action="<?= base_url('Pelanggan/c_cart/add') ?>" method="POST">
                        <input type="hidden" name="id" class="id_size" value="<?= $detail['detail']->id_size ?>">
                        <input type="hidden" name="price" value="<?= $detail['detail']->harga - ($detail['detail']->diskon / 100 * $detail['detail']->harga)  ?>" class="data-price">
                        <input type="hidden" name="netto" value="<?= $detail['detail']->berat ?>">
                        <input type="hidden" name="name" value="<?= $detail['detail']->nama_barang ?>">
                        <input type="hidden" name="picture" value="<?= $detail['detail']->gambar ?>">
                        <!-- COntent -->
                        <div class="col-md-7">
                            <h4 class="title"><?= $detail['detail']->nama_barang ?></h4>
                            <h4 class="price diskon"><small>Rp.</small><?= number_format($detail['detail']->harga - ($detail['detail']->diskon / 100 * $detail['detail']->harga), 0)   ?> <?php
                                                                                                                                                                                            if ($detail['detail']->diskon != '0') {
                                                                                                                                                                                            ?>
                                    <br><del>Rp. <?= number_format($detail['detail']->harga, 0) ?></del>
                                <?php
                                                                                                                                                                                            }
                                ?>
                            </h4>


                            <!-- Sale Tags -->
                            <?php if ($detail['detail']->diskon != '0') {
                            ?>
                                <div class="size on-sale"> <?= $detail['detail']->diskon ?>% <span>DISKON</span> </div>
                            <?php
                            } ?>


                            <!-- Item Detail -->
                            <p><?= $detail['detail']->deskripsi ?></p>
                            <p class="stok">Stok <?= $detail['detail']->stok ?> pcs</p>

                            <!-- Short By -->
                            <div class="some-info">
                                <ul class="row margin-top-30">
                                    <li class="col-xs-4">
                                        <div class="quinty">
                                            <!-- QTY -->
                                            <h5>Size:</h5>
                                            <select name="size" id="size" class="custom-select d-block w-100">
                                                <?php
                                                foreach ($detail['size'] as $key => $value) {
                                                ?>
                                                    <option value="<?= $value->size ?>" data-id="<?= $value->id_size ?>" data-stok="Stok <?= $value->stok ?> pcs" data-price="<?= $value->harga - ($value->diskon / 100 * $value->harga) ?>" data-harga="<?= $value->diskon ?>% <span>OFF</span>" data-diskon="<small>Rp.</small><?= number_format($value->harga - ($value->diskon / 100 * $value->harga), 0)   ?>" <?php if ($value->stok <= 1) {
                                                                                                                                                                                                                                                                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                                                                                                                                                                                                                                                                    } ?>><?= $value->size ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="quinty">

                                            <h5>Quantity:</h5>
                                            <div class="qty" class="selectpicker">
                                                <input type="number" name="qty" value="1" class="form-control mb-3">
                                            </div>
                                        </div>
                                    </li>
                                    <!-- ADD TO CART -->
                                    <button type="submit" class="btn btn-success" href="#" <?php if ($detail['detail']->stok <= '1') {
                                                                                                echo 'disabled';
                                                                                            } ?>><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                    </form>
                    </ul>

                    <!-- INFOMATION -->

                </div>
            </div>
        </div>
</div>

</div>
</section>


<!-- About -->
</div>
<br>
<br>