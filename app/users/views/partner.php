<?php 
        $users = $param['users'];
        foreach ($users as $user):
?>

<div class="media mt-2">
    <img class="mr-3" src="<?php echo URL_ROUTE?>media/images/partner/<?php echo $user->user_img?>" alt="Foto_Socio" style="width: 90px;">
    
    <div class="media-body">
        <div class="row">
            <div class="col-10">
                
                <h5 class="mt-0"><a href=""><?php echo $user->user_name . " " . $user->user_lastname;?></a></h5>
            
                <span>Direccion:<a href=""><?php echo $user->user_address; ?></a></span><br>
                <span>Telefono:<a href=""><?php echo $user->user_phone; ?></a></span>
            </div>
            <div class="col-2">
                <span class="material-icons"><a href="<?php echo URL_ROUTE  ?>users/edit/" <?php echo $user->user_dni ?> class="text-info">edit</a></span>
                <span class="material-icons"><a href="<?php echo URL_ROUTE ?>users/disable/" <?php echo $user->user_dni ?> class="text-danger"><?php echo($user->user_defaulter)?'Disable':'Enable' ; ?></a></span>
            </div>
        </div> 
        
        
    </div> 
</div>
<?php endforeach; ?>  

