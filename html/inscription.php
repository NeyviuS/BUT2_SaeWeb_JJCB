<?php
if (!session_id()) session_start();

const title = 'Inscription';

require_once 'header.php';
require_once '../app/flash.php';
?>

<link rel="stylesheet" href="../style/styleConnexion.css">
<script src="../script/showPassword.js" type="module"></script>
<main>
    <section id="sign">
        <div>
            <h2>Devenir adhérent</h2>
            <div id="error-message">
                <?php
                messageFlash();
                ?>
            </div>
            <form action="signup.php" method="post">
                <div class="div-input">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" name="email" id="email" placeholder="Entrez votre e-mail" required>
                </div>
                <div class="div-input password-container">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe"
                           required>
                    <p class="toggle-password" data-target="password">Afficher</p>
                </div>

                <div class="div-input password-container">
                    <input type="password" name="repeatpassword" id="repeatpassword"
                           placeholder="Répétez votre mot de passe" required>
                    <p class="toggle-password without-label" data-target="repeatpassword">Afficher</p>
                </div>

                <div class="div-checkbox">
                    <input type="checkbox" id="newsletter" name="newsletter">

                    <label for="newsletter">S'abonner à la newsletter</label>
                </div>
                <div class="div-checkbox">
                    <input type="checkbox" id="cgu" name="cgu" required>

                    <label for="cgu">En cochant cette case, j'accepte les
                        <a href="">Conditions Générales d'Utilisation (CGU)</a>
                        et je reconnais avoir pris connaissance de la
                        <a href="">Politique de Confidentialité</a>,
                        incluant les informations sur le traitement de mes données personnelles conformément au RGPD.
                    </label>
                </div>
                <button type="submit">S'inscrire</button>
            </form>
            <div>
                <span>Déjà adhérent ? </span><a href="connexion.php">Connectez-vous.</a>
            </div>
        </div>
    </section>
</main>
<?php require_once 'footer.php';
