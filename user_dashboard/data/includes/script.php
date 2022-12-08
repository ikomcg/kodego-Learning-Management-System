<script src="../js/sweetalert.min.js"></script>

<?php
if(isset($_SESSION['ann_text'])){
  ?>
  <script>

    swal({
       title: "<?php echo  $_SESSION['ann_text']?>",
       text: "<?php echo   $_SESSION['ann_info']?>",
       icon: "<?php echo  $_SESSION['ann_code']?>"
  
});
</script>

<?php 
}
unset($_SESSION['ann_text']);
unset($_SESSION['ann_info']);
unset($_SESSION['ann_code']);

if(isset($_SESSION['message_txt'])){
  ?>
  <script>

    swal({
       title: "<?php echo  $_SESSION['message_txt']?>",
       text: "<?php echo   $_SESSION['message_info']?>",
       icon: "<?php echo  $_SESSION['message_code']?>"
  
});
</script>

<?php 
}
unset($_SESSION['message_txt']);
unset($_SESSION['message_info']);
unset($_SESSION['message_code']);


if(isset($_SESSION['student_txt'])){
  ?>
  <script>

    swal({
       title: "<?php echo  $_SESSION['student_txt']?>",
       text: "<?php echo   $_SESSION['student_info']?>",
       icon: "<?php echo  $_SESSION['student_code']?>"
  
});
</script>

<?php 
}
unset( $_SESSION['student_txt']);
unset( $_SESSION['student_info']);
unset($_SESSION['student_code']);


?>
