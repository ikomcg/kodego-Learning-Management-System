document.getElementById('submit-ass').addEventListener('click' , () => {
   
    document.getElementById('prepare-answer').style.display = "flex";
    
    document.onclick = e => {
        if(e.target.id !== 'submit-ass' && e.target.id !== 'formFileSm' && e.target.id !== 'btn-sub'){
            document.getElementById('prepare-answer').style.display = "none";
        }
     
    }
})
