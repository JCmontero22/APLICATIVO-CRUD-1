

function init() {
    listarUsuarios();
}

function listarUsuarios() {
    $.ajax({
        'method': 'GET',
        'url': "./ajax/peticiones_usuario.php",
        'data':{'accion': 1},
        'dataType': 'json',
        'success': function(response){
            console.log(response);
        }
        
    });
}

init();