<?php $school =  $param['school']; ?>
<form method="post" action="<?php echo URL_ROUTE ?>schools/update" target="_top">
	<input type="text" name="school_name" placeholder="Nombre de  la escuela" value="<?php echo $school->school_name; ?>">
	<input type="hidden" name="school-id" value="<?php echo $school->school_id; ?>">
	<button type="submit" name="school-update">Guardar</button>
</form>