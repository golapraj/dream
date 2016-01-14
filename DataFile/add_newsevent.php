
<?php
    include "db_connect.php";

	if (isset($_POST['submit'])) 
	{

	$tittle=$_POST['tittle'];
	$last_date=$_POST['date'];
	$details=$_POST['details'];
	$entry_date=date("Y-m-d");
	$type=$_POST['type'];

	function add_donor($tittle,$last_date,$details,$entry_date,$type)
	{
		$sql = "INSERT INTO `notice`(`tittle`,`last_date`,`details`,`entry_date`,`type`) VALUES ('$tittle','$last_date','$details','$entry_date', '$type')";
	    if(mysql_query($sql))
	    {
	    	
	    	echo '<script type="text/javascript">
          window.onload = function () { alert("Notice Added!!"); }
           </script>';
	    	
	    }
	    else
	    {
	    	$errx ="\n"+ mysql_errno()+ " : " +mysql_error();
	    	//echo $errx;
	    	echo '<script type="text/javascript">
          window.onload = function () { alert("Failed!!!!"); }
           </script>';
	    }
		
	}

		add_donor($tittle,$last_date,$details,$entry_date,$type);


	}

	else
	{
			 session_start();
        if ( !(isset($_SESSION['login_volunteer'])||isset($_SESSION['login_admin']))) 
        {
            header("Location:index.php");
            die();
        }
           $type = urldecode(filter_var(trim($_GET['q'])));
	}
?>




<html>
	<head>
		<title>add student</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/main.css">

	</head>
	<body>
		<div id="main">
		<div id="login" class="form-group" style="padding-left:100px;padding-right:100px;">
		<h2></h2>
		<form action="add_newsevent.php" method="post">
		<input type="hidden" name="type" value="<?php echo $type; ?>">
		<fieldset>
		<legend style="background:#3AA949;text-align:center;color:#fff;">Notice Registration Form</legend>

		<div class="form-group col-md-6">
		<label class="label label-primary">Notice Tittle</label>
		<input id="tittle" class="form-control" name="tittle" type="text" placeholder="Enter Tittle" required>
		</div>

		<div class="form-group col-md-6">
		<label class="label label-danger">Last Date</label>
		<input id="date" class="form-control" name="date" type="date" required>
		</div>

		<label class="label label-primary">Details</label>
		<textarea class="form-control" rows="15" id="details" name="details" placeholder="details" required></textarea><br/>
		
		<input style="margin-left:450px;width:150px;" class="btn btn-success btn-lg" name="submit" type="submit" value=" Add ">
		</fieldset>
		</form>
		</div>
		</div>
	</body>
</html>