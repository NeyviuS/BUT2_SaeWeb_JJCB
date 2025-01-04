<?php

if (!session_id()) session_start();

const title = 'Ressources';

require_once 'header.php';
?>
<link rel="stylesheet" href="../style/styleRessources.css">
<script src="../script/pageRessources.js" type="module"></script>

<main>
    <section></section>
    <br><br><br>
<template id="ressource-template">
    <div class="ressource">
        <p class="ressource-title">Titre</p>
        <p class="ressource-description">Intitulé de la ressource documentaire...</p>
        <button class="ressource-type">Type de la ressource</button>
    </div>
</template>
<div id="listeRessources"></div>
</main>

<?php require_once 'footer.php';