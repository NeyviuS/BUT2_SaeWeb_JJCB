import {listeRessources} from './ressources.js';

const templateRessource = document.querySelector("#ressource-template");
const listeRes = document.querySelector("#listeRessources");
listeRessources.forEach(elt => {
    const copie = templateRessource.content.cloneNode(true);
    copie.querySelector(".ressource-title").textContent = elt.title;
    copie.querySelector(".ressource-description").textContent = elt.desc;
    copie.querySelector('.ressource-type').textContent = elt.type;
    copie.querySelector(".ressource").style.backgroundColor = elt.color;

    listeRes.appendChild(copie);
});