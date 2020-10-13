
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<label for="cata-book">buscar</label>
       <input type="text" name="book" class="form-control" id="sug_input" required data-url="<?php echo URL_ROUTE?>/books/search" placeholder="nombre del libro o autor">




		<div class="row" >
		<table>
		
			<th>
			<td>         <td> 
			<td>      cod topolgraphico   <td>		
				<td>    ibsbn     <td>
				<td> Titulo del Libro </td>
				<td> autor </td>
				<td>         <td>
				<td> edicion </td>
				<td>         <td>
				<td> volumen </td>
				<td>         <td>
				
				<td>         <td>
				<td> disponibilidad <td>
				<td>         <td>
			</th>
		
			<tr>
			<td>         <td> 
			<td id ="result"> <td></tr> 
	
				
				
					</table>

</div>

<script type="text/javascript">
  //suggetion for finding product names
  

      function search(param,url) {
				
				
				// process the form
				var parame ={
					'book':param
				};
				

				$.ajax({
					type        : 'POST',
					data        : parame,
					url         : url,		
					
					success:function(data){
						$('#result').html(data);
					}
				})
				

	};
$(document).on('keyup','#sug_input',function(){

	var input=$(this).val();
	
		if(input !=""){
			url = $(this).attr('data-url');

			
			search(input,url);
		}
		else{
			
		}
});									
</script>