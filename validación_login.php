<?php

    session_start();

    require("./dbconection.php");

    $db = new database();

    $connection = $db->connect();

    if(isset($_POST['username']) and isset($_POST['pass'])){
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $validacion_nombre = false;
        $validacion_pass = false;

        $username = htmlentities($username);
        $password = htmlentities($password);

        $consulta = $connection->prepare("SELECT * FROM `users`;");
        $consulta->execute();

        $libro = $consulta->fetchAll(PDO::FETCH_ASSOC);

        foreach($libro as $x => $x_values){
            if($x_values['username'] == $username){
                $validacion_nombre = true;
            }
            if($x_values['password'] == $password){
                $validacion_pass = true;
            }
        }

        if($validacion_nombre == true and $validacion_pass == true){
            $_SESSION['username'] = $username;
            $_SESSION['pass'] = $password;
            header("Location:landing_page.php");
        }else{
            echo"<script>alert('El nombre o la contraseña no coinciden con los registros del sistema');
            window.location.href='login.php'</script>";
        }
    }
    else{
        session_unset();
        session_destroy();
    }

?>