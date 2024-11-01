import {listeAntennes} from './antennes.js';

const elt = document.querySelector('.txtRecherche');
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

        copie.querySelector("#nomAntenne").textContent = elt.nom+', ';
        copie.querySelector("#villeCPAntenne").textContent = elt.CP + ' ' + elt.ville;
        copie.querySelector('p').innerHTML = elt.page;

        listeAnt.appendChild(copie);
    });

}