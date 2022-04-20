<!--**********************************
            Content body start
        ***********************************-->

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Chatting</h4>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <?php
                            foreach ($list_chat as $key => $value) {
                                $id = $value->id_pelanggan;
                                if ($value->pelanggan_send != '0') {
                            ?>
                                    <div class="text-right">
                                        <h5 class="pt-3"><?= $value->nama_pelanggan ?> <small><span class="badge badge-warning"><?= $value->time ?></span></small></h5>
                                        <p><?= $value->pelanggan_send ?></p>
                                    </div>
                                <?php
                                } else if ($value->admin_send != '0') {
                                ?>
                                    <div class="text-left">
                                        <h5 class="pt-3">Admin</h5>
                                        <p><?= $value->admin_send ?></p>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <form action="<?= base_url('admin/c_dashboard/send_chat') ?>" method="POST">
                                <div class="post-input">
                                    <input type="hidden" name="id_pelanggan" value="<?= $id ?>">
                                    <textarea id="textarea" name="admin_send" cols="30" rows="5" class="form-control bg-transparent" placeholder="Please type what you want...."></textarea>
                                    <button type="submit" class="btn btn-primary">KIRIM</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!--**********************************
            Content body end
        ***********************************-->