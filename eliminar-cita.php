<?php
include "Conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $connection = conexion();

    $clave = $_POST['delete'];

    $query = "DELETE FROM cita WHERE id='$clave'";

    if (mysqli_query($connection, $query)) {
        echo "<script>console.log('Operación Exitosa.');</script>";
    } else {
        echo "<script>console.log('Operación Fallida: " . mysqli_error($connection) . "');</script>";
    }

    // Cerrar la conexión
    mysqli_close($connection);

    header("Location: buscar.php");
    exit;
} else {
    echo "Datos inválidos.";
}
?>
