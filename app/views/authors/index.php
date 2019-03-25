<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<form action="show_submit" method="post" accept-charset="utf-8">
			<button type="submit" class="btn btn-primary" name="register">Author</button>	
		</form>	
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<tr>Apellido</tr>		
					</tr>		
				</thead>
				<tbody>
					<?php
					$authors = $param ['author']; 
					foreach ($authors as $author):
					?>		
					<tr>
						<td>
						<?php echo $author-> author_id ;?></td>
						<td>
							<?php echo $author-> author_name; ?>	
						</td>
						<td>
							<?php echo $author-> author_lastname;?>
						</td>
						<td><a href=" <?php echo URL_ROUTE ?>authors/index<?php echo  $author ->author_id ;?>"></a>
						<td><a href="<?php echo URL_ROUTE ?>authors/edit/<?php echo $author->author_id ?>">Edit</a></td></td>
					<tr/>
						<?php endforeach ;?>
				</tbody>
			</table>
			<a href="<?php echo URL_ROUTE;  ?>authors/create">Crear</a>
</html>