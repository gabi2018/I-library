<form method="post" action="<?php echo URL_ROUTE ?>users/store" target="_top">
	<input type="text" name="user-name" placeholder="Nombre"><br>
    <input type="text" name="user-lastname" placeholder="Apellido"><br>
    <input type="text" name="user-address" placeholder="Direccion"><br>
    <input type="text" name="user-phone" placeholder="Telefono"><br>
    <input type="email" name="user-email" placeholder="Email"><br>
    <input type="password" name="user-password" placeholder="Contraseña"><br>
    <select name="user-type"  >
        <option value="" selected disabled>Seleccionar tipo</option>
        <?php 
            $usertypes = $param['usertypes']; 
            foreach ($usertypes as $usertype)  :
                echo '<option value="' . $usertype->user_type_id .'">'. $usertype->user_type_desc .'</option> ';
            endforeach;
        ?>
    </select><br>
	<button type="submit" name="user-register">Guardar</button>
</form> 