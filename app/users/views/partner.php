<div class="media mt-2">
    <img class="mr-3" src="<?php echo URL_ROUTE . "media/images/partner/$user->user_img";?>" alt="Foto_Socio" style="width: 100px;">
    <div class="media-body">
        <div class="row">
            <div class="col-10 icons-users">
                <h5 class="mt-0"><a href=""><?php echo "$user->user_name $user->user_lastname";?></a></h5>
                <p><span class="material-icons">location_on</span><?php echo $user->user_address;?></p>
                <p><span class="material-icons">phone</span><?php echo $user->user_phone;?></p>
                <p><span class="material-icons">mail</span><?php echo $user->user_email;?></p>
            </div>
            <div class="col-2">
                <span class="material-icons"><a href="<?php echo URL_ROUTE . "users/edit/$user->user_dni";?>" class="text-info">edit</a></span>
                <span class="material-icons"><a href="<?php echo URL_ROUTE . "users/disable/$user->user_dni";?>" class="text-danger"><?php echo($user->user_defaulter)?'close':'check' ; ?></a></span>
            </div>
        </div> 
    </div> 
</div> 
<hr>