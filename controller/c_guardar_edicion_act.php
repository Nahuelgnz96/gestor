<?php
// Verificar si se ha enviado el formulario de actualización
if (isset($_POST['btn_actualizar_act'])) {
    // Realizar la conexión a la base de datos o incluir el archivo de conexión si es necesario
    include "../model/conexion_bd.php";

    // Verificar si la conexión se estableció correctamente
    if (!$conexion) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    // Obtener los datos del formulario
    $act_id = $_POST['act_id'];
    $titulo_act = $_POST['titulo_act'];
    $descripcion_act = $_POST['descripcion_act'];
    $contenido_act = $_POST['contenido_act'];
    $fecha_publicacion_act = $_POST['fecha_publicacion_act'];

    // Verificar si se ha seleccionado una nueva imagen
    if (!empty($_FILES["foto_not"]["name"])) {
        // Procesar la imagen y almacenarla en la carpeta correspondiente (similar a como se hizo al agregar una noticia)
        // Guardar el nombre de la imagen actualizada en la base de datos
        // ...
    }

    // Preparar la consulta SQL para actualizar la noticia
    $sql = $conexion->prepare("UPDATE actividades SET titulo = ?, descripcion = ?, contenido = ?, fecha_publicacion = ? WHERE id_actividades = ?");
    $sql->bind_param("ssssi", $titulo_act, $descripcion_act, $contenido_act, $fecha_publicacion_act, $act_id);

    // Ejecutar la consulta SQL
    // Después de realizar la actualización con éxito, agrega este código para redireccionar
if ($sql->execute()) {
    // Redireccionar a la página gestor.php
    header("Location: ../views/gestor.php");
    exit; // Asegúrate de salir del script para evitar ejecuciones adicionales
} else {
    echo '<div class="alert alert-danger">Error al actualizar la actividad: ' . $conexion->error . '</div>';
}


    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Si no se ha enviado el formulario de actualización, redirigir o mostrar un mensaje de error
    echo "Acceso no autorizado.";
}
?>
