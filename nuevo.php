
<div class="col-md-12 text-end">
    <a href="registrar.php" class="btn btn-primary mt-2 mb-3"> <i class="fa fa-arrow-left"></i> Volver</a>
</div>

<hr>
<div style="background-image: url('assets/image/7.jpg'); background-position: top center;">
    <div class="row mt-2 mb-4">
        <div class="col-lg-4 text-center"></div>
        <h1 class=" col-lg-6 titulos text-center">
        Agregando Nueva Persona
        </h1>
        <div class="col-lg-2"></div>
    </div>
    
    <form action="save.php" method="POST">
    <div class="row text-center">
        <div class="col-lg-4" >
            <label for="cedula" class="form-label">Cedula</label>
            <input type="text" name="cedula" id="cedula" class="form-control" required>
        </div>
        <div class="col-lg-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" pattern="^[a-zA-Z\s]{2,254}">
        </div>
        <div class="col-lg-4">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" pattern="^[a-zA-Z\s]{2,254}">
        </div>
        <div class="col-lg-4">
            <label for="tlf" class="form-label">Telefono</label>
            <input type="tel" name="tlf" id="tlf" class="form-control">
        </div>
        <div class="col-lg-4">
            <label for="email" class="form-label" require>Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="col-lg-4">
            <label for="clave" class="form-label" require>Contraseña</label>
            <input type="password" name="clave" id="clave" class="form-control" required>
        </div>
        <div class="col-lg-4">
            <label for="admin" class="form-label">Administrador</label>
            <select name="admin" id="admin" class="form-select">
                <option value="0">No</option>
                <option value="1">Si</option>
            </select>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-2 mb-3">
                <input type="submit" value="Guardar" class="btn btn-success">
            </div>
        </div>

    </div>
</form>
</div>
</div>