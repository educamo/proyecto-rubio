<?Php
session_start();
if (!isset($_SESSION['nombreUsuario'])) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body style="background-image: url('assets/image/6.jpg'); background-size: cover; background-position: center center;">
    <header>
        <?Php
        include_once('menu.php');
        ?>

    </header>

    <main class="container p-3">
        <div class="row">
            <div class="col-sm-4">
                <div class="card text-white bg-primary p-1">
                    <a href="registrar.php" class="btn btn-primary">
                        <div class="card-body">
                            <h5 class="card-title">Registrar</h5>
                            <p class="card-text">Aquí podrá realizar el censo de las personas.</p>

                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 offset-md-8">
                <div class="card text-white bg-success p-1">
                    <a href="listarPDF.php" class="btn btn-success">
                        <div class="card-body">
                            <h5 class="card-title">Ver Registros</h5>
                            <p class="card-text">Podrás observar un listado de las personas censadas.</p>

                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-4">
                <div class="card text-white bg-warning p-1">
                    <a href="modificar.php" class="btn btn-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">Modificar Registros</h5>
                            <p class="card-text">Panel donde puedas Editar los Registros.</p>

                        </div>
                    </a>
                </div>
            </div>
        </div>

    </main>

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">

                <?Php
                include_once('foot.php');
                ?>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>