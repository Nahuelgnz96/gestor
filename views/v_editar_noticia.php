<?php
include "../Model/conexion_bd.php";

// Verificar si se ha proporcionado un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $noticia_id = $_GET['id'];

    // Consulta SQL para obtener los detalles de la noticia
    $sql = $conexion->prepare("SELECT * FROM noticias WHERE id_noticia = ?");
    $sql->bind_param("i", $noticia_id);
    $sql->execute();
    $resultado = $sql->get_result();

    // Verificar si se encontró la noticia
    if ($resultado->num_rows == 1) {
        $noticia = $resultado->fetch_object();
        // Aquí puedes mostrar un formulario de edición con los detalles de la noticia
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
            <link rel="shortcut icon" href="../img/logo.png" />
            <script src="https://kit.fontawesome.com/2df137ad92.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="../css/estilo.css?v=1.13">
            <title>Editar Noticia</title>
        </head>
        <body>
            <h2 class="text-center text-white mt-5">Editar Noticia</h2>
            <form class="formulario1 row d-flex justify-content-center" action="../controller/c_guardar_edicion_noti.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="noticia_id" value="<?php echo $noticia->id_noticia; ?>">
                <div class="col-4 mb-3 text-center">
                    <label class="form-label text-light">Titulo de la noticia</label>
                    <input type="text" class="form-control" name="titulo_not" value="<?php echo $noticia->titulo; ?>">
                </div>
                <div class="col-9 mb-3 text-center">
                    <label for="exampleFormControlTextarea1" class="form-label text-light">Descripcion breve de la noticia</label>
                    <textarea class="form-control" rows="3" name="descripcion_not"><?php echo $noticia->descripcion; ?></textarea>
                </div>
                <div class="col-9 mb-3 text-center">
                    <label class="form-label text-white">Contenido de la noticia</label>
                    <textarea class="form-control" name="contenido_not" rows="3"><?php echo $noticia->contenido; ?></textarea>
                </div>
                <div class="col-6 mb-3 text-center">
                    <label class="form-label text-white">Imagen destacada de la noticia</label>
                    <input type="file" class="form-control" name="foto_not">
                </div>
                <div class="col-6 mb-3 text-center">
                    <label for="name" class="form-label text-white">Fecha y hora de publicación</label>
                    <input type="datetime-local" class="form-control" name="fecha_publicacion_not" id="">
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit" name="btn_actualizar_noticia">Guardar Cambios</button>
                    </div>
                </div>
            </form>

        </body>
        </html>

        <?php
    } else {
        echo "No se encontró la noticia.";
    }
} else {
    echo "ID de noticia no válido.";
}
?>
