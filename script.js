const buttonClose = document.querySelector('#close_barre_info')

buttonClose.addEventListener('click', () => {
    document.querySelector('#barre_info').style.display = 'none';
    document.querySelector('section').style.paddingTop = '120px';
})

const buttonMenuMobile = document.querySelector('#buttonMenu')
const MenuAssociation = document.querySelector('#menu-association')

buttonMenuMobile.addEventListener('click', () => {
    const menu = document.querySelector('li > a')
    menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
})

MenuAssociation.addEventListener('mouseover', () => {
    document.querySelector('#menu-association').style.display = 'block'
})

document.addEventListener('DOMContentLoaded', responsiveBanner)
window.addEventListener('resize', responsiveBanner)

function responsiveBanner() {
    const navbar = document.querySelector('nav')
    const button_menu = document.querySelector('#buttonMenu')
    if (window.innerWidth < 900) {
        navbar.style.display = 'none'
        button_menu.style.display = 'block'
    } else {
        navbar.style.display = 'flex'
        button_menu.style.display = 'none'
        document.querySelector('#menumobile').style.display = 'none';
    }
}