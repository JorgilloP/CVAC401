<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if(isset($_SESSION['nombre_usuario'])){
    //La sesión está iniciada
    header("location:citas-usuario.php");
} else {
    // El usuario no ha iniciado sesión, redirige a la página de Login
    header("location:login.html");
    exit; // Termina la ejecución del script
}
?>