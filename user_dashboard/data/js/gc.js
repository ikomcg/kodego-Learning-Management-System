$(document).ready(function(){
    $("#send_gc_message").click(function(){
        var x = new XMLHttpRequest();
        const messages = $("#message_gc").val();

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

        x.open("POST", "data/send_gc.php");
        x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        x.send(`messages=${messages}`);
    });
});
