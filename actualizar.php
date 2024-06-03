<?php
include "Conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $connection = conexion();

    $id = $_POST['update'];
    $fecha = $_POST['fecha'][array_search($id, $_POST['id'])];
    $paciente = $_POST['paciente'][array_search($id, $_POST['id'])];
    $edad = $_POST['edad'][array_search($id, $_POST['id'])];
    $raza = $_POST['raza'][array_search($id, $_POST['id'])];

    $query = "UPDATE cita SET fecha='$fecha', paciente='$paciente', edad='$edad', raza='$raza' WHERE id='$id'";

    if (mysqli_query($connection, $query)) {
        echo "<script>console.log('Operación Exitosa.');</script>";
    } else {
        echo "<script>console.log('Operación Fallida: " . mysqli_error($connection) . "');</script>";
    }

    // Cerrar la conexión
    mysqli_close($connection);

    // Redirigir de nuevo a la página 
    header("Location: buscar.php");
    exit;
} else {
    echo "Datos inválidos.";
}
?>


