 <?php
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) 
{
    
          $_SESSION['login_user']=$_COOKIE['username'];

          $_SESSION['login_password']=$_COOKIE['password'];
          header('Location: user.php');   
} 
    if (isset($_SESSION['login_user'])) {
         header('Location: user.php'); 
    }

   
    $_SESSION['error']="";
    if (isset($_POST['submit']))
    {
            $username=$_POST['username'];
            $password=$_POST['password'];
            $connection = mysql_connect("localhost", "root", "");
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysql_real_escape_string($username);
            $password = mysql_real_escape_string($password);

            $db = mysql_select_db("rental_library", $connection);
            $query = mysql_query("select * from student where Password='$password' AND Roll='$username'", $connection);
            $rows = mysql_num_rows($query);

            if ($rows == 1) 
            {
                $_SESSION['login_user']=$username;
                $_SESSION['login_password']=$password;
                $_SESSION['username']=$rows['Name'];

                        if (isset($_POST['remember'])) 
                        {
                            setcookie('username', $username, time()+3600);
                            setcookie('password', $password, time()+3600);
                         } 
             
                header("location:user.php");
            }
            
            elseif ($username=="admin" && $password=='1') {
                $_SESSION['login_user']=$username; 
                header("location:admin.php");
            }

            else 
            {
                $_SESSION['error']="Error";
                header("location:login.php");
            }
            mysql_close($connection);
    }
?>

<html>
<head>
    <title>Committee | Dream | KUET</title>
    <link rel="icon" href="images/cse-logo.png" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script>
var myVar=setInterval(function(){myTimer()},1000);

function myTimer() {
    var d = new Date();
    document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
</script>

<script
src="http://maps.googleapis.com/maps/api/js">
</script>
</head>
<body>
    
<div style="width:850px;float:left;padding-left:10px;padding-top:50px;">
              



 <fieldset>
    <legend style="font-size:28px;background-color:#F5F5F5">Dream Committee</legend>
    <table class="table">
        <tr height="20">
        <th>Serial</th>
        <th>Name</th>
        <th>Designation</th>
        </tr>
        <tr>
        <td align=center>1</td>
        <td><b>Emtious Md Sazzad Hossain</b><br /><small>CSE 2k11</small></td>
        <td>President</td>
        </tr>
        <tr>
        <td align=center>2</td>
        <td><b>Tasnim Mehjabin</b> <br/> <small>CSE 2k11</small><br/><b> Kazi Fahad Latif</b><br/><small>CSE 2k11</small></td>
        <td >Vice President</td>
        </tr>
        <tr>
        <td align=center>3</td>
        <td><b>Shibli Sadik</b> <br/><small>ME 2k11</small></td>
        <td>General Secretary</td>
        </tr>
         <tr>
        <td align=center>4</td>
        <td><b>Rivu </b><br/><small>ECE 2k12</small><br/><b>Mabil </b><br/><small>EEE 2k12</small></td>
        <td>Assistant General Secretary</td>
        </tr>
        <tr>
        <td align=center>5</td>
        <td><b>Rashik Hasnat</b><br/><small>CSE 2k11</small></td>
        <td>Organization Secretary</td>
        </tr>
        <tr>
        <td align=center>6</td>
        <td><b>Mahmudur Rahman Tanim</b><br/> <small>CSE 2k12</small><br/><b>Runa</b><br/><small>ECE 2k12</small></td>
        <td>Assistant Organization Secretary</td>
        <tr/>
        <tr>
        <td align=center>7</td>
        <td><b>Maaheer Amir Bin Seraj</b><br/><small>CSE 2k12</small></td>
        <td>Treasurer</td>
        <tr/>
         <tr>
        <td align=center>8</td>
        <td><b>Asaf-Uddowla Golap</b> <br/> <small>CSE 2k12</small><br/><b>Piyal Shuvro</b><br/><small>CSE 2k12</small></td>
        <td>Paper & Resource Manager</td>
        <tr/>
         <tr>
        <td align=center>9</td>
        <td><b>Sourav</b> <br/> <small>LE 2k12</small><br/><b> Apon </b><br/><small>LE 2k12</small></td>
        <td>Event Manager</td>
        <tr/>
        <tr>
        <td align=center>10</td>
        <td><b>Prome</b> <br/> <small>CSE 2k12</small><br/><b>Rima</b> <br/><small>CSE 2k12</small></td>
        <td>Publication Manager</td>
        <tr/>
         <tr>
        <td align=center>11</td>
        <td><b>Rayhan Janam</b><br/> <small>CSE 2k12</small><br/><b>Asif</b> <br/><small>CSE 2k12</small><br/><b>Abdullah</b> <br/><small>LE 2k12</small><br/><b>Aney </b><br/><small>CSE 2k12</small><br/><b>Mashfi </b><br/><small>CSE 2k12</small><br/><b>Kazi Afsana </b><br/><small>CSE 2k12</small></td>
        <td>Festival Manager</td>
        <tr/>
    </table>    
  </fieldset>

       </div>

    <script src="libs/jquery/jquery.min.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>




















