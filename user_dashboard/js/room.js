document.getElementById('show-box-logout').addEventListener('click', ()=>{
        document.getElementById('logout-box').style.display = "flex";

        
        
})
document.onclick = e => {
    if(e.target.id !== 'show-box-logout' && e.target.id !== 'logout-box' && e.target.id !== 'name_user'){
        document.getElementById('logout-box').style.display = "none"
           
    }
    
}
//calendar

