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

</body>

</html>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>

<script>
    console.log = function() {}
    $("#size").on('change', function() {

        $(".size").html($(this).find(':selected').attr('data-harga'));
        $(".size").val($(this).find(':selected').attr('data-harga'));

        $(".id_size").html($(this).find(':selected').attr('data-id'));
        $(".id_size").val($(this).find(':selected').attr('data-id'));

        $(".diskon").html($(this).find(':selected').attr('data-diskon'));
        $(".diskon").val($(this).find(':selected').attr('data-diskon'));

        $(".data-price").html($(this).find(':selected').attr('data-price'));
        $(".data-price").val($(this).find(':selected').attr('data-price'));

        $(".stok").html($(this).find(':selected').attr('data-stok'));
        $(".stok").val($(this).find(':selected').attr('data-stok'));

    });
</script>

</body>

</html>