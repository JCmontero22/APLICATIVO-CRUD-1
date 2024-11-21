var listUsuarios;

function init() {
    listarUsuarios();
    limpiarFormulario();
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
                listUsuarios = response.data;
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
                return `<img src="./public/img/img_usuarios/${row.imagen}" alt="Imagen" width="80" height="50">`;
            }},
            {data: null,
                render: function(data, type, row) {
                    return `
                        <button class="btn btn-primary btn-sm" onclick="editarRegistro(${row.id})"> <i class="fas fa-pen"></i> </button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarRegistro(${row.id})"><i class="fas fa-trash"></i></button>
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
    if (validado != false) {
        $.ajax({
            method: "POST",
            url: "./ajax/peticiones_usuario.php",
            data: validado,
            processData: false, 
            contentType: false,
            success: function(response) {
                console.log(response);
                
                if (response.status == true) {
                    Swal.fire({
                        icon: "success",
                        title: "Registrado",
                        text: "El registro se realizo con exito",
                      });

                      limpiarFormulario();

                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Error al registrar el nuevo usuario",
                      });
                }
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

function editarRegistro(id) {

    listUsuarios.forEach(element => {
        if (element.id == id) {
            $("#modalRegistro").modal('show');
            $("#registrar").hide();
            $("#editar").show();

            $("#nombre").val(element.nombre);
            $("#apellido").val(element.apellido);
            $("#telefono").val(element.telefono);
            $("#email").val(element.email);

            if (element.imagen != '') {
                $("#contentImagenActual").show();
                $("#imagenShow").attr('src', './public/img/img_usuarios/'+element.imagen);
            }

        }

    });

    /* const tabla = $('#datosUsuario').DataTable();

    // Busca la fila en la tabla por ID
    const fila = tabla.rows().data().toArray().find(item => item.id === id);

    if (fila) {
        console.log(fila); // Verifica que los datos de la fila se obtuvieron correctamente
        alert(`Editar registro: ${fila.nombre} ${fila.apellido}`);
        // Aquí puedes usar los datos de la fila, por ejemplo, abrir un modal o redirigir
    } else {
        console.error(`No se encontró el registro con ID: ${id}`);
    } */
    
}

function eliminarRegistro(id) {
    console.log(id);
}

function limpiarFormulario() {
    $("#formulario")[0].reset();
    $("#contentImagenActual").hide();
    $("#editar").hide();
    $("#registrar").show();
}

init();