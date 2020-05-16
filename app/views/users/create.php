<?php require_once APP_ROUTE . '/views/modules/header.php'; ?>
<div class="col-8 mt-3 justify-content-center">
    <h4 class="mt-5 mb-3">Agregar nuevo socio</h4>
    <form method="post" action="<?php echo URL_ROUTE ?>users/store" target="_top"  enctype="multipart/form-data">
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label for="name-user">Nombre</label>
                    <input type="text" name="user-name" class="form-control" id="name-user" required placeholder="Ingresar nombre"> 
                </div> 
                <div class="form-group">
                    <label for="lastname-user">Apellido</label>
                    <input type="text" name="user-lastname" class="form-control" id="lastname-user" required placeholder="Ingresar apellido"> 
                </div> 
                <div class="form-group">
                    <label for="address-user">Dirección</label>
                    <input type="texx" name="user-address" class="form-control" id="address-user" required placeholder="Ingresar dirección"> 
                </div> 
            </div> 
            <div class="col-3">
                <div class="form-group">
                    <label class="justify-content-end" id="user-pic" for="cover-img"></label>
                    <input name="cover-img" type="file" class="form-control-file" id="cover-img">
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="form-group col-6">
                <label for="doc-user">Documento</label>
                <input type="text" name="user-doc" id="doc-user" class="form-control" placeholder="Ingresar número de documento" required onkeyup="copyOnPassword(event);"> 
            </div>  
            <div class="form-group col-6">
                <label for="pass-user">Contraseña</label>
                <input type="password" name="user-pass" id="pass-user" class="form-control" placeholder="Se generará automaticamente una contraseña" disabled> 
            </div> 
        </div>
         <div class="row">
            <div class="form-group col-6">
                <label for="phone-user">Teléfono</label>
                <input type="number" name="phone-doc" id="phone-user" class="form-control" placeholder="Ingresar número de teléfono" required> 
            </div>  
            <div class="form-group col-6">
                <label for="email-user">Email</label>
                <input type="email" name="user-email" id="email-user" class="form-control" placeholder="Ingresar dirección de email"> 
            </div> 
        </div>
        <div class="row">
            <div class="form-group col-6">
                <div class="form-group">
                    <label for="user-school">Escuela</label>
                    <select name="school-user" id="user-school" data-url="<?php echo URL_ROUTE?>careers/show" class="form-control" required>
                        <option value="none" disabled selected>Seleccionar escuela</option> 
                        <?php 
                            foreach ($param["schools"] as $key => $value) {
                                echo "<option value=$value->school_id>$value->school_name</option>";
                            }                          
                            ?>
                    </select>
                </div>  
            </div> 
            <div class="form-group col-6">
                <div class="form-group">
                    <label for="user-career">Carrera</label>
                    <select name="career-user" id="user-career" class="form-control" required disabled>
                        <option value="none" disabled selected>Seleccionar carrera</option> 
                    </select>
                </div>  
            </div> 
        </div>  
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary" name="user-register">Guardar</button>
        </div>  
    </form> 
</div>

<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?>
