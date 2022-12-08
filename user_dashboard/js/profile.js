document.getElementById('btn_pass').addEventListener('click', (e) => {
    
    const inpt = document.querySelector('#Password');
    
    if(inpt.type === "password"){
         inpt.type = "text";
         document.getElementById('hide_pass').style.display="block";
         document.getElementById('show_pass').style.display="none";
    }
    else{
     inpt.type = "password";
     document.getElementById('hide_pass').style.display="none";
     document.getElementById('show_pass').style.display="block";
    }
   
     
 })
 