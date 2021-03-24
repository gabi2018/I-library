<div  class="modal fade" id="create-autor" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar nuevo autor</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="post" target="_top">
          <div class="form-group">
            <input name="author-name" type="text" class="form-control" id="new-name-author" placeholder="Nombre del autor" maxlength ="80"required>
          </div>
          <div class="form-group">
            <input name="author-lastname" type="text" class="form-control" id="new-lastname-author" placeholder="Apellido del autor" maxlength ="80" required>
          </div>
          <div class="modal-footer">
            <button type="submit" name="register" data-dismiss="modal" data-url="<?php echo URL_ROUTE ?>authors/store" id="save-author" class="btn btn-primary">Agregar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>