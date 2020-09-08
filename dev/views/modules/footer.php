  <script src="<?php echo DIR_VIEWS;?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo DIR_VIEWS;?>js/validar.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo DIR_VIEWS;?>assets/datetimepicker-master/jquery.datetimepicker.css" >
  <script src="<?php echo DIR_VIEWS;?>assets/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>

  <script>
    jQuery('#datetimepicker').datetimepicker({
      step: 1,
      minDate: 0,
      minTime: 0
    });
    $.datetimepicker.setLocale('es');
    // jQuery("input.input-form.dateFrom").datetimepicker({
    //   minDate: 0
    // });
  </script>

</body>
</html>