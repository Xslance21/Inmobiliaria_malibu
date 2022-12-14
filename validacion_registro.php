<?php

    session_start();

    require("./dbconection.php");

    $db = new database();

    $connection = $db->connect();

    

    if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['cellphone']) and isset($_POST['name']) and isset($_POST['document'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $cellphone = $_POST['cellphone'];
        $name = $_POST['name'];
        $document = $_POST['document'];
        $usuarioregistrado = false;

        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);

        $email_exp = "/^[A-z0-9\\._-]+@/";

        $consulta = $connection->prepare("SELECT `username` FROM `Users`;");

        $consulta->execute(); 

        $user_fetch = $consulta->fetchAll(PDO::FETCH_ASSOC);

        foreach($user_fetch as $x => $x_values){
            if($x_values['username'] == $username){
                $usuarioregistrado = true;
            }
        }
        if($usuarioregistrado){
            echo "<script> alert('Este nombre de ususario ya esta registrado');
            window.location.href='./registro.php'</script>"; 
        }
        elseif(!preg_match($email_exp,$email)){
            echo "<script> alert('El correo no es valido');
            window.location.href='./registro.php'</script>";
        }elseif(!preg_match("/[0-9]\d{9}/",$cellphone)){
            echo "<script> alert('El numero de telefono no es valido');
            window.location.href='./registro.php'</script>";
        }elseif(!preg_match("/^[A-z ]*$/",$name)){
            echo "<script> alert('El nombre no es valido');
            window.location.href='./registro.php'</script>";
        }elseif(!preg_match("/[0-9]\d{9}/",$document)){
            echo "<script> alert('El numero de documento no es valido');
            window.location.href='./registro.php'</script>";
        }else{
            $consulta = $connection->prepare("INSERT INTO Users(`name`,`document`,`cellphone`,`email`,`username`,`password`) VALUES (?,?,?,?,?,?);");

            $resultado = $consulta->execute([$name,$document,$cellphone,$email,$username,$password]);

            if($resultado){
                $_SESSION['username'] = $username;
                $_SESSION['pass'] = $password;
                echo ("<script> alert('Se ha registrado correctamente!');
                window.location.href='landing_page.php';</script>");
            }else{
                echo "<script> alert('Ha ocurrido un error al registrarse');
                window.location.href='registro.php';</script>";
            }
        }

    }else{
        session_unset();
        session_destroy();
    }