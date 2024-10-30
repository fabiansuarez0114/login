<?php   
include 'conexion.php';

$correo = trim($_POST['correo'] ?? '');
$contrasena = trim($_POST['contrasena'] ?? '');

if (empty($correo) || empty($contrasena) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo '
    <script>
        alert("Por favor, completa todos los campos correctamente.");
        window.location = "./index.php";
    </script>
    ';
    exit;
}

$stmt = $conexion->prepare("SELECT contrasena FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    
    // Para depuración
    error_log("Contraseña ingresada: " . $contrasena);
    error_log("Hash de contrasena almacenada: " . $row['contrasena']);
    
    if (password_verify($contrasena, $row['contrasena'])) {
        header("Location: ./bienvenido.php");
        exit;
    } else {
        echo '
        <script>
            alert("Contrasena incorrecta");
            window.location = "./index.php";
        </script>
        ';
    }
} else {
    echo '
    <script>
        alert("Usuario no existe");
        window.location = "./index.php";
    </script>
    ';
}

$stmt->close();
$conexion->close();
exit;
?>
