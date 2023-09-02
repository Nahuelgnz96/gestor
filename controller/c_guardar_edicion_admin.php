<?php
// Verificar si se ha enviado el formulario de actualización
if (isset($_POST['btn_actualizar_admin'])) {
    // Realizar la conexión a la base de datos o incluir el archivo de conexión si es necesario
    include "../Model/conexion_bd.php";

    // Verificar si la conexión se estableció correctamente
    if (!$conexion) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    // Obtener los datos del formulario
    $admin_id = $_POST['admin_id'];
    $nombre_admin = $_POST['nombre_admin'];
    $apellido_admin = $_POST['apellido_admin'];
    $email_admin = $_POST['email_admin'];
    $telefono_admin = $_POST['telefono_admin'];
    $tipo_admin = $_POST['tipo_admin'];

    // Preparar la consulta SQL para actualizar la noticia
    $sql = $conexion->prepare("UPDATE noticias SET nombre = ?, apellido = ?, email = ?, telefono = ?, administrador = ?  WHERE id = ?");
    $sql->bind_param("ssssi", $admin_id, $nombre_admin, $apellido_admin, $email_admin, $email_admin, $telefono_admin);

    // Ejecutar la consulta SQL
    // Después de realizar la actualización con éxito, agrega este código para redireccionar
if ($sql->execute()) {
    // Redireccionar a la página gestor.php
    header("Location: ../views/gestor.php");
    exit; // Asegúrate de salir del script para evitar ejecuciones adicionales
} else {
    echo '<div class="alert alert-danger">Error al actualizar la noticia: ' . $conexion->error . '</div>';
}


    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Si no se ha enviado el formulario de actualización, redirigir o mostrar un mensaje de error
    echo "Acceso no autorizado.";
}
?>
