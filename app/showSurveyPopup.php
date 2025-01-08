<?php

if (!session_id())
    session_start();

use Francedepression\Bddconnect\BddConnect;
use Francedepression\Bddconnect\MariaDBUserRepository;
use Francedepression\Bddconnect\Authentification;

require_once '../vendor/autoload.php';

if (isset($_SESSION['user']) && !isset($_SESSION['hidesurvey'])) {

    $bdd = new BddConnect();
    $pdo = $bdd->connexion();
    $trousseau = new MariaDBUserRepository($pdo);
    $auth = new Authentification($trousseau);

    if (!$auth->hasDeclinedSurvey($_SESSION['user'])) {
        echo '
            <form action="../html/hideSurvey.php" method="POST">
                <div id="survey-banner">
                        <p>Votre avis compte pour nous ! <a href="../html/questionnaire.php">Participez à notre enquête</a>.</p>
                        <div>
                            <button id="survey-later" name="action" value="hide">Plus tard</button>
                            <button id="survey-never" name="action" value="nevershow">Ne plus afficher</button>
                        </div>
                    </div>
            </form>
        
    ';
    }
}