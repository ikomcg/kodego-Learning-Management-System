document.getElementById('open_announce').addEventListener('click', () => {
    document.getElementById('form_announce').classList.remove('form_announce')
})
document.getElementById('close_announce').addEventListener('click', () => {
    document.getElementById('form_announce').classList.add('form_announce')
})