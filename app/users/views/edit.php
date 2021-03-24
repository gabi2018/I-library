<?php $users = $param['users']; ?>
<div class="col-10 mt-2">
    <h4 class="mb-3">Editar socio</h4>
    <form method="post" action='<?php echo URL_ROUTE . "users/update/$users->user_dni"; ?>' enctype="multipart/form-data">
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label for="name-user">Nombre</label>
                    <input type="text" name="user-name" class="form-control" id="name-user" required placeholder="Ingresar nombre" value="<?php echo $users->user_name; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="lastname-user">Apellido</label>
                    <input type="text" name="user-lastname" class="form-control" id="lastname-user" required placeholder="Ingresar apellido" value="<?php echo $users->user_lastname; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="email-user">Email</label>
                    <input type="email" name="user-email" id="email-user" class="form-control" placeholder="Ingresar dirección de email" value="<?php echo $users->user_email; ?>" required>
                    <div class="invalid-feedback">Email no valido</div>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <img class="justify-content-end" id="cover-preview" for="cover-img" src="<?php echo URL_ROUTE . "media/images/partner/$users->user_img"; ?>"></label>
                    <input name="user-img" type="file" class="form-control-file" accept="image/*" id="cover-img" value="<?php echo $users->user_img; ?>" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label for="address-user">Dirección</label>
                <input type="text" name="user-address" class="form-control" id="address-user" required placeholder="Ingresar dirección" value="<?php echo $users->user_address; ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="doc-user">Documento</label>
                <input type="text" name="user-doc" id="doc-user" class="form-control" placeholder="Ingresar número de documento" required value="<?php echo $users->user_dni ?>" disabled>
            </div>
            <div class="form-group col-6">
                <label for="phone-user">Teléfono</label>
                <input type="number" name="user-phone" id="phone-user" class="form-control justNumbers" placeholder="Ingresar número de teléfono" value="<?php echo $users->user_phone; ?>" required>
                <div class="invalid-feedback">Número de teléfono no valido</div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary" name="user-update">Actualizar</button>
        </div>
    </form>
</div>
<script type="text/javascript" src="<?php echo URL_ROUTE; ?>js/users.js"></script>