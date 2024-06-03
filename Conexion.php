<?php

function conexion () {

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "cvac";

    $connection = mysqli_connect($host, $user, $pass, $db);

    //Comprobar la Conexión
    if (!$connection) {
        echo "<script>alert('Algo ha salido mal, intentalo de nuevo.');</script>";
    } else {
        echo "<script>console.log('Conexión Exitosa.');</script>";
    }

    return $connection;
}

?>