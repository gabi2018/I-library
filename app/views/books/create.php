<form method="post" action="<?php echo URL_ROUTE ?>books/store" target="_top">
    <input type="number" name="book-isbn" placeholder="ISBN"><br>
	<input type="text" name="book-title" placeholder="titulo"><br>
    <input type="text" name="book-desc" placeholder="Descripcion del libro"><br>
    <input type="number" name="book-vol" placeholder="Volumen"><br>
    <input type="text" name="book-register" placeholder="numero de registro"><br>
    <input type="numero" name="book-year" placeholder="año publicacion"><br>
    <input type="number" name="book-num-pages" placeholder="numero de paginas"><br>
     <input type="number" name="book-edition" placeholder="edicion"><br>
      <input type="text" name="book-edition" placeholder="edicion"><br>


    <select name="book-single-copy"  >
         <option value="1" >si</option>
         <option value="2" >no</option>
         </select><br>

 <select name="languaje"  >
        <option value="" selected disabled>Seleccionar tipo de lenguaje</option>
        <?php 
            $languajes = $param['languajes']; 
            foreach ($languajes as $languaje)  :
                echo '<option value="' . $languaje->laguaje_id .'">'. $languaje->languaje_desc .'</option> ';
            endforeach;
        ?>
        
    </select><br>

 <select name="editorial"  >
        <option value="" selected disabled>Seleccionar tipo de editorial</option>
        <?php 
            $editorials = $param['editorials']; 
            foreach ($editorials as $editorial)  :
                echo '<option value="' . $editorial->editorial_id .'">'. $editorial->editorial_name .'</option> ';
            endforeach;
        ?>
        
    </select><br>

    <select name="topic"  >
        <option value="" selected disabled>Seleccionar tipo de tema</option>
        <?php 
            $topics = $param['topic']; 
            foreach ($topics as $topic)  :
                echo '<option value="' . $topic->topic_cdu .'">'. $topic->topic_name .'</option> ';
            endforeach;
        ?>
        
    </select><br>
	<button type="submit" name="book-register">Guardar</button>
</form> 