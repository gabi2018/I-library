<?php if (Controller::authenticated()) : ?>
<aside class="lateral-menu">
  <span class="menu"><i class="material-icons">menu</i></span>
  <ul>
    <li>
      <a href="<?php echo URL_ROUTE ?>home">
        <span><i class="material-icons">home</i></span>
        Inicio 
      </a>
    </li> 

    <li>
      <a href="<?php echo URL_ROUTE ?>loans">
        <span><i class="material-icons">assignment_return</i></span>
        Prestamos
        <span class="notif red">1</span>
      </a>
      <ul>
        <li><a href="<?php echo URL_ROUTE ?>loans\create">Realizar prestamo</li>
        <li><a href="<?php echo URL_ROUTE ?>loans">Prestamos activos</li>
        <li><a href="<?php echo URL_ROUTE ?>loans">Prestamos vencidos</li>
      </ul>
      
    </li>  

    <li>
      <a href="<?php echo URL_ROUTE ?>books">
        <span><i class="material-icons">book</i></span>
        Libros
        <span class="notif yellow">2</span>
      </a>
      <ul>
        <li><a href="<?php echo URL_ROUTE ?>books\create">Agregar Libro</a></li>
        <li><a href="<?php echo URL_ROUTE ?>books">Dar de Baja</a></li>
        <li><a href="<?php echo URL_ROUTE ?>books">Editar datos</a></li>
      </ul>
    </li>

    <li>
      <a href="<?php echo URL_ROUTE ?>users">
        <span><i class="material-icons">group</i></span>
        Socios
        <span class="notif green">6</span>
      </a>
      <ul>
        <li><a href="<?php echo URL_ROUTE ?>users">Importar Socios</a></li>
        <li><a href="<?php echo URL_ROUTE ?>users\create">Agregar socio</a></li>
        <li><a href="<?php echo URL_ROUTE ?>users">Deshabilitar socio</a></li>
      </ul>
    </li>   

    <li>
      <a href="/">
        <span><i class="material-icons">local_offer</i></span>
        Option 4
      </a>
    </li>
  
  </ul>
</aside> 
<?php endif; ?>