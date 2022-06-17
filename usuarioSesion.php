<?php 

    session_start();

    include 'conexion.php';

    $nombre = $_POST ['nombre'];
    $contraseña = $_POST ['contraseña'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre='$nombre'
    and contraseña = '$contraseña'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['nombre'] = $correo;
        header("location: ../medicina/principal.html");
        exit;
    }else{
        echo '
            <script>
                alert("Usuario no existe, por favor verifique los 
                datos introducidos");
                window.location = "../login.html";
            </script>
        ';
        exit;
    }

?>