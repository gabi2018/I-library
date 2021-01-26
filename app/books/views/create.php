<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="col-10 mt-2">
    <h4 class="mb-3">Registrar nuevo libro</h4>
    <form method="post" action="<?php echo URL_ROUTE ?>books/store" target="_top" enctype="multipart/form-data">
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
                            <input type="text" name="book-title" class="form-control" id="title-book" required placeholder="Ingresar título del libro"> 
                        </div> 
                        <div class="form-group">
                            <label for="isbn-book">ISBN</label>
                            <input type="text" name="book-isbn" class="form-control" id="isbn-book" required placeholder="XXX-X-XX-XXXXXX-X"> 
                        </div> 
                        <div class="form-group">
                            <label for="pages-book">Cantidad de páginas</label>
                            <input type="number" name="book-pages" class="form-control" id="pages-book" required placeholder="Ingresar cantidad de páginas"> 
                        </div> 
                    </div> 
                    <div class="col-3">
                        <div class="form-group">
                            <img for="cover-img" class="justify-content-end" id="cover-preview" src="<?php echo URL_ROUTE;?>media/images/book/default-cover-book.png""> 
                            <input name="book-img" type="file" class="form-control-file" accept="image/*" id="cover-img">
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="form-group col-6">
                        <label for="year-book">Año de publicación</label>
                        <input  type="text" name="book-year" id="year-book" class="form-control" placeholder="Ingresar año de publicación" required> 
                    </div>  
                    <div class="form-group col-6">
                        <label for="vol-book">Volumen</label>
                        <input type="text" name="book-vol" id="vol-book" class="form-control" placeholder="Ingresar número de volumen"> 
                    </div> 
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="languaje-book">Idioma</label>
                        <select name="book-languaje"  class="form-control" id="languaje-book">	
                            <option disabled selected >Selecionar idioma</option>
                            <?php 
                                 foreach ($param["languajes"] as $key => $value) {
                                    echo "<option value='$key'>$value</option>";
                                 }                          
                            ?>
                        </select>
                    </div> 
                    <div class="col-6 form-group" id="copiaUnica">
                        <label for="single-book">Copia única</label>
                        <select name="book-single" class="form-control" id="single-book">
                            <option disabled selected >Selecionar una opción</option>
                            <option value="1" >Si</option>
                            <option value="2" >No</option>
                        </select>
                    </div>
                    <div class="col-6 form-group" id="cantEjemplar" style="display: none">
                        <label for="cant-book">Cantidad de ejemplares</label>
                        <input type="number" name="book-cant" id="cant-book" class="form-control" placeholder="Ingresar cantidad de ejemplares"> 
                    </div>
                </div>                                  
                <div class="form-group">
                    <label for="desc-book">Descripción</label>
                    <textarea class="form-control" name="book-desc" id="desc-book" rows="3" required placeholder="Ingresar una descripción del libro"></textarea> 
                </div>   
            </div>
            <!-- Datos de Autor -->
            <div class="tab-pane fade" id="nav-author" role="tabpanel">      
                <div class="form-group">
                    <label for="autor-add">Autor</label>
                    <input type="hidden"  id="selected-author">
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
                        <tbody id="tbody"></tbody>
                    </table> 
                </div>
                <div class="form-group"> 
                    <select multiple name="author-list[]" id="list-author" style="display:none"></select>
                </div> 	
            </div>
            <!-- Datos de Edición -->
            <div class="tab-pane fade" id="nav-editorial" role="tabpanel">
                <div class="row">
                    <div class="form-group col-11">
                        <label for="editorial-add">Editorial</label>
                        <input type="hidden" id="selected-editorial">
                        <div class="container-select">
                            <div class="selected-s" id="select-editorial">Seleccionar editorial</div>
                            <div class="container-options" id="container-editorial">
                                <input type="text" id="search-editorial" name="book-editorial" class="form-control search"  placeholder="Buscar editorial" data-url="<?php echo URL_ROUTE?>/editorials/search">
                                <ul class="options" id="options-editorial"></ul>
                            </div>
                        </div>
                        <div id="resutl-editorial"></div>
                    </div> 
                    <div class="form-group col-1">
                        <a href="javascript:void(0);" class="material-icons mt-4 btn btn-outline-dark" data-toggle="modal" id="add-new-editorial" data-target="#create-editorial" data-toggle="tooltip" data-placement="bottom" title="Agregar nueva editorial">add</a>
                    </div>
                </div> 
                <div class="row">
                    <div class="form-group col-6">
                        <label for="topic-book">Tema</label>
                        <select name="book-topic" class="form-control" id="topic-book" data-url="<?php echo URL_ROUTE?>subtopics/show">	
                            <option disabled selected>Selecionar tema</option>
                            <?php 
                                foreach ($param["topics"] as $key => $value) {
                                echo "<option value='$key'>$value</option>";
                                }                          
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="subtopic-book">Sub-tema</label>
                        <select name="book-subtopic"  class="form-control" id="subtopic-book" disabled data-url="<?php echo URL_ROUTE?>categories/show">	
                            <option disabled selected>Selecionar sub-tema</option> 
                        </select>
                        <div class="result"></div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="form-group col-6">
                        <label for="category-book">Categoria</label>
                        <select name="category-topic" class="form-control" id="category-book" disabled>	
                            <option disabled selected  >Selecionar categoria</option> 
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="edition-book">Edición</label>
                        <input type="text" name="book-edition" id="edition-book" class="form-control" placeholder="Ingresar número de edición"> 
                    </div>  
                </div>
                <div class="row"> 
                    <div class="form-group col-6">
                        <label for="cata-book">Código catalografico</label>
                        <input type="text" name="book-cata" class="form-control" id="cata-book" required disabled placeholder="Generacion automática" ><!-- si se deja el disabled no envia los datos atraves de post--> 
                    </div> 
                    <div class="form-group col-5">
                        <label for="topo-book">Código topolografico</label>
                        <input type="text" name="book-topo" class="form-control"  id="topo-book" required disabled placeholder="Generación automática" > 
                    </div> 
                    <div class="col-1 align-self-center">
                        <button type="button" id="generate-catolografic-code" data-url="<?php echo URL_ROUTE?>/AuthorsHasBooks/getbooksofauthor" class="material-icons btn btn-outline-dark">cached</button>
                    </div>
                    
                </div> 
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary" id='submit'name="book-register">Guardar</button>
            </div>
        </div> 
    </form> 
</div>
<?php
    require_once APP_ROUTE . '/authors/views/create.php'; 
    require_once APP_ROUTE . '/editorials/views/create.php'; 
?>