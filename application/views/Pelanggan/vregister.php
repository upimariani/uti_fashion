<!-- ****** Checkout Area Start ****** -->
<div class="checkout_area section_padding_100">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading">
                        <h5>Register</h5>
                        <p>Silahkan Anda Untuk Melakukan Registrasi Akun!!!</p>
                        <?php
                        if ($this->session->userdata('pesan')) {
                            echo '<div class="alert alert-success" role="alert">';
                            echo $this->session->userdata('pesan');
                            echo '</div>';
                        }
                        if ($this->session->userdata('error')) {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo $this->session->userdata('error');
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <form action="<?= base_url('Pelanggan/c_login_pelanggan/register') ?>" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">Nama <span>*</span></label>
                                <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control" id="first_name" value="">
                                <?php
                                if (form_error('nama')) {
                                    echo '<div><p class="text-danger">';
                                    echo form_error('nama');
                                    echo '</p></div>';
                                }
                                ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="first_name">Jenis Kelamin <span>*</span></label>
                                <div class="radio">
                                    <input type="radio" name="jk" id="radio3" value="P">
                                    <label for="radio3"> Perempuan </label>
                                </div>
                                <div class="radio">
                                    <input type="radio" name="jk" id="radio4" value="L">
                                    <label for="radio4"> Laki-Laki </label>
                                </div>
                                <?php
                                if (form_error('jk')) {
                                    echo '<div><p class="text-danger">';
                                    echo form_error('jk');
                                    echo '</p></div>';
                                }
                                ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Alamat <span>*</span></label>
                                <input type="text" name="alamat" value="<?= set_value('alamat') ?>" class="form-control" id="last_name" value="">
                                <?php
                                if (form_error('alamat')) {
                                    echo '<div><p class="text-danger">';
                                    echo form_error('alamat');
                                    echo '</p></div>';
                                }
                                ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">No Telepon <span>*</span></label>
                                <input type="text" name="no_telp" value="<?= set_value('no_telp') ?>" class="form-control" id="last_name" value="">
                                <?php
                                if (form_error('no_telp')) {
                                    echo '<div><p class="text-danger">';
                                    echo form_error('no_telp');
                                    echo '</p></div>';
                                }
                                ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Username <span>*</span></label>
                                <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control" id="last_name" value="">
                                <?php
                                if (form_error('username')) {
                                    echo '<div><p class="text-danger">';
                                    echo form_error('username');
                                    echo '</p></div>';
                                }
                                ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Password <span>*</span></label>
                                <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control" id="last_name" value="">
                                <?php
                                if (form_error('password')) {
                                    echo '<div><p class="text-danger">';
                                    echo form_error('password');
                                    echo '</p></div>';
                                }
                                ?>
                            </div>
                            <button type="submit" href="#" class="btn karl-checkout-btn">Login</button>
                            <br>

                        </div>
                    </form>
                    <p>Anda Sudah Mempunyai Akun? <a href="<?= base_url('Pelanggan/c_login_pelanggan') ?>">LOGIN!!!</a></p>

                </div>
            </div>



        </div>
    </div>
</div>
<!-- ****** Checkout Area End ****** -->