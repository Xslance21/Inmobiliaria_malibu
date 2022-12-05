<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inicio de sesión en la inmobiliaria de Malibu">
    <meta name="keywords" content="Inicio de sesión, Inmobiliaria malibu, malibu, inmobiliaria, casas, apartamentos. terrenos, venta de casas, venta de terrenos, venta de apartamentos, venta de propiedades, propiedades en venta, comprar casas">
    <meta name="author" content="Jose Manuel Gallego Carvajal, Safir Khan">
    <meta name="copyright" content="Inmobiliaria Malibu">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container position-absolute top-50 start-50 translate-middle" id="container">
        <div class="row" id="Login">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <img class="rounded img-fluid start" src="./images/login.jpg" alt="Not found" width="100%">
            </div>
            <div class="col-sm-7 col-md-7 col-lg-7">
                <form action="./validacion_login.php" method="post">
                    <input class="form-control mt-3" type="text" name="username" id="username" placeholder="Username">
                    <input class="form-control mt-3" type="password" name="pass" id="pass" placeholder="Password">
                    <button class="btn btn-primary mt-3" id="Ingresar" type="submit">Ingresar</button>
                    <input class="btn btn-primary mt-3" id="Registro" type="submit" onclick="this.form.action='registro.php'" value="Registro.">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>