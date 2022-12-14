<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style_header.css">
    <title>Document</title>
</head>
<body>
    <?php
        require_once("./header.php")
    ?>
    <div class="container ">
        <div class="row">
            <div class="col">
                <button class="btn btn-primary mt-3 " onclick="location.href='./modificar_perfil.php'">Modificar perfil</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary mt-3 " onclick="location.href='eliminar_perfil.php'">Eliminar cuenta</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary mt-3 " onclick="location.href='landing_page.php'">Regresar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary mt-3 " onclick="location.href='./logout.php'">Salir</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>