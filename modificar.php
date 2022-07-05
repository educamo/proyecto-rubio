<?Php
session_start();
if (!isset($_SESSION['nombreUsuario'])) {
    header("location:index.php");
}

include_once('conexion.php');

$consulta = "SELECT cedula, nombre, apellido FROM usuarios";
$resultado = mysqli_query($con, $consulta);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
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

    <main class="container-fluid mt-5 mb-5">
        <?Php
            if (!isset($_GET['accion'])){
        ?> 
        <div class="col-md-12 text-end">
            <a href="index.php" class="btn btn-primary mt-2 mb-3"> <i class="fa fa-arrow-left"></i> Volver</a>
        </div>
        <hr>
        <div style="background-image: url('assets/image/9.png'); background-position: top center;">

            <?Php
            }
            ?> 
        <?Php
        if (!isset($_GET['accion'])) { ?>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <div class="card text-white bg-primary">
                        <a href="modificar.php?accion=editar" class="btn btn-primary">
                            <div class="card-body">
                                <h5 class="card-title">Cambiar Contraseña</h5>
                                <p class="card-text">Aquí podrá realizar el Cambio de Contraseña de las personas Registradas.</p>
                            </div>
                        </a>
                    </div>
                </div>                
            </div>
            <div class="row">
            <div class="col-sm-3 offset-lg-8">
                    <div class="card text-white bg-success" style="background-color: blueviolet;;">
                        <a href="modificar.php?accion=censo" class="btn btn-success">
                            <div class="card-body">
                                <h5 class="card-title">Modificar Censos</h5>
                                <p class="card-text">Podrás ver listado de los censos de cada persona y tambien modificarlos.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        <?php  } else if ($_GET['accion'] == 'censo') { ?>
            <div class="row">
                <div class="col-lg-12 text-end">
                    <a href="modificar.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Volver</a>
                </div>
            </div>
            <hr>
            <h1 class="text-center text-primary">Modificar Censo</h1>
            <form action="modificarCensos.php" method="post">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <label for="persona" class="form-label">Selecciona la persona para ver sus censos:</label>
                    </div>
                    <div class="col-lg-6">
                        <select name="persona" id="persona" class="form-select">
                            <option value="0">Selecciona una persona...</option>
                            <?Php
                            while ($row = mysqli_fetch_array($resultado)) {
                                $id = $row['cedula'];
                                $persona = $row['nombre'] . ' ' . $row['apellido'];
                                echo "<option value='$id'>" . $persona . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <input type="submit" value="Mostrar Censos" class="btn btn-success">
                    </div>
                </div>
            </form>
            <?Php } else if ($_GET['accion'] == 'editar') { ?>
            <div class="row">
                <div class="col-lg-12 text-end">
                    <a href="modificar.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Volver</a>
                </div>
            </div>
            <hr>
            <h1 class="text-center text-primary">Modificar Contraseña</h1>
            <form action="modificarClave.php" method="post">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <label for="persona" class="form-label">Selecciona la persona para cambiar su Contraseña:</label>
                    </div>
                    <div class="col-lg-6">
                        <select name="persona" id="persona" class="form-select">
                            <option value="o">Selecciona una persona...</option>
                            <?Php
                            while ($row = mysqli_fetch_array($resultado)) {
                                $id = $row['cedula'];
                                $persona = $row['nombre'] . ' ' . $row['apellido'];
                                echo "<option value='$id'>" . $persona . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <input type="submit" value="siguiente" class="btn btn-success">
                    </div>
                </div>
            </form>

        <?php

}

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