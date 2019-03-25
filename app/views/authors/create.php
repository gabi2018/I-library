<div class="modal-content pt-2 pb-2">
    <form method="post" action="<?php echo URL_ROUTE ?>authors/store" target="_top" class="px-4 py-3">
        <div class="form-group">
          <label for="author-name">Author name</label>
          <input type="text" class="form-control" id="author-name" name="author-name" placeholder="author-name">
        </div>
        <div class="form-group">
          <label for="author-lastname">Author Lastname</label>
          <input type="text" class="form-control" id="author-lastname" name="author-lastname" placeholder="direccion">
        </div>
       
        <button type="submit" class="btn btn-primary" name="register">CREAR Author</button>
    </form>
</div>
