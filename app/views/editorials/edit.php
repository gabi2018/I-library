<?php $editorial =  $param['editorial']; ?>
<form method="post" action="<?php echo URL_ROUTE ?>editorials/update" target="_top">
	<input type="text" name="editorial-name" placeholder="Nombre de la editorial" value="<?php echo $editorial->editorial_name; ?>">

	<input type="text" name="editorial-address" placeholder="direccion de la editorial" value="<?php echo $editorial->editorial_fiscal_address; ?>">
	
	<input type="hidden" name="editorial-id" value="<?php echo $editorial->editorial_id; ?>">
	<button type="submit" name="editorial-update">Guardar</button>
</form>
