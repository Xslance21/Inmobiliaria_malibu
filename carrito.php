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
    <title>Document</title>
</head>
<body>
    <?php
        require_once("./header.php")
    ?>
    <h1><?php foreach($_SESSION['carrito'] as $x => $x_value){
        echo $x_value."<br>";
    } ; 
    ?></h1>
    <?php
        require_once("./footer.php")
    ?>
</body>
</html>