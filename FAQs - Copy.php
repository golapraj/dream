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
                <li> <a href="#"><i class="glyphicon glyphicon-book"></i> FAQs </a> </li>
                <li> <a href="#"><i class="glyphicon glyphicon-book"></i> Contact Us </a> </li>
                <li> <a href="#signIn" data-toggle="modal" data-target="#signIn"> <i class="glyphicon glyphicon-lock"></i> Sign In</a> </li> 
            </ul>
        </div>

    </div>

<div class="content">
<div class="main_content">
<div class="container">

  <h1> -:Frequently Asked Questions and Answers:- </h1>

<table class="table table-striped">

<h2 class="btn-default" data-toggle="collapse" data-target="#div">Q. What is blood? How much blood does a human body contain?</h2>
<div id="div" class="collapse">
A. Blood is the red colored fluid flowing continuously in the human body&#8217;s circulatory system, on an average,
a human being has about 5-6 liters of blood flowing in the body. About 7%of the body weight of a healthy individual 
is accounted for by blood.
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div1">Q. What is the composition of blood?</h2>
<div id="div1" class="collapse">
<p> Blood mainly contains a fluid called plasma which has three types of cells &#8211; Red Blood Cells or RBC&#8217;s, White Blood Cells or WBC&#8217;s and plate lets. Plasma acts as a vehicle to carry nutrition including protein, glucose, enzymes, and hormones etc; Red blood cells carry oxygen from the lungs to various body tissues; White blood cells help the immune system of the body and platelets facilitate the process of clotting and coagulation of blood.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div2">Q. What is Blood formed
</h2>
<div id="div2" class="collapse">
<p> The RBC, granulocytes of WBC and platelets are produced mainly by bone marrow. The lymphocytes and monocytes are formed in the lymphoid and reticulo-endothelial tissues. The orderly proliferation of the cells in the bone marrow and their release into the circulatory system is carefully regulated according to the needs of the body. Every day, new blood cells are produced in the bone marrow and every day old cells die and are removed from the body.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div3">Q. What is the natural life of blood cells
</h2>
<div id="div3" class="collapse">
<p> Red blood cells have a life of about 120 days, white blood cells live for a few days and platelets for a few hours. The addition of new cells and removal of old cells is a continuous process.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div4">Q. What is haemoglobin
</h2>
<div id="div4" class="collapse">
<p> Haemoglobin is a substance present in the red blood cells. It helps in carrying oxygen and carbon dioxide to different parts of the body. On an average, the haemoglobin level for a healthy male should be between 14-16 gm % and for a female between 12-­14 gm %.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div5">Q. What are blood groups
</h2>
<div id="div5" class="collapse">
<p> Every individual belongs to two major types of blood groups. The first is called the ABO -group and the second type is called the Rh-group. In the ABO-group there are four categories namely: A Group, B Group, O Group and AB Group.</p>
<p>In the Rh -group either the individual is Rh-posltive, or Rh-negative. Rh denotes the Rhesus factor named for Rhesus monkeys.</p>
<p>Thus every human being belongs to one of the following  groups.</p>

<li>A positive or A negative</li>
<li>B positive or B negative</li>
<li>O positive or O negative</li>
<li>AB positive or AB negative</li>
<li>The positive or negative aspect is based on the Rh factor.</li>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div6">Q. What is the importance of knowing the blood groups
</h2>
<div id="div6" class="collapse">
<p> For all practical and routine purposes, it is ideal to transfuse to the patient the same group of blood which he/she belongs to. Under no circumstances can an 0 group person get any other blood except O. Similarly, an A group patient cannot be given B group blood and vice versa. It is only in a dire emergency that we take 0 group as a universal donor and AB groups as universal recipient.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div7">Q. Why is an A group person not given B group blood
</h2>
<div id="div7" class="collapse">
<p> The blood of an A group person contains anti-B group antibodies. In<b> </b>those with B group blood, there are anti –A group antibodies. If we give A group blood to a B group patient, it is bound to be incompatible and will result in serious consequences.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div8">Q. Why are Rh negative and Rh positive incompatible
</h2>
<div id="div8" class="collapse">
<p> A patient with Rh-negative blood cannot be given Rh­ positive blood as the antigen-antibody reaction will result in severe consequences.</p>
<p>In cases where a woman is Rh negative and her husband is Rh positive , the first child with Rh positive may be normal. But, subsequently, the woman may not conceive or may have repeated abortions. There may be intra-uterine fetal death. If the child born is alive, it will suffer from a fatal disease called &#8220;Erythroblastosis Foetalis&#8221;. Now, mothers can be given an injection of anti -D within 24 hours of the delivery of a Rh-positive child and thus protect the next baby from this catastrophe.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div9">Q. What is a unit of blood
</h2>
<div id="div9" class="collapse">
<p> Blood is collected in plastic bags which contain a liquid chemical which prevents blood from coagulating. On an average, about 450 ml. of blood is collected from a person. This blood, plus the amount of anti-coagulant present in the bottle or bag, is known as one unit of blood.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div10">Q. For how long can blood be stored
</h2>
<div id="div10" class="collapse">
<p> Whole blood can be stored for up to 21 days, when kept in CPDA anti-coagulant solution and refrigerated at 2 -4°C.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div11">Q. Can blood be separated into its components
</h2>
<div id="div11" class="collapse">
<p> Several components from blood can be separated and used to treat specific conditions. This helps in utilization of one unit of blood for several patients. These components are: Packed RBCs, Fresh Frozen Plasma, Platelet Rich Plasma, Platelet Concentrate, Cryoprecipitate, Factor VIII and IX, Albumin, Globulin and many others.</p>
<p>Now, with the advent of cell-separator machines a particular component from the donor can be collected while blood circulates through the machine and rest of the blood constituents go back to the donor.</p>
</div>


<h2 class="btn-default" data-toggle="collapse" data-target="#div12">Q. In which situations do patients need blood transfusion
</h2>
<div id="div12" class="collapse">
<p> There are many situations in which patients need blood to stay alive:</p>

<li>A patient needs blood after a major accident or surgery in which there is loss of blood.</li>
<li>On an average, for every open heart surgery, about six units of blood is required.</li>
<li>After a miscarriage or childbirth, the patient may need a large amount of blood to be transfused for saving her life and also the child&#8217;s.</li>
<li>For patients with blood diseases like severe anemias especially aplastic anemias, leukemias (blood cancer), hemophilia (bleeding disorder), thalassemia etc. repeated blood transfusions are the only solution.</li>
<li>In many other situations like poisoning, drug reactions, shock and burns, blood transfusion is the only way to save precious human life.</li>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div13">Q. Is all the collected blood tested
</h2>
<div id="div13" class="collapse">
<p> Yes.</p>
<p>All blood units are tested for HIV/AIDS, hepatitis B, hepatitis C, malaria and antibodies to syphilis. Only those units of blood are transfused which are free from these infectious markers.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div14">Q. Who is a healthy donor
</h2>
<div id="div14" class="collapse">
<p> Usually, any person within the age group of 18 -57 years with a minimum body weight of 45 kgs, and having a minimum haemoglobin content of 12 gm% is eligible to donate.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div15">Q. Does a donor need to do anything special before donating blood
</h2>
<div id="div15" class="collapse">
<p> Nothing special. The donor should eat at regular meal times and drink plenty of fluids.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div16">Q. How long does it take to donate blood
</h2>
<div id="div16" class="collapse">
<p> The procedure is done by skilled, specially trained technicians and takes three to eight minutes. However, from start to finish (filling form, post-donation rest etc.) the entire process should take around 30 minutes.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div17">Q. Can blood of animals be transfused to human beings
</h2>
<div id="div17" class="collapse">
<p> No.</p>
<p>Only the blood of a human being can be transfused to a human.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div18">Q. Does the person suffer from any harmful effects after donating blood
</h2>
<div id="div18" class="collapse">
<p> Absolutely not. Rather, a donor after having given blood voluntarily gets a feeling of pleasure and peace. Within a period of 24 -48 hours, the amount of blood donated is again formed in the body.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div19">Q. Is any special diet required for a donor after giving blood
</h2>
<div id="div19" class="collapse">
<p> Not really. After resting for a while, the donor is given something to drink. It may be a glass of water or milk or fruit juice along with a few biscuits or fruits. The donor needs no other special diet. A routine, balanced diet is adequate.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div20">Q. How long will it take for the body to replenish the donated blood
</h2>
<div id="div20" class="collapse">
<p> The body replaces blood volume or plasma within 24 hours. Red blood cells need about four to eight weeks for complete replacement.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div21">Q. How frequently can one donate blood
</h2>
<div id="div21" class="collapse">
<p> A four-month gap between donations is a very safe interval.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div22">Q. Can a donor work after donating blood
</h2>
<div id="div22" class="collapse">
<p> Of course!</p>
<p>Routine work is absolutely fine after the initial rest. Rigorous physical work should be avoided for a few hours.</p>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div23">Q. Does any disease debar a person from donating blood
</h2>
<div id="div23" class="collapse">
<p> Yes.</p>
<p>If the donor has suffered from any of the under mentioned diseases: ­</p>

<li>Fever: The donor should not have suffered from fever for the past 15 days.</li>
<li>Jaundice: A donor should not have tested positive for hepatitis and suffered from jaundice.</li>
<li>Blood transmitted diseases: Syphilis, malaria, filaria etc. debar a donor from donating blood until treatment is over and the donor is disease-free.</li>
<li>Drugs: If a person is taking drugs like aspirin, anti-hypertensive, anti-diabetics, hormones, corticosteroids etc. he/she is unfit to donate blood.</li>
<li>No HIV-positive person can be allowed to donate blood.</li>
</div>

<h2 class="btn-default" data-toggle="collapse" data-target="#div24">Q. Are there any other benefits of blood donation
</h2>
<div id="div24" class="collapse">
<p> Yes. Blood donation is a noble, selfless service! It gives the donor a feeling of joy and contentment. Also it is an expression of love for mankind, as blood knows no cast, colour, creed, religion or race.</p>
</div>

</table>

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