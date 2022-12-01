<?php

    session_start();

    session_unset();
    
    session_destroy();

    echo "<script> alert('Has cerrado sesión.');
    window.location.href='./login.php'</script>";
