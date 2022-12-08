document.getElementById('email_to').addEventListener('keyup',function(){
    const inp = this.value.toLocaleLowerCase();
    const e = inp.replace(" ", "")
    document.getElementsByClassName('search-result')[0].style.display = 'block'
    const resul = document.getElementById('src-result');
    const a = resul.getElementsByTagName('li')
    
   
    for(let i = 0 ; i < a.length ; i++){
     const b = a[i].innerText;
     const c = b.replace(" ", "")
   
        if(!c.toLocaleLowerCase().includes(e)){
           a[i].style.display = 'none'

        }
        else if(c.toLocaleLowerCase().includes(e)){
            a[i].style.display = 'block'
        } 
       
   }
   var totalHidden = resul.querySelectorAll('li[style="display: none;"]').length
   if(totalHidden == 27){
     document.getElementById('no-rslt').style.display = 'block'
   }
   else{
    document.getElementById('no-rslt').style.display = 'none'
   }
})