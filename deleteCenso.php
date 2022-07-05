<?Php
if (isset($_GET['persona'])) {
   $cedula = $_GET['persona'];
}
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
    <title>Borrar censo</title>
</head>
<body>
    <header>
        <?Php
            include_once('menu.php');
        ?> 
    </header>

    <main class="container">
        <?Php
            if (isset($_GET['accion']) && $_GET['accion']=='borrar') {
    
                $idCenso = $_GET['id'];
                include_once('conexion.php');
                $query = "DELETE FROM censo WHERE idCenso = $idCenso" ;
            
                if (mysqli_query($con, $query)) {
                    $msj = "Censo Borrado con éxito";
                    echo "<div class='alert alert-success' role='alert'>" . $msj . "</div>";
                    echo "<div style='text-align: center;'><a href='modificarCensos.php?persona=$cedula' class='btn btn-success'>continuar</a></div>";
                    die();
                } else {
                    $msj = "Censo no se pudo Borrar";
                    echo "<div class='alert alert-danger' role='alert'>" . $msj . "</div>";
                    echo "Error: " . mysqli_error($con);
                    echo "<div style='text-align: center;'><a href='modificarCensos.php?persona=$cedula' class='btn btn-danger'>volver</a></div>";
                    die();
            };
            
            
            
            mysqli_close($con);
            }
        ?> 
    </main>
    
    <?Php
        include_once('foot.php');
    ?> 
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>