<!-- ****** Checkout Area Start ****** -->
<div class="checkout_area section_padding_100">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading">
                        <h5>Profil</h5>
                        <p>Profil Akun Anda</p>
                    </div>

                    <form class="contact-form" action="<?= base_url('Pelanggan/c_account/update_profil/' . $account->id_pelanggan) ?>" method="post">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="first_name">Nama <span>*</span></label>
                                <input type="text" class="form-control" id="first_name" name="nama" value="<?= $account->nama_pelanggan ?>" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="last_name">No Telepon <span>*</span></label>
                                <input type="text" class="form-control" id="last_name" name="no_tlp" value="<?= $account->no_tlpn ?>" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="company">Username</label>
                                <input type="text" class="form-control" name="username" id="company" value="<?= $account->username ?>" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="street_address">Password <span>*</span></label>
                                <input type="text" class="form-control mb-3" id="street_address" name="password" value="<?= $account->password ?>" required>
                            </div>
                            <div class="col-6 mb-3">
                                <button type="submit" class="btn btn-success">UPDATE</button>
                            </div>

                        </div>
                    </form>
                    <div class="cart-page-heading">
                        <h5>Alamat Pengiriman</h5>
                        <p>Tambah Alamat Pengiriman</p>
                    </div>

                    <form class="contact-form" action="<?= base_url('Pelanggan/c_account/alamat_pengiriman') ?>" method="post">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="country">Provinsi <span>*</span></label>
                                <select name="provinsi" class="custom-select d-block w-100">
                                </select>
                                <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="country">Kota <span>*</span></label>
                                <select name="kota" class="custom-select d-block w-100">
                                </select>
                                <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="street_address">Alamat <span>*</span></label>
                                <input type="text" class="form-control mb-3" id="street_address" name="alamat" value="">
                            </div>
                            <input type="hidden" class="kota form-control" name="id_kota">
                            <div class="col-12 mb-3">
                                <button type="submit" class="btn btn-success">Tambah</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">

                    <div class="cart-page-heading">
                        <h5>Alamat</h5>
                        <p>Alamat Pengiriman Anda</p>
                    </div>

                    <ul class="order-details-form mb-4">
                        <?php
                        foreach ($alamat as $key => $value) {
                        ?>
                            <li><span><?= $value->alamat ?>, Kota. <?= $value->kota ?> Prov. <?= $value->provinsi ?></span> <span><a href="<?= base_url('pelanggan/c_account/hapus_alamat/' . $value->id_alamat_pengiriman) ?>"><strong>Hapus</strong></a></span></li>

                        <?php
                        }
                        ?>

                    </ul>


                </div>
            </div>

        </div>
    </div>
</div>
<!-- ****** Checkout Area End ****** -->
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

        $("select[name=kota]").on('change', function() {
            $(".kota").html($(this).find(':selected').attr('id_kota'));
            $(".kota").val($(this).find(':selected').attr('id_kota'));
        });

    });
</script>
</body>

</html>