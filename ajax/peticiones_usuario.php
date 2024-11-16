<?php 

    require_once('../controller/usuarioController.php');

    
    
    $accion = $_GET['accion'] ?? $_POST['accion'];
    $usuario  = new usuarioController();

    switch ($accion) {
        case '1':
            $respuesta = $usuario->listarUsuarios();
            echo json_encode($respuesta);
        break;
        
        default:
            # code...
            break;
    }