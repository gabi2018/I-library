<?php if (Controller::authenticated()) : ?>
  
<header class="container-fluid"> 
  <div class="row d-flex justify-content-between align-items-center p-1"">
    <div class="col-2 ml-1">
      <a class="navbar-brand" href="<?php echo URL_ROUTE ?>">
        <img src="<?php echo URL_ROUTE ?>/media/images/system/favicon.png">
        I-Library
      </a>
    </div>
    
    <div class="col-6">
      <form>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Buscador">
          <div class="input-group-append">
            <span class="input-group-text material-icons">search</span>
          </div>
        </div>
      </form>
    </div>
  
    <div class="col-2 text-right"> 
      <!-- NOTIFICATIONS -->
      <div class="btn-group"> 
        <span class="material-icons" data-toggle="dropdown" data-display="static">notifications</span> 
        <div class="dropdown-menu dropdown-menu-left dropdown-menu-lg-right">
          <a href="<?php echo URL_ROUTE ?>home" class="dropdown-item button" type="button"> 
            <div class="d-flex align-items-center">
              <span class="material-icons">update</span>
              <span class="ml-2">Solicitudes de renovación</span>
          </div>  
          </a>

          <div class="dropdown-divider"></div>
          <a href="<?php echo URL_ROUTE ?>home" class="dropdown-item button" type="button"> 
            <div class="d-flex align-items-center">
              <span class="material-icons">move_to_inbox</span>
              <span class="ml-2">Solicitudes de reserva</span>
          </div>  
          </a>

          <div class="dropdown-divider"></div>
          <a href="<?php echo URL_ROUTE ?>home" class="dropdown-item button" type="button"> 
            <div class="d-flex align-items-center">
              <span class="material-icons">error</span>
              <span class="ml-2">Préstamos vencidos</span>
          </div>  
          </a>
        </div>
      </div> 

      <!-- MESSAGES -->
      <div class="btn-group ml-3"> 
        <span class="material-icons" data-toggle="dropdown" data-display="static">mail</span> 
        <div class="dropdown-menu dropdown-menu-left dropdown-menu-lg-right">
          <div class="dropdown-item media messages">
            <img src="<?php echo URL_ROUTE ?>media/images/system/default-user.png" class="mr-3" alt="user_profile_image">
            <div class="media-body" style="width: 250px;">
              <p class="msg-username"><b>User Name:_</b></p>
              <p>Este es un mensaje para hacer pru:_</p>  
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
          <div class="dropdown-divider"></div>
          <div class="dropdown-item media messages">
            <img src="<?php echo URL_ROUTE ?>media/images/system/default-user.png" class="mr-3" alt="user_profile_image">
            <div class="media-body" style="width: 250px;">
              <p class="msg-username"><b>User Name:_</b></p>
              <p>Este es un mensaje para hacer pru:_</p>  
              <p><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- SETTINGS -->
      <div class="btn-group ml-3"> 
        <span class="material-icons" data-toggle="dropdown" data-display="static">settings</span> 
        <div class="dropdown-menu dropdown-menu-left dropdown-menu-lg-right">
          <a href="<?php echo URL_ROUTE ?>home" class="dropdown-item button" type="button"> 
            <div class="d-flex align-items-center">
              <span class="material-icons">how_to_reg</span>
              <span class="ml-2">Mi cuenta</span>
          </div>  
          </a>

          <a href="<?php echo URL_ROUTE ?>home" class="dropdown-item button" type="button"> 
            <div class="d-flex align-items-center">
              <span class="material-icons">person_add</span>
              <span class="ml-2">Agregar admin</span>
          </div>  
          </a>
          
          <div class="dropdown-divider"></div>
          <a href="<?php echo URL_ROUTE ?>home" class="dropdown-item button" type="button"> 
            <div class="d-flex align-items-center">
              <span class="material-icons">lock</span>
              <span class="ml-2">Seguridad</span>
          </div>  
          </a>

          <a href="<?php echo URL_ROUTE ?>home" class="dropdown-item button" type="button"> 
            <div class="d-flex align-items-center">
              <span class="material-icons">build</span>
              <span class="ml-2">Ajuste</span>
          </div>  
          </a>

          <div class="dropdown-divider"></div>                        
          <a href="<?php echo URL_ROUTE ?>auth/logout" class="dropdown-item button" type="button"> 
          <div class="d-flex align-items-center">
              <span class="material-icons">exit_to_app</span>
              <span class="ml-2">Salir</span>
          </div>  
          </a>
        </div>
      </div>
    </div> 
   </div>
</header> 
<?php endif; ?>
