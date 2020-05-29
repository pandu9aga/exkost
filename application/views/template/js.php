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
                    alert("Password tidak sama, ulangi..!!");
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

<script type="text/javascript">
// Get the button that opens the modal
var btn = document.querySelectorAll("button.modal-button");

// All page modals
var modals = document.querySelectorAll('.modal');

// Get the <span> element that closes the modal
var spans = document.getElementsByClassName("close");

// When the user clicks the button, open the modal
for (var i = 0; i < btn.length; i++) {
 btn[i].onclick = function(e) {
    e.preventDefault();
    modal = document.querySelector(e.target.getAttribute("href"));
    modal.style.display = "block";
 }
}

// When the user clicks on <span> (x), close the modal
for (var i = 0; i < spans.length; i++) {
 spans[i].onclick = function() {
    for (var index in modals) {
      if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";
    }
 }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
     for (var index in modals) {
      if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";
     }
    }
}
</script>

</body>
</html>
