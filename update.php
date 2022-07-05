
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?Php


        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['tlf'];
        $email = $_POST['email'];
        $admin = $_POST['admin'];

        include_once('conexion.php');
        $query = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido',telefono = '$telefono', email = '$email', admin = '$admin' WHERE cedula = $cedula";

        if (mysqli_query($con, $query)) {
            $msj = "Registro actualizado con éxito";
            echo "<div class='alert alert-success' role='alert'>" . $msj . "</div>";
            echo "<div style='text-align: center;'><a href='registrar.php' class='btn btn-success'>continuar</a></div>";
        } else {
            $msj = "Registro no se pudo actualizar";
            echo "<div class='alert alert-danger' role='alert'>" . $msj . "</div>";
            echo "Error: " . mysqli_error($con);
            echo "<div style='text-align: center;'><a href='registrar.php' class='btn btn-danger'>volver</a></div>";
        };

    

    mysqli_close($con);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>