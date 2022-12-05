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

    if(isset($_POST['id_propiedad'])){

        $consulta = $connection->prepare("SELECT * FROM `Properties` WHERE `id` = ?");
        $consulta->execute([$_POST['id_propiedad']]);

        $propiedad = $consulta->fetch(PDO::FETCH_ASSOC);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casas</title>
</head>
<body>
    <?php
        require_once("./header.php")
    ?>
    <div class="container">
        <div class="row my-5">
            <div class="col">
                <?php echo"<img class='img-fluid' src=".$propiedad['image_1']." alt="."Not found".">"; ?>
            </div>
            <div class="col">
                <p>Propietario: <?php echo $propiedad['id_users'] ?></p>
                <p>Tipo de propiedad: <?php echo $propiedad['id_type_properties'] ?></p>
                <p>Arquitecto: <?php echo $propiedad['id_architects'] ?></p>
                <p>Ubicación: <?php echo $propiedad['id_neighborhood'] ?></p>
                <p>Medidas: <?php echo $propiedad['measures'] ?></p>
                <p>Diseño: <?php echo $propiedad['designe'] ?></p>
                <p>Precio: $<?php echo $propiedad['price'] ?></p>
                <form action="./carrito.php" method="POST">
                    <input type="text" name="id" value="<?php echo $propiedad['id'] ?>" hidden>
                    <button class="btn btn-primary" type="submit">Agregar al carrito</button> 
                </form>
            </div>
        </div>
    </div>
    <!-- < ?php
        require_once("./footer.php")
    ?> -->
</body>
</html>