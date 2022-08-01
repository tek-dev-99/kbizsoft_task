<?php 

$sql="SELECT * From users";
$res=mysqli_query($con,$sql);
$users=array();
if(mysqli_num_rows($res))
{
    while($data=mysqli_fetch_assoc($res)){
        $users[]=$data;
    }
}


if(isset($_GET['action']) && !empty($_GET['action'])){
	
	$action=$_GET['action'];
	switch($action){
		case 'delete':
		if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
			$user_id=$_GET['user_id'];
			deleteUser($user_id);
			addAlert('success', 'User deleted successfully!');
            redirect('users.php');

		}
		break;
		
	}
	
}

 function deleteUser($user_id){
	global $con; 
		
	$sql="DELETE FROM users WHERE user_id='".$user_id."'";
	mysqli_query($con,$sql);
	
}