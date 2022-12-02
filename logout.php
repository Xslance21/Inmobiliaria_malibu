<?php

    session_start();

    
    if(empty($_SESSION['username']) and empty($_SESSION['pass'])){
        echo "<script> alert('No has iniciado sesión.');
            window.location.href='./login.php'</script>";
        session_unset();
        session_destroy();
    }

    session_unset();
    
    session_destroy();

    echo "<script> alert('Has cerrado sesión.');
    window.location.href='./login.php'</script>";
