<?php
        session_start();
        if ( !isset($_SESSION['login_volunteer'])) {
            header("Location:index.php");
            die();
        }
?>
<html>
<head>
    <title>Volunteer | Dream | KUET</title>
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
            <img id="cse" src="images/bld.jpeg"></img><img id="kuet" src="images/kuet-logo.png"></img>
             <h3 id="clock" style="float:right;color:#F90F48;font-weight:bold;"></h3>
            <h1>Dream</h1>
        </div>
        <div id="menu" class="menubar">
            <ul>
                <li> <a href="admin.php"> <i class="glyphicon glyphicon-home"></i> Home  </a> </li>
                <li> <a><i class="glyphicon glyphicon-blackboard"></i> Donor </a> 
                        <ul>
                                <li> <a href="all_donor.php" target="container"> Donor List  </a> </li>
                                <li> <a href="add_donor.php" target="container">  Add New </a> </li>
                        </ul>
                </li>
                  <li> <a><i class="glyphicon glyphicon-plus"></i>  Volunteer  </a>
                            <ul>
                                <li> <a href="all_volunteer.php" target="container"><i class="glyphicon glyphicon-plus"></i> Volunteer List  </a> </li>
                            </ul>
                </li>
                 <li> <a><i class="glyphicon glyphicon-pencil"></i>  Form  </a>
                            <ul>
                                <li> <a href="pre_form.php" target="container"><i class="glyphicon glyphicon-pencil"></i> Blood Requisition Form  </a> </li>
                                <li> <a href="all_transection.php" target="container"><i class="glyphicon glyphicon-pencil"></i>  List  </a> </li>
                            </ul>
                </li> 
                 <li> <a><i class="glyphicon glyphicon-pencil"></i>  Settings  </a>
                            <ul>
                                <li> <a href="change_password.php" target="container"> <i class="glyphicon glyphicon-home"></i> Change Password  </a> </li>
                                <li> <a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logout </a> </li> 
                            </ul>
                </li> 
            </ul>
        </div>
    </div>
    <div class="contentt">
       <iframe name="container" src="admin_home_page.php" width="100%" height="100%" scrolling="auto"></iframe> 
    </div>
        
    <div class="footer">
        </br><p>&copy; Dream, Voluntary Blood Donation Society of KUET, All rights reserved.</p>
                    <p>Developed by: Md. Asaf-Uddowla Golap&reg;</p>
    </div>
</body>
</html>