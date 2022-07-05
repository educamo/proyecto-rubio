<?Php
session_start();
if (isset($_SESSION['nombreUsuario'])) {
    header("location:panel.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/estilos.css">

</head>

<body>
    <div class="container-fluid landingpage">
        <div class="row">
            <div class="col-lg-8 offset-md-2 titulo-log text-center">
                <h1 class="text-white">Comunidad de piso plata</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 text-center">
                <img src="assets//image//3.png" alt="" class="responsive-img imglog">     

            </div>
            <div class="col-lg-6 frmLogin">
                <h2 class="text-center">Login</h2>
                <form action="login.php" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="login" class="form-label">Correo Electronico</label>
                                <input type="text" id="login" name="login" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="row $zindex-popover">
                            <div class="col-md-12 p-4 text-center">
                                <input type="submit" value="Aceptar" class="btn btn-success" id="aceptarlog">
                            </div>
                        </div>
                    </div>

                </form>
            </div>


        </div>
        <div class="row mt-4 p-5">
            <div class="col-lg-12 text-end mt-4">

                <img src="assets//image/1.jpg" alt="" class="imglog2 responsive-image">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-6 vision">
            <p>Vision</p>
                <p>Implementar el buen manejo de los datos personales de los habitantes de la comunidad
                    de piso de plata, para los censos y cartas de residencia.
                </p>
            </div>
            <div class="col-lg-4 vision">
            <p>Autores</p>
                <p>Anderson Ostos Y Cristian Miranda
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>