<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnagregarnoticia"])) {
    // Realiza la conexión a la base de datos o incluye el archivo de conexión si es necesario
    include "../model/conexion_bd.php";
    
    if (!$conexion) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    // Verificar si se seleccionó un archivo
    if (!empty($_FILES["foto_not"]["name"])) {
        // Se ha seleccionado una imagen, realizar el proceso normal de carga de imagen
        $foto_extension = pathinfo($_FILES["foto_not"]["name"], PATHINFO_EXTENSION);
        $foto = uniqid() . "." . $foto_extension;
        $foto_temp = $_FILES["foto_not"]["tmp_name"];

        $targetDirectory = "../img/noticias/";
        $targetFile = $targetDirectory . basename($foto);

        if (move_uploaded_file($foto_temp, $targetFile)) {
            $titulo = $_POST["titulo_not"];
            $descripcion = $_POST["descripcion_not"];
            $contenido = $_POST["contenido_not"];
            $estado = "pendiente";
            $fechaPublicacion = $_POST["fecha_publicacion_not"]; // Obtener la fecha de publicación desde el formulario
            $fechaPublicacionFormatted = date('Y-m-d H:i:s', strtotime($fechaPublicacion)); // Formatear la fecha y hora

            // Preparar la consulta SQL
            $sql = $conexion->prepare("INSERT INTO noticias (titulo, descripcion, contenido, imagen, fecha_publicacion, estado) VALUES (?, ?, ?, ?, ?, ?)");
            $sql->bind_param("ssssss", $titulo, $descripcion, $contenido, $foto, $fechaPublicacionFormatted, $estado);

            // Ejecutar la consulta SQL
            if ($sql->execute()) {
                echo '<div class="alert alert-success">Noticia agregada correctamente</div>';
            } else {
                echo '<div class="alert alert-danger">Error al registrar la noticia: ' . $conexion->error . '</div>';
            }

            // Cerrar la conexión a la base de datos
            $conexion->close();
        } else {
            echo '<div class="alert alert-danger">Error al subir la imagen</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Debe seleccionar una imagen</div>';
    }
}
?>
