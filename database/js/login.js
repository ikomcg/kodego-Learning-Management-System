$(document).ready(function(){
    $("#btn_login").click(function(){
        const email = $("#loginEmail").val();
        const pass = $("#loginPassword").val();
      console.log("click");
        const x = new XMLHttpRequest();
        $('#loading').css('display', 'flex')

        x.onload = function(){
        const obj = JSON.parse(x.responseText);  
          if(this.readyState == 4 && this.status == 200){
            $('#loading').css('display', 'none')
            if(obj.dataStatus[0] == false){
              swal({
                title: obj.message[0] ,
                text: obj.message[1],
                icon: obj.message[2]
            })
          }
          if(obj.dataStatus[0] == true){
             window.location.href = 'http://localhost/kodegoeLMS/user_dashboard/room.php';
            }
          }
        };
        x.open('POST', 'database/login.php')
        x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        x.send(`sign_Email=${email}&sign_Pass=${pass}`);
  });
});
