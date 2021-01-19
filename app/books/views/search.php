<div class="col-12 row justify-content-end">
    <div class="col-6">
        <form>
            <div class="input-group">
                <input type="text" class="form-control"  name="book" placeholder="Buscar libros"  id="search_book" required data-url="<?php echo URL_ROUTE?>Books/search">
                <div class="input-group-append">
                <span class="input-group-text material-icons">search</span>
                </div>
            </div>
        </form>
        
    </div>
</div> 


<div id ="result"class="row justify-content-star mt-4"></div>