<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style_header.css">
    <title>header</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="assets/logo.svg" alt="X">
                    <h1>Inmobliaria Malibu</h1>
                </div>
            </div>
            <nav class="nav">    
                <div class="row">
                    <div class="col">
                        <form action="./landing_page.php" method="POST" id="casas">
                            <input type="text" name="propiedad" value="casas" hidden>
                            <button class="btn btn-primary" type="submit">Casas</button>
                        </form>
                        <form action="./landing_page.php" method="POST" id="apartamentos">
                            <input type="text" name="propiedad" value="apartamento" hidden>
                            <button class="btn btn-primary" type="submit">Apartamentos</button>
                        </form>
                        <form action="./landing_page.php" method="POST" id="terrenos">
                            <input type="text" name="propiedad" value="terrenos" hidden>
                            <button class="btn btn-primary" type="submit">Terrenos </button>
                        </form>
                        <button onclick="location.href='./perfil.php'">
                            <img src="assets/perfil.svg" alt="X">
                        </button>
                        <button onclick="location.href='./carrito.php'">
                            <img src="assets/carrito.svg" alt="X">
                        </button>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>