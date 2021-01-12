<div class="col-10 mt-2">
    <h4 class="mb-3">Registrar Prestamo</h4>
    <form method="post" action="<?php echo URL_ROUTE ?>loans/store" target="_top">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name-user">Socio</label>
                    <input type="text" name="user-name" class="form-control" id="name-user" required placeholder="Buscar socio"> 
                </div>  
            </div>
            <div class="col-6 mt-2">
                <div class="media">
                    <img class="mr-3" src="<?php echo URL_ROUTE;?>media/images/system/default-user.png" alt="User profile img" style="width: 60px; height:60px;">
                    <div class="media-body">
                        <h5 class="mt-0">User name lastname</h5>
                        <p>Status status status</p>
                    </div>
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
                <h6 class="mt-0">disponibilidad de libros para prestar</h6>
                <span id="availability"></span>
            </div> 
            
        </div> 
        <div class="form-group mt-5">
            <button type="submit" class="form-control btn btn-primary" name="loan-register">Registar prestamo</button>
        </div>  
    </form> 
</div> 