<?php
session_start();
include "Conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connection = conexion();
    $usuario = $_SESSION['id_usuario'];


    // Datos del formulario
    $fecha = mysqli_real_escape_string($connection, $_POST['fecha']);
    $paciente = mysqli_real_escape_string($connection, $_POST['paciente']);
    $edad = mysqli_real_escape_string($connection, $_POST['edad']);
    $raza = mysqli_real_escape_string($connection, $_POST['raza']);

    // Consulta para insertar los datos
    $query = "INSERT INTO cita (fecha, usuario, paciente, edad, raza) VALUES ('$fecha', '$usuario', '$paciente', '$edad', '$raza')";

    if (mysqli_query($connection, $query)) {
        echo "<script>console.log('Operación Exitosa.');</script>";
    } else {
        echo "<script>console.log('Operación Fallida: " . mysqli_error($connection) . "');</script>";
    }

    // Cerrar la conexión
    mysqli_close($connection);

    // Redirigir a la página principal
    header("Location: citas-usuario.php");
    exit;
} else {
    echo "Método de solicitud no válido.";
}
?>
