var table;
var cutterCode = "";   
var author_id  = "";

$(document).ready(function() { 





     // All Code
     url = $("#add-autor").attr('data-cutter') + "public/js/tablacutter-js.txt"
     $.ajax({
         url: url,
         success: function(result) {
         table = result; 
     }
 });

   
 
/*#########################################validacion de inputs del Regustrar libro */

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
        
        $('#pages-book').keyup(function(){
            var cant=$(this).val();
            if(cant>0&&cant.length<5){
               valid($(this));
            }
            else{

                 invalid($(this));
            }
                          
           
            });


        $('#cant-book').keyup(function(){
            var cant=$(this).val();
            if(cant>2&&cant.length<7){
               valid($(this));
            }
            else{

                 invalid($(this));
            }
                          
           
            });


        $('#vol-book').keyup(function(){
            var vol=$(this).val();
            if(vol>0&&vol.length<5){
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
/*######################################################################*/
    ///ditar imagen book conservar vieja          
    $('#cover-img').change(function(){
        
    $('#img-vieja').val('0');
   
    });




$("#subtopic-book").change(function() {
    url = $(this).attr('data-url');
    $("#subtopic-book option:selected").each(function() {
        value = $(this).val();
        url += "/" + value;
        $.get(url, { value }, function(data) {
            $("#category-book").empty().removeAttr("disabled").append("<option disabled selected>Selecionar categoria</option>");
            aux = data.split(".");
            for (i = 0; i < aux.length - 1; i++) {
                option = (aux[i].split("-"));
                option2 = option[1].split("_");
                $("#category-book").append("<option value=" + option[0] + " data-code='" + option2[1] + "'>" + option2[0] + "</option>")
            }
        });
    });
});

//busqueda book por titulo
$('#search_book').keyup(function(){ 
    var input = $(this).val();
    if(input != ""){
        url = $(this).attr('data-url');
        search(input, url).done(function(response){  
            $('#result').html(response);  
        }); 
    }
});
    

    // Actuva el input para mas de un ejemplar
    $("#single-book").change(function() {
        if ($(this).val() == 2) {
            $("#copiaUnica").css("display", "none");
            $("#cantEjemplar").css("display", "initial");
        }
    })
    
    // Codigo para agregar distintos autores    
    $("#add-autor").click(function() { 
        // Recupero los value para generar un select no visible para enviarlos al controller
        autorValue = $("#select-author").attr('data-id');
        tipoValue  = $("#author-type").val();
        if (autorValue != null && tipoValue != null) {  
            $("#list-author").append(
                "<option value="+ autorValue + "_" + tipoValue +" id="+ autorValue + "_" + tipoValue +" selected></option>"
            );

            // Recupero texto del select para mostrar los que se van seleccionanto
            autorText  = $("#select-author").text();
            typeText   = $("#author-type option:selected").text();
            // Muestro los seleccionados
            $("#list-authors #tbody").append( 
                "<tr id="+autorValue+"_"+tipoValue+">" +
                    "<td>" + autorText + "</td>" +
                    "<td>" + typeText + "</td>" +
                    "<td><a href='javascript:void(0)' class='delautor material-icons' id='"+autorValue+"."+tipoValue+"'>clear</a></td></tr>"
            );

            // Generate cutter code   
            if(typeText == "Principal" && cutterCode == ""){ 
                cutterCode = generateCutterCode(autorText, table);
                author_id = autorValue;
            }
        }    
    });
   
    $(".delautor material").click(function() { 
        alert('entro');
        id  = ($(this).attr("id")).replace(".", "_"); 
        url = $(this).attr('data-url'); 
        
        $('#'+id+'').remove(); 
        $('#list-author #'+id).remove();
        // segir aca ruta para qe se active la funcion ara borra autor has book
        deletAutor(id,url).done(function(response){         
            if(response){
                alert("se elimino autor");
            }
        }); 
    });
    
      // Funcion para guardado de categoria
      $("#save-editorial").click(function(event){
        event.preventDefault();  
        name    = $("#new-name-editorial" ).val();
        address = $("#new-address-editorial").val();
        url     = $(this).attr('data-url');
        if(name != "" &&  address != "" ){
            $.post(url, { editorial_name: name, editorial_address: address}, function(data) {  
                $("#editorial-book").append("<option value="+data+">"+ name+"</option>");
                $("#new-name-editorial" ).val("");
                $("#new-address-editorial").val("");
            });
        }
    });
    
    // Funcion para guardado de autor
    $("#save-author").click(function(event){
        event.preventDefault();  
        name     = $("#new-name-author").val();
        lastname = $("#new-lastname-author").val();
        url      = $(this).attr('data-url');
        if(name != "" &&  lastname != "" ){
            $.post(url, { author_name: name, author_lastname: lastname}, function(data) {  
                $("#author-select").append("<option value="+data+">"+ name + " " + lastname +"</option>");
                $("#new-name-author" ).val("");
                $("#new-lastname-author").val("");
            });
        }
    });

    // Search editorial
    $('#search-editorial').keyup(function(){ 
        var input = $(this).val();
        if(input != ""){
            url = $(this).attr('data-url');
            search(input, url).done(function(response){ 
                $('#options-editorial').html(response); 
                closeSelect("#container-editorial", "#select-editorial", "#options-editorial>li.option", "#selected-editorial"); 
            }); 
        } 
    });
    $("#select-editorial").click(function(event) {
        selectSimulator(event, $(this),"#container-editorial"); 
    });

    // Search author
    $('#search-author').keyup(function(){ 
        var input = $(this).val();
        if(input != ""){
            url = $(this).attr('data-url');
            search(input, url).done(function(response){
                $('#options-author').html(response);
                closeSelect("#container-author", "#select-author", "#options-author>li.option", "#selected-author"); 
            }); 
        } 
    }); 
    $("#select-author").click(function(event) {
        selectSimulator(event, $(this), "#container-author"); 
    });



    
    // Asyncronic search
    function search(param, url) { 
        return $.post(url, {search : param});
    }

    // JS for select simulator
    function selectSimulator(event, element, container){
        event.stopPropagation();
        element.siblings(container).toggleClass("open");  
    }

    //Close select from asyncronic search
    function closeSelect(container, select, options, selected){
        $(options).click(function() {
            
            var value = $(this).find("span").html(),
                input = $(this).children()[1]; 
            $(select).html(value);
            $(select).attr("data-id", $(this).attr("id"));
            $(selected).val(value);
            $(container).toggleClass("open");
            
            if(input != undefined){
                $("#resutl-editorial").html(input);
            }
        }); 
    } 
    $(".search").click(function(event) {
        event.stopPropagation(); 
    });
     
    // Search general de autor , book , editorial
    $('#search-general').keyup(function(){ 
        var input = $(this).val();
        if(input != " "){
            url = $(this).attr('data-url');
            search(input, url).done(function(response){
                $('#ver').html(response);
            }); 
        } 
    }); 

    // Catalografic code
    $('#generate-catolografic-code').click(function(){
        edition   = $("#edition-book").val();
        bookTitle = $("#title-book").val();
        url       = $(this).attr('data-url');
        param     = {bookTitle, author_id};


        search(param, url).done(function(response){
            let titleCode = "";
            for(i = 0; i <= response; i++){
                titleCode += bookTitle[i]; 
            } 
            $('#cata-book').val(cutterCode+titleCode+edition);
        });
         
        subtopic    = $("#subtopic-book").val();
        category    = $("#category-book").val();
        $("#topo-book").val(subtopic+category);
    });

    

//funcion habilitar  inputs CON DISABLED

        $('#submit').click(function(){
            
            $('input').prop('disabled', false);
            

         } );


// mensajes de confirmacion 







});

