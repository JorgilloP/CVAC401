<?php 
session_start();
$usuario = $_SESSION['id_usuario'];
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>

    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>CVAC</title>

        <!-- slider stylesheet -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

        <!-- fonts style -->
        <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
        <!-- Custom styles -->
        <link href="css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="css/responsive.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style-table.css">
        <link rel="icon" href="images/logo.jpg" type="image/png">
    </head>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
                        <img src="images/logo.jpg" alt="">
                        <span>
                            CVAC
                        </span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                            <ul class="navbar-nav  ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="service.html">servicio </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pet.html">Productos </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="clinic.html"> Clínica</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contáctanos</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="MedicalForm.html">Generar Ficha Médica</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="citas-usuario.php">Citas</a>
                                </li>
                            </ul>
                        </div>
                        <div class="quote_btn-container  d-flex justify-content-center">
                            <a href="https://wa.me/525523294536" target="_blank">
                                Call: +52 5523294536
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->


        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
<div class="nombre-pagina">
    <h1>Citas del Usuario</h1>
</div>

</html>


<?php
include "Conexion.php";

$connection = conexion();


// Nombre del usuario

$query = "
SELECT 
    cita.id AS cita_id,
    cita.fecha AS fecha_cita,
    usuario.nombre AS nombre_usuario,
    usuario.telefono AS telefono_usuario,
    cita.paciente AS nombre_mascota,  
    cita.edad AS edad_mascota,
    cita.raza AS raza_mascota
FROM 
    cita
JOIN 
    usuario ON cita.usuario = usuario.id
WHERE 
    usuario.id = '$usuario'";

$result = mysqli_query($connection, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Mostrar los resultados
        echo "<div class='table-container'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Fecha</th>";
        echo "<th>Usuario</th>";
        echo "<th>Teléfono</th>";
        echo "<th>Mascota</th>";
        echo "<th>Edad</th>";
        echo "<th>Raza</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['cita_id'] . "</td>";
            echo "<td>" . $row['fecha_cita'] . "</td>";
            echo "<td>" . $row['nombre_usuario'] . "</td>";
            echo "<td>" . $row['telefono_usuario'] . "</td>";
            echo "<td>" . $row['nombre_mascota'] . "</td>";
            echo "<td>" . $row['edad_mascota'] . " años</td>";
            echo "<td>" . $row['raza_mascota'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "No se encontraron resultados.";
    }
} else {
    echo "Error en la consulta: " . mysqli_error($connection);
}

// Cerrar la conexión
mysqli_close($connection);
?>
