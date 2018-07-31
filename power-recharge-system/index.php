<?php
include 'dbconfig.php';
if(!$_SESSION['login_info']['name']){
    header('location: login.php');
    die();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Brand Aid 2018 CMS</title>

 <link href="assets/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript"  src="assets/js/jquery-1.12.4.js">
    </script>
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"> </script>
<script type="text/javascript">
function download(team_name)
{
	if(confirm('Sure to download ?'))
	{
		window.location.href='index.php?team_name='+team_name;
	}
}
function delete_id(id)
{
	if(confirm('Sure to delete_id?'))
	{
		window.location.href='index.php?delete_id='+id;
	}
}
</script>
</head>
<body>
<center>

<div id="header">
	<div id="content">
        <a class="btn btn-info" href="power.php">Recharge</a>
        <a class="btn btn-danger" href="logout.php">Logout</a>
    </div>
</div>

<div id="body">
	<div id="content" class="">
<table id="reg" class="table table-bordered nowrap display"  width="100%" style="font-family: Arial, Helvetica, sans-serif;font-size: 15px">
      <thead>
          <tr>
              <th>SL: </th>
              <th>Number</th>
              <th>Amout</th>
              <th>Time</th>
          </tr>
      </thead>
       <tbody>
            <?php
            $username = $_SESSION['login_info']['username'];
            $sql_query="SELECT * FROM tbl_log WHERE username='$username'";
            $result_set=mysqli_query($con,$sql_query);

            if(mysqli_num_rows($result_set)>0)
            {
                $coun = 1 ;
                while($row=mysqli_fetch_row($result_set))
                {
                    ?>
                    <tr>
                        <td><?php echo $coun++; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                    <?php
                }
            }
            else
            {
                ?>
                <tr>
                    <td colspan="8">No Data Found !</td>
                </tr>
                <?php
            }
            ?>
    </tbody>
    </table>
    </div>
</div>

</center>
<br>
<br>
<br>
<br>
<br>
<footer>
    <p align="right"><font size="2" color="#00A2D1" align="right"></font></p>
    <p align="right"><font size="2" color="#00A2D1" align="right"></font></p>
</footer>

<script type="application/javascript">
    $(document).ready(function() {
        $('#reg').DataTable({
                "paging": true,
                "lengthChange":false,
            "autoWidth": false
            }
        );

    } );
</script>
</body>
</html>