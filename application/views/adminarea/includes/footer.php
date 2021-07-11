 <footer class="main-footer">
   <div class="pull-right hidden-xs">
     <b>Version</b> 1.0.1
   </div>
   <strong>Copyright &copy; Mobile Shop.</strong> All rights
   reserved.
 </footer>
 <div class="msg_div">
   <?php
    $msg = '';
    $error_class = 'alert-success';
    $hint_text = 'Success';
    if ($this->session->flashdata("success") != "") {
      $msg = $this->session->flashdata("success");
      $error_class = 'alert-success';
      $hint_text = 'Success';
    } else if ($this->session->flashdata("error") != "" || (validation_errors() != "")) {
      $msg = ($this->session->flashdata("error") ? $this->session->flashdata("error") : validation_errors());
      $error_class = 'alert-danger';
      $hint_text = 'Error';
    }
    ?>
   <?php if (!empty($msg)) { ?>
     <div class="err-msg2" style="position: absolute; right: 5px !important; bottom: 35px;z-index: 999; <?php echo (!empty($msg) ? 'display:block;' : 'display:none;'); ?>" id="alert">
       <div class="alert <?php echo $error_class; ?> alert-dismissible">
         <a href="#" class="close" data-dismiss="alert" aria-label="close" style="text-decoration: none;position: absolute;top: 1px;right: 6px;opacity: 0.4;">&times;</a>
         <strong><?php echo $hint_text; ?> !</strong> <?php echo $msg; ?>
       </div>
     </div>

   <?php } ?>

 </div>

 <script>
   $("#alert").fadeTo(5000, 500).slideUp(500, function() {
     $("#alert").slideUp(5000);
   });
 </script>