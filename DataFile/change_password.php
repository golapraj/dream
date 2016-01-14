<?php
  session_start();
   include "db_connect.php";
  if ((isset($_POST['change'])) )
  {
        if (($_POST['new_password'] == $_POST['confirm_password'])) 
        {
          $username=$_POST['ui'];
          $password=$_POST['cur_password'];
          $newpass=$_POST['new_password'];

          $query = mysql_query("SELECT * FROM `donor` WHERE `donor_id`='$username' AND `password`='$password'");
          $rows = mysql_num_rows($query);

          echo $rows;

          if ($rows == 1) 
          {
            if(mysql_query("UPDATE `donor` SET `password`='$newpass' WHERE `donor_id`='$username'"))
            
          echo '<script type="text/javascript">
          window.onload = function () { alert("Password Changed!!"); }
           </script>';
          }

          else 
          {
            echo '<script type="text/javascript">
          window.onload = function () { alert("Password incorrect!!"); }
           </script>';
          }
        }
        else
        {
          echo '<script type="text/javascript">
          window.onload = function () { alert("Password does not Match!!"); }
           </script>';
        }  
  }
?>




<html>
	<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    
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
	<body style="padding-left:250px;padding-right:250px;padding-top:50px">
		<div>
     	<form action="change_password.php" method="post">
			  <fieldset>
				    <legend style="background:#AD2323;text-align:center;color:#fff;"><b>Manage Password</b></legend>
            
            <div class="form-group col-md-6">
				    <label class="label label-danger">User ID</label> 
            <input class="form-control" name="ui" type="number" size="7" value="<?php if(isset($_SESSION['login_volunteer'])) echo $_SESSION['login_volunteer']; else echo $_SESSION['login_admin']; ?>" readonly="readonly"/>
            </div>

            <div class="form-group col-md-6">
				    <label class="label label-danger">Password</label> 
            <input class="form-control" name="cur_password" type="password" maxlength="20" pattern=".{4,}" required>
            </div>

            <div class="form-group col-md-12">
				    <label class="label label-danger">New Password</label>
            <input class="form-control" name="new_password" type="password" maxlength="20" pattern=".{4,}" required>
				    </div>

            <div class="form-group col-md-12">
            <label class="label label-danger">Confirm Password</label>
            <input class="form-control" name="confirm_password" type="password" maxlength="20" pattern=".{4,}" required>
				    </div>

            <input style="margin-left:150px;margin-right:150px;" class="btn btn-success btn-lg" name="change" type="submit" value="Update" onclick="return confirm('Are you sure?')">
            <input class="btn btn-danger btn-lg" name="cancel" type="submit" value="Cancel" >

			  </fieldset>
			</form>
	    </div>
	</body>
</html>