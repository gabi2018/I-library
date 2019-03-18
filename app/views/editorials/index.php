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
							<th>id</th>
							<th>nombre</th>
							
					</tr>		

				</thead>
		
						<tbody>
							<?php
							$editoriales = $param ['editorial']; 
							 foreach ($editoriales as $editorial):?>
									
							<tr>
							<td><?php echo $editorial ->editorial_id ;?></td>
							<td><?php echo $editorial ->editorial_name; ?></td>
							
							<td><a href=" <?php echo URL_ROUTE ?>editorials/index<?php echo  $editorial ->editorial_id ;?>"></a>
									<td><a href="<?php echo URL_ROUTE ?>editorials/edit/<?php echo $editorial->editorial_id ?>">Edit</a></td></td>
							<tr/>
							<?php endforeach ;?>
						</tbody>
				</table>

				<a href="<?php echo URL_ROUTE;  ?>editorials/create">crear</a>
		</html>