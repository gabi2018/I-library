$(document).ready(function(){
    let email_val = false,
        dni_val   = false,
        phone_val = false;

    /*
     * Validaciones 
     */
    function valid(value){
        value.addClass("is-valid");
        value.removeClass("is-invalid");
        return true;
    }
    function invalid(value){
        value.addClass("is-invalid");
        value.removeClass("is-valid");
        return false;
    }

    // Validar email
    $("#email-user").keyup(function(){
        var ex_regular_email = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            email = $(this).val();

        ex_regular_email.test(email) ? email_val = valid($(this)) : email_val = invalid($(this)); 
        console.log(email_val);
    });

    // Validar numero de documento
    $("#doc-user").keyup(function(){
        var ex_regular_dni = /^\d{8}(?:[-\s]\d{4})?$/,
            dni = $(this).val();

        ex_regular_dni.test(dni) ? dni_val = valid($(this)) : dni_val = invalid($(this)); 
    }); 

    //Validar telefono
    $("#phone-user").keyup(function(){
        var ex_regular_phone = /^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/,
            phone = $(this).val();

        ex_regular_phone.test(phone) ? phone_val = valid($(this)) : phone_val = invalid($(this)); 
    });
    
    $("#register-user").submit(function(event){
        if(!email_val && dni_val && phone_val){
            event.preventDefault();
        }
    });
    /*
     * Funciones 
     */
    
    // Genera la clave copiando el dni ingresado
    $("#doc-user").keyup(function() {
        $('#pass-user').val(($('#doc-user').val()));
    });

    //funcion para el registro de escuelas y carreras del usuario
    $("#user-school").change(function() {
        url = $(this).attr('data-url');
        $("#user-school option:selected").each(function() {
            value = $(this).val();
            url += "/" + value;
            $.get(url, { value }, function(data) {
                $("#user-career").empty().removeAttr("disabled").append("<option disabled selected>Seleccionar carrera</option>");
                aux = data.split(".");console.log(value)
                for (i = 0; i < aux.length - 1; i++) {
                    option = (aux[i].split("-"));
                    
                    $("#user-career").append("<option value=" + option[0] + ">" + option[1] + "</option>")
                }
            });
        });
    });
    // Asyncronic search
    function search(param, url) { 
        return $.post(url, {search : param});
    }
     //busqueda de socios por nombre o apellido
     $('#search_user').keyup(function(){
        var input = $(this).val(); 
        if(input != "" ){
            url = $(this).attr('data-url');
            search(input, url).done(function(response){ 
                $('#search_result_user').html(response);
                $("#search_result_user").css("display","initial");
                $("#user_list").css("display","none");
                
            }); 
        }
        else{
            $("#user_list").css("display","initial");
            $("#search_result_user").css("display","none");
        }
    }); 

    // Cambia tipo de vista
    $("#user_list").isotope({
        filter: '.list'
    });

    $('.view-type').click(function() {
        var filterValue = $(this).attr('data-filter'); 
        id = filterValue.substr(1);
        $('#'+id).css('display', 'none');   
        if(id == 'list'){
            $('#card').css('display', 'initial');
        }      
        else{
            $('#list').css('display', 'initial');
        }   
        
        $("#user_list").isotope({ filter: filterValue });
    });

    //ver los socios a importar 

    $('#import').click(function(){
        url = $(this).attr('data-url');
        imports(url).done(function(response){ 
            
            $('#import-socios').html(response);
            
            
        }); 

    });

    function imports(url) { 
        return $.post(url, {importDate: 'confirm'});
    }
});