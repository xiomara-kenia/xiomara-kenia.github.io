<?php 

   include 'conexion.php';

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $query = "INSERT INTO usuarios(nombre, correo, contraseña) 
              VALUES('$nombre', '$correo', '$contraseña')";

    //verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo'
            <script>
                alert("Este correo ya esta registrado, intenta con otro diferente");
                window.location = "../login.html";
            </script>
        ';
        exit();
    }

        //verificar que el nombre de usuario no se repita en la base de datos
        $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre='$nombre' ");

        if(mysqli_num_rows($verificar_usuario) > 0){
            echo'
                <script>
                    alert("Este usuario ya esta registrado, intenta con otro diferente");
                    window.location = "../medicina/login.html";
                </script>
            ';
            exit();
        }
    

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script> 
            alert("Usuario almacenado exitosamente")
            window.location = "../medicina/login.html";
            </script>
        ';
    }else{
        echo '
        <script> 
        alert("Intentalo de nuevo, Usuario almacenado exitosamente")
        window.location = "../medicina/login.html";
        </script>
    ';
    }
    
    mysqli_close($conexion);
?>