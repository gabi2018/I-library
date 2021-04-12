
$(document).ready(function () {
    getQueryConfirm();
    graphsStatistics();

    $(".menu").click(function () {
        $(".keep").toggleClass("width");
    });


    //Function which allows only the entry numbers
    $('.justNumbers').keypress(function (e) {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 48) || (keynum == 56))
            return true;
        return /\d/.test(String.fromCharCode(keynum));
    });

    // Previsualizacion de imagen de portada 
    function readURL(input, label) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(label).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#cover-img").change(function () {
        readURL(this, "#cover-preview");
    });

    $("#topic-book").change(function () {
        url = $(this).attr('data-url');
        $("#topic-book option:selected").each(function () {
            value = $(this).val();
            url += "/" + value;
            $.get(url, { value }, function (data) {
                $("#subtopic-book").empty().removeAttr("disabled").append("<option disabled selected>Selecionar sub-tema</option>");
                aux = data.split(".");
                for (i = 0; i < aux.length - 1; i++) {
                    option = (aux[i].split("-"));
                    $("#subtopic-book").append("<option value=" + option[0] + ">" + option[1] + "</option>")
                }
            });
        });
    });





    //seearch input loan index
    $('#search_loan').keyup(function () {
        var input = $(this).val();
        if (input != "") {
            url = $(this).attr('data-url');
            search(input, url).done(function (response) {
                $('#init').remove();
                $('#result').html(response);
            });
        }
    });
    //busqueda de libro por titulo en prestamo

    $('#search_book_loan').keyup(function () {
        hablitarRegister();
        var input = $(this).val();
        if (input != "") {
            url = $(this).attr('data-url');
            search(input, url).done(function (response) {

                $('#options-book').html(response);
                closeSelectBook("#container-book", "#select-book", "#options-book>li.option", "#selected-book");

            });
        }

    });
   
    
         
    function deletAutor(id, url){ 
        response = $.post(url,{idtipo: id}); 
    
        return response;
    } 

    //bysqueda user en loan
    $('#search_user_loan').keyup(function () {
        var input = $(this).val();
        if (input != "") {
            url = $(this).attr('data-url');
            search(input, url).done(function (response) {
                $('#options-user').html(response);
                closeSelectUser("#container-user", "#select-user", "#options-user>li.option", "#selected-user");

            });
        }


    });

    //closet select user
    function closeSelectUser(container, select, options, selected) {
        $(options).click(function () {
            var value = $(this).find("h5").html(),
                url = $('#book_media').attr('data-url'),
                input = $(this).html();

            $(select).html(value);
            $(select).attr("data-id", $(this).attr("id"));
            $(selected).val(value);
            $(container).toggleClass("open");
            $("#user_media").html(input);
        });
    }

    //closet select de search boook en loan 
    function closeSelectBook(container, select, options, selected) {
        $(options).click(function () {

            var value = $(this).find("p").html();
            var isbn = $('input:hidden[name=isbn]').val();

            url = $('#book_media').attr('data-url');

            input = $(this).html();

            $(select).html(value);
            $(select).attr("data-id", $(this).attr("id"));
            $(selected).val(value);
            $(container).toggleClass("open");
            $("#book_media").html(input);
            availability(isbn, url).done(function (response) {

                $('#availability').html(response);
                desabilitarRegister(response);
            });

        });

    }
    // DISPONIBILIDAD DEL LIBRO
    function availability(isbn, url) {
        return $.post(url, { book_isbn: isbn });
    }

    $("#select-user").click(function (event) {
        selectSimulator(event, $(this), "#container-user");
    });


    $("#select-book").click(function (event) {
        selectSimulator(event, $(this), "#container-book");
    });

    //inabilitar registrar prestamo y activar reserva
    function desabilitarRegister(string) {
        var val = string.replace(/<[^>]+>/g, '');

        if (val == 'No hay libros disponibles para prestamos') {
            $('#submit_loan').removeClass('form-control btn btn-primary');
            $('#submit_loan').addClass("form-control btn btn-secondary");

            $('#submit_loan').attr({ disabled: true });
        }


    };


    //habilitar register PRESTAMO
    function hablitarRegister() {
        $('#submit_loan').removeClass('form-control btn btn-secondary');
        $('#submit_loan').addClass("form-control btn btn-primary");
        $('#submit_loan').attr({ disabled: false });

    }
    //abrir pdf comprobante prestamo
    $('#submit_loan').click(function () {
        user = $('input:hidden[name=user_dni]').val();
        book = $('input:hidden[name=book_id]').val();
        $('input').prop('disabled', false);

        if ((book != null) && (user != null)) {

            window.open('../fpdf/PDF.php/', '_blank')
        }




    });








    // Asyncronic search
    function search(param, url) {
        return $.post(url, { search: param });
    }

    // JS for select simulator
    function selectSimulator(event, element, container) {
        event.stopPropagation();
        element.siblings(container).toggleClass("open");
    }

    //Close select from asyncronic search
    function closeSelect(container, select, options, selected) {
        $(options).click(function () {

            var value = $(this).find("span").html(),
                input = $(this).children()[1];
            $(select).html(value);
            $(select).attr("data-id", $(this).attr("id"));
            $(selected).val(value);
            $(container).toggleClass("open");
            alert(value);
            if (input != undefined) {
                $("#resutl-editorial").html(input);
            }
        });
    }
    $(".search").click(function (event) {
        event.stopPropagation();
    });

    // Search general de autor , book , editorial
    $('#search-general').keyup(function () {
        var input = $(this).val();
        if (input != " ") {
            url = $(this).attr('data-url');
            search(input, url).done(function (response) {
                $('#ver').html(response);
            });
        }
    });

    // Catalografic code
    $('#generate-catolografic-code').click(function () {
        edition = $("#edition-book").val();
        bookTitle = $("#title-book").val();
        url = $(this).attr('data-url');
        param = { bookTitle, author_id };


        search(param, url).done(function (response) {
            let titleCode = "";
            for (i = 0; i <= response; i++) {
                titleCode += bookTitle[i];
            }
            $('#cata-book').val(cutterCode + titleCode + edition);
        });

        subtopic = $("#subtopic-book").val();
        category = $("#category-book").val();
        $("#topo-book").val(subtopic + category);
    });



    //funcion habilitar  inputs CON DISABLED

    $('#submit').click(function () {

        $('input').prop('disabled', false);

    });



    function graphsStatistics() {
        if ($('#statistics-loan').length) {
            // Graphs
            var ctx = document.getElementById('statistics-loan').getContext('2d');
            var ctx = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var ctx = document.getElementById('statistics-book').getContext('2d');
            var ctx = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }

    // mensajes de confirmacion 
    function getQueryConfirm() {
        var query = window.location.href;


        var td = query.endsWith('bien');

        if(td){
        
        $("#confirm").append(
            "<div class='alert alert-success alert-dismissable'>   <button type='button' class='close' data-dismiss='alert'>&times;</button>  <strong>¡EXITO!</strong> La operacion se concreto muy bien.    </div>"
        );
        }
    }



});