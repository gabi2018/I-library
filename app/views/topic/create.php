<div class="modal-content pt-2 pb-2">
    <form method="post" action="<?php echo URL_ROUTE ?>topics/store" target="_top" class="px-4 py-3">
      <div class="form-group">
        <label for="topic_name">Topic name</label>
        <input type="text" class="form-control" id="topic_name" name="topic_name" placeholder="topic_name">
      </div>  
      <button type="submit" class="btn btn-primary" name="register">Nuevo Tema</button>
    </form>  
</div>