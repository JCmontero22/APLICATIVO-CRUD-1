<?php 

    

    function subirImagen() {
        if (isset($_FILES['imagen'])) {
            $extencion = explode('.', $_FILES['imagen']['name']);
            $nuevoNombre = rand() . '.' . $extencion[1];
            $ubicacion = '../public/img/img_usuarios/' . $nuevoNombre;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $ubicacion);

            return $nuevoNombre;
        }
    }
    
    /* function obtenerNombreImg($idUsuario) {
        $dbConect = new conexion();
        $query = "SELECT imagen_usuario FROM usuarios WHERE id_usuario = " . $idUsuario;
        return $dbConect->select($query);
    } */