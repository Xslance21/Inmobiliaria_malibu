<?php
    session_start();

    echo "<h1> Hola ". $_SESSION['username'].".</h1>";
?>