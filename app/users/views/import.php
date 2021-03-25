<div class="row justify-content-around mt-5">
    <div class="col-12 text-center">
        <h3>Importar alumnos del sistema Siu Guarani</h3>
    </div>
    <div class="col-2  mt-3">
        <button type="button"  id="import" class="btn btn-primary"  data-url="<?php echo URL_ROUTE?>Users/readSIU">Importar</button>
        <hr>
        
                <button type="submit" class="btn btn-primary" id='submit'name="book-register"disabled>Guardar</button>
    </div>

    <div class="col-12">
        <h4>Resultados</h4>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Name Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Carrera</th>
                </tr>
            </thead>
        
            <tbody id='import-socios'></div>
               
            </tbody>
        </table>
        <hr>
    </div>

    
</div>
<script type="text/javascript" src="<?php echo URL_ROUTE; ?>js/users.js"></script>