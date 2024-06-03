<?php
session_start();

include "Conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connection = conexion();

    // Datos del formulario
    $usuario = mysqli_real_escape_string($connection, $_POST['usuario']);
    $telefono = mysqli_real_escape_string($connection, $_POST['telefono']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    // Verificar los datos del usuario
    $query = "SELECT id, nombre, telefono, email FROM usuario WHERE nombre = '$usuario' AND telefono = '$telefono' AND email = '$email'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Inicio de sesión exitoso
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nombre_usuario'] = $row['nombre'];
        $_SESSION['id_usuario'] = $row['id'];// Guardar el id del usuario en la sesión

        // Redirigir a la página principal
        header("Location: index.html");
        exit;
    } else {
        // Inicio de sesión fallido
        echo "<script>alert('Credenciales incorrectas. Por favor, intente de nuevo.'); window.location.href='login.html';</script>";
    }

    // Cerrar la conexión
    mysqli_close($connection);
} else {
    echo "Método de solicitud no válido.";
}
?>
