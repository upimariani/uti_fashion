<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">LOGIN ADMIN</h4>
                                    <?php
                                    if ($this->session->flashdata('pesan')) {
                                        echo ' <div class="alert alert-primary alert-dismissible alert-alt fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button> <strong>Success! </strong>';
                                        echo $this->session->flashdata('pesan');
                                        echo '</div>';
                                    }
                                    if ($this->session->flashdata('error')) {
                                        echo ' <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button> <strong>Error! </strong>';
                                        echo $this->session->flashdata('error');
                                        echo '</div>';
                                    }
                                    ?>
                                    <form action="<?= base_url('Admin/c_login') ?>" method="POST">
                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <input type="text" name="username" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>