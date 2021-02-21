<?php $loans=$param['loan'] ?>
<div class="row mt-3 justify-content-around">
	<div class="col-7">
		<div class="row alert alert-primary mb-4sssssss">
			<div class="col-8 mt-2">
				<h3 class="mb-4">Administra tus <strong>prestamos</strong>!</h3>
				<p>Realiza, reserva y autoriza solicitudes de renovacion de prestamos.</p>
			</div> 
			<div class="col-4 img-banner" id="loans-img"></div>
		</div>

	</div>
</div>
	
	<div class="table-responsive-md">
	<form>
            <div class="input-group">
			<label>buscar prestamo</label>
                <input type="text" class="form-control"  name="search_loan" placeholder=" ingrese dni socio "  id="search_loan" required data-url="<?php echo URL_ROUTE?>loans/search">
                <div class="input-group-append">
                <span class="input-group-text material-icons">search</span>
                </div>
            </div>
        </form>
		<div id='result_loan' >  </div>
	
	 <table id='loans'class='table'style = 'width:85% ' >
	 <p>ultimos prestamos</p>
	 <thead>
	 							<tr>
								<th scope="col">Socio</th>
								<th scope="col">Libro</th>
								<th scope="col">Fecha de prestamo</th>
								<th scope="col">Fecha  devolucion </th>
								<th scope="col">Estado</th>
								<th scope='col'>Tipo de socio</th>
								 </tr>
	 </thead>
	 <tbody id='result'></tbody>
	 <tbody id='init'>
					<?php 
                                foreach ($loans as $value) {

								echo "<th scope='row'></th>
								<tr >
								<td>$value->user_name $value->user_lastname</td>
								<td>$value->book_title</td>
								<td>$value->loan_delivery_date</td>
								<td>$value->loan_return_date</td>
								<td>$value->loan_status</td>
								<td>$value->user_type_desc</td>
								</tr>";
                                }                          
                            ?>
	 </tbody>
	 </table>					
	</div>