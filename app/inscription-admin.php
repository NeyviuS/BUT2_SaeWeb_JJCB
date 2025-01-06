<?php

use Francedepression\Bddconnect\BddConnect;
use Francedepression\Bddconnect\MariaDBUserRepository;
use Francedepression\Bddconnect\Authentification;

require_once '../vendor/autoload.php';
$email = "jidenbfd@gmail.com";
$password = "password";

$bdd = new BddConnect();

$pdo = $bdd->connexion();
$trousseau = new MariaDBUserRepository($pdo);
$auth = new Authentification($trousseau);

try {
    $retour = $auth->register_admin($email, $password);
} catch(Exception $e) {
    $message = "Authentification impossible : " . $e->getMessage();
}
