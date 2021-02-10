<?php
    $DateCurrent    = $param['date-current'];
    $DateFinishLoan = $param['date-finish-loan']
?>
<div class="col-10 mt-2">
    <h4 class="mb-3">Registrar Prestamo</h4>
    <form method="post" action="<?php echo URL_ROUTE ?>loans/store" target="_top">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name-user">Socio</label>
                    <input type="hidden" id="selected-user">
                    <div class="container-select">
                        <div class="selected-s" id="select-user">Seleccionar usuario</div>
                        <div class="container-options" id="container-user">
                            <input type="text" name="user-name" class="form-control" id="search_user_loan" required placeholder="Buscar socio por DNI" data-url="<?php echo URL_ROUTE ?>Users/searchUserDni ">
                            <ul class="options" id="options-user"></ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-3">
                <div class="media" id="user_media"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="title-book">Libro</label>
                    <input type="hidden" id="selected-book">
                    <div class="container-select">
                        <div class="selected-s" id="select-book">Seleccionar book</div>
                        <div class="container-options" id="container-book">
                            <input type="text" class="form-control search" id="search_book_loan" required placeholder="Buscar libro" data-url="<?php echo URL_ROUTE ?>Books/searchForLoan">
                            <ul class="options" id="options-book"></ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-6 mt-2">
                <div id="book_media" data-url="<?php echo URL_ROUTE ?>Books/getsStatusBook"></div>
                <div id="availability"></div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-6">
                <label for="example-datetime-local-input" class="col-form-label">Fecha de préstamo</label>
                <input class="form-control" type="date" name="datetime_loan" disabled value='<?php echo date('Y-m-d', strtotime($DateCurrent)); ?>' id="datetime-loan-current">
            </div>
            <div class="col-6">
                <label for="example-datetime-local-input" class="col-form-label">Fecha de devolución</label>
                <input class="form-control" type="date" name="datetime_finish_loan" value='<?php echo date('Y-m-d', strtotime($DateFinishLoan)); ?>' id="datetime-loan">
            </div>
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="form-control btn btn-primary" id='submit' name="loan-register"  ><a href="../fpdf/PDF.php" target="_blank">Registar prestamo</a></button>
        </div>
       
    </form>
   
</div>