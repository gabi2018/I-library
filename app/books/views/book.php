<?php 
  $book             = $param['book']; 
  $authors          = $param['author'];
  $CaSuTe           = $param['category'];
  $cantidadDispo    = $param['cantidad-ejemplares-disponi'];
  $cantidadNodispo  = $param['cantidad-ejemplares-noDispo'];
  $cantidadPresta   = $param['cantidad-ejemplares-prestados'];
  $cantidadReserva  = $param['cantidad-ejemplares-reservados'];
  $cantidadCopiUnic = $param['cantidad-ejemplares-copiaUnica'];
  
  echo "
    <div class='media mt-5'> 
      <img class='mr-3' src='".URL_ROUTE."media/images/book/$book->book_img' alt='Título de libro'>
      <div class='media-body'>
        <h3 class='mt-0'>
          $book->book_title 
          <a href='". URL_ROUTE ."books/edit/$book->book_topolographic' class='align-right material-icons'>edit</a>
        </h3>
        <span class='material-icons'>people_alt</span>
        ";
  foreach ($authors as $author){
    echo "<p><a href=''>$author->author_type_identifier: $author->author_name $author->author_lastname</a></p>";
  }
  echo "
        <p><span class='material-icons'>business</span>: <a href=''>$book->editorial_name</a></p>
        <p><span class='material-icons'>language</span>: $book->languaje_desc</p>
        <p><span class='material-icons'>local_offer</span>: $CaSuTe->topic_name - $CaSuTe->subtopic_name - $CaSuTe->category_name</p>
        <p>ISBN: $book->book_isbn - CDU: $CaSuTe->category_cod -  Volumen: $book->book_vol - Año publicación: $book->book_year - Edición: $book->book_edition - Nro. de páginas: $book->book_num_pages</p>
        <span class='badge badge-success'>Disponible: $cantidadDispo->book_cantidad </span>
        <span class='badge badge-primary'>Prestados: $cantidadPresta->book_cantidad </span>
        <span class='badge badge-secondary'>Reservados: $cantidadReserva->book_cantidad</span>
        <span class='badge badge-warning'>Copia única: $cantidadCopiUnic->book_cantidad</span>
        <span class='badge badge-danger'>No Disponible: $cantidadNodispo->book_cantidad</span>
        <p>Descripción: $book->book_desc</p>
      </div>  
    </div>
  "; 
?>  