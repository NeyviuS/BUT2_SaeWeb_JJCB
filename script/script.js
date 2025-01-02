const buttonClose = document.querySelector('#close_barre_info')
let barreInfoClosed = false

document.addEventListener('DOMContentLoaded', () => {

    if (sessionStorage.getItem('barreInfoClosed') === 'true') {
        document.querySelector('#barre_info').style.display = 'none';
        barreInfoClosed = true;
    }

    responsiveBanner();
});

window.addEventListener('resize', responsiveBanner);

function responsiveBanner() {
    const navbar = document.querySelector('nav');
    const button_menu = document.querySelector('#buttonMenu');
    const logo_site = document.querySelector('img');
    const first_section = document.querySelector('section');

    if (window.innerWidth < 900) {
        logo_site.style.height = '64px';
        first_section.style.paddingTop = `${64 + (barreInfoClosed ? 0 : 40)}px`;
        navbar.style.display = 'none';
        button_menu.style.display = 'block';
    } else {
        logo_site.style.height = '128px';
        first_section.style.paddingTop = `${128 + (barreInfoClosed ? 0 : 40)}px`;
        navbar.style.display = 'flex';
        button_menu.style.display = 'none';
        document.querySelector('#menumobile').style.display = 'none';
    }
}

buttonClose.addEventListener('click', () => {
    document.querySelector('#barre_info').style.display = 'none';
    document.querySelector('section').style.paddingTop = `${window.innerWidth >= 900 ? 128 : 64}px`;
    barreInfoClosed = true;
    sessionStorage.setItem('barreInfoClosed', 'true');
});

const buttonMenuMobile = document.querySelector('#buttonMenu');
const menuMobile = document.querySelector('#menumobile');
const buttonAssociation = document.querySelector('#button-association');
const menuAssociation = document.querySelector('#menu-association');
const buttonAssociationMobile = document.querySelector('#button-association-mobile');
const menuAssociationMobile = document.querySelector('#menu-association-mobile');

buttonMenuMobile.addEventListener('click', () => {
    menuMobile.style.display = menuMobile.style.display !== 'block' ? 'block' : 'none';
});

buttonAssociationMobile.addEventListener('mouseover', () => {
    menuAssociationMobile.style.display = 'block';
    menuAssociationMobile.addEventListener('mouseover', () => {
        menuAssociationMobile.style.display = 'block';
        menuAssociationMobile.addEventListener('mouseout', () => {
            menuAssociationMobile.style.display = 'none';
        });
    });
});

buttonAssociationMobile.addEventListener('mouseout', () => {
    menuAssociationMobile.style.display = 'none';
});

buttonAssociation.addEventListener('mouseover', () => {
    menuAssociation.style.display = 'block';
    menuAssociation.addEventListener('mouseover', () => {
        menuAssociation.style.display = 'block';
        menuAssociation.addEventListener('mouseout', () => {
            menuAssociation.style.display = 'none';
        });
    });
});

buttonAssociation.addEventListener('mouseout', () => {
    menuAssociation.style.display = 'none';
});
