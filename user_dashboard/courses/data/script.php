<script src="../../js/sweetalert.min.js"></script>

<?php
if(isset($_SESSION['ann_text'])){
  ?>
  <script>

    swal({
       title: "<?php echo  $_SESSION['ann_text']?>",
       text: "<?php echo   $_SESSION['ann_info']?>",
       icon: "<?php echo  $_SESSION['ann_code']?>",
       buttons: "OK",
       dangerMode: true,
            }).then((willDelete) => {
              
              if (willDelete) {
                  window.location =window.location;
              } 
          })
   
</script>

<?php 
}
unset($_SESSION['ann_text']);
unset($_SESSION['ann_info']);
unset($_SESSION['ann_code']);
?>