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

    if(isset($_POST['eliminarcarrito'])){
        if($_POST['eliminarcarrito'] == "eliminar"){
            unset($_SESSION['carrito']);
        }
    }

    if(isset($_POST['propiedad'])){
        switch($_POST['propiedad']){
            case "casas":
                $_SESSION['type'] = 1;
                break;
            case "apartamento":
                $_SESSION['type'] = 2;
                break;
            case "terrenos":
                $_SESSION['type'] = 3;
                break;
            default:
                echo "nada";
                break; 
        }
    }else{
        $_SESSION['type'] = 1;
    }

    if(isset($_SESSION['type'])){
        $consulta = $connection->prepare("SELECT `users`.`username`,`properties`.`price`,`properties`.`image_1`,`neighborhood`.`neighborhood`,`properties`.`id` FROM `properties` INNER JOIN `users` ON `properties`.`id_users` = `users`.`id` INNER JOIN `neighborhood` ON `properties`.`id_neighborhood` = `neighborhood`.`id` WHERE `id_type_properties` = ?");
        $consulta->execute([$_SESSION['type']]);
        $propiedades = $consulta->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Inmobiliaria_malibu</title>
</head>
<body>
    <?php
        require("./header.php");
    ?>
    <div class="container">
        <?php
            
            foreach($propiedades as $x => $x_values){
                echo 
                "
                    <div class="."row".">
                        <div class="."col".">
                            <img class="."img-fluid"." src=".$x_values['image_1']." alt="."Null".">
                        </div>
                        <div class="."col".">
                            <h2>Propietario: ".$x_values['username']."</h2>
                            <h2>Ubicación: ".$x_values['neighborhood']."</h2>
                            <h2>Precio: \$".$x_values['price']."</h2>
                            <form action="."./casas.php"." method="."POST".">
                                <input name="."id_propiedad"." value=".$x_values['id']." hidden>
                                <button class="."btn btn-primary"." type="."submit".">ver</button>
                            </form>
                        </div>
                    </div>
                ";
            }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>