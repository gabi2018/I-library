<div class="col-10 mt-2">
    <h4 class="mb-3">Registrar Prestamo</h4>
    <form method="post" action="<?php echo URL_ROUTE ?>loans/store" target="_top">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name-user">Socio</label>
                    <input type="hidden"  id="selected-user">
                        <div class="container-select">  
                        <div class="selected-s" id="select-user">Seleccionar usuario</div>
                        <div class="container-options" id="container-user">
                            <input type="text" name="user-name" class="form-control" id="search_user_loan" required placeholder="Buscar socio" data-url="<?php echo URL_ROUTE?>Users/searchUserDni "> 
                            <ul class="options" id="options-user" ></ul>
                        </div>
                        </div>
                </div>  
            </div>
            <div class="col-6 mt-3">
                <div class="media" id="user_media">

                </div>     
            </div> 
        </div> 
        <hr>
        <div class="row">
            <div class="col-6">
                <div class="form-group">

                    <label for="title-book">Libro</label>
                    <input type="hidden"  id="selected-book">
                    <div class="container-select">
                     <div class="selected-s" id="select-book">Seleccionar book</div>
                         <div class="container-options" id="container-book">
                             <input type="text"  class="form-control search" id="search_book_loan" required placeholder="Buscar libro" data-url="<?php echo URL_ROUTE?>Books/search"> 
                              <ul class="options" id="options-book" ></ul>
                    </div>
                    </div>
                                          
                 </div>  
            </div>
            <div class="col-6 mt-2" >
                <div id ="book_media" data-url="<?php echo URL_ROUTE?>Books/getsStatusBook">
                
                </div>

                <span id="availability"></span>
            </div> 
            
        </div> 
        <div class="form-group row">
            <label for="example-datetime-local-input" class="col-2 col-form-label">fecha y hora</label>
            <div class="col-10">
            <input class="form-control" type="datetime-local" name="datetime-loan" value="" id="datetime-loan">
            </div> 
            <label for="example-datetime-local-input" class="col-2 col-form-label">fecha y hora</label>
            <div class="col-10">
            <input class="form-control" type="datetime-local" name="datetime-retur-loan" value="" id="datetime-loan">
            </div> 
             

        </div>
        
        
        <div class="form-group mt-5">
            <button type="submit" class="form-control btn btn-primary" name="loan-register">Registar prestamo</button>
        </div>  
    </form> 
</div> 