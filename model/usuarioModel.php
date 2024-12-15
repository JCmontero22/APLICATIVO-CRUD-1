<?php 

    require_once('../core/conexion.php'); 

    class usuarioModel extends conexion 
    {
        protected function getAll_ListarUsuarios() {
            $query = "SELECT * FROM usuarios_crud_php WHERE estado_usuario = 1";
            $resultado = $this->select($query);
            return $resultado;
        }

        protected function insert_Usuarios($data) {
            $query = "INSERT INTO usuarios_crud_php (nombre_usuario, apellido_usuario, imagen_usuario, telefono_usuario, email_usuario, fecha_creacion_usuario) VALUES ('".$data['nombre']."', '".$data['apellido']."', '".$data['imagen']."', '".$data['telefono']."', '".$data['email']."',  now())";
            $respusta = $this->execute($query);
            return $respusta;
        }

        protected function set_updateUsuario($data){
            if ($data['imagen'] != '') {
                $query = "UPDATE usuarios_crud_php SET nombre_usuario = '".$data['nombre']."', apellido_usuario = '".$data['apellido']."', imagen_usuario = '".$data['imagen']."', telefono_usuario = '".$data['telefono']."', email_usuario = '".$data['email']."' WHERE id_usuario = " . $data['id'];
            }else{
                $query = "UPDATE usuarios_crud_php SET nombre_usuario = '".$data['nombre']."', apellido_usuario = '".$data['apellido']."', telefono_usuario = '".$data['telefono']."', email_usuario = '".$data['email']."' WHERE id_usuario = " . $data['id'];
            }
            
            $respusta = $this->execute($query);
            return $respusta;
        }

        protected function set_eliminarUsuario($id){
            $query = "UPDATE usuarios_crud_php SET estado_usuario = 0 WHERE id_usuario = " . $id;
            $respusta = $this->execute($query);
            return $respusta;
        }

    }
    