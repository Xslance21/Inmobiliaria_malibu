<?php
    session_start();

        require("./dbconection.php");

        $db = new database();

        $connection = $db->connect();
        

        if(isset($_POST['id'])){
            $id =  $_POST['id'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $cellphone = $_POST['cellphone'];
            $name = $_POST['name'];
            $document = $_POST['document'];

            $password = htmlspecialchars($password);

            $email_exp = "/^[A-z0-9\\._-]+@/";

            if(!preg_match($email_exp,$email)){
                echo "<script> alert('El correo no es valido');
                window.location.href='./modificar_perfil.php'</script>";
            }elseif(!preg_match("/[0-9]\d{9}/",$cellphone)){
                echo "<script> alert('El numero de telefono no es valido');
                window.location.href='./modificar_perfil.php'</script>";
            }elseif(!preg_match("/^[A-z ]*$/",$name)){
                echo "<script> alert('El nombre no es valido');
                window.location.href='./modificar_perfil.php'</script>";
            }elseif(!preg_match("/[0-9]\d{9}/",$document)){
                echo "<script> alert('El numero de documento no es valido');
                window.location.href='./modificar_perfil.php'</script>";
            }else{
                $consulta = $connection->prepare("UPDATE `Users` SET `name`= ?, `document`= ?, `cellphone`= ?, `email`= ?, `password`= ? WHERE `id`= ?;");

                $resultado = $consulta->execute([$name,$document,$cellphone,$email,$password,$id]);

                if($resultado){
                    $_SESSION['pass'] = $password;
                    echo ("<script> alert('Se ha modificado correctamente!');
                    window.location.href='modificar_perfil.php';</script>");
                }else{
                    echo "<script> alert('Ha ocurrido un error al modificar su perfil!');
                    window.location.href='modificar_perfil.php';</script>";
                }
            }

        }