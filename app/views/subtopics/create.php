<form method="post" action="<?php echo URL_ROUTE ?>subtopic/store" target="_top">
	<input type="text" name="subtopic-name" placeholder="Nombre del subtema"><br>
    
    <select name="category-name"  >
        <option value="" selected disabled>Seleccionar tipo</option>
        <?php 
            $categories = $param['category']; 
            foreach ($categories as $category)  :
                echo '<option value="' . $category->category_id .'">'. $category->category_name .'</option> ';
            endforeach;
        ?>
    </select><br>
	<button type="submit" name="subtopic-register">Guardar</button>
</form> 