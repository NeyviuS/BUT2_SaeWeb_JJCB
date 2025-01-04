import {listeAntennes} from './antennes-data.js';

const elt = document.querySelector('#txtRecherche');

elt.addEventListener('input',()=>afficherResultatRecherche(elt.value));

elt.dispatchEvent(new Event('input'));
function correspond(antenne, saisie) {
    return antenne.ville.toLowerCase().includes(saisie) ||
        antenne.CP.includes(saisie) ||
        antenne.nom.toLowerCase().includes(saisie);
}

function recherche(saisie){
    return listeAntennes.filter((antenne) => correspond(antenne, saisie.toLowerCase()))
}

function afficherResultatRecherche(saisie){
    const templateAntenne = document.querySelector("#antenne");
    const listeAnt = document.querySelector("#listeAntennes");

    listeAnt.innerHTML = '';

    recherche(saisie).forEach(elt => {
        const copie = templateAntenne.content.cloneNode(true);

        copie.querySelector(".nomAntenne").textContent = elt.nom+', ';
        copie.querySelector(".villeCPAntenne").textContent = elt.CP + ' ' + elt.ville;
        copie.querySelector('p').innerHTML = elt.page;

        listeAnt.appendChild(copie);
    });

}

const buttonDetailsAntennes = document.querySelectorAll('.detailsAntenne');
let index_open = -1;

buttonDetailsAntennes.forEach((button, i) => {
    const summary = button.querySelector('summary');

    summary.addEventListener('click', (event) => {
        if (button.hasAttribute('open')) {
            index_open = -1;
            editBorder(button, true)
            return;
        }
        if (index_open !== -1) {
            buttonDetailsAntennes[index_open].removeAttribute('open');
            editBorder(buttonDetailsAntennes[index_open], true);
            editBorder(button, true)
        }
        editBorder(button, false)
        index_open = i;

    });
});

function editBorder(element, toggle) {
    if (toggle) {
        element.querySelector('summary').style.borderRadius = '16px'
    } else {
        element.querySelector('summary').style.borderRadius = '16px 16px 0 0'
    }
}
