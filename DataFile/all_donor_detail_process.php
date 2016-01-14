<?php
	session_start();
    include "db_connect.php";
    $search_text = urldecode(filter_var(trim($_GET['q'])));
	$query = "SELECT * FROM `donor` WHERE `donor_id`='$search_text'";  
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);

	function volname($volid)
    {
        $q = "SELECT * FROM `donor` WHERE `donor_id`='$volid'";
        $re = mysql_query($q);
        $r = mysql_fetch_array($re);
        return $r['nickname'];
    }
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
     	<form action="all_donor_detail_process_update.php" method="post">
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
				    <label class="label label-default">Nick Name</label> 
				    <input class="form-control" name="nickname" type="text" value="<?php echo $row['nickname']; ?>">
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

				    <div class="form-group col-md-4">
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


					<div class="form-group col-md-4">
					<label class="label label-default">Hall</label>
				    <input class="form-control" name="hall" type="text" size="33" value="<?php echo $row['hall']; ?>" readonly="readonly">
				    </div>

				    <div class="form-group col-md-4">
				    <label class="label label-default">Weight</label>
				    <input class="form-control" name="weight" type="number" size="3" value="<?php echo $row['weight']; ?>">
					</div>

					<div class="form-group col-md-4">
				    <label class="label label-default">Last Donation Date</label>   
					<input class="form-control" name="lastdonationdate" type="date" size="11" value="<?php echo $row['last_date_of_donation']; ?>">
					</div>

					<div class="form-group col-md-4">
				    <label class="label label-default">No. of Donation</label>
				    <input class="form-control" name="noofdonation" type="text" size="11" value="<?php echo $row['no_of_donation']; ?>">
				    </div>

				    <div class="form-group col-md-4">
				    <label class="label label-default">E-mail</label>
				    <input class="form-control" name="email" type="text" size="11" value="<?php echo $row['email']; ?>">
				    </div>

				    <div class="form-group col-md-6">
					<label class="label label-default">Home District :</label>
			        <select id="select" class="form-control" name="homdis">
			            <option value="" disabled>Select Home District</option>
			            <option <?php if ($row['home_district'] == "Bagerhat") echo 'selected'; ?>  >Bagerhat</option>
			            <option <?php if ($row['home_district'] == "Bandarban") echo 'selected'; ?>  >Bandarban</option>
			            <option <?php if ($row['home_district'] == "Barguna") echo 'selected'; ?>  >Barguna</option>
			            <option <?php if ($row['home_district'] == "Barisal") echo 'selected'; ?>  >Barisal</option>
			            <option <?php if ($row['home_district'] == "Bhola") echo 'selected'; ?>  >Bhola</option>
			            <option <?php if ($row['home_district'] == "Bogra") echo 'selected'; ?>  >Bogra</option>
			            <option <?php if ($row['home_district'] == "Brahmanbaria") echo 'selected'; ?>  >Brahmanbaria</option>
			            <option <?php if ($row['home_district'] == "Chandpur") echo 'selected'; ?>  >Chandpur</option>
			            <option <?php if ($row['home_district'] == "Chittagong") echo 'selected'; ?>  >Chittagong</option>
			            <option <?php if ($row['home_district'] == "Chuadanga") echo 'selected'; ?>  >Chuadanga</option>
			            <option <?php if ($row['home_district'] == "Comilla") echo 'selected'; ?>  >Comilla</option>
			            <option <?php if ($row['home_district'] == "Cox`s Bazar") echo 'selected'; ?>  >Cox`s Bazar</option>
			            <option <?php if ($row['home_district'] == "Dhaka") echo 'selected'; ?>  >Dhaka</option>
			            <option <?php if ($row['home_district'] == "Dinajpur") echo 'selected'; ?>  >Dinajpur</option>
			            <option <?php if ($row['home_district'] == "Faridpur") echo 'selected'; ?>  >Faridpur</option>
			            <option <?php if ($row['home_district'] == "Feni") echo 'selected'; ?>  >Feni</option>
			            <option <?php if ($row['home_district'] == "Gaibandha") echo 'selected'; ?>  >Gaibandha</option>
			            <option <?php if ($row['home_district'] == "Gazipur") echo 'selected'; ?>  >Gazipur</option>
			            <option <?php if ($row['home_district'] == "Gopalganj") echo 'selected'; ?>  >Gopalganj</option>
			            <option <?php if ($row['home_district'] == "Habiganj") echo 'selected'; ?>  >Habiganj</option>
			            <option <?php if ($row['home_district'] == "Jamalpur") echo 'selected'; ?>  >Jamalpur</option>
			            <option <?php if ($row['home_district'] == "Jessore") echo 'selected'; ?>  >Jessore</option>
			            <option <?php if ($row['home_district'] == "Jhalakati") echo 'selected'; ?>  >Jhalakati</option>
			            <option <?php if ($row['home_district'] == "Jhenaidah") echo 'selected'; ?>  >Jhenaidah</option>
			            <option <?php if ($row['home_district'] == "Joypurhat") echo 'selected'; ?>  >Joypurhat</option>
			            <option <?php if ($row['home_district'] == "Khagrachari") echo 'selected'; ?>  >Khagrachari</option>
			            <option <?php if ($row['home_district'] == "Khulna") echo 'selected'; ?>  >Khulna</option>
			            <option <?php if ($row['home_district'] == "Kishoreganj") echo 'selected'; ?>  >Kishoreganj</option>
			            <option <?php if ($row['home_district'] == "Kurigram") echo 'selected'; ?>  >Kurigram</option>
			            <option <?php if ($row['home_district'] == "Kushtia") echo 'selected'; ?>  >Kushtia</option>
			            <option <?php if ($row['home_district'] == "Lalmonirhat") echo 'selected'; ?>  >Lalmonirhat</option>
			            <option <?php if ($row['home_district'] == "Laxmipur") echo 'selected'; ?>  >Laxmipur</option>
			            <option <?php if ($row['home_district'] == "Madaripur") echo 'selected'; ?>  >Madaripur</option>
			            <option <?php if ($row['home_district'] == "Magura") echo 'selected'; ?>  >Magura</option>
			            <option <?php if ($row['home_district'] == "Manikganj") echo 'selected'; ?>  >Manikganj</option>
			            <option <?php if ($row['home_district'] == "Meherpur") echo 'selected'; ?>  >Meherpur</option>
			            <option <?php if ($row['home_district'] == "Moulvibazar") echo 'selected'; ?>  >Moulvibazar</option>
			            <option <?php if ($row['home_district'] == "Munshiganj") echo 'selected'; ?>  >Munshiganj</option>
			            <option <?php if ($row['home_district'] == "Mymenshing") echo 'selected'; ?>  >Mymenshing</option>
			            <option <?php if ($row['home_district'] == "Naogaon") echo 'selected'; ?>  >Naogaon</option>
			            <option <?php if ($row['home_district'] == "Narail") echo 'selected'; ?>  >Narail</option>
			            <option <?php if ($row['home_district'] == "Narayanganj") echo 'selected'; ?>  >Narayanganj</option>
			            <option <?php if ($row['home_district'] == "Narsingdi") echo 'selected'; ?>  >Narsingdi</option>
			            <option <?php if ($row['home_district'] == "Natore") echo 'selected'; ?>  >Natore</option>
			            <option <?php if ($row['home_district'] == "Nawabganj") echo 'selected'; ?>  >Nawabganj</option>
			            <option <?php if ($row['home_district'] == "Netrokona") echo 'selected'; ?>  >Netrokona</option>
			            <option <?php if ($row['home_district'] == "Nilphamari") echo 'selected'; ?>  >Nilphamari</option>
			            <option <?php if ($row['home_district'] == "Noakhali") echo 'selected'; ?>  >Noakhali</option>
			            <option <?php if ($row['home_district'] == "Pabna") echo 'selected'; ?>  >Pabna</option>
			            <option <?php if ($row['home_district'] == "Panchagarh") echo 'selected'; ?>  >Panchagarh</option>
			            <option <?php if ($row['home_district'] == "Patuakhali") echo 'selected'; ?>  >Patuakhali</option>
			            <option <?php if ($row['home_district'] == "Pirojpur") echo 'selected'; ?>  >Pirojpur</option>
			            <option <?php if ($row['home_district'] == "Rajbari") echo 'selected'; ?>  >Rajbari</option>
			            <option <?php if ($row['home_district'] == "Rajshahi") echo 'selected'; ?>  >Rajshahi</option>
			            <option <?php if ($row['home_district'] == "Rangamati") echo 'selected'; ?>  >Rangamati</option>
			            <option <?php if ($row['home_district'] == "Rangpur") echo 'selected'; ?>  >Rangpur</option>
			            <option <?php if ($row['home_district'] == "Satkhira") echo 'selected'; ?>  >Satkhira</option>
			            <option <?php if ($row['home_district'] == "Shariyatpur") echo 'selected'; ?>  >Shariyatpur</option>
			            <option <?php if ($row['home_district'] == "Sherpur") echo 'selected'; ?>  >Sherpur</option>
			            <option <?php if ($row['home_district'] == "Sirajganj") echo 'selected'; ?>  >Sirajganj</option>
			            <option <?php if ($row['home_district'] == "Sunamganj") echo 'selected'; ?>  >Sunamganj</option>
			            <option <?php if ($row['home_district'] == "Sylhet") echo 'selected'; ?>  >Sylhet</option>
			            <option <?php if ($row['home_district'] == "Tangail") echo 'selected'; ?>  >Tangail</option>
			            <option <?php if ($row['home_district'] == "Thakurgaon") echo 'selected'; ?>  >Thakurgaon</option>
					</select>
				    </div>


				    <div class="form-group col-md-6">
					<label class="label label-default">Current Location :</label>
			        <select id="select" class="form-control" name="currloc">
			            <option value="" disabled>Select Current Location</option>
			            <option <?php if ($row['current_location'] == "Bagerhat") echo 'selected'; ?>  >Bagerhat</option>
			            <option <?php if ($row['current_location'] == "Bandarban") echo 'selected'; ?>  >Bandarban</option>
			            <option <?php if ($row['current_location'] == "Barguna") echo 'selected'; ?>  >Barguna</option>
			            <option <?php if ($row['current_location'] == "Barisal") echo 'selected'; ?>  >Barisal</option>
			            <option <?php if ($row['current_location'] == "Bhola") echo 'selected'; ?>  >Bhola</option>
			            <option <?php if ($row['current_location'] == "Bogra") echo 'selected'; ?>  >Bogra</option>
			            <option <?php if ($row['current_location'] == "Brahmanbaria") echo 'selected'; ?>  >Brahmanbaria</option>
			            <option <?php if ($row['current_location'] == "Chandpur") echo 'selected'; ?>  >Chandpur</option>
			            <option <?php if ($row['current_location'] == "Chittagong") echo 'selected'; ?>  >Chittagong</option>
			            <option <?php if ($row['current_location'] == "Chuadanga") echo 'selected'; ?>  >Chuadanga</option>
			            <option <?php if ($row['current_location'] == "Comilla") echo 'selected'; ?>  >Comilla</option>
			            <option <?php if ($row['current_location'] == "Cox`s Bazar") echo 'selected'; ?>  >Cox`s Bazar</option>
			            <option <?php if ($row['current_location'] == "Dhaka") echo 'selected'; ?>  >Dhaka</option>
			            <option <?php if ($row['current_location'] == "Dinajpur") echo 'selected'; ?>  >Dinajpur</option>
			            <option <?php if ($row['current_location'] == "Faridpur") echo 'selected'; ?>  >Faridpur</option>
			            <option <?php if ($row['current_location'] == "Feni") echo 'selected'; ?>  >Feni</option>
			            <option <?php if ($row['current_location'] == "Gaibandha") echo 'selected'; ?>  >Gaibandha</option>
			            <option <?php if ($row['current_location'] == "Gazipur") echo 'selected'; ?>  >Gazipur</option>
			            <option <?php if ($row['current_location'] == "Gopalganj") echo 'selected'; ?>  >Gopalganj</option>
			            <option <?php if ($row['current_location'] == "Habiganj") echo 'selected'; ?>  >Habiganj</option>
			            <option <?php if ($row['current_location'] == "Jamalpur") echo 'selected'; ?>  >Jamalpur</option>
			            <option <?php if ($row['current_location'] == "Jessore") echo 'selected'; ?>  >Jessore</option>
			            <option <?php if ($row['current_location'] == "Jhalakati") echo 'selected'; ?>  >Jhalakati</option>
			            <option <?php if ($row['current_location'] == "Jhenaidah") echo 'selected'; ?>  >Jhenaidah</option>
			            <option <?php if ($row['current_location'] == "Joypurhat") echo 'selected'; ?>  >Joypurhat</option>
			            <option <?php if ($row['current_location'] == "Khagrachari") echo 'selected'; ?>  >Khagrachari</option>
			            <option <?php if ($row['current_location'] == "Khulna") echo 'selected'; ?>  >Khulna</option>
			            <option <?php if ($row['current_location'] == "Kishoreganj") echo 'selected'; ?>  >Kishoreganj</option>
			            <option <?php if ($row['current_location'] == "Kurigram") echo 'selected'; ?>  >Kurigram</option>
			            <option <?php if ($row['current_location'] == "Kushtia") echo 'selected'; ?>  >Kushtia</option>
			            <option <?php if ($row['current_location'] == "Lalmonirhat") echo 'selected'; ?>  >Lalmonirhat</option>
			            <option <?php if ($row['current_location'] == "Laxmipur") echo 'selected'; ?>  >Laxmipur</option>
			            <option <?php if ($row['current_location'] == "Madaripur") echo 'selected'; ?>  >Madaripur</option>
			            <option <?php if ($row['current_location'] == "Magura") echo 'selected'; ?>  >Magura</option>
			            <option <?php if ($row['current_location'] == "Manikganj") echo 'selected'; ?>  >Manikganj</option>
			            <option <?php if ($row['current_location'] == "Meherpur") echo 'selected'; ?>  >Meherpur</option>
			            <option <?php if ($row['current_location'] == "Moulvibazar") echo 'selected'; ?>  >Moulvibazar</option>
			            <option <?php if ($row['current_location'] == "Munshiganj") echo 'selected'; ?>  >Munshiganj</option>
			            <option <?php if ($row['current_location'] == "Mymenshing") echo 'selected'; ?>  >Mymenshing</option>
			            <option <?php if ($row['current_location'] == "Naogaon") echo 'selected'; ?>  >Naogaon</option>
			            <option <?php if ($row['current_location'] == "Narail") echo 'selected'; ?>  >Narail</option>
			            <option <?php if ($row['current_location'] == "Narayanganj") echo 'selected'; ?>  >Narayanganj</option>
			            <option <?php if ($row['current_location'] == "Narsingdi") echo 'selected'; ?>  >Narsingdi</option>
			            <option <?php if ($row['current_location'] == "Natore") echo 'selected'; ?>  >Natore</option>
			            <option <?php if ($row['current_location'] == "Nawabganj") echo 'selected'; ?>  >Nawabganj</option>
			            <option <?php if ($row['current_location'] == "Netrokona") echo 'selected'; ?>  >Netrokona</option>
			            <option <?php if ($row['current_location'] == "Nilphamari") echo 'selected'; ?>  >Nilphamari</option>
			            <option <?php if ($row['current_location'] == "Noakhali") echo 'selected'; ?>  >Noakhali</option>
			            <option <?php if ($row['current_location'] == "Pabna") echo 'selected'; ?>  >Pabna</option>
			            <option <?php if ($row['current_location'] == "Panchagarh") echo 'selected'; ?>  >Panchagarh</option>
			            <option <?php if ($row['current_location'] == "Patuakhali") echo 'selected'; ?>  >Patuakhali</option>
			            <option <?php if ($row['current_location'] == "Pirojpur") echo 'selected'; ?>  >Pirojpur</option>
			            <option <?php if ($row['current_location'] == "Rajbari") echo 'selected'; ?>  >Rajbari</option>
			            <option <?php if ($row['current_location'] == "Rajshahi") echo 'selected'; ?>  >Rajshahi</option>
			            <option <?php if ($row['current_location'] == "Rangamati") echo 'selected'; ?>  >Rangamati</option>
			            <option <?php if ($row['current_location'] == "Rangpur") echo 'selected'; ?>  >Rangpur</option>
			            <option <?php if ($row['current_location'] == "Satkhira") echo 'selected'; ?>  >Satkhira</option>
			            <option <?php if ($row['current_location'] == "Shariyatpur") echo 'selected'; ?>  >Shariyatpur</option>
			            <option <?php if ($row['current_location'] == "Sherpur") echo 'selected'; ?>  >Sherpur</option>
			            <option <?php if ($row['current_location'] == "Sirajganj") echo 'selected'; ?>  >Sirajganj</option>
			            <option <?php if ($row['current_location'] == "Sunamganj") echo 'selected'; ?>  >Sunamganj</option>
			            <option <?php if ($row['current_location'] == "Sylhet") echo 'selected'; ?>  >Sylhet</option>
			            <option <?php if ($row['current_location'] == "Tangail") echo 'selected'; ?>  >Tangail</option>
			            <option <?php if ($row['current_location'] == "Thakurgaon") echo 'selected'; ?>  >Thakurgaon</option>
					</select>
				    </div>

				    <div class="form-group col-md-4">
				    <label class="label label-default">Entry Date</label>
				    <input class="form-control" name="entrydate" type="date" size="11" value="<?php echo $row['join_date']; ?>" readonly="readonly">
				    </div>

				    <div class="form-group col-md-4">
				    <label class="label label-default">Adder</label>
				    <input class="form-control" name="adder" type="text" size="11" value="<?php echo volname($row['added_by']); ?>" readonly="readonly">
				    </div>

				    <div class="form-group col-md-4">
				    <label class="label label-default">Last Updater</label>
				    <input class="form-control" name="lastupdateby" type="text" size="11" value="<?php echo volname($row['last_updated_by']); ?>" readonly="readonly">
				    </div>

				    <?php
				    if(isset($_SESSION['login_admin']))
				    {
				    	if($row['role']!='donor')
				    	{
				    ?>

				    <div class="form-group col-md-6">
				    <label class="label label-default">Password</label>
				    <input class="form-control" name="password" type="text" size="11" value="<?php echo $row['password']; ?>">
				    </div>

				    <div class="form-group col-md-6">
				    <label class="label label-default">Tk</label>
				    <input class="form-control" name="tk" type="text" size="11" value="<?php echo $row['tk']; ?>">
				    </div>

				    <?php
						}
					}
				    ?>

				    <input style="margin-left:350px;width:120px;" class="btn btn-success btn-lg" name="change" type="submit" value="Update"  <?php if(isset($_SESSION['login_volunteer']) && $row['role']=='volunteer' && $_SESSION['login_volunteer']!=$row['donor_id'] ) echo "disabled"; ?> >
				    <input style="margin-left:350px;width:120px;" class="btn btn-danger btn-lg" name="delete" type="submit" onclick="return confirm('Are you sure?')" value="Delete" <?php if(isset($_SESSION['login_volunteer']) && $row['role']=='volunteer' ) echo "disabled"; ?> >

			  </fieldset>
			</form>
	</body>
</html>
