<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnagregaradmin"])) {
    // Realiza la conexión a la base de datos o incluye el archivo de conexión si es necesario
    include "../model/conexion_bd.php";
    
    if (!$conexion) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    // Verificar que todos los campos estén llenos
    if (!empty($_POST["nombre_admin"]) && !empty($_POST["apellido_admin"]) && !empty($_POST["email_admin"]) && !empty($_POST["telefono_admin"]) && isset($_POST["admin"])) {
        // Recuperar los datos del formulario
        $nombre = $_POST["nombre_admin"];
        $apellido = $_POST["apellido_admin"];
        $email = $_POST["email_admin"];
        $telefono = $_POST["telefono_admin"];
        $administrador = $_POST["admin"];

        // Preparar la consulta SQL
        $sql = $conexion->prepare("INSERT INTO administrador (nombre, apellido, email, telefono, administrador) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("ssssi", $nombre, $apellido, $email, $telefono, $administrador);

        // Ejecutar la consulta SQL
        if ($sql->execute()) {
            echo '<div class="alert alert-success">Administrador agregado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar el administrador: ' . $conexion->error . '</div>';
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    } else {
        echo '<div class="alert alert-danger">Todos los campos son obligatorios</div>';
    }
}
?>
