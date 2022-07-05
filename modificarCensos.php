<?Php
session_start();
include_once('conexion.php');

$id = $_POST['persona'];

if (isset($_GET['persona'])) {
    $id = $_GET['persona'];
}

$consulta = "SELECT*FROM usuarios WHERE cedula =" . $id;
$resultado = mysqli_query($con, $consulta);
$datos = mysqli_fetch_array($resultado);
$nombre = $datos['nombre'];
$apellido = $datos['apellido'];
$cedula = $datos['cedula'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>


    <title>Modificar Censos</title>
</head>

<body>
    <header>
        <?Php
        include_once('menu.php');
        ?>
    </header>

    <main class="container-fluid mb-5">
    <?Php
            if (!isset($id) || $id == 0) {
            ?>
                <div class="col-lg-12 text-end mb-2">
                    <a href="modificar.php?accion=censo" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</a>
                </div>
                <hr>
                <div style="background-image: url('assets/image/5.jpg'); background-position: top center;">
        
        <h1 class="text-danger text-center">Debe seleccionar una Persona</h1>
    <?Php
            } else {
    ?>

        <div class="col-md-12 text-end">
            <a href="modificar.php?accion=censo" class="btn btn-primary mt-2 mb-3"> <i class="fa fa-arrow-left"></i> Volver</a>
        </div>
        <h1 class="col-lg-12 text-center mt-2 mb-4 text-primary">
            Listado de Censos por personas
        </h1>
        <div class="row mb-12 text-center text-success">
            <div class="col-lg-12"><?= $nombre . " " . $apellido ?> - Cedula: <?= $cedula ?></div>
        </div>
        <hr>
        <div class="row">
            <?Php

            $consulta = "SELECT*FROM censo WHERE cedula =" . $cedula;
            $resultado = mysqli_query($con, $consulta);
            ?>


            <div class="col-lg-12">
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>Fecha del Censo</th>
                            <th>Cantidad Hijos</th>
                            <th>Hijos -10 años</th>
                            <th>Profesion</th>
                            <th>Trabaja</th>
                            <th>Jefe de Familia</th>
                            <th>Patologia</th>
                            <th>Vivienda Propia</th>
                            <th>Direccion</th>
                            <?Php
                    
                    if ($_SESSION['admin'] == '1') {                        
                    ?>
                            <th>Acciones</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_array($resultado)) {
                        $id = $row['idCenso'];
                    ?>
                        <tr>

                            <td><?= $row['fecha'] ?></td>
                            <td><?= $row['cantHijos'] ?></td>
                            <td><?= $row['hijos10'] ?></td>
                            <td><?= $row['profesion'] ?></td>
                            <td><?= $row['trabaja'] ?></td>
                            <td><?= $row['jefeFamilia'] ?></td>
                            <td><?= $row['patologia'] ?></td>
                            <td><?= $row['viviendaPropia'] ?></td>
                            <td><?= $row['direccion'] ?></td>
                            <td>
                            <?Php
            
                    if ($_SESSION['admin'] == '1') {                        
                    ?>
                    <a href="editarCenso.php?accion=editar&id='<?= $id ?>'" class="btn btn-warning boton" title="Editar"><i class="fa fa-edit"></i></a>
                    
                        <a href="deleteCenso.php?accion=borrar&id='<?= $id ?>'&persona=<?= $cedula ?>" class="btn btn-danger boton" title="Borrar"><i class="fa fa-trash"></i></a>
                    <?Php
                    }
                    ?>
                </td>

                        </tr>

                    <?Php
                    }

                    ?>

                </table>
            </div>
        </div>
<?Php
            }
?> 
        <?Php
        mysqli_free_result($resultado);
        mysqli_close($con);

        ?>
        </div>

    </main>


    <?Php
    include_once('foot.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>