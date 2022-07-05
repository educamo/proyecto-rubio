<?Php
$cedula = $_GET['id'];

include_once('conexion.php');
$query = "DELETE FROM usuarios WHERE cedula = $cedula" ;

if (mysqli_query($con, $query)) {
    $msj = "Registro Borrado con éxito";
    echo "<div class='alert alert-success' role='alert'>" . $msj . "</div>";
    echo "<div style='text-align: center;'><a href='registrar.php' class='btn btn-success'>continuar</a></div>";
} else {
    $msj = "Registro no se pudo Borrar";
    echo "<div class='alert alert-danger' role='alert'>" . $msj . "</div>";
    echo "Error: " . mysqli_error($con);
    echo "<div style='text-align: center;'><a href='registrar.php' class='btn btn-danger'>volver</a></div>";
};



mysqli_close($con);
?>