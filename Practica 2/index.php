<?php
// Array de usuarios permitidos
$usuarios = array(
    array("usuario" => "lucero", "contraseña" => "lucero123")
);

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    
    // Verificar credenciales
    foreach ($usuarios as $user) {
        if ($user["usuario"] === $usuario && $user["contraseña"] === $contraseña) {
            // Iniciar sesión y redirigir al usuario a principal.php
            session_start();
            $_SESSION["usuario"] = $usuario;
            header("Location: principal.php");
            exit;
        }
    }
    // Si las credenciales no coinciden, mostrar mensaje de error
    $error = "Usuario o contraseña incorrectos.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>
    <div class="row">
        <div class="col-md-6 mx-auto p-0">
            <div class="card">
                <div class="login-box">
                    <div class="login-snip">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Iniciar Sesión</label>
                        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarse</label>
                        <div class="login-space">
                            <div class="login">
                                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                    <div class="group">
                                        <label for="user" class="label">Usuario</label>
                                        <input id="user" type="text" class="input" name="usuario" placeholder="Ingresa tu usuario">
                                    </div>
                                    <div class="group">
                                        <label for="pass" class="label">Contraseña</label>
                                        <input id="pass" type="password" class="input" name="contraseña" data-type="password" placeholder="Ingresa tu contraseña">
                                    </div>
                                    <div class="group">
                                        <input type="submit" class="button" value="Iniciar Sesión">
                                    </div>
                                </form>
                                <?php if(isset($error)) { ?>
                                    <p style="color: red;"><?php echo $error; ?></p>
                                <?php } ?>
                                <div class="hr"></div>
                                <div class="foot">
                                    <a href="#">¿Olvidaste tu contraseña?</a>
                                </div>
                            </div>
                            <div class="sign-up-form">
                                <!-- Formulario de registro aquí -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
