<div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <h1 class="text-info">Configuracion SMTP</h1>
            </div>
            <div class="mt-2">
                <form method="post">
                    <div class="form-group col-md-4 offset-4">
                        <label for="host" class="h4 text-success d-flex justify-content-center p-1">Host</label>
                        <input type="text" name="host" id="host" class="form-control" value="<?php if(isset($config[0]['host'])){ echo $config[0]['host']; } ?>" placeholder="Introduce el host del correo" required>
                    </div>
                    <div class="form-group col-md-4 offset-4 mt-3">
                        <label for="correo" class="h4 text-success d-flex justify-content-center p-1">Correo</label>
                        <input type="email" name="correo" id="correo" class="form-control" value="<?php if(isset($config[0]['username'])){ echo $config[0]['username']; } ?>" placeholder="Introduce el correo de donde se envian" required>
                    </div>
                    <div class="form-group col-md-4 offset-4 mt-3">
                        <label for="pwd" class="h4 text-success d-flex justify-content-center p-1">Contraseña</label>
                        <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Contraseña del correo" required>
                    </div>
                    <div class="form-group col-md-4 offset-4 mt-3">
                        <label for="puerto" class="h4 text-success d-flex justify-content-center p-1">Puerto</label>
                        <input type="number" name="puerto" id="puerto" class="form-control" value="<?php if(isset($config[0]['puerto'])){ echo $config[0]['puerto']; } ?>" placeholder="Puerto SMTP" required>
                    </div>
                    <div class="form-group d-flex justify-content-center mt-4">
                        <button type="submit" id="guardar_config" class="btn btn-outline-info">Guardar Configuracion</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>