<?Php
session_start();
if (!isset($_SESSION['nombreUsuario'])) {
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Censo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>
</head>

<body>
    <header>
        <?Php
        include_once('menu.php');
        ?>

    </header>

    <main class="container mt-3">
        <div class="col-md-12 text-end">
            <a href="index.php" class="btn btn-primary mt-2 mb-3"> <i class="fa fa-arrow-left"></i> Volver</a>
        </div>
        <hr>
        <form action="pdf.php" method="post">
            <div class="row">
                <div class="clo-lg-4">
                    <label for="cedula" class="form-label">Cedula de Persona Censada a buscar</label>
                </div>
                <div class="col-lg-4">
                    <input type="text" name="cedula" id="cedula" class="form-control" pattern="[0-9]+">
                </div>
                <div class="col-lg-4">
                    <input type="submit" class="btn btn-success" value="Buscar">
                </div>
            </div>
        </form>

        <p>
        <h6 style="color: cadetblue;">Si no selecciona una una persona mostrara todas las las personas</h6>

        </p>

    </main>





    <?Php
    include_once('foot.php');
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>