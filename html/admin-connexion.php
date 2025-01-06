<?php
if (!session_id()) session_start();

const title = 'Connexion';

require_once 'header.php';
require_once '../app/flash.php';
?>

    <link rel="stylesheet" href="../style/styleConnexion.css">
    <script src="../script/showPassword.js" type="module"></script>
    <main>
        <section id="sign">
            <div>
                <h2>Accès réservé</h2>
                <div id="error-message">
                    <?php
                    messageFlash(); ?>
                </div>
                <form action="admin-signin.php" method="post">
                    <div class="div-input">
                        <label for="email">Adresse e-mail</label>
                        <input type="email" id="email" name="email" placeholder="Entrez votre e-mail" required>
                    </div>
                    <div class="div-input password-container">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                        <p class="toggle-password">Afficher</p>
                    </div>
                    <button type="submit">Se connecter</button>
                </form>
                <div>
                    <a href="#">Mot de passe oublié ?</a>
                </div>
            </div>


        </section>
    </main>
<?php require_once 'footer.php';