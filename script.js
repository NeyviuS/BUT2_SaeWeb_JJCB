const buttonClose = document.querySelector('#close_barre_info')

let barreInfoClosed = false

document.addEventListener('DOMContentLoaded', responsiveBanner)
window.addEventListener('resize', responsiveBanner)

function responsiveBanner() {
    const navbar = document.querySelector('nav')
    const button_menu = document.querySelector('#buttonMenu')
    const logo_site = document.querySelector('img')
    const first_section = document.querySelector('section')
    if (window.innerWidth < 900) {
        logo_site.style.height = '64px';
        first_section.style.paddingTop = `${64 + (barreInfoClosed ? 0 : 40)}px`
        navbar.style.display = 'none'
        button_menu.style.display = 'block'
    } else {
        logo_site.style.height = '128px';
        first_section.style.paddingTop = `${128 + (barreInfoClosed ? 0 : 40)}px`
        navbar.style.display = 'flex'
        button_menu.style.display = 'none'
        document.querySelector('#menumobile').style.display ='none';
    }
}

buttonClose.addEventListener('click', () => {
    document.querySelector('#barre_info').style.display = 'none';
    document.querySelector('section').style.paddingTop = `${window.innerWidth >= 900 ? 128 : 64}px`;
    barreInfoClosed = true
})

const buttonMenuMobile = document.querySelector('#buttonMenu')
const buttonAssociation = document.querySelector('#button-association')

buttonMenuMobile.addEventListener('click', () => {
    const menu = document.querySelector('#menumobile')
    menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
})

buttonAssociation.addEventListener('mouseover', () => {
    const menuAssociation = document.querySelector('#menu-association')
    menuAssociation.style.display = 'block'
    menuAssociation.addEventListener('mouseover', () => {
        menuAssociation.style.display = 'block'
        menuAssociation.addEventListener('mouseout', () => {
            menuAssociation.style.display = 'none'
        })
    })
})

buttonAssociation.addEventListener('mouseout', () => {
    document.querySelector('#menu-association').style.display = 'none'
})



