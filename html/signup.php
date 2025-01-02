<?php

if(!session_id())
    session_start();

use Francedepression\Bddconnect\BddConnect;
use Francedepression\Bddconnect\MariaDBUserRepository;
use Francedepression\Bddconnect\Authentification;

require_once '../vendor/autoload.php';

error_reporting(E_ALL); // Signale toutes les erreurs
ini_set('display_errors', '1'); // Active l'affichage des erreurs
ini_set('display_startup_errors', '1'); // Affiche les erreurs au démarrage


$bdd = new BddConnect();

$pdo = $bdd->connexion();
$trousseau = new MariaDBUserRepository($pdo);
$auth = new Authentification($trousseau);

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    try {
        $retour = $auth->register_adherent($_POST["email"], $_POST["password"], $_POST["repeatpassword"], isset($_POST["newsletter"]), isset($_POST["cgu"]));
        $message = "Vous êtes désormais adhérent";
        $code = "success";
    } catch(Exception $e) {
        $retour = false;
        $message = "Enregistrement impossible : " . $e->getMessage();
        $code = "warning";
    }

    $_SESSION['flash'][$code] = $message;

    header("Location: inscription.php");
    exit();
}
