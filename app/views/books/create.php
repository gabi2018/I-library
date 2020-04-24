<?php require_once APP_ROUTE . '/views/modules/header.php'; ?>

<div class="col-8 mt-3 justify-content-center">
    <h4 class="mt-5 mb-3">Registrar nuevo libro</h4>
    <form method="post" action="<?php echo URL_ROUTE ?>books/store" target="_top">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="book-tab" data-toggle="tab" href="#nav-book" role="tab">Datos del libro</a>
                <a class="nav-item nav-link" id="author-tab" data-toggle="tab" href="#nav-author">Datos de autor</a>
                <a class="nav-item nav-link" id="editorial-tab" data-toggle="tab" href="#nav-editorial" role="tab">Datos de editorial</a>
            </div>
        </nav>
        <div class="tab-content mt-3" id="nav-tabContent">
            <!-- Datos del Libro -->
            <div class="tab-pane fade show active" id="nav-book" role="tabpanel"> 
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="title-book">Título</label>
                            <input type="text" name="book-title" class="form-control" id="title-book" required> 
                        </div> 
                        <div class="form-group">
                            <label for="isbn-book">ISBN</label>
                            <input type="text" name="book-isbn" class="form-control" id="isbn-book" required> 
                        </div> 
                        <div class="form-group">
                            <label for="pages-book">Cantidad de páginas</label>
                            <input type="number" name="book-pages" class="form-control" id="pages-book" required> 
                        </div> 
                    </div> 
                    <div class="col-3">
                        <div class="form-group">
                            <label class="justify-content-end" id="cover-preview" for="cover-img"></label>
                            <input name="cover-img" type="file" class="form-control-file" id="cover-img">
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="form-group col-6">
                        <label for="topic-book">Tema</label>
                        <select name="book-topic"  class="form-control" id="topic-book">	
                            <option disabled selected >Selecionar tema</option>
                            <option value="1">tema_1</option> 
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="subtopic-book">Sub-tema</label>
                        <select name="book-subtopic"  class="form-control" id="subtopic-book">	
                            <option disabled selected >Selecionar sub-tema</option>
                            <option value="1">sub-tema1</option> 
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="category-book">Categoria</label>
                        <select name="category-topic"  class="form-control" id="category-book">	
                            <option disabled selected >Selecionar categoria</option>
                            <option value="1">categoria_1</option> 
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <label for="single-book">Copia unica</label>
                        <select name="single-book" class="form-control" id="single-book">
                            <option value="1" >Si</option>
                            <option value="2" >No</option>
                        </select>
                    </div>
                </div>                                  
                <div class="form-group">
                    <label for="desc-book">Descripción</label>
                    <textarea class="form-control" name="book-desc" id="desc-book" rows="3" required></textarea> 
                </div>   
            </div>
            <!-- Datos de Autor -->
            <div class="tab-pane fade" id="nav-author" role="tabpanel">      
                <div class="form-group">
                    <label for="autor-add">Autor</label>
                    <select name="select-autors" id="autor-add" class="form-control">
                        <option value="none" disabled selected>Seleccionar autor</option>
                        <option value="Robert Resnick">Robert Resnick</option>
                        <option value="Pablo Risk">Pablo Risk</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="autor-type">Tipo de autor</label>
                    <select name="select-tipo-autors" id="autor-type" class="form-control">
                        <option value="none" disabled selected>Seleccionar tipo autor</option>
                        <option value="Principal">Principal</option>
                        <option value="Colaborador">Colaborador</option>
                        <option value="Ilustrador">Ilustrador</option>
                        <option value="Traductor">Traductor</option>
                    </select>
                </div>  
                <div class="form-group text-center">
                    <button href="#" id="add-autor" class="btn btn-link btn-author"><span class="material-icons">how_to_reg</span>Confirmar autor</button>    
                    <button href="" data-toggle="modal" data-target="#create-autor" class="btn btn-link btn-author"><span class="material-icons">person_add</span>Registrar autor</button>
                </div>
                
                <div class=" ">
                    <table id="list-autors" class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Tipo</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>  	
            </div>
            <!-- Datos de Editorial -->
            <div class="tab-pane fade" id="nav-editorial" role="tabpanel">
                <div class="form-group">
                    <label for="editorial-book">Editorial</label>
                    <select name="editorial-book" class="form-control" id="editorial-book">
                        <option value="1" >editrial_1</option> 
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="year-book">Año de publicación</label>
                        <input  type="text" name="book-year" id="year-book" class="form-control"> 
                    </div>  
                    <div class="form-group col-6">
                        <label for="vol-book">Volumen</label>
                        <input  type="text" name="book-vol" id="vol-book" class="form-control"> 
                    </div> 
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="edition-book">Ediciónn</label>
                        <input type="text" name="book-edition" id="edition-book" class="form-control"> 
                    </div>  
                    <div class="form-group col-6">
                        <label for="languaje-book">Idioma</label>
                        <select name="book-languaje"  class="form-control" id="languaje-book">	
                            <option disabled selected >Selecionar idioma</option>
                            <option value="1">idioma_1</option> 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                        <label for="code-book">Codigo topolografico</label>
                        <input type="text" name="book-code" class="form-control" id="code-book" required disabled placeholder="Generacion automatica"> 
                </div>
            </div>
 
            
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary" name="book-register">Guardar</button>
            </div>




	
    </form> 
</div>
<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?>