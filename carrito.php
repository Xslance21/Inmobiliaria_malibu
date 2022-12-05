<?php
    session_start();

    require("./dbconection.php");

    $db = new database();

    $connection = $db->connect();

    
    if(empty($_SESSION['username']) and empty($_SESSION['pass'])){
        echo "<script> alert('No has iniciado sesión.');
            window.location.href='./index.php'</script>";
        session_unset();
        session_destroy();
    }

    if(isset($_SESSION['carrito'])){
        if(isset($_POST['id'])){
            $id = array($_POST['id']);
            $repetido = false;
            foreach($id as $key_id => $value_id){
                foreach($_SESSION['carrito'] as $key_carrito => $value_carrito){
                    if($value_carrito == $value_id){
                        echo "<script> alert('Esta propiedad ya estaba en el carrito.');</script>";
                        $repetido = true;
                        break;
                    }else{
                        $repetido=false;
                    }
                }
            }
            if(!$repetido){
                $_SESSION['carrito'] = array_merge($_SESSION['carrito'],$id);
            }
        }
    }else{
        if(isset($_POST['id'])){
            $id = array($_POST['id']);
            $_SESSION['carrito'] = $id; 
        }       
    }
    
    if(isset($_POST['eliminar'])){
        // echo $_POST['eliminar'];
        // echo "Sí está";
        foreach($_SESSION['carrito'] as $x => $x_values){
            if($x_values == $_POST['eliminar']){
                $arreglo_tmp = $_SESSION['carrito'];
                unset($arreglo_tmp[$x]);
                $_SESSION['carrito'] = $arreglo_tmp;
                break;
            }
        }
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
            if(isset($_SESSION['carrito'])){
                foreach($_SESSION['carrito'] as $key_carrito => $value_carrito){
                    $consulta = $connection->prepare("SELECT `Properties`.`image_1`, `Properties`.`price`, `Users`.`name` FROM `Properties` INNER JOIN `Users` ON `Properties`.`id_users` = `Users`.`id` WHERE `Properties`.`id`= ? ");
                    $consulta->execute([$value_carrito]);
                    $propiedad = $consulta->fetch(PDO::FETCH_ASSOC);
                    
                    $total_carrito += $propiedad['price'];
        
                    echo ("
                        <div class='row my-5'>
                            <div class='col-sm-6 col-md-6 col-lg-6 '>
                                <img class='img-fluid' src='".$propiedad['image_1']."' alt='X'>
                            </div>
                            <div class='col-sm-6 col-md-6 col-lg-6'>
                                <h2>Propietario: ".$propiedad['name']."</h2>
                                <h2>Precio: \$".$propiedad['price']."</h2>
                                <form action='./carrito.php' method='post'>
                                    <input name='eliminar' value=".$value_carrito." hidden>
                                    <button class='btn btn-primary' type='submit'>Eliminar</button> 
                                </form>
                            </div>
                        </div>
                    ");
        
        
                }
                if($total_carrito !=0){
                    echo ("
                        <div class='row'>
                            <div class='col'>
                                <h2>Total: \$".$total_carrito."</h2>
                            </div>        
                        </div>
                    ");
                }
                else{
                    echo"<h1>No hay nada en el carrito</h1>";
                }
            }
            else{
                echo"<h1>No hay nada en el carrito</h1>";
            }
        ?>
        <div class="row">
            <div class="col">
                <form action="" method="POST">
                    <input hidden name="borrar-carrito" value="eliminar">
                    <button class="btn btn-primary" onclick="this.form.action='./invoice.php'">
                        Finalizar compra
                    </button>
                </form>
                <input class="btn btn-primary" type="submit" onclick="location.href='landing_page.php'" value="Regresar">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>