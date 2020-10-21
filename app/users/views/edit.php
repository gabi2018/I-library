<div class="col-10 mt-2">
    <h4 class="mb-3">Edit User</h4>
    <?php $users =  $param['users']; ?>
    <form method="post" action="<?php echo URL_ROUTE ?>users" target="_top">
        <div class="row">
             <div class="form-group col-6">
                <label for="phone-user">Teléfono</label>
                <input type="number" name="user-phone" id="phone-user" class="form-control" placeholder="Ingresar número de teléfono" value="<?php echo $users->user_phone;?>" require> 
            </div> 
            <div class="form-group col-6">
                <label for="address-user">Dirección</label>
                <input type="text" name="user-address" class="form-control" id="address-user" required placeholder="Ingresar dirección" value="<?php echo $users->user_address;?>" require> 
            </div>  
            <div class="col-6">
                <div class="form-group">
                    <label for="email-user">Email</label>
                    <input type="email" name="user-email" id="email-user" class="form-control" placeholder="Ingresar dirección de email" value="<?php echo $users->user_email;?>" require> 
                </div> 
            </div>  
            <div class="form-group col-6">
                <label for="doc-user"></label>
                <input type="hidden" name="user-dni" id="doc-user" class="form-control" value="<?php echo $users->user_dni?>"> 
            </div>  
 
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary" name="user-update">Guardar</button>
        </div>  
    </form> 
</div> 