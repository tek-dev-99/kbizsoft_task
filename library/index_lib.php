<?php

    $fname='';
    $lname='';
    $email='';
    $phone='';
    $password='';
    $cpassword='';
    $captcha='';
    $status=1;
    $user_id=0;

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
    $user_data=getUserData($user_id);
    if($user_data){
        $fname=$user_data['fname'];
        $lname=$user_data['lname'];
        $email=$user_data['email'];
        $phone=$user_data['phone'];
        $status=$user_data['status'];
    }
    else{
        addAlert('danger', 'User ID not found!');
        redirect('users.php');
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



		
}
 if($_POST) 
 {
    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['captcha']))
    {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $captcha=$_POST['captcha'];
    $status=1;
    if($captcha == $_SESSION['code'])
    {
        if(!alreadyExist($email, $user_id)){
                if($user_id) 
                {
                 $sql="UPDATE users SET  fname='". $fname."', lname='". $lname."', email='". $email."', phone='". $phone."',status='". $status."' WHERE user_id='". $user_id ."'";
                    mysqli_query($con,$sql);
                    addAlert('success','Data Update Successfully');
                   
                } else{
                    $sql="INSERT  users SET fname='". $fname."', lname='". $lname."', email='". $email."', phone='". $phone."', password='". MD5($password)."', status='". $status."'";
                     mysqli_query($con,$sql);                             
                    addAlert('success','Registration Successfully');
                     }        
                     redirect('users.php');                 
            }else{
                addAlert('danger', 'Passowrd & Confirm Password does not match!'); 
            }    
        }else{ addAlert('danger','Email Id already exixt');}       
    
    }else{
        addAlert('danger', 'Captcha not valid!');            
    }
    }else{
    addAlert('danger', 'Registration Unsuccessfull!');        
    }
 
 function alreadyExist($email,$user_id){
    global $con;    
    $sql = "SELECT * FROM users WHERE email='". $email ."'AND user_id!='".$user_id."'";
     $rs = mysqli_query($con, $sql);
    if(mysqli_num_rows($rs)){
        return true;
    }
    return false;
 }


 function getUserData($user_id){
    global $con;
    $sql="SELECT * FROM users Where user_id='". $user_id ."'";
    $res=mysqli_query($con, $sql);
    $data=[];
    if(mysqli_num_rows($res))
    {
        $user_data = mysqli_fetch_assoc($res);
    }
    return $user_data;

 }


