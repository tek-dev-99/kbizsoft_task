<?php require_once('include/startup.php'); ?>
<?php require_once('library/index_lib.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      .error{
        color:red;
      }      
    </style>
</head>
<body>
  <div class="container d-flex justify-content-center  ">
  <div class=" align-center ms-5   m-5 p-5 align-center border border-black">        
    <?php echo displayAlert();?>
<form  method="POST" action="" id="form" >
<h2 class='text-primary'>Update  Form</h2>
<div class="row mt-5">
  <div class="col">
    <input type="text" class="form-control" placeholder="First name" name="fname" Id="fname" value="<?php echo $fname; ?>" aria-label="First name">
  </div>
  <div class="col">
    <input type="text" class="form-control" name="lname" Id="lname"  placeholder="Last name" aria-label="Last name" value="<?php echo $lname; ?>" >
  </div>
</div>
  <div class="mb-3  mt-3">
    <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>"  placeholder="Email">   
     </div>
	 <div class="mb-3">
    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="<?php echo $phone; ?>" >
    <div class="row mt-3">
  <div class="col-4">
    <input type="text" class="form-control password" name="captcha" id="captcha" placeholder="Captcha" aria-label="Captcha">
  </div>
  <div class="col">
    <img src="library/captcha.php" alt="">
  </div>
</div>
     </div>  
     
     <button type="submit" class="btn btn-primary">Update Now</button>
	</div>
  
</form>
    </div>

  </div>
    </div>
     
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
<script>
     $('#checkbox').click(function(){
        if($('.password').prop('type') == 'password'){
            $('.password').attr('type','text')
        }
        else {
            $('.password').attr('type','password');
        }
    });


    
	// $(document).ready(function(){
  //   $('.btn').click(function(){
  //     alert('working');
  //   })
			$("#form").validate({
			rules: {
				fname: "required",
				lname: "required",
        email: {
					required: true,
					email: true
				},
        phone: {
					required: true,
					minlength: 10
				},
				password: {
					required: true,
					minlength: 8
				},
				confirm_password: {
					required: true,
					minlength: 8,
					equalTo: "#password"
				},
				captcha: {
					required: true,
					minlength: 5,
					
				},
				agree: "required"
			},
			messages: {
				fname: "Please enter your firstname",
				lname: "Please enter your lastname",
				phone: {
					required: "Please enter your phone no",
					minlength: "Your username must consist of at least 10 characters"
				},
				
				email: "Please enter a valid email address",
                captcha: "Please enter a valid captcha",
				agree: "Please accept our policy",
				topic: "Please select at least 2 topics"
			}
		 });

		</script>      
</body>
</html>