		<!DOCTYPE html>
		<html>
		<head>
			<title></title>
		
		<form action="show_submit" method="post" accept-charset="utf-8">
			
		
			<button type="submit" class="btn btn-primary" name="register">ver EDITORIAL</button>
			
			</form>	

			<table class="table">
				<thead>
					<tr>
							<th>id</tr>
							</th>>nombre</th>
							<th>direccion</th>
					</tr>		

				</thead>
		</head>
		<tbody>
			<?php  foreach ($param['editorial'] as $editoriales )
					# code...
					
			?>
					
			<tr>
			<td><?php echo $editoriales ->editorial_id ;?></td>
			<td><?php echo $editoriales ->editorial_name; ?></td>
			
			<td><?php echo URL_ROUTE  ?></td>
			<tr/>
			<?php endforeach() ;
?>
		</tbody>

		</html>