<div class="col-md-12 text-end">
    <a href="registrar.php?accion=censo&id='<?= $_GET['id'] ?>'" class="btn btn-primary mt-2 mb-3"> <i class="fa fa-arrow-left"></i> Volver</a>
</div>
<hr>
<div style="background-image: url('assets/image/7.jpg'); background-position: top center;">
<div class="row mt-2 mb-4">
        <div class="col-lg-4"></div>
        <h1 class=" col-lg-4 titulos text-center">
        Nuevo Censo de Personas
        </h1>
        <div class="col-lg-4"></div>
    </div>
<form action="saveCenso.php" method="POST">
    <div class="row text-center">
        <div class="col-lg-4" hidden>
            <label for="cedula" class="form-label">Cedula</label>
            <input type="text" name="cedula" id="cedula" class="form-control" value="<?= $_GET['id'] ?>">
        </div>
        <div class="col-lg-4">
            <label for="hijos" class="form-label">Cantidad de Hijos</label>
            <input type="number" name="hijos" id="hijos" class="form-control" value="0"pattern="^([1-9]+\\d*)|[0]">
        </div>
        <div class="col-lg-4">
            <label for="hijos10" class="form-label">Hijos menores de 10 años</label>
            <input type="number" name="hijos10" id="hijos10" class="form-control" value="0" pattern="^([1-9]+\\d*)|[0]">
        </div>
        <div class="col-lg-4">
            <label for="profesion" class="form-label">Profesion</label>
            <input type="text" name="profesion" id="profesion" class="form-control" required pattern="^[a-zA-Z\s]{2,254}">
        </div>
        <div class="col-lg-4">
            <label for="trabaja" class="form-label">Trabaja</label>
            <select name="trabaja" id="trabaja" class="form-select">
                <option value="no">No</option>
                <option value="si">Si</option>
            </select>
        </div>
        <div class="col-lg-4">
        <label for="jefeFamilia" class="form-label">Es jefe de Familia</label>
            <select name="jefeFamilia" id="jefeFamilia" class="form-select">
                <option value="no">No</option>
                <option value="si">Si</option>
            </select>
        </div>
        <div class="col-lg-4">
            <label for="patologia" class="form-label">Patologia</label>
            <input type="text" name="patologia" id="patologia" class="form-control" required>
        </div>
        <div class="col-lg-4">
            <label for="vivienda" class="form-label">Vivienda propia</label>
            <select name="vivienda" id="vivienda" class="form-select">
                <option value="si">Si</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="col-lg-4">
            <label for="direccion" class="form-label" require>Direccion</label>
            <input type="text" name="direccion" id="direccion" class="form-control" required>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-3">
                <input type="submit" value="Guardar" class="btn btn-success">
            </div>
        </div>

    </div>
</form>
</div>