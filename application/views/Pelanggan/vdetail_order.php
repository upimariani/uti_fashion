<!-- Content -->
<div id="content">

    <!-- Popular Products -->
    <section class="padding-top-100 padding-bottom-100">
        <div class="container">

            <h6>DETAIL PESANAN </h6>
            <p class="ion-ios-barcode-outline"> <?= $detail['transaksi']->id_transaksi ?> <br>
                <span class="ion-ios-contact-outline"> <?= $detail['transaksi']->atas_nama ?></span>
            </p>


            <hr>


            <!--======= PRODUCT DESCRIPTION =========-->
            <div class="item-decribe">

                <?php
                foreach ($detail['detail'] as $key => $value) {
                ?>

                    <div class="media">
                        <div class="media-left">
                            <!--  Image -->
                            <div class="avatar"> <a href="#"> <img style="width: 50px;" class="media-object" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt=""> </a> </div>
                        </div>
                        <!--  Details -->
                        <div class="media-body">
                            <p class="font-playfair">“<?= $value->nama_barang ?>”</p>
                            <p>Size: <?= $value->size ?></p>
                            <h6>QTY : <?= $value->jumlah ?> X Rp.<?= number_format($value->harga - ($value->diskon / 100 * $value->harga), 0)  ?> <span class="pull-right"><strong>Rp. <?= number_format($value->jumlah * $value->harga - ($value->diskon / 100 * $value->harga), 0) ?></strong></span> </h6>
                        </div>
                    </div>
                <?php
                }
                ?>
                <a href="<?= base_url('Pelanggan/c_account') ?>" class="btn btn-warning">kembali</a>
                <br>
                <br>
                <!-- ADD REVIEW -->


            </div>
        </div>
</div>
</section>

</div>