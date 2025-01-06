<?php
if (!session_id()) session_start();

const title = 'France Dépression';
require_once 'header.php';

?>

<link rel="stylesheet" href="../style/styleIndex.css">
<main>
    <section id="home">
        <div>
            <div>
                <h1>Savez-vous que 13% des Français sont atteints de dépression ?</h1>
                <p class="regular-text">C'est tout à fait normal d'avoir des coups de mou, mais le plus important est
                    d'en parler.</p>
                <a href="#">
                    <button id="button_contact">Contactez-nous dès maintenant !</button>
                </a>
            </div>
            <img class="img" src="../images/depression.png" alt="img" style="width: 400px">
        </div>
    </section>
    <section id="nos-missions">
        <h2>Qui sommes-nous ?</h2>
        <p class="regular-text">France Dépression est une association fondée en 1992 ayant pour mission :</p>
        <div id="missions-container">
            <div class="bloc_mission">
                <img src="../images/soutien.png" alt="" class="icon">
                <p>Soutenir les personnes atteintes de <span class="surligner-purple">dépression</span> ou de <span
                        class="surligner-purple">troubles bipolaires</span>.</p>
            </div>
            <div class="bloc_mission">
                <img src="../images/stop.png" alt="" class="icon">
                <p>Lutter contre la <span class="surligner-purple">stigmatisation</span> et la <span
                        class="surligner-purple">violence</span> à l'encontre d'autrui.</p>
            </div>
            <div class="bloc_mission">
                <img src="../images/poigneedemain.png" alt="" class="icon">
                <p>Promouvoir leur <span class="surligner-purple">dignité</span> et le <span
                        class="surligner-purple">respect</span> sur toutes les formes et sur toutes les échelles.</p>
            </div>
        </div>
    </section>
    <section>
        <div id="engagement">
            <h2>Impliqué et engagé</h2>
            <div id="bouton-container">
                <div class="bloc-bouton">
                    <a href="antennes.php">
                        <button class="bouton_rond">
                            <img src="../images/nosantennes.png" alt="">
                        </button>
                    </a>
                    <p class="regular-text">Nos antennes</p>
                </div>
                <div class="bloc-bouton">
                    <a href="inscription.php">
                        <button class="bouton_rond">
                            <img src="../images/deveniradherant.png" alt="">
                        </button>
                    </a>
                    <p class="regular-text">Devenir adhérant</p>
                </div>
                <div class="bloc-bouton">
                    <a href="">
                        <button class="bouton_rond">
                            <img src="../images/newsletter.png" alt="">
                        </button>
                    </a>
                    <p class="regular-text">Newsletter</p>
                </div>
                <div class="bloc-bouton">
                    <a>
                        <button class="bouton_rond">
                            <img src="../images/dons.png" alt="">
                        </button>
                    </a>
                    <p class="regular-text">Faire un don</p>
                </div>
            </div>
        </div>
    </section>
    <section id="actualite">
        <h2>L'actualité</h2>
        <div id="actu-container">
            <div class="bloc_actu">
                <img src="../images/image_actu_1.jpeg" class="img-actu">
                <a href="https://www.lamontagne.fr/clermont-ferrand-63000/actualites/depression-resistante-une-alternative-non-medicamenteuse-proposee-au-centre-hospitalier-sainte-marie-a-clermont-ferrand_13922641/">
                    <h3>Dépression résistante : une alternative non médicamenteuse</h3>
                </a>
                <p>13/03/2021 - La stimulation magnétique transcrânienne répétée est une thérapie nouvellement proposée
                    au Centre hospitalier Sainte-Marie, à Clermont-Ferrand. Elle s’adresse aux patients souffrant de
                    ...</p>
            </div>
            <div class="bloc_actu">
                <img src="../images/image_actu_2.jpg" class="img-actu">
                <a href="https://www.psychomedia.qc.ca/diagnostics/qu-est-ce-que-le-trouble-delirant">
                    <h3>Qu'est-ce que le trouble délirant ?</h3>
                </a>
                <p>Qu'est-ce que le trouble délirant ? (Critères diagnostiques - DSM-5) Psychomédia Le trouble délirant
                    est caractérisé, selon les critères diagnostiques du DSM-5 (1), par la persistance d’idées ...</p>
            </div>
            <div class="bloc_actu">
                <img src="../images/image_actu_3.png" class="img-actu">
                <a href="https://www.santementale.fr/2021/09/3114-le-numero-national-de-prevention-du-suicide/">
                    <h3>3114 : Le numéro national de prévention du suicide</h3>
                </a>
                <p>Annoncé par le ministre de la Santé et des Solidarités lors de l’ouverture des Assises de la Santé
                    mentale et de la psychiatrie le 27 septembre 2023, le numéro national de prévention du suicide…                    </p>
            </div>
        </div>
    </section>
</main>
<?php require_once 'footer.php';