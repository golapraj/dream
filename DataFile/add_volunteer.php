<?php
    include "db_connect.php";
    $search_text = $_GET['q'];
	$query = "SELECT * FROM `donor` WHERE `donor_id`='$search_text'";  
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
?>
<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/main.css">

	</head>
	<body style="padding:20px;">
		<div class="form-group">
     	<form action="update_volunteer.php" method="post">
			  <fieldset>
				    <legend style="background:#3AA949;text-align:center;color:#fff;">-:<?php echo $row['name']; ?> Profile:-</legend>
				    
				    <div class="form-group col-md-3">
				    <label class="label label-default">Donar Id</label> 
				    <input class="form-control" name="donorid" type="text" size="7" value="<?php echo $row['donor_id']; ?>" readonly="readonly">
				    </div>

				     <div class="form-group col-md-6">
				    <label class="label label-default">Name</label> 
				    <input class="form-control" name="name" type="text" value="<?php echo $row['name']; ?>">
				    </div>

				    <div class="form-group col-md-3">
				    <label class="label label-default">Name</label> 
				    <input class="form-control" name="name" type="text" value="<?php echo $row['nickname']; ?>">
				    </div>

				    <div class="form-group col-md-4">
				    <label class="label label-default">Dept</label>
				    <input class="form-control" name="ndept" type="text" size="20" value="<?php echo $row['dept']; ?>" readonly="readonly">
				    </div>

				    <div class="form-group col-md-4">
			        <label class="label label-default">Mobile</label>
			        <input class="form-control" name="mobile" type="text" maxlength="11" value="<?php echo $row['mobile']; ?>" pattern="[0-9]{11}" title="Number Only">
			        </div>

			        <div class="form-group col-md-4">
				    <label class="label label-default">Birth Day</label>
				    <input class="form-control" name="birthday" type="date" maxlength="11" value="<?php echo $row['birth_day']; ?>" title="enter correct date">
				    </div>

				    <div class="form-group col-md-3">
				    <label class="label label-default">Blood Group</label>
				    	 <select class="form-control" id="select" name="bloodgroup">
				       		<option  <?php if ($row['blood_group'] == "A+" ) echo 'selected'; ?> >A+</option>
				        	<option <?php if ($row['blood_group'] == "A-" ) echo 'selected'; ?> >A-</option>
				        	<option <?php if ($row['blood_group'] == "B+" ) echo 'selected'; ?> >B+</option>
				        	<option <?php if ($row['blood_group'] == "B-" ) echo 'selected'; ?> >B-</option>
				        	<option <?php if ($row['blood_group'] == "AB+" ) echo 'selected'; ?> >AB+</option>
				        	<option <?php if ($row['blood_group'] == "AB-" ) echo 'selected'; ?> >AB-</option>
				        	<option <?php if ($row['blood_group'] == "O+" ) echo 'selected'; ?> >O+</option>
				        	<option <?php if ($row['blood_group'] == "O-" ) echo 'selected'; ?> >O-</option>
						</select>
					</div>

				    <div class="form-group col-md-3">
				    <label class="label label-default">Weight</label>
				    <input class="form-control" name="weight" type="number" size="3" value="<?php echo $row['weight']; ?>">
				    </div>

				    <div class="form-group col-md-3">
				    <label class="label label-default">Last Donation Date</label>   
					<input class="form-control" name="lastdonationdate" type="date" size="11" value="<?php echo $row['last_date_of_donation']; ?>">
					</div>

					<div class="form-group col-md-3">
				    <label class="label label-default">No. of Donation</label>
				    <input class="form-control" name="noofdonation" type="text" size="11" value="<?php echo $row['no_of_donation']; ?>">
				    </div>

				    <div class="form-group col-md-4">
				    <label class="label label-default">Entry Date</label>
				    <input class="form-control" name="entrydate" type="date" size="11" value="<?php echo $row['join_date']; ?>" readonly="readonly">
				    </div>

				    <div class="form-group col-md-4">
					<label class="label label-default">Hall</label>
				    <input class="form-control" name="hall" type="text" size="33" value="<?php echo $row['hall']; ?>" readonly="readonly">
				    </div>

				    <div class="form-group col-md-4">
				    <label class="label label-default">E-mail</label>
				    <input class="form-control" name="email" type="text" size="11" value="<?php echo $row['email']; ?>">
					</div>

					<center>
					<?php 
						if($row['role']=='donor')
						{
					?>
				    <input style="width:120px;height:50px;" class="btn btn-success btn-xs" name="make" type="submit" value="Make Volunteer" onClick="return confirm('Are you sure to Make Volunteer?');">
				    <?php
				    	}
				   		if ($row['role']=='volunteer')
				   		{
				    ?>
				    <input style="width:120px;height:50px;" class="btn btn-danger btn-xs" name="remove" type="submit" value="Remove Volunteer" onClick="return confirm('Are you sure to Remove Volunteer?');">
			  		<?php
			  			}
			  		?>
			  		</center>
			  </fieldset>
			</form>
	    </div>
	</body>
</html>
