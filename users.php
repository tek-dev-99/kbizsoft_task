<?php require_once('include/startup.php'); ?>
<?php require_once('library/users_lib.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Login</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 ">
        <?php echo displayAlert();  ?>
        <a href="index.php" class="btn btn-primary">Registered Now</a>
    <table class="table  table-hover">
    <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Status</th>
      <th scope="col">Date_Added</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if(sizeof($users)){?>
        <?php foreach($users as $user){?>
            <tr>
            <th scope="row"><?php echo $user['user_id'];?></th>
            <td><?php echo $user['fname'];?></td>
            <td><?php echo $user['lname'];?></td>
            <td><?php echo $user['email'];?></td>
            <td><?php echo $user['phone'];?></td>
            <td><?php echo ($user['status'] == 1) ? 'Active':'Inactive'; ?></td>
            <td><?php echo $user['date_added'];?></td>
            <td>
                <a href="edit.php?user_id=<?php echo $user['user_id']; ?>">Edit</a> |
                <a href="users.php?action=delete&user_id=<?php echo $user['user_id']; ?>" onclick="return confirm('Are you sure want to delete this?')" >Delete</a>
            </td>
            </tr>
        <?php }?>
    <?php }?>    
</tbody>
    </table>
    </div> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>