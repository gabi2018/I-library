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
	 <table class="table " >
	 <thead>
	 							<tr>
								<th scope="col">Socio</th>
								<th scope="col">Libro</th>
								<th scope="col">Fecha de prestamo</th>
								<th scope="col">Fecha  devolucion </th>
								<th scope="col">Estado</th>
								 </tr>
	 </thead>
	 <tbody>
					<?php 
                                foreach ($loans as $key => $value) {

								echo "<th scope='row'></th>
								<tr >
								<td>$value->user_name</td>
								<td>$value->book_title</td>
								<td>$value->loan_delivery_date</td>
								<td>$value->loan_return_date</td>
								<td>$value->loan_status</td>
								</tr>";
                                }                          
                            ?>
	 </tbody>
	 </table>					
	</div>