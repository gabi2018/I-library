<?php $languaje =  $param['languaje']; ?>
<form method="post" action="<?php echo URL_ROUTE ?>languajes/update" target="_top">
	<input type="text" name="languaje_desc" placeholder="Nombre del idioma" value="<?php echo $languaje->languaje_desc; ?>">
	<input type="hidden" name="languaje-id" value="<?php echo $languaje->languaje_id; ?>">
	<button type="submit" name="languaje-update">Guardar</button>
</form>