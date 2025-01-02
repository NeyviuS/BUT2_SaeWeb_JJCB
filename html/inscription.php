<?php
if (!session_id())
    session_start();
require_once '../app/flash.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/styleConnexion.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Miadmi+One&display=swap" rel="stylesheet">
    <script src="../script/script.js" type="module"></script>
    <script src="../script/showPassword.js" type="module"></script>
    <script src="../script/inscription.js" type="module"></script>
</head>
<body>
<header>
    <div id="banner">
        <a href="index.php">
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
    <section id="sign">
        <div>
            <h2>Devenir adhérent</h2>
            <div id="error-message">
                <?php
                messageFlash(); ?>
            </div>
            <form action="signup.php" method="post">
                <div class="div-input">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" name="email" id="email" placeholder="Entrez votre e-mail" required>
                </div>
                <div class="div-input password-container">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe"
                           required>
                    <p class="toggle-password" data-target="password">Afficher</p>
                </div>

                <div class="div-input password-container">
                    <input type="password" name="repeatpassword" id="repeatpassword"
                           placeholder="Répétez votre mot de passe" required>
                    <p class="toggle-password without-label" data-target="repeatpassword">Afficher</p>
                </div>

                <div class="div-checkbox">
                    <input type="checkbox" id="newsletter" name="newsletter">

                    <label for="newsletter">S'abonner à la newsletter</label>
                </div>
                <div class="div-checkbox">
                    <input type="checkbox" id="cgu" name="cgu" required>

                    <label for="cgu">En cochant cette case, j'accepte les
                        <a href="">Conditions Générales d'Utilisation (CGU)</a>
                        et je reconnais avoir pris connaissance de la
                        <a href="">Politique de Confidentialité</a>,
                        incluant les informations sur le traitement de mes données personnelles conformément au RGPD.
                    </label>
                </div>
                <button type="submit">S'inscrire</button>
            </form>
            <div>
                <span>Déjà adhérent ? </span><a href="connexion.php">Connectez-vous.</a>
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
