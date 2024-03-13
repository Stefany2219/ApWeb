<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

function cerrar_sesion() {
    session_unset(); 
    session_destroy(); 
    header("Location: index.php");  
    exit();
}

if (isset($_POST['cerrar_sesion'])) {
    cerrar_sesion();
}

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

$usuarios = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $usuarios[] = array(
            'id' => $row["id"],
            'usuario' => $row["usuario"],
        );
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Principal</title>
    <link rel="stylesheet" href="estilo2.css">
</head>
<body>
    <div class="contenedor-botones">
        <form action="" method="post">
            <button type="submit" name="cerrar_sesion" class="boton-cerrar">Cerrar Sesión</button>
        </form>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario['usuario']); ?></td>
                        <td class="acciones">
                            <button onclick="eliminarUsuario(<?php echo $usuario['id']; ?>)">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
  
  <script>
    function eliminarUsuario(id) {
        if (confirm("¿Estás seguro de que quieres eliminar este usuario?")) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                    window.location.reload();
                }
            };
            xhttp.open("POST", "eliminar_usuario.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + id);
        }
    }
  </script>
</body>
</html>
