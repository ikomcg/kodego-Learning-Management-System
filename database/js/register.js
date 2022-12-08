$(document).ready(function(){
    $("#btn_register").click(function(){

      const last_name = $("#Lname").val();
      const first_name =$("#Fname").val();
      const middle_name = $("#Mname").val();
      const b_day =$("#B-Day").val();
      const gender =$("#gender").val();
      const email = $("#registerEmail").val();
      const pass = $("#register_password").val();
      const confirm_Pass = $("#register_ConfirmPassword").val();
      const user_type = $('#user_Type').val();

      const x = new XMLHttpRequest();

      $('#loading').css('display', 'flex')
        x.onload = function(){
        
          const obj = JSON.parse(x.responseText);  

          if(this.readyState == 4 && this.status == 200){
            $('#loading').css('display', 'none')
            if(obj.dataStatus[0] == false){
              swal({
                title: obj.message[0],
                text: obj.message[1],
                icon: obj.message[2]
            })
          }
          if(obj.dataStatus[0] == true){
            swal({
              title: obj.message[0] ,
              text: obj.message[1],
              icon: obj.message[2],
              buttons: "OK",
              dangerMode: true,
            }).then((willDelete) => {
              
              if (willDelete) {
                  window.location.href = 'http://localhost/kodegoeLMS/index.php';
              } 
          })
         
          
            }
          }
        };
        x.open('POST', 'database/register.php')
        x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        x.send(`last_name=${last_name}&first_name=${first_name}&middle_name=${middle_name}&B-Day=${b_day}&gender=${gender}&sign_Email=${email}&sign_Pass=${pass}&confirm_Pass=${confirm_Pass}&user_Type=${user_type}`);


  });
});
