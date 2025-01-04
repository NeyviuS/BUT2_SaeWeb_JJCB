<?php

if (!session_id()) session_start();

use Francedepression\Bddconnect\BddConnect;
use Francedepression\Bddconnect\MariaDBUserRepository;

require_once '../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if ($_POST["action"] === "hide")
        $_SESSION["hidesurvey"] = true;
    else {
        $bdd = new BddConnect();
        $pdo = $bdd->connexion();
        $trousseau = new MariaDBUserRepository($pdo);
        $trousseau->declineSurvey($_SESSION['user']);
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
