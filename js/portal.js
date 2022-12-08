document.querySelector('#btn-enroll').addEventListener('click', ()=>{
    document.getElementById('register-form').style.display = 'flex'

    
})
document.querySelector('#close-register').addEventListener('click', ()=>{
    document.getElementById('register-form').style.display = ''

    
})
document.getElementById('btn_pass').addEventListener('click', (e) => {
    
   const inpt = document.querySelector('#register_password');
   const inptcon = document.querySelector('#register_ConfirmPassword');
   
   if(inpt.type === "password"){
        inpt.type = "text";
        inptcon.type = "text";
        document.getElementById('hide_pass').style.display="block";
        document.getElementById('show_pass').style.display="none";
   }
   else{
    inpt.type = "password";
    inptcon.type = "password";
    document.getElementById('hide_pass').style.display="none";
    document.getElementById('show_pass').style.display="block";
   }
  
    
})

document.getElementById('btn_pass_log').addEventListener('click', (e) => {
    
    const btn = document.querySelector('#loginPassword');
    
    if(btn.type === "password"){
         btn.type = "text";
         document.getElementById('hide_pass_log').style.display="block";
         document.getElementById('show_pass_log').style.display="none";
    }
    else{
     btn.type = "password";
     document.getElementById('hide_pass_log').style.display="none";
     document.getElementById('show_pass_log').style.display="block";
    }
   
     
 })















// document.getElementById('btn-login').addEventListener('click', (e) =>{
   
//     document.onclick = e => {
//         if(e.target.id !== 'btn-login' && e.target.id !== 'login-box'){
//             document.getElementById('login-box').style.display = "none"
//             // document.getElementsByClassName('bi-caret-up-fill')[0].classList.remove('bi-caret-up-fill');
//             // document.getElementsByClassName('bi')[0].classList.add('bi-caret-down-fill');
          
//         }
//         if(e.target.id == 'btn-login' ){
//             document.getElementById('login-box').style.display = "flex"
//             // document.getElementsByClassName('bi-caret-down-fill')[0].classList.remove('bi-caret-down-fill');
//             // document.getElementsByClassName('bi')[0].classList.add('bi-caret-up-fill');
//         }
//     }
// })
// document.getElementById('create-accnt').addEventListener('click', (e) =>{
//     document.getElementsByTagName('body')[0].classList.add('show-form')
//     document.getElementById('form-acc').style.display = 'flex';
//     document.getElementById('register-form').style.display = 'block';

// })
// document.getElementById('login-accnt').addEventListener('click', (e) =>{
//     document.getElementsByTagName('body')[0].classList.add('show-form')
//     document.getElementById('form-acc').style.display = 'flex';
//     document.getElementById('login-form').style.display = 'block';

// })
// const close_form = document.getElementsByClassName('close-form')

// for(let i = 0 ; i < close_form.length; i++){
//     close_form[i].addEventListener('click', () =>{
//         document.getElementsByTagName('body')[0].classList.remove('show-form')
//         document.getElementById('form-acc').style.display = 'none';
//         document.getElementById('register-form').style.display = 'none';
        
//     document.getElementById('login-form').style.display = 'none';

//     })
// }

// window.onload = () => {
//     document.getElementById('kodego').style.left = '0';
// }

// window.onscroll = function() {myFunction()};

// var header = document.getElementsByTagName('header')[0];
// var sticky = header.offsetTop;

// function myFunction() {
//   if (window.pageYOffset > sticky) {
//     header.classList.add("sticky");
//     header.classList.add("bg-color");
//   } else {
//     header.classList.remove("sticky");
//     header.classList.remove("bg-color");
//   }
// }

