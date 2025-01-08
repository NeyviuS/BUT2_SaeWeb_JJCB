<?php

error_reporting(E_ALL); // Rapporte toutes les erreurs, y compris les avertissements et les notices.
ini_set('display_errors', 1); // Affiche les erreurs à l'écran.
ini_set('display_startup_errors', 1); // Affiche les erreurs lors du démarrage de PHP.


if (!session_id())
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
        if (!$auth->isSurveyCompleted($_SESSION['user'])) {
            $retour = $trousseau->register_answer($_SESSION['user'], $_POST);
            $message = "Merci d'avoir participé à notre enquête !";
            $code = "success";
        }
    } catch (Exception $e) {
        $retour = false;
        $message = $e->getMessage();
        $code = "warning";
    }

    $_SESSION['flash'][$code] = $message;

    header("Location: questionnaire.php");
    exit();
}