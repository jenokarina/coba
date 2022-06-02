<script>
    function hide() {
        $('#show ').css("display", "block");
        $('#foto').css("display", "none");
    }
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>
<script src="<?= base_url('assets/js/') ?>jquery-3.4.1.js"></script>
<script src="<?= base_url('assets/js/') ?>jquery-3.4.1.min.js"></script>
</body>

</html>