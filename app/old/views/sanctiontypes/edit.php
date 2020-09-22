<?php $sanctiontype =  $param['sanctiontype']; ?>
<form method="post" action="<?php echo URL_ROUTE ?>sanctionTypes/update" target="_top">
	<input type="text" name="sanctiontype-measure" placeholder="Tipo de sancion" value="<?php echo $sanctiontype->sanction_type_measure; ?>">
	<input type="hidden" name="sanctiontype-id" value="<?php echo $sanctiontype->sanction_type_id; ?>">
	<button type="submit" name="sanctiontype-update">Guardar</button>
</form>
