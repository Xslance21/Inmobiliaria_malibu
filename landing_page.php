<?php
    session_start();

    require("./dbconection.php");

    $db = new database();

    $connection = $db->connect();

    if(isset($_SESSION['username']) and isset($_SESSION['pass'])){
        $username = $_SESSION['username'];
        $consulta = $connection->prepare("SELECT `id` FROM `users` WHERE `username` = ?");
        $consulta->execute([$username]);

        $libro = $consulta->fetch(PDO::FETCH_ASSOC);

        $_SESSION['id_user'] = $libro['id'];
    }else{
        echo "<script> alert('No has iniciado sesión.');
            window.location.href='./login.php'</script>";
        session_unset();
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria_malibu</title>
</head>
<body>
    <?php
        require("./header.php");
    ?>
    
</body>
</html>