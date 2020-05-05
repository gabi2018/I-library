$(document).ready(function(){
    $(".menu").click(function(){
        $(".keep").toggleClass("width");
    });

    $("#single-book").change(function(){
        if($(this).val() == 2){
            $("#copiaUnica").css("display","none");
            $("#cantEjemplar").css("display","initial");
        }
    })
    
    $("#add-autor").click(function(){
        var autor, tipo;
        if($("#autor-select").val() != null && $("#autor-type").val() != null){
            autor = $("#autor-select").val();
            tipo  = $("#autor-type").val();  
            $("#list-autors #tbody").append("<tr>"+
                                                "<td>"+ autor +"</td>"+
                                                "<td>"+ tipo +"</td>"+
                                                "<td><a href='javascript:void(0)' class='delautor material-icons' id='quitar_" + autor.replace(" ", "_") + "_" + tipo + "'>clear</a></td>"+
                                            "</tr>"
            ); 
        }
    });
    
    $(".delautor").click(function(){
        alert("golo");
    });
    
    $("#doc-user").keyup(function(){
        $('#pass-user').val(($('#doc-user').val()));
    }); 

    //Function which allows only the entry numbers
    $('.justNumbers').keypress(function(e){
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 48) || (keynum == 56))
            return true;
        return /\d/.test(String.fromCharCode(keynum));
    }); 

    // Previsualizacion de imagen de portada 
    function readURL(input, label) {  
        if (input.files && input.files[0]) {  
            var reader = new FileReader();  
            reader.onload = function(e) {  
                $(label).attr('src', e.target.result);
            }
          
            reader.readAsDataURL(input.files[0]);
        }
    }
      
    $("#cover-img").change(function() {  
        readURL(this, "#cover-preview");
    });

    $("#topic-book").change(function(){ 
        url = $(this).attr('data-url');
        $("#topic-book option:selected").each(function() {
            value = $(this).val();
            url += "/" + value; 
            $.get(url, { value }, function(data) {
                $("#subtopic-book").empty().removeAttr("disabled").append("<option disabled selected>Selecionar sub-tema</option>");
                aux = data.split("."); 
                for(i=0; i<aux.length-1; i++){
                    option = (aux[i].split("-"));
                    $("#subtopic-book").append("<option value="+option[0]+">"+ option[1] +"</option>")
                } 
            });
        });
    });

    $("#subtopic-book").change(function(){
        url = $(this).attr('data-url');
        $("#subtopic-book option:selected").each(function() {
            value = $(this).val();
            url += "/" + value; 
            $.get(url, { value }, function(data) {
                $("#category-book").empty().removeAttr("disabled").append("<option disabled selected>Selecionar categoria</option>");
                aux = data.split("."); 
                for(i=0; i<aux.length-1; i++){
                    option = (aux[i].split("-"));
                    option2 = option[1].split("_");
                    $("#category-book").append("<option value="+option[0]+" data-code='"+ option2[1] +"'>"+ option2[0] +"</option>")
                } 
            });
        });
    });
});

