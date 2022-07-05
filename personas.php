<?Php

include_once('conexion.php');

$consulta = "SELECT*FROM usuarios";
$resultado = mysqli_query($con, $consulta);
?>
<div style="background-image: url('assets/image/7.jpg'); background-position: top center;">
    <div class="col-md-12 text-end">
        <a href="index.php" class="btn btn-primary mt-2 mb-3"> <i class="fa fa-arrow-left"></i> Volver</a>
    </div>
    <hr>
    <div class="row mt-2 mb-4">
        <div class="col-lg-4"></div>
        <h1 class=" col-lg-4 titulos">
        Registro de Personas
        </h1>
        <div class="col-lg-4"></div>
    </div>

<div class="col-lg-8">
    <a href="registrar.php?accion=nuevo" class="btn btn-success" title="Nuevo"><i class="fa fa-plus"></i> Nuevo Registro</a>
</div>

<div class="col-lg-12" style="background-color: white;">
    <table class="table table-striped">
        
        <thead>
            <tr>
                <th>CEDULA</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>TELEFONO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <?php
        while ($row = mysqli_fetch_array($resultado)) {
            $id = $row['cedula'];
            ?>
            <tr>

                <td><?= $row['cedula'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['apellido'] ?></td>
                
                <td><?= $row['telefono'] ?></td>
                <td>
                    <a href="registrar.php?accion=censo&id='<?= $id ?>'" class="btn btn-success" title="Ver"><i class="fa fa-search"></i></a>
                    <a href="registrar.php?accion=editar&id='<?= $id ?>'" class="btn btn-warning" title="Editar"><i class="fa fa-edit"></i></a>
                    <?Php

if ($_SESSION['admin'] == '1') {                        
    ?>
                        <a href="registrar.php?accion=borrar&id='<?= $id ?>'" class="btn btn-danger" title="Borrar"><i class="fa fa-trash"></i></a>
                        <?Php
                    }
                    ?>
                </td>
            </tr>
            
            <?Php
        }
        
        mysqli_free_result($resultado);
        mysqli_close($con);
        
        ?>

</table>
</div>
</div>