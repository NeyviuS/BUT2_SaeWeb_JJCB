<?php
if (!session_id()) session_start();

const title = 'Antennes';

require_once 'header.php'
?>
<link rel="stylesheet" href="../style/styleAntennes.css">
<script src="../script/script-Antennes.js" type="module"></script>

<main>
    <section>
        <h2>Nos antennes</h2>
        <article id="zoneMap">
            <iframe src="https://www.google.com/maps/d/embed?mid=1ks8NbUMnAuvY61eSfMqcjWaJlfWJ29o&ehbc=2E312F&noprof=1"></iframe>
        </article>

        <article id="zoneRechercheDetails">
            <div id="partieRecherche">
                <h2>Détails</h2>
                <label>
                    <input id="txtRecherche" type="text" placeholder="Code postal, ville...">
                </label>
                <template id="antenne">
                    <li>
                        <details class="detailsAntenne">
                            <summary>
                                <span class="nomAntenne"></span>
                                <span class="villeCPAntenne"></span>
                            </summary>
                            <p class="paragrAntenne"></p>
                        </details>
                    </li>
                </template>
                <ul id="listeAntennes"></ul>
            </div>
        </article>
    </section>
    <section id="creerantenne">
        Vous n’avez pas trouvé d’antenne à proximité de chez vous ? <a href="">Créez-en une dès maintenant</a> ou
        contactez-nous via <a>contact@francedepression.fr</a> ou au <a>07 84 96 88 28</a>.

    </section>
</main>

<?php require_once 'footer.php';