document.addEventListener('DOMContentLoaded', function () {
    const ageInput = document.getElementById('age');
    if (ageInput) {
        ageInput.addEventListener('blur', function () {
            if (ageInput.value < 0) {
                ageInput.value = 0;
            }
        });
    }

    // Sélectionne le bouton de soumission
    const submitButton = document.getElementById('submit-button');
    if (!submitButton) {
        console.error("Le bouton 'submit-button' est introuvable !");
        return;
    }

    // Sélectionne tous les champs du formulaire, y compris les boutons radio
    const formFields = document.querySelectorAll('input, select');

    // Vérifie si les boutons d'un groupe sont cochés
    function isRadioGroupChecked(name) {
        const radios = document.querySelectorAll(`input[name="${name}"]`);
        return Array.from(radios).some((radio) => radio.checked);
    }

    // Vérifie si tous les champs sont remplis
    function checkFields() {
        let allFilled = true;

        formFields.forEach((field) => {
            if (field.type === 'radio') {
                if (!isRadioGroupChecked(field.name)) {
                    allFilled = false;
                }
            } else {
                if (!field.value.trim()) {
                    allFilled = false;
                }
            }
        });


        submitButton.disabled = !allFilled;
    }

    formFields.forEach((field) => {
        if (field.type === 'radio') {
            field.addEventListener('click', checkFields);
        } else {
            field.addEventListener('input', checkFields);
        }
    });

    // Vérifie les champs au chargement initial
    checkFields();
});
