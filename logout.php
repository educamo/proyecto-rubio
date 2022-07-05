<?Php
    session_start();

    session_unset('nombreUsuario');
    session_unset('email');
    session_destroy();
    header("location:index.php");