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
    <div class="container">
        <form action="./validacion_registro.php" method="post">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="text" placeholder="Username" name="username">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="password" placeholder="Password" name="password" id="pass">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="password" placeholder="Confirm_Password" onchange="confirmacion()" id="pass_2"> 
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="text" placeholder="Email" name="email">
                </div>    
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="text" placeholder="Cellphone" name="cellphone">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="text" placeholder="Name" name="name">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                    <input class="form-control" type="text" placeholder="Document" name="document">
                </div>
            </div>
            <div>
                <button class="btn btn-primary mt-3" type="submit">Registrarse.</button>
                <input class="btn btn-primary mt-3" type="submit" onclick="this.form.action='index.php'" value="Cancelar">
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