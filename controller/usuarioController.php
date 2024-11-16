<?php 

    require_once('../model/usuarioModel.php');
    require_once('../core/helpers/funciones.php');

    class usuarioController extends usuarioModel
    {

        public function listarUsuarios() {
            $respuesta = [];

            try {
                $resultadoUsuarios = $this->getAll_ListarUsuarios();

                for ($i=0; $i < count($resultadoUsuarios); $i++) { 
                    $data[] = [
                        "id"            => $resultadoUsuarios[$i]['id_usuario'],
                        "nombre"        => $resultadoUsuarios[$i]['nombre_usuario'],
                        "apellido"      => $resultadoUsuarios[$i]['apellido_usuario'],
                        "telefono"      => $resultadoUsuarios[$i]['telefono_usuario'],
                        "email"         => $resultadoUsuarios[$i]['email_usuario'],
                        "fechaCreacion" => $resultadoUsuarios[$i]['fecha_creacion_usuario'],
                        "imagen"        => $resultadoUsuarios[$i]['imagen_usuario'],
                    ];
                }
            
                
                $respuesta['status'] = true;
                $respuesta['mensaje'] = "Consulta realizada con exito";
                $respuesta['data'] = $data;

                return $respuesta;    
            } catch (\Exception $e) {
                $respuesta['status'] = false;
                $respuesta['mensaje'] = $e->getMessage();
                $respuesta['datos'] = '';

                return $respuesta;
            }

            
        }

        public function registrarUsuario($data, $imagen){
            $data['imagen'] = subirImagen();
            
            try {
                $resultado = $this->insert_Usuarios($data);
                var_dump($resultado);die();
            } catch (\Throwable $th) {
                //throw $th;
            }

        }

    }
     