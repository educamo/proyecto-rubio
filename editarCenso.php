<?Php
include_once('conexion.php');

$consulta = "SELECT*FROM censo WHERE idCenso =" . $_GET['id'];
$resultado = mysqli_query($con, $consulta);
$datos = mysqli_fetch_array($resultado);
$cedula = $datos['cedula'];
$cantHijos = $datos['cantHijos'];
$hijos10= $datos['hijos10'];
$profesion = $datos['profesion'];
$trabaja = $datos['trabaja'];
$jefeFamilia = $datos['jefeFamilia'];
$patologia = $datos['patologia'];
$viviendaPropia = $datos['viviendaPropia'];
$direccion = $datos['direccion'];
$fecha = $datos['fecha'];
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
    <title>Editar Censo</title>
</head>

<body>
    <header>
        <?Php
        include_once('menu.php');
        ?>
    </header>

    <main class="container">
        <div class="row">


            <div class="col-md-12 text-end">
                <a href="modificarCensos.php?persona=<?= $cedula ?>" class="btn btn-primary mt-2 mb-3"> <i class="fa fa-arrow-left"></i> Volver</a>
            </div>
            <hr>
            <h1 class="text-center text-primary">Actualizar datos del Censo</h1>
            <form action="updateCenso.php" method="POST">
                <div class="row text-center">
                    <div class="col-lg-4">
                        <input type="hidden" name="idCenso" id="idCenso" value="<?=$_GET['id']?>">
                        <input type="hidden" name="cedula" id="cedula" value="<?=$cedula?>">
                        <label for="cantHijos" class="form-label">Cantidad de Hijos</label>
                        <input type="number" name="cantHijos" id="cantHijos" class="form-control" pattern="^([1-9]+\\d*)|[0]" value="<?= $cantHijos ?>">
                    </div>
                    <div class="col-lg-4">
                        <label for="hijos10" class="form-label">Hijos Menores 10 años</label>
                        <input type="number" name="hijos10" id="hijos10" class="form-control" pattern="^([1-9]+\\d*)|[0]" value="<?= $hijos10 ?>">
                    </div>
                    <div class="col-lg-4">
                        <label for="profesion" class="form-label">Profesion</label>
                        <input type="text" name="profesion" id="profesion" class="form-control" pattern="^[a-zA-Z\s]{2,254}" value="<?= $profesion ?>" required>
                    </div>
                    <div class="col-lg-4">
                        <label for="trabaja" class="form-label">Trabaja</label>
                        <select name="trabaja" id="trabaja" class="form-select">
                            <option value="no" <?php if ($trabaja == 'no') { echo ' selected="selected"'; }?>>No</option>
                            <option value="si" <?php if ($trabaja == 'si') { echo ' selected="selected"'; }?>>Si</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="jefeFamilia" class="form-label">Es jefe de Familia</label>
                        <select name="jefeFamilia" id="jefeFamilia" class="form-select">
                            <option value="no" <?php if ($jefeFamilia == 'no') { echo ' selected="selected"'; }?>>No</option>
                            <option value="si" <?php if ($jefeFamilia == 'si') { echo ' selected="selected"'; }?>>Si</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="patologia" class="form-label">Patologia</label>
                        <input type="text" id="patologia" name="patologia" class="form-control" value="<?= $patologia ?>">
                    </div>
                    <div class="col-lg-4">
                        <label for="viviendaPropia" class="form-label">vivienda Propia</label>
                        <select name="viviendaPropia" id="viviendaPropia" class="form-select">
                            <option value="si" <?php if ($viviendaPropia == 'si') { echo ' selected="selected"'; }?>>Si</option>
                            <option value="no" <?php if ($viviendaPropia == 'no') { echo ' selected="selected"'; }?>>No</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="direccion" class="form-label" require>Direccion</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" value="<?=$direccion?>" required>
                    </div>
                    <div class="col-lg-4">
                        <label for="fecha" class="form-label">Fecha del Censo</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" value="<?=$fecha?>" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt-3">
                            <input type="submit" value="Actualizar" class="btn btn-success">
                        </div>
                    </div>

                </div>
            </form>


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