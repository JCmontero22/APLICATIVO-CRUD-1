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

            } catch (\Exception $e) {
                $respuesta['status'] = false;
                $respuesta['mensaje'] = $e->getMessage();
                $respuesta['datos'] = '';
            }

            return $respuesta;

            
        }

        public function registrarUsuario($data, $imagen){
            $respuesta = [];

            $data['imagen'] = subirImagen();
            
            

            try {
                $resultado = $this->insert_Usuarios($data);
                if ($resultado > 0) {

                    $respuesta['status'] = true;
                    $respuesta['mensaje'] = "Usuarios registrado con exito";
                    
                }
            } catch (\Exception $e) {
                $respuesta['status'] = false;
                $respuesta['mensaje'] = "Error al registrar el usaurio " . $e->getMessage();
            }
        }

public function editarUsuarios($data) {
    $respuesta = [];
    try {
        if ($_FILES['imagen']['name'] != "" || !empty($_FILES['imagen']['name'] != "")) { 
            var_dump('entro');die();
            $data['imagen'] = subirImagen(); 
        }else{
            $data['imagen'] = '';
        }

        $this->set_updateUsuario($data);

        $respuesta['status'] = true;
        $respuesta['mensaje'] = "Se actualizo el usuario correctamente";
        $respuesta['datos'] = '';
        
    } catch (\Exception $e) {
        $respuesta['status'] = false;
        $respuesta['mensaje'] = "No se realizo la actualizacion";
        $respuesta['datos'] = $e->getMessage();
    }

    return $respuesta;
        }

    }
     