<?php
    session_start();

    require("./dbconection.php");

    $db = new database();

    $connection =  $db->connect();

    if(empty($_SESSION['username']) and empty($_SESSION['pass'])){
        echo "<script> alert('No has iniciado sesión.');
            window.location.href='./index.php'</script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style_header.css">
    <title>Document</title>
</head>
<body>
    <?php
        require("./header.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>¿Estas seguro de quere borrar tu usuario?</h1>
                <form action="./index.php" method="post">
                    <button class="btn btn-primary" type="submit" onclick="eliminar_cuenta()">Sí</button>
                    <input class="btn btn-primary" type="submit" onclick="this.form.action='./landing_page.php'" value="Cancelar">
                </form>
            </div>
        </div>
    </div>
    <script>
        function eliminar_cuenta(){
            <?php
                $consulta = $connection->prepare("DELETE FROM `Users` WHERE `id`= ?");
                $consulta->execute([$_SESSION['id_user']]);
            ?>
            alert('Se ha eliminado la cuenta con exito');
            window.location.href='login.php';
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
