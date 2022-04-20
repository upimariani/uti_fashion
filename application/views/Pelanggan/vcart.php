<!-- ****** Cart Area Start ****** -->
<div class="cart_area section_padding_100 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                $qty = 0;
                foreach ($this->cart->contents() as $value) {
                    $qty = $qty + $value['qty'];
                }
                if ($qty == 0) {
                ?>
                    <p>Segera Melakukan Transaksi</p>
                <?php
                } else {
                ?>
                    <?php
                    echo form_open('Pelanggan/c_cart/update');
                    ?>
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($this->cart->contents() as $value) :
                                ?>
                                    <tr>
                                        <td class="cart_product_img d-flex align-items-center">
                                            <a href="#"><img src="<?= base_url('asset/foto-produk/' . $value['picture']) ?>" alt="Product"></a>
                                            <h6><?= $value['name']; ?></h6>
                                        </td>
                                        <td class="price"><span>Rp. <?= number_format($value['price'], 0); ?></span></td>
                                        <td class="qty">
                                            <div class="quantity">
                                                <input type="number" name="<?= $i . '[qty]' ?>" class="qty-text" id="qty" step="1" min="1" max="<?= $value['qty_barang'] ?>" value="<?= $value['qty'] ?>">
                                            </div>
                                        </td>
                                        <td class="total_price"><span>Rp. <?= $this->cart->format_number($value['subtotal']); ?></span></td>
                                        <td>
                                            <div class="update-checkout w-50 text-right">
                                                <a href="<?= base_url('Pelanggan/c_cart/delete/' . $value['rowid']) ?>">X</a>
                                                <input type="submit" class="btn" value="update cart">
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                endforeach;
                                ?>
                                <?php echo form_close(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-footer d-flex mt-30">
                        <div class="back-to-shop w-50">
                            <a href="<?= base_url('Pelanggan/c_katalog/produk_list') ?>">Continue shooping</a>
                        </div>
                    </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">

            </div>
            <div class="col-12 col-md-6 col-lg-4">

            </div>
            <div class="col-12 col-lg-4">
                <div class="cart-total-area mt-70">
                    <div class="cart-page-heading">
                        <h5>Cart total</h5>
                        <p>Final info</p>
                    </div>

                    <ul class="cart-total-chart">
                        <li><span><strong>Total</strong></span> <span><strong>Rp. <?= $this->cart->format_number($this->cart->total()); ?></strong></span></li>
                    </ul>
                    <a href="<?= base_url('Pelanggan/c_checkout') ?>" class="btn karl-checkout-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ****** Cart Area End ****** -->
<?php
                }
?>