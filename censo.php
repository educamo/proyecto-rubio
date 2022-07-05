<?Php
include_once('conexion.php');

$consulta = "SELECT*FROM usuarios WHERE cedula =" . $_GET['id'];
$resultado = mysqli_query($con, $consulta);
$datos = mysqli_fetch_array($resultado);
$nombre = $datos['nombre'];
$apellido = $datos['apellido'];
$cedula = $datos['cedula'];

?>

<div style="background-image: url('assets/image/7.jpg'); background-position: top center;">


    <div class="col-md-12 text-end">
        <a href="registrar.php" class="btn btn-primary mt-2 mb-3"> <i class="fa fa-arrow-left"></i> Volver</a>
    </div>
    <div class="row mt-2 mb-4">
        <div class="col-lg-4"></div>
        <h1 class=" col-lg-4 titulos">
            Registro de Censo
        </h1>
        <div class="col-lg-4"></div>
    </div>
    <div class="row mb-12 text-center text-success">
        <div class="col-lg-12"><?= $nombre . " " . $apellido ?> - Cedula: <?= $cedula ?></div>
    </div>
    <hr>
    <div class="row mb-4">
        <div class="col-lg-8">
            <a href="registrar.php?accion=nuevoCenso&id=<?= $cedula ?>" class="btn btn-success" title="Nuevo"><i class="fa fa-plus"></i> Nuevo Censo</a>
        </div>
    </div>
    <div class="row">
        <?Php

        $consulta = "SELECT*FROM censo WHERE cedula =" . $cedula;
        $resultado = mysqli_query($con, $consulta);
        ?>


        <div class="col-lg-12" style="background-color: white;">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Fecha del Censo</th>
                        <th>Cantidad Hijos</th>
                        <th>Hijos -10 Años</th>
                        <th>Profesion</th>
                        <th>Trabaja</th>
                        <th>Jefe de Familia</th>
                        <th>Patologia</th>
                        <th>Vivienda Propia</th>
                        <th>Direccion</th>
                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_array($resultado)) {
                    $id = $row['cedula'];
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

                    </tr>

                <?Php
                }

                mysqli_free_result($resultado);
                mysqli_close($con);

                ?>

            </table>
        </div>
    </div>

</div>