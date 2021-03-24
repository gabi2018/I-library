$(document).ready(function() { 

    function valid(value){
        value.addClass("is-valid");
        value.removeClass("is-invalid");
    }
    function invalid(value){
        value.addClass("is-invalid");
        value.removeClass("is-valid");
    }


    $('#isbn-book').keyup(function(){
         var isbn=$(this).val();
        if((isbn.length==13 )){
           valid($(this));
        }
        else{

             invalid($(this));
        }
               
       
        });




        $('#year-book').keyup(function(){
            var year=$(this).val();
            if(year>1100 && year<2100){
               valid($(this));
            }
            else{

                 invalid($(this));
            }
                          
           
            });

          
    

});

