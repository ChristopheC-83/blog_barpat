const btn_menu_responsive = document.querySelector('.btn_menu_responsive')
const header = document.querySelector('header')
const overlay = document.querySelector('.overlay')

btn_menu_responsive.addEventListener('click', ()=>{
    btn_menu_responsive.classList.toggle('btn_menu_responsive_return')
    header.classList.toggle('header_open')
    overlay.classList.toggle('dnone')
    

})