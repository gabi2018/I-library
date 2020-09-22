<?php $usertype =  $param['usertype']; ?>
<form method="post" action="<?php echo URL_ROUTE ?>userTypes/update" target="_top">
	<input type="text" name="usertype-name" placeholder="Tipo de usuario" value="<?php echo $usertype->user_type_desc; ?>">
	<input type="hidden" name="usertype-id" value="<?php echo $usertype->user_type_id; ?>">
	<button type="submit" name="usertype-update">Guardar</button>
</form>
