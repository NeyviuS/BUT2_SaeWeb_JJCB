<?php
if (!session_id()) session_start();

const title = 'Enquête';

require_once 'header.php';
require_once '../app/flash.php';
?>

<link rel="stylesheet" href="../style/styleQuestionnaire.css">
    <script src="../script/ScriptQuestionnaire.js" type="module"></script>
<main>
    <section>
        <div class="formbold-main-wrapper text-dark">
            <form action="answer-survey.php" method="POST">
                <h2>Enquête</h2>
                <div id="error-message">
                    <?php
                    messageFlash(); ?>
                </div>
                <div class="formbold-input-group">
                    <label for="age" class="formbold-form-label"> Quel age avez vous ?</label>
                    <input
                            type="number"
                            name="age"
                            id="age"
                            placeholder="Exemple: 25"
                            class="formbold-form-input"
                            min= "0"

                    />
                </div>

                <div class="formbold-input-group">
                    <label for="region" class="formbold-form-label">
                        Dans quelle region habitez vous ?
                    </label>

                    <select class="formbold-form-select" name="region" id="region">
                        <option value="auvergne-rhone-alpes">Auvergne-Rhône-Alpes</option>
                        <option value="bourgogne-franche-comte">Bourgogne-Franche-Comté</option>
                        <option value="bretagne">Bretagne</option>
                        <option value="centre-val-de-loire">Centre-Val de Loire</option>
                        <option value="corse">Corse</option>
                        <option value="grand-est">Grand Est</option>
                        <option value="hauts-de-france">Hauts-de-France</option>
                        <option value="ile-de-france">Île-de-France</option>
                        <option value="normandie">Normandie</option>
                        <option value="nouvelle-aquitaine">Nouvelle-Aquitaine</option>
                        <option value="occitanie">Occitanie</option>
                        <option value="pays-de-la-loire">Pays de la Loire</option>
                        <option value="provence-alpes-cote-d-azur">Provence-Alpes-Côte d'Azur</option>
                        <option value="guadeloupe">Guadeloupe</option>
                        <option value="martinique">Martinique</option>
                        <option value="guyane">Guyane</option>
                        <option value="la-reunion">La Réunion</option>
                        <option value="mayotte">Mayotte</option>
                    </select>
                </div>

                <div class="formbold-input-group">
                    <label for="situation" class="formbold-form-label">
                        Dans quel lieu vivez vous ?
                    </label>

                    <select class="formbold-form-select" name="situationh" id="situation">
                        <option value="famille-permanence">Dans la famille en permanence</option>
                        <option value="famille-accueil-activites">Dans la famille avec une solution d’accueil ou des
                            activités en journée
                        </option>
                        <option value="famille-temporaire-etablissement">Dans la famille principalement mais avec un
                            accueil temporaire ou séquentiel en établissement
                        </option>
                        <option value="logement-independant">Dans un logement indépendant</option>
                        <option value="habitat-inclusif">Dans un habitat inclusif</option>
                        <option value="foyer-accueil-medicalise">Dans un foyer d’accueil médicalisé (FAM)</option>
                        <option value="maison-accueil-specialise">Dans une maison d’accueil spécialisé (MAS)</option>
                        <option value="foyer-vie-hebergement">Dans un foyer de vie ou foyer d’hébergement</option>
                        <option value="ime-internat">En IME avec internat</option>
                        <option value="hospitalisation-psychiatrie">Hospitalisation en psychiatrie</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>

                <div class="formbold-input-radio-wrapper">
                    <label for="satis-lieu" class="formbold-form-label">
                        Le lieu correspond-il a votre choix ?
                    </label>

                    <div class="formbold-radio-flex">
                        <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                                <input
                                        class="formbold-input-radio"
                                        type="radio"
                                        name="satis-lieu"
                                        value="oui"
                                />
                                Oui
                                <span class="formbold-radio-checkmark"></span>
                            </label>
                        </div>

                        <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                                <input
                                        class="formbold-input-radio"
                                        type="radio"
                                        name="satis-lieu"
                                        value="non"
                                />
                                Non
                                <span class="formbold-radio-checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="formbold-input-radio-wrapper">
                    <label for="recom-site" class="formbold-form-label">
                        Recommanderiez vous ce site pour un proche à vous dans le besoin ?
                    </label>

                    <div class="formbold-radio-flex">
                        <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                                <input
                                        class="formbold-input-radio"
                                        type="radio"
                                        name="recom-site"
                                        value="oui"
                                />
                                Oui
                                <span class="formbold-radio-checkmark"></span>
                            </label>
                        </div>

                        <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                                <input
                                        class="formbold-input-radio"
                                        type="radio"
                                        name="recom-site"
                                        value="non"
                                />
                                Non
                                <span class="formbold-radio-checkmark"></span>
                            </label>
                        </div>

                        <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                                <input
                                        class="formbold-input-radio"
                                        type="radio"
                                        name="recom-site"
                                        value="peut-etre"
                                />
                                Peut-etre
                                <span class="formbold-radio-checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="formbold-input-group">
                    <label class="formbold-form-label">
                        Comment décririez-vous votre situation actuelle ?
                    </label>

                    <select class="formbold-form-select" name="situationp" id="situation">
                        <option value="tout-va-bien">Tout va bien</option>
                        <option value="restriction-vie-sociale">Restriction de la vie sociale</option>
                        <option value="souffrance-psychologique">Souffrance psychologique</option>
                        <option value="fatigue-epuisement">Fatigue, épuisement</option>
                        <option value="reduction-activite-professionnelle">Réduction d'activité professionnelle</option>
                        <option value="couts-financiers-importants">Coûts financiers importants</option>
                        <option value="impact-negatif-sur-famille">Impact négatif sur la famille</option>
                        <option value="conflits-familiaux">Conflits familiaux</option>
                        <option value="maladie-difficulte-physique">Maladie ou difficulté physique</option>
                        <option value="eloignement-personne">Éloignement de la personne</option>
                    </select>
                </div>

                <div>
                    <label for="message" class="formbold-form-label">
                        Des suggestions ou commentaires ?
                    </label>
                    <textarea
                            maxlength="200"
                            rows="6"
                            name="message"
                            id="message"
                            placeholder="Écrivez ici..."
                            class="formbold-form-input"
                    ></textarea>
                </div>

                <button type="submit" id="submit-button" disabled>Soumettre</button>
            </form>
        </div>
    </section>
</main>

<?php require_once 'footer.php';