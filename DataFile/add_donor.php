<?php
        session_start();
        if ( !(isset($_SESSION['login_volunteer'])||isset($_SESSION['login_admin']))) {
            header("Location:index.php");
            die();
        }
?>
<?php
include "db_connect.php";
	if (isset($_POST['submit'])) 
	{

	$roll=$_POST['donorroll'];
	$name=$_POST['donorname'];
	$nickname=$_POST['donornickname'];
	$mobile=$_POST['donormobile'];
	$birth_day=$_POST['donorbirthday'];
	$weight=$_POST['donorweight'];
	$hall=$_POST['donorhall'];
	$blood_group=$_POST['donorbloodgroup'];
	$email=$_POST['donoremail'];

	$deptcode=substr($roll, 2,-3);
     
    $donor_id=hall($hall).$roll;
	$dept=department($deptcode);
	$join_date=date("Y-m-d");

	$time=strtotime('01/01/2015');
	$ftime=date('Y-m-d',$time);

	$last_date_of_donation=$ftime;
	$no_of_donation=0;
	$role="donor";

	$home_district=$_POST['home_district'];
	$current_location=$_POST['current_lacation'];

	if(isset($_SESSION['login_volunteer']))
		$added_by=$_SESSION['login_volunteer'];
	else
		$added_by=$_SESSION['login_admin'];

	add_donor($donor_id,$name,$nickname,$hall,$dept,$blood_group,$mobile,$birth_day,$weight,$join_date,$last_date_of_donation,$no_of_donation,$email,$role,$added_by,$home_district,$current_location);

	}

	

	function add_donor($donor_id,$name,$nickname,$hall,$dept,$blood_group,$mobile,$birth_day,$weight,$join_date,$last_date_of_donation,$no_of_donation,$email,$role,$added_by,$home_district,$current_location)
	{
		$sql = "INSERT INTO `donor`(`donor_id`,`name`,`nickname`,`hall`,`dept`,`blood_group`,`mobile`,`birth_day`,`weight`,`join_date`,`last_date_of_donation`,`no_of_donation`,`email`,`role`,`added_by`,`home_district`,`current_location` )VALUES ('$donor_id','$name','$nickname','$hall','$dept','$blood_group','$mobile','$birth_day','$weight','$join_date','$last_date_of_donation','$no_of_donation','$email','$role','$added_by','$home_district','$current_location')";
	    
	    if(mysql_query($sql))
	    {
	       echo '<script type="text/javascript">
          window.onload = function () { alert("Donor Added!!"); }
           </script>';
           
          header("location:all_donor_detail_process.php?q=$donor_id");
	    }
	    else
	    {
	    	$errx ="\n"+ mysql_errno()+ " : " +mysql_error();
	    	//echo $errx;
	    	echo '<script type="text/javascript">
          window.onload = function () { alert("Failed!!\nDonor already Added!!"); }
           </script>';
	    }
		
	}

	function department($deptcode)
	 {
		if ($deptcode=='07') 
		{
			return "CSE";
		}

		if ($deptcode=='01') 
		{
			return "CE";
		}
		if ($deptcode=='03') 
		{
			return "EEE";
		}
		if ($deptcode=='05') 
		{
			return "ME";
		}
		if ($deptcode=='09') 
		{
			return "ECE";
		}
	 }

	 function hall($hallname)
	 {
         if ($hallname=='Lalan Shah') 
         {
         	return "05";
         }
         if ($hallname=='Begum Rokeya') 
         {
         	return "06";
         }
         if ($hallname=='Amar Ekushy') 
         {
         	return "04";
         }
         if ($hallname=='Khan Jahan Ali') 
         {
         	return "01";
         }
          if ($hallname=='Bangobondhu Sheikh Mujibur Rahman') 
         {
         	return "07";
         }
          if ($hallname=='Dr. M.A Rashid') 
         {
         	return "02";
         }
          if ($hallname=='A.K Fazlul Haque') 
         {
         	return "03";
         }

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


<STYLE TYPE="text/css">
       
input:focus{
         background:#fff;
        border:2px solid #330066;
    background-repeat:no-repeat;
     }
  
   
 
 input:focus:invalid {
         background-image: url('images/redx.png');
         background-position:right;
         background-repeat:no-repeat;
         -moz-box-shadow:none;
     }
  
    
      input:required:valid {
        background-image: url('images/greenx.png');
        background-position:right;
        background-repeat:no-repeat;
        -moz-box-shadow:none;
     }
   
    
   .help {
    display:none;
    font-size:90%;
}
    
  input:focus + .help {
    display:inline-block;
}

   
</STYLE>

	</head>
	<body>
		<div id="main">
		<div id="login" class="form-group" style="padding-left:100px;padding-right:100px;">
		<h2></h2>
		<form action="add_donor.php" method="post">
		<fieldset>
		<legend style="background:#3AA949;text-align:center;color:#fff;">Donor Registration Form</legend>

		<div class="form-group col-md-4">
		<label class="label label-default">Roll :</label>
		<input id="roll" class="form-control" name="donorroll" placeholder="Enter Roll" type="text" maxlength="7" title="e.g 1207005" pattern="[0-9]{7}" required>
		</div>

		<div class="form-group col-md-5">
		<label class="label label-default">Name :</label>
		<input id="name" class="form-control" name="donorname" placeholder="Enter Name" type="text" title="e.g Asaf-Uddowla" required>
		</div>

		<div class="form-group col-md-3">
		<label class="label label-default">Nick Name :</label>
		<input id="nickname" class="form-control" name="donornickname" placeholder="Enter Nick Name" type="text" title="e.g Golap" required>
		</div>

		<div class="form-group col-md-3">
		<label class="label label-default">Blood Group :</label>
        <select id="select" class="form-control" name="donorbloodgroup" required>
            <option value="" disabled selected>Select Blood Group</option>
        	<option>A+</option>
        	<option>A-</option>
        	<option>B+</option>
        	<option>B-</option>
        	<option>AB+</option>
        	<option>AB-</option>
        	<option>O+</option>
        	<option>O-</option>
		</select>
		</div>

		<div class="form-group col-md-3">	
		<label class="label label-default">Birth Day :</label>
		<input id="birthday" class="form-control" name="donorbirthday" type="date">
		</div>

		<div class="form-group col-md-3">
		<label class="label label-default">Weight :</label>
		<input id="weight" class="form-control" name="donorweight" placeholder="Enter Weight" type="number" maxlength="3" pattern="[0-9]" tittle="e.g 44">
		</div>

		<div class="form-group col-md-3">
		<label class="label label-default">Mobile :</label>
		<input id="mobile" class="form-control" name="donormobile" placeholder="Enter Mobile no" type="text" maxlength="11" pattern="[0-9]{11}" tittle="e.g 01735507902" required>
		</div>

		<div class="form-group col-md-6">
		<label class="label label-default">Home District :</label>
        <select id="select" class="form-control" name="home_district">
            <option value="" disabled selected>Select Home District: </option>
            <option value='Bagerhat'>Bagerhat</option>
            <option value='Bandarban'>Bandarban</option>
            <option value='Barguna'>Barguna</option>
            <option value='Barisal'>Barisal</option>
            <option value='Bhola'>Bhola</option>
            <option value='Bogra'>Bogra</option>
            <option value='Brahmanbaria'>Brahmanbaria</option>
            <option value='Chandpur'>Chandpur</option>
            <option value='Chittagong'>Chittagong</option>
            <option value='Chuadanga'>Chuadanga</option>
            <option value='Comilla'>Comilla</option>
            <option value='Cox`s Bazar'>Cox`s Bazar</option>
            <option value='Dhaka'>Dhaka</option>
            <option value='Dinajpur'>Dinajpur</option>
            <option value='Faridpur'>Faridpur</option>
            <option value='Feni'>Feni</option>
            <option value='Gaibandha'>Gaibandha</option>
            <option value='Gazipur'>Gazipur</option>
            <option value='Gopalganj'>Gopalganj</option>
            <option value='Habiganj'>Habiganj</option>
            <option value='Jamalpur'>Jamalpur</option>
            <option value='Jessore'>Jessore</option>
            <option value='Jhalakati'>Jhalakati</option>
            <option value='Jhenaidah'>Jhenaidah</option>
            <option value='Joypurhat'>Joypurhat</option>
            <option value='Khagrachari'>Khagrachari</option>
            <option value='Khulna'>Khulna</option>
            <option value='Kishoreganj'>Kishoreganj</option>
            <option value='Kurigram'>Kurigram</option>
            <option value='Kushtia'>Kushtia</option>
            <option value='Lalmonirhat'>Lalmonirhat</option>
            <option value='Laxmipur'>Laxmipur</option>
            <option value='Madaripur'>Madaripur</option>
            <option value='Magura'>Magura</option>
            <option value='Manikganj'>Manikganj</option>
            <option value='Meherpur'>Meherpur</option>
            <option value='Moulvibazar'>Moulvibazar</option>
            <option value='Munshiganj'>Munshiganj</option>
            <option value='Mymenshing'>Mymenshing</option>
            <option value='Naogaon'>Naogaon</option>
            <option value='Narail'>Narail</option>
            <option value='Narayanganj'>Narayanganj</option>
            <option value='Narsingdi'>Narsingdi</option>
            <option value='Natore'>Natore</option>
            <option value='Nawabganj'>Nawabganj</option>
            <option value='Netrokona'>Netrokona</option>
            <option value='Nilphamari'>Nilphamari</option>
            <option value='Noakhali'>Noakhali</option>
            <option value='Pabna'>Pabna</option>
            <option value='Panchagarh'>Panchagarh</option>
            <option value='Patuakhali'>Patuakhali</option>
            <option value='Pirojpur'>Pirojpur</option>
            <option value='Rajbari'>Rajbari</option>
            <option value='Rajshahi'>Rajshahi</option>
            <option value='Rangamati'>Rangamati</option>
            <option value='Rangpur'>Rangpur</option>
            <option value='Satkhira'>Satkhira</option>
            <option value='Shariyatpur'>Shariyatpur</option>
            <option value='Sherpur'>Sherpur</option>
            <option value='Sirajganj'>Sirajganj</option>
            <option value='Sunamganj'>Sunamganj</option>
            <option value='Sylhet'>Sylhet</option>
            <option value='Tangail'>Tangail</option>
            <option value='Thakurgaon'>Thakurgaon</option>
		</select>

		</div>
        <div class="form-group col-md-6">
		<label class="label label-default">Current Location :</label>
        <select id="select" class="form-control" name="current_lacation">
            <option value="" disabled selected>Select Current Area</option>
            <option value='Bagerhat'>Bagerhat</option>
            <option value='Bandarban'>Bandarban</option>
            <option value='Barguna'>Barguna</option>
            <option value='Barisal'>Barisal</option>
            <option value='Bhola'>Bhola</option>
            <option value='Bogra'>Bogra</option>
            <option value='Brahmanbaria'>Brahmanbaria</option>
            <option value='Chandpur'>Chandpur</option>
            <option value='Chittagong'>Chittagong</option>
            <option value='Chuadanga'>Chuadanga</option>
            <option value='Comilla'>Comilla</option>
            <option value='Cox`s Bazar'>Cox`s Bazar</option>
            <option value='Dhaka'>Dhaka</option>
            <option value='Dinajpur'>Dinajpur</option>
            <option value='Faridpur'>Faridpur</option>
            <option value='Feni'>Feni</option>
            <option value='Gaibandha'>Gaibandha</option>
            <option value='Gazipur'>Gazipur</option>
            <option value='Gopalganj'>Gopalganj</option>
            <option value='Habiganj'>Habiganj</option>
            <option value='Jamalpur'>Jamalpur</option>
            <option value='Jessore'>Jessore</option>
            <option value='Jhalakati'>Jhalakati</option>
            <option value='Jhenaidah'>Jhenaidah</option>
            <option value='Joypurhat'>Joypurhat</option>
            <option value='Khagrachari'>Khagrachari</option>
            <option value='Khulna'>Khulna</option>
            <option value='Kishoreganj'>Kishoreganj</option>
            <option value='Kurigram'>Kurigram</option>
            <option value='Kushtia'>Kushtia</option>
            <option value='Lalmonirhat'>Lalmonirhat</option>
            <option value='Laxmipur'>Laxmipur</option>
            <option value='Madaripur'>Madaripur</option>
            <option value='Magura'>Magura</option>
            <option value='Manikganj'>Manikganj</option>
            <option value='Meherpur'>Meherpur</option>
            <option value='Moulvibazar'>Moulvibazar</option>
            <option value='Munshiganj'>Munshiganj</option>
            <option value='Mymenshing'>Mymenshing</option>
            <option value='Naogaon'>Naogaon</option>
            <option value='Narail'>Narail</option>
            <option value='Narayanganj'>Narayanganj</option>
            <option value='Narsingdi'>Narsingdi</option>
            <option value='Natore'>Natore</option>
            <option value='Nawabganj'>Nawabganj</option>
            <option value='Netrokona'>Netrokona</option>
            <option value='Nilphamari'>Nilphamari</option>
            <option value='Noakhali'>Noakhali</option>
            <option value='Pabna'>Pabna</option>
            <option value='Panchagarh'>Panchagarh</option>
            <option value='Patuakhali'>Patuakhali</option>
            <option value='Pirojpur'>Pirojpur</option>
            <option value='Rajbari'>Rajbari</option>
            <option value='Rajshahi'>Rajshahi</option>
            <option value='Rangamati'>Rangamati</option>
            <option value='Rangpur'>Rangpur</option>
            <option value='Satkhira'>Satkhira</option>
            <option value='Shariyatpur'>Shariyatpur</option>
            <option value='Sherpur'>Sherpur</option>
            <option value='Sirajganj'>Sirajganj</option>
            <option value='Sunamganj'>Sunamganj</option>
            <option value='Sylhet'>Sylhet</option>
            <option value='Tangail'>Tangail</option>
            <option value='Thakurgaon'>Thakurgaon</option>
		</select>
		</div>


		<div class="form-group col-md-6">
		<label class="label label-default">Hall :</label>
        <select id="select" class="form-control" name="donorhall" required>
            <option value="" disabled selected>Select Hall</option>
        	<option>Lalan Shah</option>
        	<option>Begum Rokeya</option>
        	<option>Amar Ekushy</option>
        	<option>Khan Jahan Ali</option>
        	<option>Bangobondhu Sheikh Mujibur Rahman</option>
        	<option>Dr. M.A Rashid</option>
        	<option>A.K Fazlul Haque</option>
		</select>
		</div>

		<div class="form-group col-md-6">
		<label class="label label-default">E-mail :</label>
		<input id="email" class="form-control" name="donoremail" placeholder="golapraj@yahoo.com" title="e.g golap.cse.kuet@gmail.com" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"><br/>
		</div>

		<input style="margin-left:450px;width:150px;" class="btn btn-success btn-lg" name="submit" type="submit" value=" Add ">
		</fieldset>
		</form>
		</div>
		</div>
	</body>
</html>