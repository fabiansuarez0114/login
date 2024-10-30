<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register - MagtimusPro</title>
    
    <!-- Corrección en la referencia del CSS -->
    <link rel="stylesheet" href="./login.css">
</head>
<body>

    <main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Registrarse</button> <!-- Corregido -->
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="php/login_usuario.php" method="POST" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Correo Electronico" name="correo" required>
                    <input type="password" placeholder="Contrasena" name="contrasena" required>
                    <button>Entrar</button>
                </form>

                <!--Register-->
                <form action="php/registro.php" method="POST" class="formulario__register" style="display: none;">
                    <h2>Registrarse</h2> <!-- Corregido -->
                    <input type="text" placeholder="Nombre completo" name="nombre_completo" required>
                    <input type="text" placeholder="Correo Electronico" name="correo" required>
                    <input type="text" placeholder="Usuario" name="usuario" required>
                    <input type="password" placeholder="Contraseña" name="contrasena" required>
                    <button>Registrarse</button> <!-- Corregido -->
                </form>
            </div>
        </div>

    </main>

    <!-- Cambié el nombre del archivo de 'scrip.js' a 'script.js' -->
    <script src="./scrip.js"></script>
</body>
</html>
