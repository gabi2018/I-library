$(document).ready(function() { 

validationISBN();




});

function validationISBN(){
    var isbn=$('#isbn-book').val();
    if(isbn.length!=13){
       $("#error").html(' <div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> <strong>¡Cuidado!</strong> ISBN incorrecto!!</div>');
    }

};