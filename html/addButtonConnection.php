<?php

if (!session_id()) session_start();

if (isset($_SESSION['user'])) {
    echo '<li>
                    <a href="deconnexion.php">Se déconnecter</a>
                </li>';

} else {
    echo '
                <li>
                    <a href="connexion.php">Se connecter</a>
                </li>';
}