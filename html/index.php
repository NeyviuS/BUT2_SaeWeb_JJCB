<?php
if (!session_id()) {
    session_start();
}

require_once '../app/showSurveyPopup.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/styleIndex.css">
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
<main>
    <section id="home">
        <div>
            <div>
                <h1>Savez-vous que 13% des Français sont atteints de dépression ?</h1>
                <p class="regular-text">C'est tout à fait normal d'avoir des coups de mou, mais le plus important est
                    d'en parler.</p>
                <a href="#">
                    <button id="button_contact">Contactez-nous dès maintenant !</button>
                </a>
            </div>
            <img class="img" src="../images/depression.png" alt="img" style="width: 400px">
        </div>
    </section>
    <section id="nos-missions">
        <h2>Qui sommes-nous ?</h2>
        <p class="regular-text">France Dépression est une association fondée en 1992 ayant pour mission :</p>
        <div id="missions-container">
            <div class="bloc_mission">
                <img src="../images/soutien.png" alt="" class="icon">
                <p>Soutenir les personnes atteintes de <span class="surligner-purple">dépression</span> ou de <span
                        class="surligner-purple">troubles bipolaires</span>.</p>
            </div>
            <div class="bloc_mission">
                <img src="../images/stop.png" alt="" class="icon">
                <p>Lutter contre la <span class="surligner-purple">stigmatisation</span> et la <span
                        class="surligner-purple">violence</span> à l'encontre d'autrui.</p>
            </div>
            <div class="bloc_mission">
                <img src="../images/poigneedemain.png" alt="" class="icon">
                <p>Promouvoir leur <span class="surligner-purple">dignité</span> et le <span
                        class="surligner-purple">respect</span> sur toutes les formes et sur toutes les échelles.</p>
            </div>
        </div>
    </section>
    <section>
        <div id="engagement">
            <h2>Impliqué et engagé</h2>
            <div id="bouton-container">
                <div class="bloc-bouton">
                    <a href="antennes.html">
                        <button class="bouton_rond">
                            <img src="../images/nosantennes.png" alt="">
                        </button>
                    </a>
                    <p class="regular-text">Nos antennes</p>
                </div>
                <div class="bloc-bouton">
                    <a href="">
                        <button class="bouton_rond">
                            <img src="../images/deveniradherant.png" alt="">
                        </button>
                    </a>
                    <p class="regular-text">Devenir adhérant</p>
                </div>
                <div class="bloc-bouton">
                    <a href="">
                        <button class="bouton_rond">
                            <img src="../images/newsletter.png" alt="">
                        </button>
                    </a>
                    <p class="regular-text">Newsletter</p>
                </div>
                <div class="bloc-bouton">
                    <a>
                        <button class="bouton_rond">
                            <img src="../images/dons.png" alt="">
                        </button>
                    </a>
                    <p class="regular-text">Faire un don</p>
                </div>
            </div>
        </div>
    </section>
    <section id="actualite">
        <h2>L'actualité</h2>
        <div id="actu-container">
            <div class="bloc_actu">
                <img src="../images/image_actu_1.jpeg" class="img-actu">
                <a href="https://www.lamontagne.fr/clermont-ferrand-63000/actualites/depression-resistante-une-alternative-non-medicamenteuse-proposee-au-centre-hospitalier-sainte-marie-a-clermont-ferrand_13922641/">
                    <h3>Dépression résistante : une alternative non médicamenteuse</h3>
                </a>
                <p>13/03/2021 - La stimulation magnétique transcrânienne répétée est une thérapie nouvellement proposée
                    au Centre hospitalier Sainte-Marie, à Clermont-Ferrand. Elle s’adresse aux patients souffrant de
                    ...</p>
            </div>
            <div class="bloc_actu">
                <img src="../images/image_actu_2.jpg" class="img-actu">
                <a href="https://www.psychomedia.qc.ca/diagnostics/qu-est-ce-que-le-trouble-delirant">
                    <h3>Qu'est-ce que le trouble délirant ?</h3>
                </a>
                <p>Qu'est-ce que le trouble délirant ? (Critères diagnostiques - DSM-5) Psychomédia Le trouble délirant
                    est caractérisé, selon les critères diagnostiques du DSM-5 (1), par la persistance d’idées ...</p>
            </div>
            <div class="bloc_actu">
                <img src="../images/image_actu_3.png" class="img-actu">
                <a href="https://www.santementale.fr/2021/09/3114-le-numero-national-de-prevention-du-suicide/">
                    <h3>3114 : Le numéro national de prévention du suicide</h3>
                </a>
                <p>Annoncé par le ministre de la Santé et des Solidarités lors de l’ouverture des Assises de la Santé
                    mentale et de la psychiatrie le 27 septembre 2023, le numéro national de prévention du suicide…                    </p>
            </div>
        </div>
    </section>
</main>
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