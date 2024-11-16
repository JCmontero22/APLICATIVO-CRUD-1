

function init() {
    listarUsuarios();

    $("#registrar").on('click', function(){
        crearRegistro();
    });
}

function listarUsuarios() {
    $.ajax({
        'method': 'GET',
        'url': "./ajax/peticiones_usuario.php",
        'data':{'accion': 1},
        'dataType': 'json',
        'success': function(response){
            if (response.status == true) {
                cargarDataTable(response.data);
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Error al realizar la consulta, intente mas tarde",
                });
            }
        }
        
    });
}

function cargarDataTable(data) {
    $("#datosUsuario").DataTable({
        destroy: true,
        data: data,
        columns: [
            {data: "id"},
            {data: "nombre"},
            {data: "apellido"},
            {data: "telefono"},
            {data: "email"},
            {data: "fechaCreacion"},
            {data: "imagen",
                render: function(data, type, row) {
                return `<img src="${data}" alt="Imagen" width="50" height="50">`;
            }},
            {data: null,
                render: function(data, type, row) {
                    return `
                        <button class="btn btn-primary btn-sm"> <i class="fas fa-pen"></i> </button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash" onclick="eliminarRegistro(${row.id})"></i></button>
                    `;
                }
            }
        ],
        order: [[0, "asc"]],
        language: {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "No hay datos disponibles en la tabla",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "loadingRecords": "Cargando...",
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
        
    });
}

function crearRegistro() {
   
    let validado = validarDatos();
    console.log(validado);
    
    if (validado != false) {
        $.ajax({
            method: "POST",
            url: "./ajax/peticiones_usuario.php",
            data: validado,
            processData: false, 
            contentType: false,
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.log("Error:", error);
            }
        });    
    }

    
}

function validarDatos() {

    let dataForm = new FormData(document.getElementById('formulario'));

    if (dataForm.get('nombre') == '' || dataForm.get('apellido') == '' || dataForm.get('telefono') == '' || dataForm.get('email') == '') {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Favor llenar los campos obligatorios marcados con *",
        });

        return false;
    }else{

        dataForm.append('accion', 2);
        return dataForm;
    }
}

function eliminarRegistro(id) {
    console.log(id);
    
}

function limpiarFormulario() {
    $("#formulario")[0].reset()
}

init();