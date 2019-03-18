 <div class="modal-content pt-2 pb-2">
      <form method="post" action="<?php echo URL_ROUTE ?>editorials/store" target="_top" class="px-4 py-3">
        <div class="form-group">
          <label for="editorial-name">Editorial name</label>
          <input type="text" class="form-control" id="editorial-name" name="editorial-name" placeholder="editorial-name">
        </div>
        <div class="form-group">
          <label for="editorial-address">Address</label>
          <input type="text" class="form-control" id="editorial-address" name="editorial-address" placeholder="direccion">
        </div>
       
        <button type="submit" class="btn btn-primary" name="register">CREAR EDITORIAL</button>
      </form>
    </div>