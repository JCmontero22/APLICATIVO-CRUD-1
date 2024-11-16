<?php 

    require_once('./core/conexion.php');

    function subirImagen() {
        if (isset($_FILES['imagen'])) {
            $extencion = explode('.', $_FILES['imagen']['name']);
            $nuevoNombre = rand() . '.' . $extencion;
            $ubicacion = '../../public/img/imga_usuarios' . $nuevoNombre;
            move_uploaded_file($_FILES['img']['tmp_name'], $ubicacion);

            return $nuevoNombre;
        }
    }

    /* function obtenerNombreImg($idUsuario) {
        $dbConect = new conexion();
        $query = "SELECT imagen_usuario FROM usuarios WHERE id_usuario = " . $idUsuario;
        return $dbConect->select($query);
    } */