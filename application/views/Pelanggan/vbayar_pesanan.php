<section class="chart-page padding-top-100 padding-bottom-100">
    <div class="container">
        <!-- Payments Steps -->
        <div class="shopping-cart">
            <!-- SHOPPING INFORMATION -->
            <div class="cart-ship-info">
                <div class="row">
                    <!-- ESTIMATE SHIPPING & TAX -->
                    <div class="col-sm-7">
                        <h5>UPLOAD BUKTI PEMBAYARAN</h5>
                        <ul class="row">
                            <!-- Name -->
                            <?php
                            echo form_open_multipart('Pelanggan/c_account/upload_bayar/' . $bayar->id_transaksi);
                            ?>
                            <li class="col-md-12">
                                <p>Silahkan Anda Melampirkan Pembayaran Sebesar:
                                <h6>Rp. <?= number_format($bayar->total_bayar, 0)  ?></h6>
                                </p>
                                <label> *Bukti Pembayaran
                                    <input type="file" name="bukti_bayar" class="form-control" required>
                                </label>
                            </li>
                            <li class="col-md-12">
                                <a href="<?= base_url('pelanggan/c_account') ?>" type="button" class="btn btn-warning">KEMBALI</a>
                                <button type="submit" class="btn btn-success">BAYAR</button>
                                <br>
                                <br>

                            </li>
                            <!-- PHONE -->
                            <?php echo form_close(); ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>