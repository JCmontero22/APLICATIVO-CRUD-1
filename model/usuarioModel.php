<?php 

    require_once('../core/conexion.php'); 

    class usuarioModel extends conexion 
    {
        public function getListarUsuarios() {
            
            $query = "SELECT * FROM usuarios";
            $resultado = $this->select($query);
            
            return $resultado;
        }
    }
    