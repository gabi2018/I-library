<?php $sector =  $param['sector']; ?>
<form method="post" action="<?php echo URL_ROUTE ?>sectors/update" target="_top">
	<input type="text" name="sector-name" placeholder="Nombre del sector" value="<?php echo $sector->sector_desc; ?>">
	<input type="hidden" name="sector-id" value="<?php echo $sector->sector_id; ?>">
	<button type="submit" name="sector-update">Guardar</button>
</form>
