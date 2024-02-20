<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Registro de Usuarios
                    </div>
                    <div class="card-body">
                        <?php
                        // Definir un array para almacenar los usuarios registrados
                        $usuariosRegistrados = [];

                        // Procesamiento del formulario
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Recoger los datos del formulario
                            $nombreUsuario = $_POST["nombreUsuario"];
                            $edad = $_POST["edad"];
                            $direccion = $_POST["direccion"];

                            // Validar los datos (puedes agregar más validaciones según tus necesidades)
                            if (empty($nombreUsuario) || empty($edad) || empty($direccion)) {
                                echo "<div class='alert alert-danger'>Por favor, complete todos los campos.</div>";
                            } else {
                                // Almacenar los datos del nuevo usuario en el array
                                $usuariosRegistrados[] = ["nombre" => $nombreUsuario, "edad" => $edad, "direccion" => $direccion];
 
                            }
                        }
                        ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="form-group">
                                <label for="nombreUsuario">Nombre:</label>
                                <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required>
                            </div>
                            <div class="form-group">
                                <label for="edad">Edad:</label>
                                <input type="number" class="form-control" id="edad" name="edad" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección:</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <?php if (!empty($usuariosRegistrados)) : ?>
                    <h2>Usuarios Registrados</h2>
                    <ul>
                        <?php foreach ($usuariosRegistrados as $usuario) : ?>
                            <li>
                                <strong>Nombre:</strong> <?php echo $usuario["nombre"]; ?>,
                                <strong>Edad:</strong> <?php echo $usuario["edad"]; ?>,
                                <strong>Dirección:</strong> <?php echo $usuario["direccion"]; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>No hay usuarios registrados.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</body>
</html>