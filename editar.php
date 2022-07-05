<?Php
include_once('conexion.php');

$consulta = "SELECT*FROM usuarios WHERE cedula =" . $_GET['id'];
$resultado = mysqli_query($con, $consulta);
$datos = mysqli_fetch_array($resultado);
$nombre = $datos['nombre'];
$apellido = $datos['apellido'];
$cedula = $datos['cedula'];
$tlf = $datos['telefono'];
$email = $datos['email'];
$admin = $datos['admin'];
?>

<div class="col-md-12 text-end">
    <a href="registrar.php" class="btn btn-primary mt-2 mb-3"> <i class="fa fa-arrow-left"></i> Volver</a>
</div>
<hr>
<div style="background-image: url('assets/image/7.jpg'); background-position: top center;">
    <div class="row mt-2 mb-4">
        <div class="col-lg-4 text-center"></div>
        <h1 class=" col-lg-6 titulos text-center">
        Actualizar datos de la Persona
        </h1>
        <div class="col-lg-2"></div>
    </div>

<form action="update.php" method="POST">
    <div class="row text-center">
        <div class="col-lg-4" hidden>
            <label for="cedula" class="form-label" hidden>Cedula</label>
            <input type="text" name="cedula" id="cedula" class="form-control" value="<?= $cedula ?>" hidden>
        </div>
        <div class="col-lg-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $nombre ?>">
        </div>
        <div class="col-lg-4">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="<?= $apellido ?>">
        </div>
        <div class="col-lg-4">
            <label for="tlf" class="form-label">Telefono</label>
            <input type="text" name="tlf" id="tlf" class="form-control" value="<?= $tlf ?>">
        </div>
        <div class="col-lg-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $email ?>" required>
        </div>
        <div class="col-lg-4">
            <label for="admin" class="form-label">Administrador</label>
            <select name="admin" id="admin" class="form-select">
                <option value="0" <?php if($admin == '0'){ echo ' selected="selected"'; } ?>>No</option>
                <option value="1" <?php if($admin == '1'){ echo ' selected="selected"'; } ?>>Si</option>
            </select>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-3">
                <input type="submit" value="Guardar" class="btn btn-success">
            </div>
        </div>

    </div>
</form>


<?Php
mysqli_free_result($resultado);
mysqli_close($con);

?>