<?php
session_start();
include "db_connect.php";

 $noticeid = $_GET['f'];
  $q = "SELECT * FROM `notice` WHERE `sl`='$noticeid'";
  $re = mysql_query($q);
 $r = mysql_fetch_array($re); 
       
?>



<?php
    if(isset($_COOKIE['admin'])) 
    {
              $_SESSION['login_admin']=$_COOKIE['admin'];
              
                  header('Location: admin.php');
    } 

    if (isset($_SESSION['login_admin'])) 
    {
       
              header('Location: admin.php'); 
    }

    if(isset($_COOKIE['volunteer'])) 
    {
              $_SESSION['login_volunteer']=$_COOKIE['username'];
              header('Location: volunteer.php');   
    } 
    
    if (isset($_SESSION['login_volunteer'])) 
    {
          header('Location: volunteer.php');   
    }

   
    $_SESSION['error']="";
    if (isset($_POST['submit']))
    {
            $username=$_POST['username'];
            $password=$_POST['password'];
          //  $connection = mysql_connect("localhost", "root", "");
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysql_real_escape_string($username);
            $password = mysql_real_escape_string($password);

            $query = mysql_query("SELECT * FROM `donor` WHERE `role`!='donor' AND `password`='$password' AND `donor_id`='$username'");
            $rows = mysql_num_rows($query);

            if ($rows == 1) 
            {

               if ($username=="051207005") 
                {
                    $_SESSION['login_admin']=$username;
                     if (isset($_POST['remember'])) 
                            {
                                setcookie('admin', $username, time()+3600);
                            } 
                    header("location:admin.php");
                }
                else
                {

                $_SESSION['login_volunteer']=$username;

                        if (isset($_POST['remember'])) 
                        {
                            setcookie('volunteer', $username, time()+3600);
                         } 
             
                header("location:volunteer.php");
                }
            }
            else 
            {
                //$_SESSION['error']="Error";
                //header("location:index.php");
                echo '<script type="text/javascript">
          window.onload = function () { alert("Username or password is incorrect!!"); }
          </script>';
            }
    }
?>

<html>
<head>
    <title>Dream, Voluntary Blood Donation Society of KUET</title>
    <link rel="icon" href="images/cse-logo.png" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/social.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/indexFAQ.css">
    <script>
var myVar=setInterval(function(){myTimer()},1000);

function myTimer() {
    var d = new Date();
    document.getElementById("clock").innerHTML = d.toLocaleTimeString();
}
</script>


<link rel="stylesheet" type="text/css" href="slider/themes/bar/bar.css"/>
</head>
<body>

    <div class="header">

        <div class="banar">
            <h1><img id="cse" src="images/dream.png"> dream</h1>
            <small style="color:#fff;padding-left:20px;">give the gifts that costs nothing to give</small>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="index.php"> <i class="glyphicon glyphicon-home"></i>  Home </a> </li>
                <li> <a href="#"><i class="glyphicon glyphicon-book"></i> About dream </a> </li> 
                <li> <a href="dream_com.php" ><i class="glyphicon glyphicon-book"></i> Dream committee </a> </li> 
                <li> <a href="photoGallery.php"><i class="glyphicon glyphicon-book"></i> Photo Gallery </a> </li>
                <li> <a href="FAQs.php"><i class="glyphicon glyphicon-book"></i> FAQs </a> </li>
                <li> <a href="ContactUs.php"><i class="glyphicon glyphicon-book"></i> Contact Us </a> </li>
                <li> <a href="#signIn" data-toggle="modal" data-target="#signIn"> <i class="glyphicon glyphicon-lock"></i> Sign In</a> </li> 
            </ul>
        </div>

    </div>

<div class="content">
<div class="main_content">

<center><h3 style="color:green;"><?php echo $r['tittle']; ?></h3></center>
<hr style="border-top:2px solid green;">

<?php
     echo nl2br(stripslashes($r['details']));
?>
</div>
                

<div class="footer">
    <br>
    <p>
        &copy; Dream, Voluntary Blood Donation Society of KUET, All rights reserved.<br>
        follow us on:
    <a href="https://www.facebook.com/DreamKuet" class="btn btn-social-icon btn-facebook">
    <i class="fa fa-facebook"></i>
    </a>
    <a class="btn btn-social-icon btn-twitter">
    <i class="fa fa-twitter"></i>
    </a>
    </p>
    <hr>
    <p>Developed by: Md. Asaf-Uddowla Golap </p>
</div>

</div>


   <!-- Sign in Modal -->
        <div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Sign In</h4>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" value="1"> Remember me
                            </label>
                        </div>

                        <div class="form-group ">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" style="margin-left: 10px" value="Sign in">
                            &nbsp;&nbsp;
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>               
                        </div>
                    </form>             
                </div>
            </div>
        </div>
    </div>

    <script src="libs/jquery/jquery.min.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>