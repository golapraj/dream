<?php
       session_start();
        if ( !(isset($_SESSION['login_admin']))) 
        {
            header("Location:index.php");
            die();
        }
?>
<html>
<head>
    <title>Admin | Dream | KUET</title>
    <link rel="icon" href="images/cse-logo.png" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    
    <link rel="stylesheet" type="text/css" href="css/admin.css">

    <script>
var myVar=setInterval(function(){myTimer()},1000);

function myTimer() {
    var d = new Date();
    document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
</script>
</head>
<body>
    <div class="header">
       <div class="banar">
            <h1><img id="cse" src="images/dream.png"> dream</h1>
            <small style="color:#fff;padding-left:20px;">give the gifts that costs nothing to give</small>
        </div>

       <div id="menu" class="menubar">
            <ul>
                <li> <a href="admin.php"> <i class="glyphicon glyphicon-home"></i> Home  </a> </li>
                <li> <a><i class="glyphicon glyphicon-star"></i> Donor </a> 
                        <ul>
                                <li> <a href="allDonor.php" > Donor List  </a> </li>
                                <li> <a href="addDonor.php" >  Add New </a> </li>
                        </ul>
                </li>
                 <li> <a><i class="glyphicon glyphicon-grain"></i>  Volunteer  </a>
                            <ul>
                                <li> <a href="allVolunteer.php" ></i> Volunteer List  </a> </li>
                                
                                <?php
                                if(isset($_SESSION['login_admin']))
                                {
                                ?>
                                <li> <a href="addVolunteer.php" >Add New  </a> </li>
                            
                                <?php
                                }
                                ?>

                            </ul>
                </li>
                 <li> <a><i class="glyphicon glyphicon-pencil"></i>  Form  </a>
                            <ul>
                                <li> <a href="form.php" > Blood Requisition Form  </a> </li>
                                <li> <a href="allTransection.php" >  List  </a> </li>
                            </ul>
                </li> 

                <?php
                if(isset($_SESSION['login_admin']))
                {
                ?>

                 <li> <a> <i class="glyphicon glyphicon-tasks"></i> Publication  </a>
                            <ul>
                                <li> <a href="addPublication.php" > Add  </a> </li>
                                <li> <a href="listPublication.php" > View  </a> </li>

                            </ul>
                </li>

                <?php
                }
                ?>


                 <li> <a> <i class="glyphicon glyphicon-wrench"></i> Setings  </a>
                            <ul>
                                <li> <a href="changePassword.php"> Change Password </a> </li>
                                <li> <a href="logout.php"> Logout </a> </li> 
                            </ul>
                </li>
            </ul>
        </div>
    </div>


    <div class="contentt">
       <iframe name="container" src="admin_home_page.php" width="100%" height="100%" scrolling="auto"></iframe> 
    </div>
        
   <div class="footer">
   <br>
        <p>&copy; Dream, Voluntary Blood Donation Society of KUET, All rights reserved.</p><hr>
                    <p>Developed by: Md. Asaf-Uddowla Golap</p>
    </div>
</body>
</html>