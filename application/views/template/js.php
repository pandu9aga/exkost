<!-- jQuery Plugins -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/slick.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/nouislider.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.zoom.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

<script src="<?php echo base_url('assets/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js'); ?>"></script>

<script type="text/javascript">
$("#datetime").datetimepicker({
    format: 'yyyy-mm-dd hh:ii',
    autoclose: true,
    todayBtn: true
});
</script>

<script type="text/javascript">
        $(function () {
            $("#updateprofile").click(function () {
                var password = $("#txtPassword").val();
                var confirmPassword = $("#txtConfirmPassword").val();
                if (password != confirmPassword) {
                    alert("Password tidak sama, ulangi..");
                    return false;
                }
                return true;
            });
        });
</script>

<script type="text/javascript">
function check_uncheck_checkbox(isChecked) {
if(isChecked) {
  $('input[name="kategori[]"]').each(function() {
    this.checked = false;
  });
  $('input[name="checkall"]').each(function() {
    this.checked = true;
  });
} else {
  $('input[name="kategori[]"]').each(function() {
    this.checked = false;
  });
  $('input[name="checkall"]').each(function() {
    this.checked = true;
  });
}
}
function check_kategori(isChecked) {
if(isChecked) {
  $('input[name="checkall"]').each(function() {
    this.checked = false;
  });
} else {
  $('input[name="checkall"]').each(function() {
    this.checked = false;
  });
}
}
</script>

</body>
</html>
