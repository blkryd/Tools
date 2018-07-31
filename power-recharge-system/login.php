<?php
include 'dbconfig.php';
if($_SESSION['login_info']['name']){
header('location: index.php');
die();
}


if(isset($_POST['username'])){
$username  = $_POST['username'];
$password  = md5($_POST['password']);
$sql = "SELECT * FROM admin WHERE user_name='$username' AND password='$password'";
if ($result=mysqli_query($con,$sql))
{
// Fetch one and one row
$row = mysqli_fetch_assoc($result);
$info = array(
'name' => $row['name'],
'phone' => $row['phone'],
'email' => $row['email'],
'username' => $row['user_name']
);
$_SESSION['login_info'] = $info;
header('location: index.php');
}else{
echo("Error description: " . mysqli_error($con));
}
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Login || A recharge system</title>
</head>
<body>
<div id="login">
    <h3 class="text-center text-white pt-5">Login form</h3>
    <div class="container">
        <form action="" method="post">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" >
                            </div>
                            <div class="form-group">
                             
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>