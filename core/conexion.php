<?php 
    require_once('../config/dataBase.php');


    class conexion 
    {
        protected $db;


        protected function conexion() {
            try {
                $conectar =  new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
                return $conectar;
            } catch (\Exception $e) {
                return "Error de conexion a la BD" . $e->getMessage();
                die();
            }
        }

        public function select($query) {
            
            $conexion = $this->conexion();
            $sql = $conexion->prepare($query);
            $sql->execute();
            
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    