<?php
    session_start();
    include "DataFile/db_connect.php";
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
<div class="container">

  <h1> -:Frequently Asked Questions and Answers:- </h1>

<div class="panel-group" id="accordion">
       
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">What is blood? How much blood does a human body contain?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                     Blood is the red colored fluid flowing continuously in the human body’s circulatory system, on an average, a human being has about 5-6 liters of blood flowing in the body. About 7%of the body weight of a healthy individual is accounted for by blood 
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">What is the composition of blood?</a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="panel-body">
                    Blood mainly contains a fluid called plasma which has three types of cells – Red Blood Cells or RBC’s,
                    White Blood Cells or WBC’s and plate lets. Plasma acts as a vehicle to carry nutrition including protein, glucose, enzymes, and hormones etc; Red blood cells carry oxygen from the lungs to various body tissues; White blood cells help the immune system of the body and platelets facilitate the process of clotting and coagulation of blood.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">What is Blood formed</a>
                </h4>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse">
                <div class="panel-body">
                    The RBC, granulocytes of WBC and platelets are produced mainly by bone marrow. The lymphocytes and monocytes are formed in the lymphoid and reticulo-endothelial tissues. The orderly proliferation of the cells in the bone marrow and their release into the circulatory system is carefully regulated according to the needs of the body. Every day, 
                    new blood cells are produced in the bone marrow and every day old cells die and are removed from the body.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">What is the natural life of blood cells</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    Red blood cells have a life of about 120 days, white blood cells live for a few days and platelets for a few hours. The addition of new cells and removal of old cells is a continuous process
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">What is haemoglobin?</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                   Haemoglobin is a substance present in the red blood cells. It helps in carrying oxygen and carbon dioxide to different parts of the body. On an average,
                   the haemoglobin level for a healthy male should be between 14-16 gm % and for a female between 12-­14 gm %.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">What are blood groups</a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                  Every individual belongs to two major types of blood groups. The first is called the ABO -group and the second type is called the Rh-group. In the ABO-group there are four categories namely: A Group, B Group, O Group and AB Group.
                  In the Rh -group either the individual is Rh-posltive, or Rh-negative. Rh denotes the Rhesus factor named for Rhesus monkeys.
                  Thus every human being belongs to one of the following  groups.

                <li>A positive or A negative</li>
                <li>B positive or B negative</li>
                <li>O positive or O negative</li>
                <li>AB positive or AB negative</li>
                <li>The positive or negative aspect is based on the Rh factor.</li>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">What is the importance of knowing the blood groups?</a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                    For all practical and routine purposes, it is ideal to transfuse to the patient the same group of blood which he/she belongs to. Under no circumstances can an 0 group person get any other blood except O. Similarly, an A group patient cannot be given B group blood and vice versa.
                     It is only in a dire emergency that we take 0 group as a universal donor and AB groups as universal recipient.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">Why is an A group person not given B group blood?</a>
                </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse">
                <div class="panel-body">
                   The blood of an A group person contains anti-B group antibodies. In those with B group blood, there are anti –A group antibodies.
                    If we give A group blood to a B group patient, it is bound to be incompatible and will result in serious consequences.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">Why are Rh negative and Rh positive incompatible?</a>
                </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse">
                <div class="panel-body">
                    A patient with Rh-negative blood cannot be given Rh­ positive blood as the antigen-antibody reaction will result in severe consequences.
                    In cases where a woman is Rh negative and her husband is Rh positive , the first child with Rh positive may be normal. But, subsequently, the woman may not conceive or may have repeated abortions. There may be intra-uterine fetal death. If the child born is alive, it will suffer from a fatal disease called “Erythroblastosis Foetalis”.
                     Now, mothers can be given an injection of anti -D within 24 hours of the delivery of a Rh-positive child and thus protect the next baby from this catastrophe.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">What is a unit of blood?</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                  Blood is collected in plastic bags which contain a liquid chemical which prevents blood from coagulating.
                  On an average, about 450 ml. of blood is collected from a person. 
                  This blood, plus the amount of anti-coagulant present in the bottle or bag, is known as one unit of blood.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">For how long can blood be stored?</a>
                </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse">
                <div class="panel-body">
                   Whole blood can be stored for up to 21 days, when kept in CPDA anti-coagulant solution and refrigerated at 2 -4°C.
                </div>
            </div>
        </div>

    </div>


</div>
</div>

<h1>
</h1>
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



<script type="text/javascript" src="slider/scripts/jquery-1.9.0.min.js"></script>
        <script type="text/javascript" src="slider/scripts/jquery.nivo.slider.js"></script>
        <script type="text/javascript">
            $(window).load(function() {
            $('#slider').nivoSlider();
            });
        </script>



</body>
</html>