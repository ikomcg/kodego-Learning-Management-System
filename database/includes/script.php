<script src="js/sweetalert.min.js"></script>

<?php
if(isset($_SESSION['status_text'])){
  ?>
  <script>

    swal({
       title: "<?php echo  $_SESSION['status_text']?>",
       text: "<?php echo   $_SESSION['status_info']?>",
       icon: "<?php echo  $_SESSION['status_code']?>"
  
});
</script>

<?php 
}

$_SESSION['verify_status'] = 'no';
unset($_SESSION['status_text']);
unset($_SESSION['status_info']);
unset($_SESSION['status_code']);

?>
