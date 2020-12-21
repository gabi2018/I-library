<?php 
		$users= $param['users'];
		foreach ($users as $user) :
?>

<tr>
<div class="card user-list col-2 mr-3 mb-3">


    <a href="<?php echo URL_ROUTE?>users/read id ">
        <img class="card-img-top" src="<?php echo URL_ROUTE?>media/images/partner/<?php echo $user->user_img ?>"  style="width:100%">
        <p class=" "> <?php echo $user->user_name ?></p>  
    </a>
</div>
</tr>

	<?php endforeach; ?>
</table>
