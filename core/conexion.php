<?php 
    require_once('../config/dataBase.php');


    class conexion 
    {
        protected $db;

        public function __construct() {
            $this->db = $this->connect();
            if (!$this->db || is_string($this->db)) {
                die("Error crítico: La conexión a la base de datos no es válida.");
            }
        }

        protected function connect() {
            try {
                $conectar =  new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
                return $conectar;
            } catch (\Exception $e) {
                return "Error de conexion a la BD" . $e->getMessage();
                die();
            }
        }

        public function select($query) {
            $sql = $this->db->prepare($query);
            $sql->execute();
            
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function execute($query) {
            $sql = $this->db->prepare($query);
            $sql->execute();

            return $sql->rowCount();

        }
    }
    