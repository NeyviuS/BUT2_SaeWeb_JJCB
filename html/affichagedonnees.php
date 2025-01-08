<?php

if (!session_id()) session_start();
if(!isset($_SESSION['admin'])) {
    throw new Exception("Accès interdit");
}

const title = "Affichage données";
require_once 'header.php';
?>
        <link rel="stylesheet" href="../style/styleAffichageDonnees.css">
        <script src="../script/carteInteractiveDonnees.js" type="module"></script>
        <script src="../script/histogramme.js" type="module"></script>
        <script src="../script/camembert.js" type="module"></script>
<main>
    <section id="zoneQuiARepondu">
        <h2>Qui a répondu ? </h2>
        <div id="graphiquesQuiARepondu" class="graphiques">
            <div id="carte"></div>
            <div id="donneesAge">
                <h2>Age des participants</h2>
                <div id="histogrammeAge"></div>
                <div id="moyenneAge">Moyenne d'age</div>
                <div id="minMaxAge">Age min / age max</div>
            </div>
        </div>
    </section>
    <section id="zoneLieuDeVie">
        <h2>Lieu de vie</h2>
        <div id="graphiquesLieuDeVie" class="graphiques">
            <div id="graphiqueLieuVie"></div>
            <!-- <div id="lotcamembertcdaph">
                <h1>Le lieu de vie correspond-il à une orientation CDAPH ?</h1>
                <div id="camembertCDAPH"></div>
            </div> -->
            <div id="lotcamembertchoix">
                <h2>Le lieu de vie correspond-il à votre choix ?</h2>
                <div id="camembertChoix"></div>
            </div>
        </div>
    </section>
    <article id="zoneQualiteDeVie">
        <h2>Qualité de vie</h2>
        <div id="graphiqueQualiteVie"></div>
    </article>
</main>
<?php require_once 'footer.php';

use Francedepression\Bddconnect\BddConnect;

ini_set('display_errors', 1);
error_reporting(E_ALL);

if(!session_id())
    session_start();

require_once '../vendor/autoload.php';


$bdd = new BddConnect();

try {
    $query = "SELECT Age FROM reponseenquete";
    $statement = $bdd->connexion()->prepare($query);
    $statement->execute();
    $tableauResultats = $statement->fetchAll(PDO::FETCH_ASSOC);
    $ages = [
        '15-25' => 0,
        '25-35' => 0,
        '35-50' => 0,
        '50-65' => 0,
        '65+' => 0,
    ];
    $moy = 0;
    $min = 99999;
    $max = 0;
    foreach ($tableauResultats as $ligne) {
        $age = $ligne['Age'];
        $moy += $ligne['Age'];
        $min = min($min, $ligne['Age']);
        $max = max($max, $ligne['Age']);
        if ($age >= 15 && $age < 25) {
            $ages['15-25']++;
        } elseif ($age >= 25 && $age < 35) {
            $ages['25-35']++;
        } elseif ($age >= 35 && $age < 50) {
            $ages['35-50']++;
        } elseif ($age >= 50 && $age < 65) {
            $ages['50-65']++;
        } elseif ($age >= 65) {
            $ages['65+']++;
        }
    }
    $moy /= count($tableauResultats);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
$ageData = [
    ['label' => '15-25 ans', 'value' => $ages['15-25']],
    ['label' => '25-35 ans', 'value' => $ages['25-35']],
    ['label' => '35-50 ans', 'value' => $ages['35-50']],
    ['label' => '50-65 ans', 'value' => $ages['50-65']],
    ['label' => '65 ans et +', 'value' => $ages['65+']],
];

$query = "SELECT IdRegion, COUNT(Id_ReponseEnquete) AS NombreEnregistrements FROM reponseenquete GROUP BY IdRegion";
$statement = $bdd->connexion()->prepare($query);
$statement->execute();
$tableauResultats = $statement->fetchAll(PDO::FETCH_ASSOC);

$regionData = [
    ['idRegion' => 1, 'reg' => "84", 'val' => 0],
    ['idRegion' => 2, 'reg' => "27", 'val' => 0],
    ['idRegion' => 3, 'reg' => "53", 'val' => 0],
    ['idRegion' => 4, 'reg' => "24", 'val' => 0],
    ['idRegion' => 5, 'reg' => "94", 'val' => 0],
    ['idRegion' => 6, 'reg' => "44", 'val' => 0],
    ['idRegion' => 7, 'reg' => "32", 'val' => 0],
    ['idRegion' => 8, 'reg' => "11", 'val' => 0],
    ['idRegion' => 9, 'reg' => "28", 'val' => 0],
    ['idRegion' => 10, 'reg' => "75", 'val' => 0],
    ['idRegion' => 11, 'reg' => "76", 'val' => 0],
    ['idRegion' => 12, 'reg' => "52", 'val' => 0],
    ['idRegion' => 13, 'reg' => "93", 'val' => 0],
    ['idRegion' => 14, 'reg' => "01", 'val' => 0],
    ['idRegion' => 15, 'reg' => "02", 'val' => 0],
    ['idRegion' => 16, 'reg' => "03", 'val' => 0],
    ['idRegion' => 17, 'reg' => "04", 'val' => 0],
    ['idRegion' => 18, 'reg' => "06", 'val' => 0]
];

$total = 0;
foreach ($tableauResultats as $row) {
    $regionId = $row['IdRegion'];
    $nombreEnregistrements = $row['NombreEnregistrements'];
    foreach ($regionData as &$region) {
        if ($region['idRegion'] === $regionId) {
            $region['val'] = $nombreEnregistrements;
            $total += $nombreEnregistrements;
            break;
        }
    }
}

$query = "SELECT SatisfactionLieu, COUNT(Id_ReponseEnquete) AS NombreEnregistrements FROM reponseenquete GROUP BY SatisfactionLieu";
$statement = $bdd->connexion()->prepare($query);
$statement->execute();
$tableauResultats = $statement->fetchAll(PDO::FETCH_ASSOC);

$nombreOuiNon = [['label' => "Oui", 'value' => 0],  ['label' => "Non", 'value' => 0]];
foreach ($tableauResultats as $resultat) {
    if ($resultat['SatisfactionLieu'] == 1) { // 1 pour "Oui"
        $nombreOuiNon[0]['value'] = $resultat['NombreEnregistrements'];
    } elseif ($resultat['SatisfactionLieu'] == 0) { // 0 pour "Non"
        $nombreOuiNon[1]['value'] = $resultat['NombreEnregistrements'];
    }
}


$query = "SELECT IdSituationP, COUNT(Id_ReponseEnquete) AS NombreEnregistrements FROM reponseenquete GROUP BY IdSituationP";
$statement = $bdd->connexion()->prepare($query);
$statement->execute();
$tableauResultats = $statement->fetchAll(PDO::FETCH_ASSOC);

$tableauSituationPerso = [
    ['id' => 1, 'label' => "Tout va bien", 'value' => 0],
    ['id' => 2, 'label' => "Restriction de la vie sociale", 'value' => 0],
    ['id' => 3, 'label' => "Souffrance psychologique", 'value' => 0],
    ['id' => 4, 'label' => "Fatigue, épuisement", 'value' => 0],
    ['id' => 5, 'label' => "Réduction d'activité professionnelle", 'value' => 0],
    ['id' => 6, 'label' => "Coûts financiers importants", 'value' => 0],
    ['id' => 7, 'label' => "Impact négatif sur la famille", 'value' => 0],
    ['id' => 8, 'label' => "Conflits familiaux", 'value' => 0],
    ['id' => 9, 'label' => "Maladie ou difficulté physique", 'value' => 0],
    ['id' => 10, 'label' => "Éloignement de la personne", 'value' => 0]
];
foreach ($tableauResultats as $resultat) {
    $id = $resultat['IdSituationP'];
    if ($id >= 1 && $id <= 10) {
        $tableauSituationPerso[$id - 1]['value'] = $resultat['NombreEnregistrements'];
    }
}

$query = "SELECT IdSituationH, COUNT(Id_ReponseEnquete) AS NombreEnregistrements FROM reponseenquete GROUP BY IdSituationH";
$statement = $bdd->connexion()->prepare($query);
$statement->execute();
$tableauResultats = $statement->fetchAll(PDO::FETCH_ASSOC);

$tableauSituationHeberg = [
    ['id' => 1, 'label' => "Dans la famille en permanence", 'value' => 0],
    ['id' => 2, 'label' => "Dans la famille avec une solution d’accueil ou des activités en journée", 'value' => 0],
    ['id' => 3, 'label' => "Dans la famille principalement mais avec un accueil temporaire ou séquentiel en établissement", 'value' => 0],
    ['id' => 4, 'label' => "Dans un logement indépendant", 'value' => 0],
    ['id' => 5, 'label' => "Dans un habitat inclusif", 'value' => 0],
    ['id' => 6, 'label' => "Dans un foyer d’accueil médicalisé (FAM)", 'value' => 0],
    ['id' => 7, 'label' => "Dans une maison d’accueil spécialisé (MAS)", 'value' => 0],
    ['id' => 8, 'label' => "Dans un foyer de vie ou foyer d’hébergement", 'value' => 0],
    ['id' => 9, 'label' => "En IME avec internat", 'value' => 0],
    ['id' => 10, 'label' => "Hospitalisation en psychiatrie", 'value' => 0],
    ['id' => 11, 'label' => "Autre", 'value' => 0]
];
foreach ($tableauResultats as $resultat) {
    $id = $resultat['IdSituationH'];
    if ($id >= 1 && $id <= 11) {
        $tableauSituationHeberg[$id - 1]['value'] = $resultat['NombreEnregistrements'];
    }
}



?>
<script type='module'>
import {creerCarte} from "../script/carteInteractiveDonnees.js";
import {drawHistogram, updateMoyMinMaxAge, lieuVie, qualiteVie} from "../script/histogramme.js";
import {creerCamembert} from "../script/camembert.js";

//creerCamembert([{ label: "Oui", value: 75 }, { label: "Non", value: 50 }, { label: "Pas d'orientation CDAPH", value: 50 }], "#camembertCDAPH");
creerCamembert(<?php echo json_encode($nombreOuiNon); ?>, "#camembertChoix");

updateMoyMinMaxAge(<?php echo $moy; ?>, <?php echo $min; ?>, <?php echo $max; ?>);

const age = [
    { label: "15-25 ans", value: <?= $ages['15-25']; ?> },
    { label: "25-35 ans", value: <?= $ages['25-35']; ?> },
    { label: "35-50 ans", value: <?= $ages['35-50']; ?> },
    { label: "50-65 ans", value: <?= $ages['50-65']; ?> },
    { label: "65 ans et +", value: <?= $ages['65+']; ?> }
];

drawHistogram(age, "#histogrammeAge", 500, 300);



drawHistogram(<?php echo json_encode($tableauSituationHeberg); ?>, "#graphiqueLieuVie", window.innerWidth*0.9,400);
drawHistogram(<?php echo json_encode($tableauSituationPerso); ?>, "#graphiqueQualiteVie", window.innerWidth*0.9,400);

creerCarte(<?php echo json_encode($regionData); ?>, <?php echo $total; ?>);
</script>
