<?php
include 'app.php';
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP Image Grabber</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="jumbotron center col-lg-12">
                    <h2 class="text-center" >PHP Image Grabber</h2>
                    <p class="text-center">This is a simple Image Grabber. Enter your target site to grab images.</p>
                    <p class="text-center">Your target link should be with http://</p><br>
                    <form action="" class="text-center" method="post">
                        <label for="base_url">Enter site : </label>
                        <input type="text" name="base_url" id="base_url" placeholder="https://www.yahoo.com" />
                        <input class="btn btn-primary" type="submit" value="Grab" />
                    </form>
                    <?php
                    if (!empty($_POST['base_url'])) {
                        $site = $_POST['base_url'];
                        $header_check = get_http_response_code($site);
                        if ($header_check == '200') {
                            get_images($site);
                        } elseif ($header_check == '403') {
                            echo '<h3 class="text-center" >Sorry! Your are forbidden to get images from ' . $site . '/ .Try another one.</h3>';
                        } elseif($header_check == '301') {
                            echo '<h3 class="text-center" >You have to add "wwww" with your target. Exapmle : https://www.yahoo.com</h3>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
