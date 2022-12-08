const slide = document.getElementsByClassName('slide')

for(let i = 0; i < slide.length; i++ ){
    slide[i].addEventListener('click', ()=> {
        document.getElementsByClassName(`message ${i}`)[0].scrollIntoView({behavior:'smooth', block: 'start'});
    })
};
document.getElementById('open_message').addEventListener('click', () => {
   document.getElementById('send-message').style.display = 'block'
})
document.getElementById('close_message').addEventListener('click', () => {
    document.getElementById('send-message').style.display = 'none'
 })