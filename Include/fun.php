<?php
function redirect($url){
	
	header ("Location:" .$url);
	die;
}


function addAlert($type,$msg)
{
	$_SESSION['alert']['type']=$type;
	$_SESSION['alert']['msg']=$msg;
}


function displayAlert()  {
				   if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])){ ?>
				  <div class="alert alert-<?php echo $_SESSION['alert']['type']; ?> alert-dismissible fade show" role="alert">
				  <?php echo $_SESSION['alert']['msg']; ?>
				  <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
				  </div>
				   <?php unset($_SESSION['alert']);} 
				   

} 

 

  
  