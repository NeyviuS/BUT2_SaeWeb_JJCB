<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/styleQuestionnaire.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Miadmi+One&display=swap" rel="stylesheet">
    <script src="../script/script.js" type="module"></script>
</head>
<body>
<header>
    <div id="banner">
        <a href="index.html">
            <img src="../images/logo.png" alt="Logo de l'association France Dépression">
        </a>
        <nav>
            <ul>
                <li>
                    <a id="button-association">L'ASSOCIATION</a>
                    <div class="menu" id="menu-association">
                        <ul>
                            <li>
                                <a href="./quisommesnous.html">Qui sommes-nous ?</a>
                            </li>
                            <li>
                                <a href="antennes.html">Edito</a>
                            </li>
                            <li>
                                <a href="">Nous soutenir</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="antennes.html">NOS ANTENNES</a>
                </li>
                <li>
                    <a href="ressources.html">RESSOURCES</a>
                </li>
                <li id="separateur">

                </li>
                <li>
                    <div class="social-media-container">
                        <a href="https://www.instagram.com/francedepression/">
                            <img src="../images/instagram-logo.png" alt="Instagram">
                        </a>
                        <a href="https://fr.linkedin.com/company/france-depression">
                            <img src="../images/linkedin-logo.png" alt="LinkedIn">
                        </a>
                        <a href="connexion.php">
                            <img src="../images/icon_adherent.png" alt="Connexion">
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <button id="buttonMenu">
        </button>
        <div class="menu" id="menumobile">
            <ul>
                <li>
                    <a id="button-association-mobile">L'association</a>
                    <div class="menu" id="menu-association-mobile">
                        <ul>
                            <li>
                                <a href="./quisommesnous.html">Qui sommes-nous ?</a>
                            </li>
                            <li>
                                <a href="">Edito</a>
                            </li>
                            <li>
                                <a href="">Nous soutenir</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="antennes.html">Nos antennes</a>
                </li>
                <li>
                    <a href="ressources.html">Ressources</a>
                </li>
                <li>
                    <a href="connexion.php">Se connecter</a>
                </li>
            </ul>
            <div class="social-media-container">
                <a href="https://www.instagram.com/francedepression/">
                    <img src="../images/instagram-logo.png" alt="Instagram">
                </a>
                <a href="https://fr.linkedin.com/company/france-depression">
                    <img src="../images/linkedin-logo.png" alt="LinkedIn">
                </a>
            </div>
        </div>
    </div>
    <div id="barre_info">
        <p>Numéro d’écoute : 07 84 96 88 28 (Lundi au Samedi 10h-20h, Dimanche 14h-20h)</p>
        <span id="close_barre_info">×</span>
    </div>
</header>
<body>
    <div class="formbold-main-wrapper">
        <form action="https://formbold.com/s/FORM_ID" method="POST">
            <h2>Enquête</h2>
        <div class="formbold-input-group">
            <label for="age" class="formbold-form-label"> Quel age avez vous ?</label>
            <input
            type="number"
            name="age"
            id="age"
            placeholder="Exemple: 25"
            class="formbold-form-input"

            />
        </div>

        <div class="formbold-input-group">
            <label class="formbold-form-label">
            Dans quelle region habitez vous ?
            </label>

            <select class="formbold-form-select" name="region" id="region">
                <option value="auvergne-rhone-alpes">Auvergne-Rhône-Alpes</option>
                <option value="bourgogne-franche-comte">Bourgogne-Franche-Comté</option>
                <option value="bretagne">Bretagne</option>
                <option value="centre-val-de-loire">Centre-Val de Loire</option>
                <option value="corse">Corse</option>
                <option value="grand-est">Grand Est</option>
                <option value="hauts-de-france">Hauts-de-France</option>
                <option value="ile-de-france">Île-de-France</option>
                <option value="normandie">Normandie</option>
                <option value="nouvelle-aquitaine">Nouvelle-Aquitaine</option>
                <option value="occitanie">Occitanie</option>
                <option value="pays-de-la-loire">Pays de la Loire</option>
                <option value="provence-alpes-cote-d-azur">Provence-Alpes-Côte d'Azur</option>
                <option value="guadeloupe">Guadeloupe</option>
                <option value="martinique">Martinique</option>
                <option value="guyane">Guyane</option>
                <option value="la-reunion">La Réunion</option>
                <option value="mayotte">Mayotte</option>
            </select>
        </div>

        <div class="formbold-input-group">
            <label class="formbold-form-label">
            Dans quel lieu vivez vous ?
            </label>

            <select class="formbold-form-select" name="situation" id="situation">
                <option value="famille-permanence">Dans la famille en permanence</option>
                <option value="famille-accueil-activites">Dans la famille avec une solution d’accueil ou des activités en journée</option>
                <option value="famille-temporaire-etablissement">Dans la famille principalement mais avec un accueil temporaire ou séquentiel en établissement</option>
                <option value="logement-independant">Dans un logement indépendant</option>
                <option value="habitat-inclusif">Dans un habitat inclusif</option>
                <option value="foyer-accueil-medicalise">Dans un foyer d’accueil médicalisé (FAM)</option>
                <option value="maison-accueil-specialise">Dans une maison d’accueil spécialisé (MAS)</option>
                <option value="foyer-vie-hebergement">Dans un foyer de vie ou foyer d’hébergement</option>
                <option value="ime-internat">En IME avec internat</option>
                <option value="hospitalisation-psychiatrie">Hospitalisation en psychiatrie</option>
                <option value="autre">Autre</option>
            </select>
        </div>

        <div class="formbold-input-radio-wrapper">
            <label for="satis-lieu" class="formbold-form-label">
            Le lieu correspond-il a votre choix ?
            </label>

            <div class="formbold-radio-flex">
            <div class="formbold-radio-group">
                <label class="formbold-radio-label">
                <input
                    class="formbold-input-radio"
                    type="radio"
                    name="satis-lieu"
                    id="satis-lieu"
                />
                Oui
                <span class="formbold-radio-checkmark"></span>
                </label>
            </div>

            <div class="formbold-radio-group">
                <label class="formbold-radio-label">
                <input
                    class="formbold-input-radio"
                    type="radio"
                    name="satis-lieu"
                    id="satis-lieu"
                />
                Non
                <span class="formbold-radio-checkmark"></span>
                </label>
            </div>
            </div>
        </div>

        <div class="formbold-input-radio-wrapper">
            <label for="recom-site" class="formbold-form-label">
            Recommanderiez vous ce site pour un proche a vous dans le besoin ?
            </label>

            <div class="formbold-radio-flex">
            <div class="formbold-radio-group">
                <label class="formbold-radio-label">
                <input
                    class="formbold-input-radio"
                    type="radio"
                    name="recom-site"
                    id="recom-site"
                />
                Oui
                <span class="formbold-radio-checkmark"></span>
                </label>
            </div>

            <div class="formbold-radio-group">
                <label class="formbold-radio-label">
                <input
                    class="formbold-input-radio"
                    type="radio"
                    name="recom-site"
                    id="recom-site"
                />
                Non
                <span class="formbold-radio-checkmark"></span>
                </label>
            </div>

            <div class="formbold-radio-group">
                <label class="formbold-radio-label">
                <input
                    class="formbold-input-radio"
                    type="radio"
                    name="recom-site"
                    id="recom-site"
                />
                Peut-etre
                <span class="formbold-radio-checkmark"></span>
                </label>
            </div>
            </div>
        </div>

        <div class="formbold-input-group">
            <label class="formbold-form-label">
            Comment décririez vous votre situation actuelle ?
            </label>

            <select class="formbold-form-select" name="situation" id="situation">
                <option value="tout-va-bien">Tout va bien</option>
                <option value="restriction-vie-sociale">Restriction de la vie sociale</option>
                <option value="souffrance-psychologique">Souffrance psychologique</option>
                <option value="fatigue-epuisement">Fatigue, épuisement</option>
                <option value="reduction-activite-professionnelle">Réduction d'activité professionnelle</option>
                <option value="couts-financiers-importants">Coûts financiers importants</option>
                <option value="impact-negatif-sur-famille">Impact négatif sur la famille</option>
                <option value="conflits-familiaux">Conflits familiaux</option>
                <option value="maladie-difficulte-physique">Maladie ou difficulté physique</option>
                <option value="eloignement-personne">Éloignement de la personne</option>
            </select>
        </div>

        <div>
            <label for="message" class="formbold-form-label">
            Des suggestions ou commmentaires ?
            </label>
            <textarea
            rows="6"
            name="message"
            id="message"
            placeholder="Ecrivez ici..."
            class="formbold-form-input"
            ></textarea>
        </div>

        <button class="formbold-btn">Soumettre</button>
        </form>
    </div>

    <footer class="footer-clean">

        <img src="../images/logo.png">
        <span class="secondaire">
        <h3><a href="#">L'association</a></h3>
        <ul>
            <li><a href="#">A propos de nous</a></li>
            <li><a href="#">Nous contacter</a></li>
            <li><a href="#">Nous soutenir</a></li>
            <li><a href="#">Actualités</a></li>
        </ul>
        </span>
            <span class="secondaire">
            <h3><a href="#">Antennes</a></h3>
            <ul>
                <li><a href="#">Créer une antenne</a></li>
                <li><a href="#">Toutes nos antennes</a></li>
            </ul>
        </span>
            <span>
            <h3><a href="#">Ressources</a></h3>
            <h3><a href="#">Mentions légales</a></h3>
            <h3><a href="#">Paramètres des cookies</a></h3>
        </span>
    </footer>

</body>
</html>