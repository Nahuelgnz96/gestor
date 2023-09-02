<?php
include "../model/conexion_bd.php";
if (!empty($_GET["id"])) {
        $id=$_GET["id"];
        $sql=$conexion->query(" delete from actividades where id_actividades=$id ");
        if ($sql==1) {
            
            header("location: ../views/gestor.php");
            echo '<div class="alert alert-success">Noticia elimanado correctamente</div>';
        }else {
            echo '<div class="alert alert-warning">Error al eliminar noticia</div>';
        }
    }


?>