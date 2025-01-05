<?php

if (!session_id()) session_start();

const title = 'Qui sommes-nous ?';

require_once 'header.php';
?>
<link rel="stylesheet" href="../style/styleQuiSommesNous.css">
<main>
    <section>
        <div id="qui-sommes-nous">
            <h2>Qui sommes-nous ?</h2>
            <p class="regular-text">France Dépression, créée en 1992, est une association loi 1901 sans but lucratif et
                reconnue d’intérêt
                général. <br><br>
                L’Association agit au cœur de la cité, au travers de différentes actions, afin d’œuvrer à une meilleure
                prise en charge des personnes concernées ainsi qu’à une meilleure information sur les causes et les
                conséquences de la <span class="surligner">dépression et des troubles bipolaires</span>. A cet effet,
                France Dépression a pour vocation d’être un espace ressources, physique et virtuel, rassemblant un
                maximum d’information disponible et adéquate sur les différentes formes de dépression et favorisant les
                échanges et le partage d’expériences entre les personnes.</p>
        </div>
    </section>
    <section id="nos-missions">
        <h2>Nos missions</h2>
        <div id="missions-container">
            <div class="bloc_mission">
                <img src="../images/soutien.png" alt="" class="icon">
                <p>Nous soutenons les personnes atteintes de <span class="surligner-purple">dépression</span> ou de
                    <span
                            class="surligner-purple">troubles bipolaires</span>.</p>
            </div>
            <div class="bloc_mission">
                <img src="../images/stop.png" alt="" class="icon">
                <p>Nous luttons contre la <span class="surligner-purple">stigmatisation</span> et la <span
                        class="surligner-purple">violence</span> à l'encontre d'autrui.</p>
            </div>
            <div class="bloc_mission">
                <img src="../images/poigneedemain.png" alt="" class="icon">
                <p>Nous promouvons leur <span class="surligner-purple">dignité</span> et le <span
                        class="surligner-purple">respect</span> sur toutes les formes et sur toutes les échelles.</p>
            </div>
        </div>
    </section>
    <section>
        <div id="section-co-presidentes">
            <h2>Les co-présidentes</h2>
            <div id="co-presidentes-container">
                <div class="bloc-co-presidente">
                    <img src="../images/claudie-tondon-bernard-300.png" class="img-copresidentes" alt="">
                    <p>Claudie TONDON-BERNARD, ex-présidente de France Dépréssion et co-présidente depuis 2022</p>
                </div>
                <div class="bloc-co-presidente">
                    <img src="../images/christine-villelongue.jpg" class="img-copresidentes" alt="">
                    <p>Christine VILLELONGUE, co-présidente</p>
                </div>
            </div>
        </div>
    </section>
</main>
<?php require_once 'footer.php';