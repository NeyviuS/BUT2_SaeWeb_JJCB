<?php

if(!session_id())
    session_start();

use Francedepression\Bddconnect\BddConnect;
use Francedepression\Bddconnect\MariaDBUserRepository;
use Francedepression\Bddconnect\Authentification;

require_once '../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if ($_POST["action"] === "hide")
        $_SESSION["hidesurvey"] = true;
    else {
        $bdd = new BddConnect();
        $pdo = $bdd->connexion();
        $trousseau = new MariaDBUserRepository($pdo);
        $auth = new Authentification($trousseau);
        $trousseau->declineSurvey($_SESSION['user']);
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
