$(document).ready(function(){
    $("#send_message").click(function(){
        var x = new XMLHttpRequest();
        const toemail = $("#email_to").val();
        const messages = $("#message").val();
       console.log(toemail)
       console.log(messages)
        x.onload = function(){
        const obj = JSON.parse(x.responseText);
        if (this.readyState == 4 && this.status == 200) {
            if(obj.credentialStatus[0]==false){
                swal({
                    title: obj.message[0],
                    text: obj.message[1],
                    icon: obj.message[2]
                })
                 
                }
                   
                if (obj.credentialStatus[0] == true){
                  
                    window.location = window.location
                }
               
            
            }
           
            
        };
        

        x.open("POST", "data/send_message.php");
        x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        x.send(`send_email=${toemail}&messages=${messages}`);
    });
});
