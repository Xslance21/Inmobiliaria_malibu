<?php
    session_start();

    require("./dbconection.php");

    $db = new database();

    $connection = $db->connect();

    if(empty($_SESSION['username']) and empty($_SESSION['pass'])){
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <?php
        require_once("./header.php");
    ?>
    <div class="container">
    <?php

        if(isset($_SESSION['carrito'])){

            $id_user = $_SESSION['id_user'];

            foreach($_SESSION['carrito'] as $key_carrito => $value_carrito){
                $consulta = $connection->prepare("UPDATE `properties` SET `id_users` = ? WHERE `id` = ?");
                $consulta->execute([$id_user,$value_carrito]);
                
            }

            foreach($_SESSION['carrito'] as $key_carrito => $value_carrito){
                $consulta = $connection->prepare("INSERT INTO `invoice`(`id_users`, `id_properties`, `date`) VALUES (?,?,CURDATE())");
                $consulta->execute([$id_user,$value_carrito]);
                
            }

            foreach($_SESSION['carrito'] as $key_carrito => $value_carrito){
                $consulta = $connection->prepare("SELECT `properties`.`image_1`, `properties`.`price`, `users`.`name` FROM `properties` INNER JOIN `users` ON `properties`.`id_users` = `users`.`id` WHERE `properties`.`id`= ? ");
                $consulta->execute([$value_carrito]);
                $propiedad = $consulta->fetch(PDO::FETCH_ASSOC);

                $consulta_2 = $connection->prepare("SELECT `date` FROM `invoice` WHERE `id_properties` = ?");
                $consulta_2->execute([$value_carrito]);
                $fecha = $consulta_2->fetch(PDO::FETCH_ASSOC);

                echo ("
                <div class='row my-5'>
                    <div class='col-sm-6 col-md-6 col-lg-6'>
                        <img class='img-fluid' src='".$propiedad['image_1']."' alt='X'>
                    </div>
                    <div class='col-sm-6 col-md-6 col-lg-6'>
                        <h2>Factura</h2>
                        <h2>Nuevo propietario: ".$propiedad['name']."</h2>
                        <h2>Precio de compra: \$".$propiedad['price']."</h2>
                        <h2>Fecha de compra: ".$fecha['date']."</h2>
                    </div>
                </div>
                ");
            }
        }
    ?>
        <div class="row">
            <div class="col">
                <form action="" method="POST">
                    <input type="text" name="eliminarcarrito" value="eliminar" hidden>
                    <button class="btn btn-primary" type="submit" onclick="this.form.action='landing_page.php'">Regresar.</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>