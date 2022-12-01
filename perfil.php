<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once("./header.php")
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <button onclick="location.href='modificar_perfil.php'">Modificar perfil</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button onclick="location.href=''">Eliminar cuenta</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button onclick="location.href=''">Regresar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button onclick="location.href='./logout.php'">Salir</button>
            </div>
        </div>
    </div>
</body>
</html>