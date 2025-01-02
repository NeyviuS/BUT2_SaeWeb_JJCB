// import {passwordInputs} from './showPassword.js'
//
// document.querySelector('form').addEventListener('submit', (event) => {
//     let maj = false, min = false, number = false;
//
//     const password = passwordInputs.item(0).value;
//
//     for (let character of password) {
//         if (character === character.toUpperCase()) maj = true;
//         if (character === character.toLowerCase()) min = true;
//         if (!isNaN(character)) number = true;
//     }
//
//     if (!(maj && min && number && password.length >= 8)) {
//         event.preventDefault();
//         document.querySelector('#error-message').innerHTML = '<p>Le mot de passe doit faire plus de 8 caractères, contenir une majuscule, une minuscule et un chiffre minimum.</p>';
//     } else if (password !== passwordInputs[1].value) {
//         event.preventDefault();
//         document.querySelector('#error-message').innerHTML = '<p>Les mots de passe ne correspondent pas.</p>';
//     }
// });
