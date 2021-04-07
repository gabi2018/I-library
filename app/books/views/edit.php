<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="col-10 mt-2">

<?php $book =  $param['book']; 
       $authors= $param['author'];
       $CaSuTe=$param['category'];
       $cantidad=$param['cantidad-ejemplares'];
        ?>
    <h4 class="mb-3">Editar  datos del libro</h4>
    <form method="post" action="<?php echo URL_ROUTE ?>Books/update" target="_top" enctype="multipart/form-data">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="book-tab" data-toggle="tab" href="#nav-book" role="tab">Datos del libro</a>
                <a class="nav-item nav-link" id="author-tab" data-toggle="tab" href="#nav-author">Datos de autor</<a>
                <a class="nav-item nav-link" id="editorial-tab" data-toggle="tab" href="#nav-editorial" role="tab">Datos de edición</a>
            </div>
        </nav>
        <div class="tab-content mt-3" id="nav-tabContent">
            <!-- Datos del Libro -->
            <div class="tab-pane fade show active" id="nav-book" role="tabpanel"> 
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="title-book">Título</label>
                            <input type="text" name="book-title" class="form-control" id="title-book" required  maxlength ="100"value="<?php echo $book->book_title?>"> 
                        </div> 
                        <div class="form-group">
                            <label for="isbn-book">ISBN</label>
                            <input type="text" name="book-isbn" class="form-control justNumbers" id="isbn-book" maxlength ="13" required value="<?php echo $book->book_isbn?>" > 
                            <input type="hidden" name="book-isbn-viejo" class="form-control"  required value="<?php echo $book->book_isbn?>"> 
                            <input type="hidden" name="book-id" class="form-control"  required value="<?php echo $book->book_id?>"> 
                            <div class="invalid-feedback">Número ISBN no valido</div>
                        
                        </div> 
                        <div class="form-group">
                            <label for="pages-book">Cantidad de páginas</label>
                            <input type="text" name="book-pages" class="form-control justNumbers" maxlength ="6" id="pages-book" required value="<?php echo $book->book_num_pages?>" > 
                            <div class="invalid-feedback">Número de paginas no valido</div>
                        </div> 
                    </div> 
                    <div class="col-3">
                        <div class="form-group">
                            <img for="cover-img" class="justify-content-end" id="cover-preview"  src="<?php echo URL_ROUTE;?>media/images/book/<?php echo $book->book_img?>"> 
                        
                            <input name="book-img" type="file" class="form-control-file"  accept="image/*" id="cover-img">
                            <input name='ext-vieja' id='img-vieja' type='hidden' value='<?php echo $book->book_img?>'>
                            
                        </div>
                    </div>
                </div>       <div class="row">
                    <div class="form-group col-6">
                        <label for="year-book">Año de publicación</label>
                        <input  type="text" name="book-year"  maxlength ="4" id="year-book" class="form-control justNumbers" value="<?php echo $book->book_year?>"> 
                        <div class="invalid-feedback">año no valido</div>
                    </div>  
                    <div class="form-group col-6">
                        <label for="vol-book">Volumen</label>
                        <input type="text" name="book-vol" id="vol-book" maxlength ="5"class="form-control justNumbers" value="<?php echo $book->book_vol?>"> 
                        <div class="invalid-feedback">Número de volumen no valido</div>
                    </div> 
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="languaje-book">Idioma</label>
                        <select name="book-languaje"  class="form-control" id="languaje-book" required>	
                            <option  value ='<?php echo$book->languaje_id?>'><?php echo$book->languaje_desc?> <option>
                            <?php 
                                 foreach ($param["languajes"] as $key => $value) {
                                    echo "<option value='$key'>$value</option>";
                                 }                          
                            ?>
                        </select>
                    </div> 
                  
                    <div class="col-6 form-group" id="cantEjemplar" style="display">
                        <label for="cant-book">Cantidad de ejemplares</label>
                <input type="num" name="book-cantidad"   id="cant-book"value="<?php echo$cantidad->book_cantidad?>" class="form-control"  >
                <input name='book-cantidad-vieja' type='hidden' value='<?php echo $cantidad->book_cantidad?>'>
                <div class="invalid-feedback">Número de ejemplares no valido</div>
                
                    </div>
                </div>                                  
                <div class="form-group">
                    <label for="desc-book">Descripción</label>
                    <textarea class="form-control" name="book-desc" id="desc-book" rows="3" required  value ='<?php echo$book->book_desc?>'><?php echo$book->book_desc?></textarea> 
                </div>   
            </div>
            <!-- Datos de Autor -->
            <div class="tab-pane fade" id="nav-author" role="tabpanel">      
                <div class="form-group">
                    <label for="autor-add">Autor</label>
                    <input type="hidden"  id="selected-author" value=''>
                    <div class="container-select">
                        <div class="selected-s" id="select-author">Seleccionar autor</div>
                        <div class="container-options" id="container-author">
                            <input type="text" id="search-author" class="form-control search"  placeholder="Buscar autor" data-url="<?php echo URL_ROUTE?>authors/search">
                            <ul class="options" id="options-author"></ul>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="autor-type">Tipo de autor</label>
                    <select name="select-tipo-autors" id="author-type" class="form-control" required>
                        <option value="none" disabled selected>Seleccionar tipo de autor</option>
                        <?php 
                            foreach ($param["authortypes"] as $key => $value) {
                                echo "<option value='$key'>$value</option>";
                            }                          
                            ?>  
                    </select>
                </div>  
                <div class="form-group text-center">
                    <a href="javascript:void(0)" id="add-autor" class="btn btn-link btn-author" data-cutter="<?php echo URL_ROUTE?>"><span class="material-icons">how_to_reg</span>Confirmar</a>    
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#create-autor" class="btn btn-link btn-author"><span class="material-icons">person_add</span>Registrar Profesional</a>
                </div> 
                <div class=" ">
                    <table id="list-authors" class="table table-striped">
                        <thead class="thead-dark">
                            <tr> 
                                <th scope="col">Profesional</th>
                                <th scope="col">Tipo de Profesional</th>
                                <th scope="col">Quitar</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                                    <?php foreach ($authors as $author) :?>
                        <tr id="<?php echo$author->author_id."_".$author->author_type_id?>" ><td>   <?php echo $author->author_name." ".$author->author_lastname ?></td> 
                        <td><?php echo$author->author_type_identifier?></td> 
                        <td>
                        <a href="javascript:void(0)" class="delautor material-icons" id="<?php echo  $author->author_id.".".$author->author_type_id?>" data-url="<?php echo URL_ROUTE?>authorshasbooks/delete/<?php echo $book->book_id;?>">clear</a>
                        </td>
                            </tr>    
                                <?php endforeach; ?>
                        
                        </tbody>
                    </table> 
                </div>
                <div class="form-group"> 
                                        
                    <select multiple name="author-list[]" id="list-author" style="display:none">
                    <?php foreach ($authors as $author) :?>
                    <option value="<?php echo$author->author_id."_".$author->author_type_id?>" id="<?php echo  $author->author_id."_".$author->author_type_id?>" selected></option>
                    <?php endforeach; ?>
                    </select>
                </div> 	
            </div>
            <!-- Datos de Edición -->
            <div class="tab-pane fade" id="nav-editorial" role="tabpanel">
                <div class="row">
                    <div class="form-group col-11">de
                        <label for="editorial-add">Editorial</label>
                        <input type="hidden" id="selected-editorial">
                        <div class="container-select">
                            <div class="selected-s" id="select-editorial"><?php echo $book->editorial_name?></div>
                            <div class="container-options" id="container-editorial">
                                <input type="text" id="search-editorial" name="book-editorial" class="form-control search"   data-url="<?php echo URL_ROUTE?>/editorials/search">
                                <ul class="options" id="options-editorial"></ul>
                                <input seleted type="hidden" value="<?php echo $book->editorial_id?>" name="editorial-id">
                            </div>
                        </div>
                        <div id="resutl-editorial"></div>
                    </div> 
                    <div class="form-group col-1">
                        <a href="javascript:void(0);" class="material-icons mt-4 btn btn-outline-info btn-circle" data-toggle="modal" id="add-new-editorial" data-target="#create-editorial" data-toggle="tooltip" data-placement="bottom" title="Agregar nueva editorial">add</a>
                    </div>
                </div> 
                <div class="row">
                    <div class="form-group col-6">
                        <label for="topic-book">Tema</label>
                        <select name="book-topic" class="form-control" id="topic-book" data-url="<?php echo URL_ROUTE?>subtopics/show" >	
                            <option  value ='<?php echo$CaSuTe->topic_cdu?>'selected ><?php echo$CaSuTe->topic_name?></option>
                            <?php 
                                foreach ($param["topics"] as $key => $value) {
                                echo "<option value='$key'>$value</option>";
                                }                          
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="subtopic-book">Sub-tema</label>
                        <select name="book-subtopic"  class="form-control" id="subtopic-book" data-url="<?php echo URL_ROUTE?>categories/show">	
                            <option   value ='<?php echo$CaSuTe->subtopic_id?>' selected ><?php echo$CaSuTe->subtopic_name?></option> 
                        </select>
                        <div class="result"></div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="form-group col-6">
                        <label for="category-book">Categoria</label>
                        <select name="category-topic" class="form-control" id="category-book" >	 
                            <option  selected value ='<?php echo$CaSuTe->category_id?>'><?php echo$CaSuTe->category_name?></option>
                             
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="edition-book">Edición</label>
                        <input type="text" name="book-edition" id="edition-book" class="form-control" value="<?php echo$book->book_edition?>"> 
                    </div>  
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="topo-book">Código topolografico</label>
                        <input type="text" name="book-topo" class="form-control"  id="topo-book"  disabled value="<?php echo $book->book_topolographic?>" required  placeholder="Generación automática"> 
                    </div>
                    <div class="form-group col-6">
                        <label for="cata-book">Código catalografico</label>
                        <input type="text" name="book-cata" class="form-control" id="cata-book" disableds value="<?php echo $book->book_catalographic?>" required placeholder="Generacion automática"> 
                    </div>
                </div> 
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary" id="submit" name="book-update">Guardar datos</button>
            </div>
        </div> 
    </form> 
</div>
<?php
    require_once APP_ROUTE . '/authors/views/create.php'; 
    require_once APP_ROUTE . '/editorials/views/create.php'; 

?>
<script type="text/javascript" src="<?php echo URL_ROUTE;?>js/book.js"></script>