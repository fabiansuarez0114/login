<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si los datos POST existen
if (isset($_POST["nombre_completo"]) && isset($_POST["correo"]) && isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
    
    // Recibir datos del formulario y sanitizarlos para evitar inyecciones SQL
    $nombre_completo = mysqli_real_escape_string($conexion, $_POST["nombre_completo"]);
    $correo = mysqli_real_escape_string($conexion, $_POST["correo"]);
    $usuario = mysqli_real_escape_string($conexion, $_POST["usuario"]);
    $contrasena = password_hash(mysqli_real_escape_string($conexion, $_POST["contrasena"]), PASSWORD_DEFAULT);

    // Verificar formato de correo
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo '
        <script>
            alert("El formato del correo es inválido");
            window.location = "../index.php";
        </script>';
        exit();
    }

    // Verificar que el correo no se repita
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");
    if (mysqli_num_rows($verificar_correo) > 0) {
        echo '
        <script>
            alert("Este correo ya está registrado");
            window.location = "../index.php";
        </script>';
        exit();
    }

    // Verificar que el nombre de usuario no se repita
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'");
    if (mysqli_num_rows($verificar_usuario) > 0) {
        echo '
        <script>
            alert("Este usuario ya está registrado");
            window.location = "../index.php";
        </script>';
        exit();
    }

    // Consulta SQL para insertar los datos en la base de datos
    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena)
              VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena')";

    $ejecutar = mysqli_query($conexion, $query);
    
    if ($ejecutar) {
        echo '
        <script>
            alert("Usuario almacenado exitosamente");
            window.location = "../index.php";
        </script>';
    } else {
        echo '
        <script>
            alert("Error al almacenar el usuario: ' . mysqli_error($conexion) . '");
            window.location = "../index.php";
        </script>';
    }
}

mysqli_close($conexion);
?>
