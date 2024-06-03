<?php
session_start();

include "Conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connection = conexion();

    // Datos del formulario
    $usuario = mysqli_real_escape_string($connection, $_POST['usuario']);
    $telefono = mysqli_real_escape_string($connection, $_POST['telefono']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $mensaje = mysqli_real_escape_string($connection, $_POST['mensaje']);

    // Consulta para insertar los datos
    $query = "INSERT INTO usuario (nombre, telefono, email, mensaje) VALUES ('$usuario', '$telefono', '$email', '$mensaje')";

    if (mysqli_query($connection, $query)) {
        echo "<script>console.log('Operación Exitosa.');</script>";
        $_SESSION['nombre_usuario'] = $usuario;
        $_SESSION['id_usuario'] = mysqli_insert_id($connection);
    } else {
        echo "<script>console.log('Operación Fallida: " . mysqli_error($connection) . "');</script>";
    }

    // Cerrar la conexión
    mysqli_close($connection);

    // Redirigir a la página principal
    header("Location: index.html");
    exit;
} else {
    echo "Método de solicitud no válido.";
}
?>
