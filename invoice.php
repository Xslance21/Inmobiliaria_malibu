<?php
    session_start();

    require("./dbconection.php");

    $db = new database();

    $connection = $db->connect();
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
                <div class='row'>
                    <div class='col'>
                        <img src='".$propiedad['image_1']."' alt='X'>
                    </div>
                    <div class='col'>
                        <h2>Propietario: ".$propiedad['name']."</h2>
                        <h2>Precio: ".$propiedad['price']."</h2>
                        <h2>Fecha: ".$fecha['date']."</h2>
                    </div>
                </div>
                ");
            }
        }
    ?>
    </div>
</body>
</html>