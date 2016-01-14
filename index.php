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
            
            $user=mysql_fetch_array($query);

            $rows = mysql_num_rows($query);

            if ($rows == 1) 
            {

               if ($user['role']=='admin') 
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
    <link rel="stylesheet" type="text/css" href="css/index.css">
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




<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>









    <div class="header">

        <div class="banar">
            <center><img src="images/dream.jpg"></center>
        </div>

        <div class="menu">
            <center>
            <ul>
                <li> <a href="index.php"> <i class="glyphicon glyphicon-home"></i>  Home </a> </li>
                <li> <a href="#"><i class="glyphicon glyphicon-book"></i> About dream </a> </li> 
                <li> <a href="dream_com.php" ><i class="glyphicon glyphicon-book"></i> Dream committee </a> </li> 
                <li> <a href="photoGallery.php"><i class="glyphicon glyphicon-book"></i> Photo Gallery </a> </li>
                <li> <a href="FAQs.php"><i class="glyphicon glyphicon-book"></i> FAQs </a> </li>
                <li> <a href="ContactUs.php"><i class="glyphicon glyphicon-book"></i> Contact Us </a> </li>
                <li> <a href="#signIn" data-toggle="modal" data-target="#signIn"> <i class="glyphicon glyphicon-lock"></i> Sign In</a> </li>
            </ul>
            </center>
        </div>

    </div>

    <div class="content">

        <div class="marq">
        <marquee scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();" style="color:#E58110"  width="95%"><b>:: Welcome To Dream, Voluntary Blood Donation Society of KUET ::</b> </i> </marquee>
        </div>

        <div class="main_content">

        <iframe name="container" src="DataFile/slider.php" width="100%" height="100%" scrolling="auto" style="border:none;"></iframe> 

        </div>

<div class="right_side">

                    <div class="container">

                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Notice</a></li>
                        <li><a data-toggle="tab" href="#menu1">News</a></li>
                        <li><a data-toggle="tab" href="#menu2">Event</a></li>
                      </ul>
                    <marquee scrollamount="2" direction="up"  onmouseover="this.stop();" onmouseout="this.start();">
                      <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                        <h5></h5>

                                <?php
                                       $sql = "SELECT * FROM `notice` WHERE `type` = 'notice' ORDER BY `notice`.`entry_date` DESC";  
                                       $result=mysql_query($sql);
                                       ?>

                                        <?php
                                     
                                       while ($row=mysql_fetch_array($result))
                                       {
                                        $lnk= "DataFile/".$row['details']."\"";
                                        ?>
                                        
                                        <a href="<?php echo $lnk; ?>" target="_blank"><?php echo $row['tittle']; ?><br>
                                       
                                        <i><small style="color:#AD2323">
                                        <?php
                                        $time=strtotime($row['entry_date']);
                                        echo date('d F, Y',$time)."</small></i></a><br/><br>";
                                        } 
                                        ?>
                                       
                                  
                        </div>
                        <div id="menu1" class="tab-pane fade">
                          <h5></h5>

                             <?php
                                 $query = mysql_query("SELECT * FROM `notice` WHERE `type` = 'news' ORDER BY `notice`.`entry_date` DESC");     
                               
                                while($row = mysql_fetch_array($query))
                                 {
                                                ?>
                                 <p><a href="notice_view.php?f=<?php echo $row['sl'];?>" >
                                 <?php 
                                 $time=strtotime($row['entry_date']);

                                 echo $row['tittle']."<br/><small style='color:#AD2323'>".date('d F, Y',$time)."</small></a></p>";
                                 
                                 }
                            ?>
                               
                        </div>
                        <div id="menu2" class="tab-pane fade">
                          <h5></h5>
                           <?php
                                            $query = mysql_query("SELECT * FROM `notice` WHERE `type` = 'event' ORDER BY `notice`.`entry_date` DESC");
                                             
                                            while($row = mysql_fetch_array($query))
                                            {
                                                ?>
                                                <p><a href="notice_view.php?f=<?php echo $row['sl'];?>" >
                                                <?php 
                                                $time=strtotime($row['entry_date']);
                                                echo $row['tittle']."<br/><small style='color:#AD2323'>".date('d F, Y',$time)."</small></a></p>";
                                             
                                            }
                                   ?>
                               
                        </div>
                      </div>
                       </marquee>
                    </div>
                  

        <div class="right_dwn">
            <a href="ContactUs.php"><img width="281px" src="images/donatebg.png"></a>
            <div class="fb-like" data-href="https://www.facebook.com/DreamKuet" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
            <a href="#"><img width="281px" src="images/donation.jpg"></a>
        </div>

</div>
</div>


    <div class="footer">
       <br>
        <p>
        &copy; Dream, Voluntary Blood Donation Society of KUET, All rights reserved.
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
<!-- End Sign in Modal -->

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