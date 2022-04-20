<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->

<!--**********************************
           Support ticket button start
        ***********************************-->

<!--**********************************
           Support ticket button end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>vendor/global/global.min.js"></script>
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>js/quixnav-init.js"></script>
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>js/custom.min.js"></script>


<!-- Vectormap -->
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>vendor/raphael/raphael.min.js"></script>
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>vendor/morris/morris.min.js"></script>


<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>vendor/circle-progress/circle-progress.min.js"></script>
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>vendor/chart.js/Chart.bundle.min.js"></script>

<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>vendor/gaugeJS/dist/gauge.min.js"></script>

<!--  flot-chart js -->
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>vendor/flot/jquery.flot.js"></script>
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>vendor/flot/jquery.flot.resize.js"></script>

<!-- Owl Carousel -->
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>vendor/owl-carousel/js/owl.carousel.min.js"></script>

<!-- Counter Up -->
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>vendor/jqvmap/js/jquery.vmap.min.js"></script>
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>vendor/jqvmap/js/jquery.vmap.usa.js"></script>
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>vendor/jquery.counterup/jquery.counterup.min.js"></script>


<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>js/dashboard/dashboard-1.js"></script>

<!-- Datatable -->
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>js/plugins-init/datatables.init.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            //memasukkan data provinsi
            type: "POST",
            url: "<?= base_url('Admin/c_raja_ongkir/provinsi') ?>",
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
                url: "<?= base_url('Admin/c_raja_ongkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    //console.log(hasil_kota);
                    $("select[name=kota").html(hasil_kota);
                }
            });
        });
    });
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>

</body>

</html>