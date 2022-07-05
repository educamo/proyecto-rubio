<?Php
session_start();
if (!isset($_SESSION['nombreUsuario'])) {
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Censo</title>
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

    <main class="container-fluid pb-5">
        <div class="row">
            <?Php
                if (!isset($_GET['accion'])){
                    include_once('personas.php');
                }else if ($_GET['accion']=='censo') {
                    include_once('censo.php');
                }else if ($_GET['accion']== 'editar') {
                    include_once('editar.php');
                }else if ($_GET['accion']== 'borrar') {
                    include_once('delete.php');
                }else if ($_GET['accion']=='nuevo') {
                    include_once('nuevo.php');
                }else if ($_GET['accion']=='nuevoCenso') {
                    include_once('nuevoCenso.php');
                }
            ?> 
        </div>

    </main>





    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">

                <?Php
                include_once('foot.php');
                ?>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>