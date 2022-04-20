<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>vendor/global/global.min.js"></script>
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>js/quixnav-init.js"></script>
<script src="<?= base_url('asset/focus-premium/themes/focus/') ?>js/custom.min.js"></script>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>
</body>

</html>