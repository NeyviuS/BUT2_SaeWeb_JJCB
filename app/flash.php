<?php

function messageFlash() : void {
    if (isset($_SESSION['flash'])) {
        foreach ($_SESSION['flash'] as $type => $message) {

            $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

            echo "<p>{$message}</p>";
        }

        unset($_SESSION['flash']);
    }
}
