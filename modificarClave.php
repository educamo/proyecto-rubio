<?Php
session_start();
if (!isset($_SESSION['nombreUsuario'])) {
    header("location:index.php");
}

$id = $_POST['persona'];


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>
    <title>Modificar clave</title>
</head>

<body>
    <header>
        <?Php
        include_once('menu.php');
        ?>

    </header>

    <main class="container">
        <?Php
        if (isset($_GET['accion'])) {
            $accion = $_GET['accion'];
        }else{
            $accion = '';
        }
            if ($accion=='guardar') {

                $cedula = $id;
                $clave = $_POST['clave'];
                $reclave = $_POST['reclave'];

                if ($clave == $reclave) {
                    include_once('conexion.php');
                    $query = "UPDATE usuarios SET clave = '$clave' WHERE cedula = $id";

                    if (mysqli_query($con, $query)) {

                            // Recargar la página despues de 10 segundos y redireccionar a "modificar.php"
                        header('Refresh: 3; URL=modificar.php');
                        echo "<h1 class='bg-success text-white text-center mt-4'>Se Actualizo con exito la Contraseña</h1>";
                        include_once('foot.php');
                        die();
                    } else {
                        $msj = "Registro no se pudo actualizar";
                        echo "<div class='alert alert-danger' role='alert'>" . $msj . "</div>";
                        echo "Error: " . mysqli_error($con);
                        echo "<div style='text-align: center;'><a href='modificar.php?accion=editar' class='btn btn-danger'>volver</a></div>";
                    }

                }else {
                    echo "<h1 class='bg-danger text-white text-center mt-4'>las Contraseñas no Coinciden</h1>";
                }               
           
           }
        ?> 
        <div class="row mt-3">
            <?Php
            if (!isset($id) || $id == 0) {
            ?>
                <div class="col-lg-12 text-end mb-2">
                    <a href="modificar.php?accion=editar" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Volver</a>
                </div>
                <hr>
        </div>
        <h1 class="text-danger text-center">Debe seleccionar una Persona</h1>
    <?Php
            } else {
    ?>
        <div class="col-lg-12 text-end mb-2">
            <a href="modificar.php?accion=editar" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Volver</a>
        </div>
        <hr>
        <h1 class="text-primary text-center">Cambio de Clave de usuario</h1>
        <div class="container-fluid bg-light text-center p-3">

            <form action="modificarClave.php?accion=guardar" method="post" class="row">
                <div class="col-lg-6">
                    <label for="clave" class="form-label">Nueva Contraseña</label>
                    <input type="password" name="clave" id="clave" class="form-control" required>
                </div>
                <div class="col-lg-6">
                    <label for="reclave" class="form-label">Repetir Nueva Contraseña</label>
                    <input type="password" name="reclave" id="reclave" class="form-control">
                </div>
                <div class="col-lg-12 text-center">
                    <input type="hidden" name="persona" id="persona" value="<?= $id ?>">
                    <input type="submit" value="Guardar" class="btn btn-success mt-2">
                </div>
            </form>
        </div>
    <?php
            }
    ?>
    </div>

    </main>




    <?Php
    include_once('foot.php');
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>