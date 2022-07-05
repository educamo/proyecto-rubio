<?php 
include('conexion.php');
$usuario=$_POST['login'];
$contra=$_POST['password'];
session_start();

$consulta="SELECT*FROM usuarios where email='$usuario' and clave='$contra'";
$resultado=mysqli_query($con,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){

    $datosUsuario=mysqli_fetch_array($resultado);
    $_SESSION['nombreUsuario'] = $datosUsuario['nombre'];
    $_SESSION['admin'] = $datosUsuario['admin'];

    $_SESSION['email']= $datosUsuario['email'];
  
    header("location:panel.php");

}else{
    ?>
    <?php
    include("index.php");

  ?>
  <div class="container">
      <div class="row">
          <div class="col-md-12 text-center m-130">
              <h1 class="bad">Usuario o Contraseña incorrecto</h1>
          </div>
      </div>
  </div>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($con);