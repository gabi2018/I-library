<table>
	<tr>
		<th>isbn</th>
        <th>titulo</th>
        <th>descrimpcion</th>
        <th>volumen</th>
        <th>numero de registro</th>  
        <th>año publicacion</th>
		<th>numero de paginas</th>
		<th>edicion  </th>
		<th>copia unica  </th>
		<th>idioma  </th>
		<th>editorial  </th>
		<th>tema  </th>
		<th> subtema  </th>
		<th>categoria  </th>
		<th>ahutor  </th>
		<th>tipo de authores  </th>
		<th>catalogo  </th>
	</tr>
	<?php 
		$books = $param['books'];
		foreach ($books as $book) :
	?>
	<tr>
		<td><?php echo $book->book_isbn; ?></td>

       <td><?php echo $book->book_title; ?></td>
       <td><?php echo $book->book_desc; ?></td>
       <td><?php echo $book->book_vol; ?></td>
       <td><?php echo $book->book_register; ?></td>
       <td><?php echo $book->book_year; ?></td>
       <td><?php echo $book->book_num_pages; ?></td>
       <td><?php echo $book->book_edition; ?></td>
       <td><?php echo $book->languaje_desc; ?></td>
        <td><?php echo $book->editorial_name; ?></td>
         <td><?php echo $book->topic_name; ?></td>
		<td><a href="<?php echo URL_ROUTE ?>books/edit/<?php echo $book->book_isbn ?>">Edit</a></td>
==
	</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL_ROUTE ?>books/create">Agregar nuevo usuario</a>