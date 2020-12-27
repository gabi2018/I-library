<?php 
	$users = $param['users'];
?>
<div class="col-10 mt-2">
    <h4 class="mb-3">Editar socio</h4>
    <form method="post" action="<?php echo URL_ROUTE ?>users" target="_top"  enctype="multipart/form-data">
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label for="name-user">Nombre</label>
                    <input type="text" name="user-name" class="form-control" id="name-user" required placeholder="Ingresar nombre" value="<?php echo $users->user_name;?>" disabled> 
                </div> 
                <div class="form-group">
                    <label for="lastname-user">Apellido</label>
                    <input type="text" name="user-lastname" class="form-control" id="lastname-user" required placeholder="Ingresar apellido" value="<?php echo $users->user_lastname;?>"  disabled> 
                </div> 
                <div class="form-group">
                    <label for="email-user">Email</label>
                    <input type="email" name="user-email" id="email-user" class="form-control" placeholder="Ingresar dirección de email" value="<?php echo $users->user_email;?>"> 
                </div> 
            </div> 
            <div class="col-3">
                <div class="form-group">
                    <img class="justify-content-end" id="cover-preview" for="cover-img" src="<?php echo URL_ROUTE;?>media/images/system/default-user.png"></label>
                    <input name="user-dni" type="file" class="form-control-file"  accept="image/*" id="cover-img" value="<?php echo $users->user_img;?>"  disabled>
                </div>
            </div>
        </div> 
        <div class="row"> 
            <div class="form-group col-12">
                <label for="address-user">Dirección</label>
                <input type="text" name="user-address" class="form-control" id="address-user" required placeholder="Ingresar dirección" value="<?php echo $users->user_address;?>"> 
            </div> 
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="doc-user">Documento</label>
                <input type="text" name="user-doc" id="doc-user" class="form-control" placeholder="Ingresar número de documento" required onkeyup="copyOnPassword(event); " value="<?php echo $users->user_dni?>" disabled> 
                <input type="hidden" name="user-pass" id="pass-user" class="form-control" placeholder="Se generará automaticamente una contraseña" > 
            </div>   
            <div class="form-group col-6">
                <label for="phone-user">Teléfono</label>
                <input type="number" name="user-phone" id="phone-user" class="form-control" placeholder="Ingresar número de teléfono" value="<?php echo $users->user_phone;?>" required> 
            </div>  
        </div>
        <div class="row">
            <div class="form-group col-6">
                <div class="form-group">
                    <label for="user-school">Escuela</label>
                    <select name="school-user" id="user-school" data-url="<?php echo URL_ROUTE?>careers/show" class="form-control" required disabled>
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
            <button type="submit" class="form-control btn btn-primary" name="user-update">Guardar</button>
        </div>  
    </form> 
</div> 