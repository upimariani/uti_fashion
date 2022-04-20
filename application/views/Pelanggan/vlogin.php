<!-- ****** Checkout Area Start ****** -->
<div class="checkout_area section_padding_100">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading">
                        <h5>Login</h5>
                        <p>Silahkan Anda Untuk Melakukan Login!!!</p>
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

                    <form action="<?= base_url('Pelanggan/c_login_pelanggan') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">Username <span>*</span></label>
                                <input type="text" name="username" class="form-control" id="first_name" value="">
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
                                <input type="text" name="password" class="form-control" id="last_name" value="">
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
                    <p>Anda Belum Mempunyai Akun? <a href="<?= base_url('Pelanggan/c_login_pelanggan/register') ?>">Register!!!</a></p>

                </div>
            </div>



        </div>
    </div>
</div>
<!-- ****** Checkout Area End ****** -->