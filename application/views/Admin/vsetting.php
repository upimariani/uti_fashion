<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Element</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Input Style</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?= base_url('Admin/c_setting') ?>" method="post">
                                <div class="form-group">
                                    <label>Alamat Toko</label>
                                    <input type="text" name="alamat" value="<?= $setting->alamat ?>" class="form-control input-default" placeholder="input-default">
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select name="provinsi" class="form-control">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kota</label>
                                    <select name="kota" class="form-control">
                                        <option value="<?= $setting->lokasi ?>"><?= $setting->lokasi ?> </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->