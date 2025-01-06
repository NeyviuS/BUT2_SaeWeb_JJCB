<?php

function messageFlash() : void {
    if (isset($_SESSION['flash'])) {
        foreach ($_SESSION['flash'] as $type => $message) {

            $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

            echo "<div id='error-message' class='$type'><p>{$message}</p></div>";
        }

        unset($_SESSION['flash']);
    }
}
