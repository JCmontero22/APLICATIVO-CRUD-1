<?php 

    require_once('../core/conexion.php'); 

    class usuarioModel extends conexion 
    {
        protected function getAll_ListarUsuarios() {
            
            $query = "SELECT * FROM usuarios";
            $resultado = $this->select($query);
            
            return $resultado;
        }

        protected function insert_Usuarios($data) {
            
            $query = "INSERT INTO usuarios (nombre_usuario, apellido_usuario, imagen_usuario, telefono_usuario, email_usuario, fecha_creacion_usuario) VALUES ('".$data['nombre']."', '".$data['apellido']."', '".$data['imagen']."', '".$data['telefono']."', '".$data['email']."',  now())";
            $respusta = $this->execute($query);
            return $respusta;
        }


    }
    