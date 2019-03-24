<?php $subjets =  $param['subjet']; ?>
<form method="post" action="<?php echo URL_ROUTE ?>Subjets/update" target="_top">
	<input type="text" name="subjet-code" placeholder="codigo de materia" value="<?php echo $subjets->subjet_id; ?>">
	<input type="text" name="subjet-name" placeholder="nombre materia" value="<?php echo $subjets->subjet_name; ?>">
	<input type="hidden" name="subjet-code" value="<?php echo $subjets->subjet_id; ?>">
	<button type="submit" name="subjet-update">Guardar</button>
</form>
