<?php if (Controller::authenticated()) : ?>
<aside class="lateral-menu"> 
  <div class="lateral-header">
    <div class="user-pic">
      <img id="img-profile" src="<?php echo URL_ROUTE."media/images/partner/$_SESSION[userpic]"?>"alt="Admin picture">
    </div>
    <div class="user-info">
      <span class="user-name"><strong><?php echo $_SESSION['username']?></strong></span>
      <span class="user-role">Administrator</span> 
    </div>
  </div> 

  <hr>
  <div class="accordion" id="acordion-menu"> 
    <ul>
      <li>
        <a href="<?php echo URL_ROUTE ?>home">
          <span><i class="material-icons">home</i></span>
          <span class="menu-text">Inicio</span>    
        </a>
      </li> 
      <hr>
      <li>
        <a href="" data-toggle="collapse" data-target="#loan-collapse">
          <span><i class="material-icons">assignment_return</i></span>
          <span class="menu-text">Prestamos</span>
        </a>
        <ul id="loan-collapse" class="collapse" data-parent="#acordion-menu">
          <li>
            <a href="<?php echo URL_ROUTE ?>loans\index">
              <span><i class="material-icons">visibility</i></span> 
              <span class="menu-text">Ver prestamos</span>
            </a>
          </li> 
          <li>
            <a href="<?php echo URL_ROUTE ?>loans\create">
              <span><i class="material-icons">add</i></span> 
              <span class="menu-text">Realizar prestamo</span>
            </a>
          </li> 
          <li>
            <a href="<?php echo URL_ROUTE ?>loans">
              <span><i class="material-icons">assignment_turned_in</i></span> 
              <span class="menu-text">Prestamos activos</span>
            </a>
          </li>
          <li>
            <a href="<?php echo URL_ROUTE ?>loans">
              <span><i class="material-icons">error_outline</i></span>
              <span class="menu-text">Prestamos vencidos</span>
            </a>
          </li>
        </ul> 
      </li>  
      <hr>
      <li>
        <a href="" data-toggle="collapse" data-target="#book-collapse">
          <span><i class="material-icons">book</i></span>
          <span class="menu-text">Libros</span>
        </a>
        <ul id="book-collapse" class="collapse" data-parent="#acordion-menu">
          <li>
            <a href="<?php echo URL_ROUTE ?>books\index">
              <span><i class="material-icons">visibility</i></span> 
              <span class="menu-text">Ver libros</span>
            </a>
          </li> 
          <li>
            <a href="<?php echo URL_ROUTE ?>books\create">
              <span><i class="material-icons">add</i></span>
              <span class="menu-text">Agregar Libro</span>
            </a>
          </li> 
        </ul>
      </li>
      <hr>
      <li>
        <a href="" data-toggle="collapse" data-target="#user-collapse">
          <span><i class="material-icons">group</i></span>
          <span class="menu-text">Socios</span>
        </a>
        <ul id="user-collapse" class="collapse" data-parent="#acordion-menu">
          <li>
            <a href="<?php echo URL_ROUTE ?>users\index">
              <span><i class="material-icons">visibility</i></span> 
              <span class="menu-text">Ver socios</span>
            </a>
          </li> 
          <li>
            <a href="<?php echo URL_ROUTE ?>users\create">
              <span><i class="material-icons">add</i></span> 
              <span class="menu-text">Agregar socio</span> 
            </a>
          </li>  
          <li>
            <a href="<?php echo URL_ROUTE ?>users">
              <span><i class="material-icons">move_to_inbox</i></span> 
              <span class="menu-text">Importar socios</span> 
            </a>
          </li>
        </ul>
      </li>   
      <hr>    
    </ul>
  </div>
</aside> 
<?php endif; ?>