const toggleButtons = document.querySelectorAll('.toggle-password');
export const passwordInputs = document.querySelectorAll('.password-container input');

toggleButtons.forEach(button => {
    button.addEventListener('click', () => {
        const isMasked = passwordInputs[0].type === 'password'

        passwordInputs.forEach(field => field.type = isMasked ? 'text' : 'password')
        toggleButtons.forEach(button_2 => button_2.textContent = isMasked ? 'Masquer' : 'Afficher')
    })
})


