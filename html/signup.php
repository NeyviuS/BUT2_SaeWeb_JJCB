<?php

if(!session_id())
    session_start();

use Francedepression\Bddconnect\BddConnect;
use Francedepression\Bddconnect\MariaDBUserRepository;
use Francedepression\Bddconnect\Authentification;

require_once '../vendor/autoload.php';


$bdd = new BddConnect();

$pdo = $bdd->connexion();
$trousseau = new MariaDBUserRepository($pdo);
$auth = new Authentification($trousseau);

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    try {
        $retour = $auth->register_adherent($_POST["email"], $_POST["password"], $_POST["repeatpassword"], isset($_POST["newsletter"]), isset($_POST["cgu"]));
        $message = "Vous êtes désormais adhérent";
        $code = "success";
        $_SESSION['user'] = $_POST['email'];
    } catch(Exception $e) {
        $retour = false;
        $message = "Enregistrement impossible : " . $e->getMessage();
        $code = "warning";
    }

    $_SESSION['flash'][$code] = $message;

    header("Location: inscription.php");
    exit();
}
