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
<style scoped>
    /* Estilos específicos para el botón Actualizar */
    .btn-table-update {
        padding: 10px;
        border: none;
        font-size: 20px;
        border-radius: 10px;
        margin: 15px;
        color: #fff;
        background-color: rgb(2, 59, 72);
        cursor: pointer;
        transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
    }

    /* Al pasar por encima */
    .btn-table-update:hover {
        background-color: rgb(2, 100, 72);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        transform: scale(1.1);
        /* Aumenta el tamaño del Botón 10%*/
    }

    /* Al hacer click */
    .btn-table-update:active {
        background-color: rgb(2, 140, 72);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        transform: translateY(2px);
        /* Efecto de clic visual */
    }
</style>
<div class="nombre-pagina">
    <h1>Modificar Citas</h1>
</div>

</body>

</html>

<?php
include "Conexion.php";

$connection = conexion();
$query = "SELECT id, fecha, paciente, edad, raza FROM cita;";
$result = mysqli_query($connection, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Mostrar los resultados
        echo "<div class='table-container'>";
        echo '<form method="post" action="actualizar.php">';
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Fecha</th>";
        echo "<th>Paciente</th>";
        echo "<th>Edad (Años)</th>";
        echo "<th>Raza</th>";
        echo "<th>Acciones</th>";
        echo "</tr>";

        while ($column = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td><input type='hidden' name='id[]' value='" . $column['id'] . "'><h2>" . $column['id'] . "</h2></td>";
            echo "<td><input required type='date' name='fecha[]' value='" . $column['fecha'] . "'></td>";
            echo "<td><input required type='text' name='paciente[]' value='" . $column['paciente'] . "'></td>";
            echo "<td><input required type='number' name='edad[]' value='" . $column['edad'] . "'></td>";
            echo "<td><input required type='text' name='raza[]' value='" . $column['raza'] . "'></td>";
            echo "<td><button class='btn-table-update' type='submit' name='update' value='" . $column['id'] . "'>Actualizar</button></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "No se encontraron resultados.";
    }
} else {
    echo "<script>console.log('Operación Fallida: " . mysqli_error($connection) . "');</script>";
}

// Cerrar la conexión
mysqli_close($connection);
?>