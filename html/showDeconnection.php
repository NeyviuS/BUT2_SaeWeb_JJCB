<?php

if (!session_id())
    session_start();

if (isset($_SESSION['user'])) {
    echo '<div id="hide">
    <form action="../html/deconnexion.php" method="POST">
        <div id="deconnexion">
            <p>Souhaitez-vous vous déconnecter ?</p>
            <div>
                <button id="deconnection-no" value="no" name="action">Non</button>
                <button id="deconnection-yes" value="yes" name="action">Oui</button>
            </div>
        </div>
    </form>
</div>';
}

