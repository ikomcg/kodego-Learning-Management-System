$(document).ready(function(){
    $("#new_student").click(function(){

      const last_name = $("#L_name").val();
      const first_name =$("#F_name").val();
      const middle_name = $("#M_name").val();
      const b_day =$("#B_Day").val();
      const email = $("#add_Email").val();
      const pass = $("#Password").val();
      const yearSection = $("#SY").val();
      const Course_Code = $("#courseCode").val();

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
            swal({
              title: obj.message[0] ,
              text: obj.message[1],
              icon: obj.message[2],
              buttons: "OK",
              dangerMode: true,
            }).then((willDelete) => {
              
              if (willDelete) {
                  window.location.href = 'http://localhost/kodegoeLMS/user_dashboard/student.php';
              } 
          })
         
          
            }
          }
        };
        x.open('POST', 'data/add_student.php')
        x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        x.send(`lastname=${last_name}&firstname=${first_name}&middlename=${middle_name}&BDay=${b_day}&signEmail=${email}&signPass=${pass}&year_section=${yearSection}&course_code=${Course_Code}`);


  });
});
document.getElementById('btn_pass').addEventListener('click', (e) => {
    
    const btn = document.querySelector('#Password');
    
    if(btn.type === "password"){
         btn.type = "text";
         document.getElementById('hide_pass').style.display="block";
         document.getElementById('show_pass').style.display="none";
    }
    else{
     btn.type = "password";
     document.getElementById('hide_pass').style.display="none";
     document.getElementById('show_pass').style.display="block";
    }
   
     
 })
document.getElementById("btn_close_student").addEventListener('click', ()=>{
    document.getElementById('card_add_user').style.display = "none";
    document.getElementsByTagName('body')[0].classList.remove('open-modal');
})

document.getElementById("add_student").addEventListener('click', ()=>{
    document.getElementById('card_add_user').style.display = "flex";
    document.getElementsByTagName('body')[0].classList.add('open-modal');
 
})

