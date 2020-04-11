<?php if (Controller::authenticated()) : ?>
  
<header>
  <span class="menu"><i class="material-icons">menu</i></span>
  <a class="navbar-brand" href="<?php echo URL_ROUTE ?>home">Logo</a>
</header>

<section class="main">
  <aside class="keep">
    <ul>
      <li>
        <a href="/">
          <span><i class="material-icons">assignment_return</i></span>
          Prestamos
          <span class="notif red">1</span>
        </a>
      </li>  

      <li>
        <a href="/">
          <span><i class="material-icons">collections_bookmark</i></span>
          Libros
          <span class="notif yellow">2</span>
        </a>
      </li>

      <li>
        <a href="/">
          <span><i class="material-icons">group</i></span>
          Socios
          <span class="notif green">6</span>
        </a>
      </li>   

      <li>
        <a href="/">
          <span><i class="material-icons">local_offer</i></span>
          Option 4
        </a>
      </li>
      
      <li>
        <a href="<?php echo URL_ROUTE ?>auth/logout">
          <span><i class="material-icons">exit_to_app</i></span>
          Salir
        </a>
      </li>   
    </ul>
  </aside> 
</section>
<?php endif; ?>