<?php require_once('./config/config.php') ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="./public/css/style.css">
        <title><?php echo APP_NAME; ?></title>
    </head>

    <body class="container">
        
        <div class="titulo text-center">
            <h1>Crud con data table</h1>
        </div>

        <div class="main">
            <section class="btnModal">
                <div class="row">
                    <div class="col-md-12">
                        <div class=" d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistro">Registro <i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="tabla mt-5">
                <div class="table-responsive">
                    <table class="table table-bodered table-striped" id="datosUsuario">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Fecha Crecion</th>
                                <th>Imagen</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </section>
        </div>


        <!--*************** MODAL REGISTRO ***************-->
        <div class="modal fade" id="modalRegistro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h2 class="modal-title" id="staticBackdropLabel">Registro</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="content-formulario">
                            <form action="" id="formulario" enctype="multipart/form-data">
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control">
                                    </div>
                            
                                    <div class="col-md-6">
                                        <label for="apellido" class="form-label">Apellido</label>
                                        <input type="text" name="apellido" id="apellido" class="form-control">
                                    </div>
                                </div>
                            
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="telefono" class="form-label">Telefono</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control">
                                    </div>
                            
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                </div>
                            
                                <div id="contentImagenActual" class="mt-3">
                                    <img id="imagenShow" src="" alt="" width="130px" height="100px">
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="imagen" class="form-label">Imagen</label>
                                        <input type="file" name="imagen" id="imagen" class="form-control">
                                        <span id="img-subida"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="limpiarFormulario()">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="registrar">Registrar</button>
                        <button type="button" class="btn btn-primary" id="editar">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

    </body>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="./public/js/app.js"></script>


</html>