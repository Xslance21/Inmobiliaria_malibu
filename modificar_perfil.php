<?php
    session_start();

    require("./dbconection.php");

    $db = new database();

    $connection = $db->connect();

    if(empty($_SESSION['username']) and empty($_SESSION['pass'])){
        echo "<script> alert('No has iniciado sesión.');
            window.location.href='./index.php.php'</script>";
        session_unset();
        session_destroy();
    }else{
        $consulta = $connection->prepare("SELECT * FROM `Users` WHERE `id`= ?");
        $consulta->execute([$_SESSION['id_user']]);

        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
    }

    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Sing up</title>
</head>
<body>
    <?php
        require_once("./header.php")
    ?>
    <div class="container">
        <form action="./validacion_modificar.php" method="post">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="text" name="id" value="<?php echo $usuario['id'] ?>"  hidden>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="text" name="username" value="<?php echo $usuario['username'] ?>" disabled readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="password" name="password" id="pass" value="<?php echo $usuario['password'] ?>">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="password" onchange="confirmacion()" id="pass_2" value="<?php echo $usuario['password'] ?>"> 
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="text" name="email" value="<?php echo $usuario['email'] ?>">
                </div>    
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="text" name="cellphone" value="<?php echo $usuario['cellphone'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="text" name="name" value="<?php echo $usuario['name'] ?>" >
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="text" name="document" value="<?php echo $usuario['document'] ?>">
                </div>
            </div>
            <div>
                <button class="btn btn-primary mt-3" type="submit">Modificar</button>
                <input class="btn btn-primary mt-3" type="submit" onclick="this.form.action='./landing_page.php'" value="Cancelar">
            </div>
        </form>
    </div>
    <script>
        function confirmacion(){
            let pass_1 = document.querySelector("input#pass").value;
            let pass_2 = document.querySelector("input#pass_2").value;

            if(pass_1 != pass_2){
                document.getElementById("pass_2").value= "";
                alert('La contraseña no coincide');
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>