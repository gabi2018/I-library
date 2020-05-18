$(document).ready(function() {
    $(".menu").click(function() {
        $(".keep").toggleClass("width");
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
        if ($("#autor-select").val() != null && $("#autor-type").val() != null) { 
            // Recupero los value para generar un select no visible para enviarlos al controller
            autorValue = $("#autor-select").val();
            tipoValue  = $("#autor-type").val();
            $("#list-author").append(
                "<option value="+ autorValue + "_" + tipoValue +" id="+ autorValue + "_" + tipoValue +" selected></option>"
            );

            // Recupero texto del select para mostrar los que se van seleccionanto
            autorText  = $("#autor-select option:selected").text();
            typeText   = $("#autor-type option:selected").text();
            // Muestro los seleccionados
            $("#list-autors #tbody").append( 
                "<tr id="+autorValue+"_"+tipoValue+">" +
                    "<td>" + autorText + "</td>" +
                    "<td>" + typeText + "</td>" +
                    "<td><a href='javascript:void(0)' class='delautor material-icons' id='" + autorValue + "." + tipoValue + "'>clear</a></td>" +
                "</tr>"
            );
        }

        $(".delautor").click(function() {
            id = ($(this).attr("id")).replace(".", "_"); 
            $("#list-autors #tbody").remove(id);
        });
    });

    

    // Genera la clave copiando el dni ingresado
    $("#doc-user").keyup(function() {
        $('#pass-user').val(($('#doc-user').val()));
    });

    //Function which allows only the entry numbers
    $('.justNumbers').keypress(function(e) {
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

    $("#topic-book").change(function() {
        url = $(this).attr('data-url');
        $("#topic-book option:selected").each(function() {
            value = $(this).val();
            url += "/" + value;
            $.get(url, { value }, function(data) {
                $("#subtopic-book").empty().removeAttr("disabled").append("<option disabled selected>Selecionar sub-tema</option>");
                aux = data.split(".");
                for (i = 0; i < aux.length - 1; i++) {
                    option = (aux[i].split("-"));
                    $("#subtopic-book").append("<option value=" + option[0] + ">" + option[1] + "</option>")
                }
            });
        });
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

    $("#user-school").change(function() {
        url = $(this).attr('data-url');
        $("#user-school option:selected").each(function() {
            value = $(this).val();
            url += "/" + value;
            $.get(url, { value }, function(data) {
                $("#user-career").empty().removeAttr("disabled").append("<option disabled selected>Seleccionar carrera</option>");
                aux = data.split(".");
                for (i = 0; i < aux.length - 1; i++) {
                    option = (aux[i].split("-"));
                    $("#user-career").append("<option value=" + option[0] + ">" + option[1] + "</option>")
                }
            });
        });
    });
});