<div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <h1 class="text-info">Envio de Correos</h1>
            </div>
            <div class="mt-2">
                <h4 class="text-success d-flex justify-content-center p-1">Lista de correos</h4>
                
                    <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="d-flex d-flex-row justify-content-center">
                            <label for="email" class="h6 text-dark">Importar CSV</label>
                        </div>
                        <p class="text-center"><small>el csv con el encabezado del archivo "correo", "nombre"</small></p>
                        <div class="d-flex d-flex-row justify-content-center mt-2">
                            <input type="file" name="csv_imp" id="csv_imp" accept=".csv">
                        </div>
                    </div>
                    </form>
                
                <form action="" method="post">
                    <div class="form-group">
                        <div class="overflow-auto inp-datos">
                            <div class="d-flex d-flex-row justify-content-center">
                                <div class="p-3">
                                    <label for="email" class="h6 text-dark">Correo</label>
                                    <input type="email" class="form-control correos" name="correos[]">
                                </div>
                                <div class="p-3">
                                    <label for="nombre" class="h6 text-dark">Nombre</label>
                                    <input type="text" class="form-control nombre" name="nombre[]">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <button type="button" id="add_data" class="btn btn-secondary align-self-center">Agregar Correo</button>
                        </div>
                    </div>
                    <div class="form-group col-md-4 offset-md-4 col-sm-4 offset-sm-4 mt-2">
                        <label for="asunto" class="h4 text-success d-flex justify-content-center p-1">Asunto</label>
                        <input type="text" class="form-control text-center" name="asunto" id="asunto" placeholder="Asunto de Correo {{ nombre receptor }}" required>
                    </div>
                    <div class="form-group col-md-4 offset-md-4 col-sm-4 offset-sm-4 mt-2">
                        <label for="mensaje" class="h4 text-success d-flex justify-content-center p-1">Mensaje</label>
                        <textarea class="form-control text-center" name="mensaje" id="mensaje" rows="8" placeholder="Agregar Mensaje" required></textarea>
                    </div>
                    <div class="form-group d-flex justify-content-center mt-4 send">
                        <button type="submit" id="sendemail" class="btn btn-outline-info">Enviar Correos</button>
                    </div>
                    
                </form>
            </div>
            
        </div>
    </div>