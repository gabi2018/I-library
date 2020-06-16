
<div class="col-8 mt-3 justify-content-center">
<div class="tab-content mt-3" id="nav-tabContent">
            <!-- Datos del Libro -->
            <div class="tab-pane fade show active" id="nav-book" role="tabpanel"> 
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">

<form method="post" action="<?php echo URL_ROUTE ?>books/search" target="_top" enctype="multipart/form-data">

<div class="form-group">
                        <label for="cata-book">buscar</label>
                        <input type="text" name="book-title" class="form-control"  required  placeholder="pon title"> 
                    
					
                <button type="submit" class="form-control btn btn-primary" name="book-search">search</button>
            
			
	
						</div>
						</form>	
					</div>
				</div>
			</div>
</div>
		<div class="row" >
		<table>
			<th>
			<td>         <td> 
			<td>         <td>
			
				<td>         <td>
				<td> Titulo del Libro </td>
				<td>         <td>
				<td> edicion </td>
				<td>         <td>
				<td> volumen </td>
				<td>         <td>
				<td> autor </td>
				<td>         <td>
				<td> disponibilidad <td>
				<td>         <td>
			</th>
				<tr>
					<td>         <td> 
					<td>         <td> 
					<td>         <td> 

				<?php 
					if(isset($param['books'])){
					
											foreach ($param['books'] as $key => $value) {
											echo "".$key."<td>".$value."</td>";
											}                          
					}                
				?>
				<tr>

		</table>
	</div>
</div>
