<?php
include "../Model/conexion_bd.php";

// Verificar si se ha proporcionado un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $admin_id = $_GET['id'];

    // Consulta SQL para obtener los detalles de la noticia
    $sql = $conexion->prepare("SELECT * FROM administrador WHERE id = ?");
    $sql->bind_param("i", $admin_id);
    $sql->execute();
    $resultado = $sql->get_result();

    // Verificar si se encontró la noticia
    if ($resultado->num_rows == 1) {
        $admin = $resultado->fetch_object();
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
            <h2 class="text-center text-white mt-5">Editar Administrador</h2>
            <form class="formulario1 row d-flex justify-content-center text-white" action="../controller/c_guardar_edicion_admin.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="admin_id" value="<?php echo $admin->id; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nombre/s</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Juan" name="nombre_admin" value="<?php echo $admin->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Apellido/s</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Perez" name="apellido_admin" value="<?php echo $admin->apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nombre@ejemplo.com" name="email_admin" value="<?php echo $admin->email; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Telefono</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="3421234567" name="telefono_admin" value="<?php echo $admin->telefono; ?>">
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tipo de administrador</label>
                        <select class="form-select" aria-label="Default select example" name="tipo_admin">
                            <option selected>Seleccione una opcion</option>
                            <option value="1">Administrador General (tiene acceso completo a todas las funciones y características de la página)</option>
                            <option value="2">Moderador de Contenido (se enfoca principalmente en la gestión de contenido y la interacción con los usuarios)</option>
                        </select>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary" name="btnagregaradmin" value="ok">Guardar</button>
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
