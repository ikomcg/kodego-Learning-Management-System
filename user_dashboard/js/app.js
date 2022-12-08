document.getElementById('show-box-logout').addEventListener('click', ()=>{
        document.getElementById('logout-box').style.display = "flex";

        
        
})
document.onclick = e => {
    if(e.target.id !== 'show-box-logout' && e.target.id !== 'logout-box' && e.target.id !== 'name_user'){
        document.getElementById('logout-box').style.display = "none"
           
    }
    
}
document.getElementById("btn-navbar").addEventListener('click' , ()=>{
    document.getElementsByClassName("nav-bar")[0].style.left ="0";
    document.getElementsByTagName('body')[0].classList.add("course_active");
})
document.getElementById("hide-navbar").addEventListener('click' , ()=>{
    document.getElementsByClassName("nav-bar")[0].style.left ="-500px";
    document.getElementsByTagName('body')[0].classList.remove("course_active");
})
