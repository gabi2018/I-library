
<?php $book =  $param['book']; 
       $authors= $param['author'];
       $CaSuTe=$param['category'];
       $cantidad=$param['cantidad-ejemplares'];
        ?>
<div class="media mt-5"> 
    <img class="mr-3" src="<?php echo URL_ROUTE?>media/images/book/<?php echo $book->book_img?>" alt="TITULO_DE_LIBRO">
    <div class="media-body">
        <h4 class="mt-0"><?php echo $book->book_title?><a href="<?php echo URL_ROUTE?>books/edit/<?php echo $book->book_topolographic?>" class="align-right material-icons">edit</a></h4>
        <p>AUTHORES</p>
        <?php  
            foreach ($authors as $author) :?>
            <p><a href=""><?php echo   $author->author_type_identifier.": ".$author->author_name."  ".$author->author_lastname?></a></p>
            <?php endforeach; ?>
        <p>EDITORIAL:<a href=""><?php echo $book->editorial_name?></a></p>

        <p>LENGUAJE:<?php echo $book->languaje_desc?> </p> 

        <p>isbn:<?php echo " ".$book->book_isbn ." volumen: ".$book->book_vol ." año puublicacion: ".$book->book_year ."  edicion:". $book->book_edition ." numero de paginas: ". $book->book_num_pages ?></p>
       
        <p>codigo catalografico: <?php echo "  ".$book->book_catalographic." codigo topolografico:".$book->book_topolographic?> </p>

        <p>tema:  <?php echo" ".$CaSuTe->topic_name." "?> subtema  <?php echo" ".$CaSuTe->subtopic_name?></p>

        <p>categoria <?php echo" ".$CaSuTe->category_name." cdu:". $CaSuTe->category_cod ?> </p>
        <p>cantidad en la biblioteca <?php echo$cantidad->book_cantidad ?> </p>
       
        <p style="color:#60EB07"><?php echo " ". $book->book_status_desc?></p>

       <p><?php echo "Sintesis descriptiva: ".$book->book_desc?>
    </div>  
</div>