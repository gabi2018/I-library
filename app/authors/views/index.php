
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

<table>
	<tr>
		<th>Nombre</th>
        <th>Apellido</th>
	
	<tr>
		
	</tr>
	>
</table>
<div>
<label for="cata-book">buscar</label>
       <input type="text" name="author" class="form-control" id="buscar-autor" required data-url="<?php echo URL_ROUTE?>/authors/search" placeholder="pon nom">



</div>
<div id="result">
</div>
<script type="text/javascript">
  //suggetion for finding product names
  

  

function search(param, url) { 
	// process the form
	var parame = {'author' : param };

	$.ajax({
		type : 'POST',
		data : parame,
		url  : url,			
		success:function(data){
			$('#result').html(data);
		}
	})
}
$('#buscar-autor').keyup(function(){
	var input = $(this).val();
	if(input != ""){
		url = $(this).attr('data-url');
		search(input,url);
	}
	else{}
});					
				
</script>


