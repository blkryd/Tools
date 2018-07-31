<?php
include 'dbconfig.php';
if(!$_SESSION['login_info']['name']){
    header('location: login.php');
    die();
}

if(isset($_POST['number'])){
    $number  = $_POST['number'];
    $amount  = $_POST['amount'];
    $time = date('H:i:s');
    $type = 'prepaid';
    $username = $_SESSION['login_info']['username'];
    $sql = "INSERT INTO `tbl_log`(`number`, `amout`, `time`, `username`) VALUES ('$number','$amount','$time','$username')";
    if ($result=mysqli_query($con,$sql))
    {
        $url = 'http://privatesite.com/recharge.php?msisdn='.$number.'&amount='.$amount.'&con_type='.$type;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (platform; rv:geckoversion) Gecko/geckotrail Firefox/firefoxversion'
        ));
        $resp = curl_exec($curl);
        curl_close($curl);
        echo $resp;

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
    <title>A recharge system</title>
</head>
<body>
<div id="login">
    <h3 class="text-center text-white pt-5">Recharge Form</h3>
    <div class="container">
        <form action="" method="post">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Recharge Form</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Number:</label><br>
                                <input type="text" name="number" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Amount:</label><br>
                                <input type="text" name="amount" id="password" class="form-control" autocomplete="off">
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