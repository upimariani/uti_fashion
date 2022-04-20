<!-- ****** Checkout Area Start ****** -->
<div class="checkout_area section_padding_100">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading">
                        <h5>Billing Address</h5>
                        <p>Enter your cupone code</p>
                    </div>
                    <?php
                    $tot_berat = 0;
                    foreach ($this->cart->contents() as $items) {
                        $berat = $items['qty'] *  $items['netto'];
                        $tot_berat = $tot_berat + $berat;
                    ?>
                    <?php } ?>
                    <?php echo form_open('Pelanggan/c_checkout'); ?>
                    <input type="hidden" name="atas_nama" value="<?= $pelanggan->nama_pelanggan ?>" placeholder="Masukkan Atas Nama">
                    <input type="hidden" name="no_telp" value="<?= $pelanggan->no_tlpn ?>" placeholder="Masukkan No Telepon">

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="country">Alamat Pengiriman <span>*</span></label>
                            <select class="custom-select d-block w-100" name="alamat_pengiriman" id="alamat_pengiriman">
                                <?php
                                foreach ($alamat_pengiriman as $key => $value) {
                                ?>
                                    <option value="<?= $value->kode_kota ?>" data-provinsi="<?= $value->provinsi ?>" data-kota="<?= $value->kota ?>" data-alamat="<?= $value->alamat ?>" id_kota="<?= $value->kode_kota ?>"><?= $value->alamat ?>, Kota. <?= $value->kota ?> Prov. <?= $value->provinsi ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="last_name">Expedisi <span>*</span></label>
                            <select name="expedisi" class="custom-select d-block w-100">
                            </select>
                            <?= form_error('expedisi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="company">Paket</label>
                            <select name="paket" class="custom-select d-block w-100">
                            </select>
                            <?= form_error('paket', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                    </div>

                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">

                    <div class="cart-page-heading">
                        <h5>Your Order</h5>
                        <p>The Details</p>
                    </div>

                    <ul class="order-details-form mb-4">
                        <li><span>Subtotal</span> <span><?= $this->cart->format_number($this->cart->total()); ?></span></li>
                        <li><span>Shipping</span> <span id="ongkir"></span></li>
                        <li><span>Total</span> <span id="total_bayar"></span></li>
                    </ul>
                    <button type="submit" class="btn karl-checkout-btn">ORDER</button>
                    <?php $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
                    ?>
                    <input name="provinsi" class="provinsi" hidden>
                    <input name="kota" class="kota" hidden>
                    <input name="alamat" class="alamat" hidden>
                    <input name="id_transaksi" value="<?= $no_order ?>" hidden>
                    <input name="estimasi" hidden>
                    <input name="ongkir" hidden>
                    <input name="berat" value="<?= $tot_berat ?>" hidden>
                    <input name="subtotal" value="<?= $this->cart->total() ?>" hidden>
                    <input name="total_bayar" hidden>
                    <input name="id_pelanggan" value="<?= $this->session->userdata('id_pelanggan') ?>" hidden>
                    <!-- simpan detail pembelian -->
                    <?php
                    $i = 1;
                    foreach ($this->cart->contents() as $items) {
                        echo form_hidden('qty' . $i++, $items['qty']);
                    }
                    ?>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ****** Checkout Area End ****** -->
<!-- ****** Footer Area Start ****** -->
<footer class="footer_area">
    <div class="container">
        <div class="row">
            <!-- Single Footer Area Start -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="single_footer_area">
                    <div class="footer-logo">
                        <img src="img/core-img/logo.png" alt="">
                    </div>
                    <div class="copywrite_text d-flex align-items-center">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
            <!-- Single Footer Area Start -->
            <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                <div class="single_footer_area">
                    <ul class="footer_widget_menu">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <!-- Single Footer Area Start -->
            <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                <div class="single_footer_area">
                    <ul class="footer_widget_menu">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Our Policies</a></li>
                        <li><a href="#">Afiliates</a></li>
                    </ul>
                </div>
            </div>
            <!-- Single Footer Area Start -->
            <div class="col-12 col-lg-5">
                <div class="single_footer_area">
                    <div class="footer_heading mb-30">
                        <h6>Subscribe to our newsletter</h6>
                    </div>
                    <div class="subscribtion_form">
                        <form action="#" method="post">
                            <input type="email" name="mail" class="mail" placeholder="Your email here">
                            <button type="submit" class="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
<script>
    console.log = function() {}
    $("#alamat_pengiriman").on('change', function() {

        $(".provinsi").html($(this).find(':selected').attr('data-provinsi'));
        $(".provinsi").val($(this).find(':selected').attr('data-provinsi'));

        $(".kota").html($(this).find(':selected').attr('data-kota'));
        $(".kota").val($(this).find(':selected').attr('data-kota'));

        $(".alamat").html("Rp. " + $(this).find(':selected').attr('data-alamat'));
        $(".alamat").val($(this).find(':selected').attr('data-alamat'));
        console.log($(this).find(':selected').attr('id-kategori'));
    });
</script>
<script>
    $(document).ready(function() {
        $.ajax({
            //memasukkan data provinsi
            type: "POST",
            url: "<?= base_url('Pelanggan/c_raja_ongkir_pelanggan/provinsi') ?>",
            success: function(hasil_provinsi) {
                console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });
        //memasukkan data kota

        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: "POST",
                url: "<?= base_url('Pelanggan/c_raja_ongkir_pelanggan/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });

        $("select[name=alamat_pengiriman]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "http://localhost/uti_fashion/Pelanggan/c_raja_ongkir_pelanggan/expedisi",
                success: function(hasil_expedisi) {
                    $("select[name=expedisi]").html(hasil_expedisi);
                }
            });
        });

        $("select[name=expedisi]").on("change", function() {
            //mendapatkan expedisi terpilih
            var expedisi_terpilih = $("select[name=expedisi]").val()

            //mendapatkan id kota tujuan terpilih
            var id_kota_tujuan_terpilih = $("option:selected", "select[name=alamat_pengiriman]").attr('id_kota');
            //mengambil data ongkos kirim
            var total_berat = <?= $tot_berat ?>;
            //alert(total_berat);
            $.ajax({
                type: "POST",
                url: "http://localhost/uti_fashion/Pelanggan/c_raja_ongkir_pelanggan/paket",
                data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                    console.log(hasil_paket);
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });
        $("select[name=paket]").on("change", function() {
            //menampilkan ongkir
            var dataongkir = $("option:selected", this).attr('ongkir');
            var reverse = dataongkir.toString().split('').reverse().join(''),
                ribuan_ongkir = reverse.match(/\d{1,3}/g);
            ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
            //alert(dataongkir);
            $("#ongkir").html("Rp. " + ribuan_ongkir)
            //menghitung total bayar
            var ongkir = $("option:selected", this).attr('ongkir');
            var total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total() ?>);

            var reverse2 = total_bayar.toString().split('').reverse().join(''),
                ribuan_total = reverse2.match(/\d{1,3}/g);
            ribuan_total = ribuan_total.join(',').split('').reverse().join('');
            $("#total_bayar").html("Rp. " + ribuan_total);

            //estimasi dan ongkir
            var estimasi = $("option:selected", this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(dataongkir);
            $("input[name=total_bayar]").val(total_bayar);
        });
    });
</script>
</body>

</html>