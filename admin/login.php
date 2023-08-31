<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">  
</head>
<body class="bg-dark">

<?php
include 'connection.php';

if (isset($_POST['login']))
{

	extract($_POST);
    $q="select * from admin where username='$uname' and password='$psw'";
    $res=select($q);
    if(sizeof($res)>0)
    {
    	
    		alert('Login Successfully');
    		return redirect('index.php');
    	}
    	
    
}
  
   else{
      alert("Username or Password Incorrect");
     
    }



?>
    
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3 col-sm-12 mt-5 p-3">
                <div class="form-container">
                    <h3 class="title">Riro Admin</h3>
                    <form class="form-horizontal" method="POST">
                        <div class="form-icon text-center">
                            <img src="assets/images/favicon.png" alt="" width="95">
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-user"></i></span>
                            <input type="text" name="uname" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="psw" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-block signin">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>




