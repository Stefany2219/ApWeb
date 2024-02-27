<?php

session_start();


if (!isset($_SESSION['usuario'])) {

    header("Location: index.php");
    exit();
}


$datos = array(
    array("Nombre" => "juan perez", "Edad" => 25, "Email" => "juan@gmail.com"),
    array("Nombre" => "daniela rojas", "Edad" => 30, "Email" => "daniela@gmail.com"),
    array("Nombre" => "miriam campos", "Edad" => 35, "Email" => "miriam@gmail.com")
);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>
    <div class="container mt-5">
        <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h2>
        <p><a href="logout.php">Cerrar sesión</a></p>
        <h3>Datos:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $dato): ?>
                <tr>
                    <td><?php echo $dato['Nombre']; ?></td>
                    <td><?php echo $dato['Edad']; ?></td>
                    <td><?php echo $dato['Email']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
