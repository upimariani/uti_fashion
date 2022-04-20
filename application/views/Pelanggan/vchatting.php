<div id="content">

    <!-- Popular Products -->
    <section class="padding-top-100 padding-bottom-100">
        <div class="container">
            <!-- SHOP DETAIL -->
            <div class="shop-detail">
                <div class="row">
                    <!--======= PRODUCT DESCRIPTION =========-->
                    <div class="item-decribe">

                        <!-- Tab panes -->

                        <h6>CHATTING</h6>
                        <?php
                        foreach ($chat as $key => $value) {
                            if ($value->admin_send != '0') {
                        ?>
                                <!-- REVIEW PEOPLE 1 -->
                                <div class="media text-right">
                                    <div class="media-left">
                                        <!--  Image -->
                                        <div class="avatar"> <a href="#"> <img class="media-object" src="images/avatar-1.jpg" alt=""> </a> </div>
                                    </div>
                                    <!--  Details -->
                                    <div class="media-body text-left">
                                        <p class="font-playfair">“<?= $value->admin_send ?>”</p>
                                        <h6>Admin <span class="pull-right"><?= $value->time ?></span> </h6>
                                    </div>
                                </div>
                            <?php
                            } else if ($value->pelanggan_send != '0') {
                            ?>

                                <div class="media text-left">
                                    <div class="media-left">
                                        <!--  Image -->
                                        <div class="avatar"> <a href="#"> <img class="media-object" src="images/avatar-1.jpg" alt=""> </a> </div>
                                    </div>
                                    <!--  Details -->
                                    <div class="media-body text-right">
                                        <p class="font-playfair">“<?= $value->pelanggan_send ?>”</p>
                                        <h6> Saya <span class="pull-left"><?= $value->time ?></span> </h6>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <form action="<?= base_url('pelanggan/c_katalog/send_pesan/' . $this->session->userdata('id_pelanggan')) ?>" method="POST">
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label> *PESAN
                                        <textarea name="pelanggan_send" class="form-control" placeholder="Please type what you want...."></textarea>
                                    </label>
                                </li>
                                <li class="col-sm-12">
                                    <button type="submit" class="btn btn-dark btn-small pull-right no-margin">KIRIM</button>
                                </li>
                            </ul>
                        </form>
                        <br>
                        <br>
                        <!-- TAGS -->
                        <div role="tabpanel" class="tab-pane fade" id="tags"> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>