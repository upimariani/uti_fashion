<!--**********************************
            Sidebar start
        ***********************************-->
<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="<?= base_url('Admin/c_dashboard') ?>" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Dashboard</span></a></li>
            <li class="nav-label first">Menu Kelola Data Master</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-single-04"></i><span class="nav-text">DATA</span></a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('Admin/c_barang') ?>">Barang</a></li>
                    <li><a href="<?= base_url('Admin/c_admin') ?>">Admin</a></li>
                    <li><a href="<?= base_url('Admin/c_diskon') ?>">Diskon</a></li>
                    <li><a href="<?= base_url('Admin/c_setting') ?>">Setting</a></li>
                </ul>
            </li>
            <li class="nav-label">MENU KELOLA ORDER</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-app-store"></i><span class="nav-text">ORDER</span></a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('Admin/c_pesanan') ?>">Pesanan Masuk</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Pembayaran</a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('Admin/c_pesanan/menunggu_konfirmasi') ?>">Menunggu Konfirmasi</a></li>
                            <li><a href="<?= base_url('Admin/c_pesanan/pembayaran_selesai') ?>">Pembayaran Selesai</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('Admin/c_pesanan/status_order') ?>">Status Order</a></li>
                </ul>
            </li>
        </ul>
    </div>


</div>
<!--**********************************
            Sidebar end
        ***********************************-->