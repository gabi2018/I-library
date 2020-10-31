<?php 
		$books= $param['books'];
		foreach ($books as $book) :
?>

<tr>
<div class="card book-list col-2 mr-3 mb-3">


    <a href="<?php echo URL_ROUTE?>books/read id ">
        <img class="card-img-top" src="<?php echo URL_ROUTE?>media/images/book/<?php echo $book->book_img ?>"  style="width:100%">
        <p class=" "> <?php echo $book->book_title ?></p>  
    </a>
    <p><?php echo $book->author_name?></p>
</div>
</tr>

	<?php endforeach; ?>
</table>

