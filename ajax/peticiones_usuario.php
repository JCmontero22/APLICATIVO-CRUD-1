<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    require_once('../controller/usuarioController.php');

    
    $accion = $_GET['accion'] ?? $_POST['accion'];
    $usuario  = new usuarioController();

    switch ($accion) {
        case '1':
            $respuesta = $usuario->listarUsuarios();
            echo json_encode($respuesta);
        break;

        case '2':
            $respuesta = $usuario->registrarUsuario($_POST, $_FILES);
            echo json_encode($respuesta);
        break;
        
        default:
            # code...
            break;
    }