<?php

if (!session_id()) session_start();

require_once '../app/showSurveyPopup.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo title?></title>
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Miadmi+One&display=swap" rel="stylesheet">
    <script src="../script/script.js" type="module"></script>
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
                                <a href="quisommesnous.php">Qui sommes-nous</a>
                            </li>
                            <li>
                                <a href="antennes.php">Edito</a>
                            </li>
                            <li>
                                <a href="">Nous soutenir</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="antennes.php">NOS ANTENNES</a>
                </li>
                <li>
                    <a href="ressources.php">RESSOURCES</a>
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
                        <?php
                        if (isset($_SESSION['user']))
                            echo '<a href="deconnexion.php">
<img src="../images/logout.256x256.png" alt="Deconnexion">
</a>'
                        ?>
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
                                <a href="quisommesnous.php">Qui sommes-nous ?</a>
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
                    <a href="antennes.php">Nos antennes</a>
                </li>
                <li>
                    <a href="ressources.php">Ressources</a>
                </li>
                <?php
                require_once 'addButtonConnection.php';
                ?>
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
