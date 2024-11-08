const buttonClose = document.querySelector('#close_barre_info')

buttonClose.addEventListener('click', () => {
    document.querySelector('#barre_info').style.display = 'none';
    document.querySelector('section').style.paddingTop = '120px';
})