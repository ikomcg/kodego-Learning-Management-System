document.getElementById('btn_add_course').addEventListener('click',()=>{
    document.getElementById('add_course_page').style.display="flex";
    document.getElementsByTagName('body')[0].classList.add("course_active");
})
document.getElementById('btn_close_course').addEventListener('click',()=>{
    document.getElementById('add_course_page').style.display="none"
    document.getElementsByTagName('body')[0].classList.remove("course_active");
})