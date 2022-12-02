<?php
    session_start();

    require("./dbconection.php");

    $db = new database();

    $connection = $db->connect();

    if(isset($_SESSION['carrito'])){
        $id = array($_POST['id']);
        $_SESSION['carrito'] = array_merge($_SESSION['carrito'],$id);

    }else{
        $id = array($_POST['id']);
        $_SESSION['carrito'] = $id;        
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
        require_once("./header.php")
    ?>
    <div class='container'>
    <?php
        $total_carrito = 0;
        foreach($_SESSION['carrito'] as $key_carrito => $value_carrito){
            $consulta = $connection->prepare("SELECT `properties`.`image_1`, `properties`.`price`, `users`.`name` FROM `properties` INNER JOIN `users` ON `properties`.`id_users` = `users`.`id` WHERE `properties`.`id`= ? ");
            $consulta->execute([$value_carrito]);
            $propiedad = $consulta->fetch(PDO::FETCH_ASSOC);
            
            $total_carrito += $propiedad['price'];

            echo ("
                <div class='row'>
                    <div class='col'>
                        <img src='".$propiedad['image_1']."' alt='X'>
                    </div>
                    <div class='col'>
                        <h2>Propietario: ".$propiedad['name']."</h2>
                        <h2>Precio: ".$propiedad['price']."</h2>
                    </div>
                </div>
            ");


        }

        echo ("
            <div class='row'>
                <div class='col'>
                    <h2>Total: ".$total_carrito."</h2>
                </div>        
            </div>
        ");
    ?>
        <div class="row">
            <div class="col">
                <button onclick="location.href='./invoice.php'">
                    Finalizar compra
                </button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>