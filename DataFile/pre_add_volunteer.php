<?php
    session_start();
    include "db_connect.php";
    $query = "SELECT * FROM `student`";
    $result = mysql_query($query);
      if (isset($_POST['roll'])) {
          $roll=$_POST['roll'];
      while($row = mysql_fetch_array($result))
        { 
          if ($row['Roll']==$roll) 
          {
            $name=$row['Name'];
            $mobile=$row['Mobile'];
            $address=$row['Address'];
            $email=$row['Email'];
          }
        }
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
<script>
    function showUser() {
      var str = (document.frm.donorid.value);
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","add_volunteer.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

</head>
<body>
<form name="frm" method="post" onsubmit="showUser();return false">
        <div style="padding-left:350px;padding-right:350px;padding-bottom:0px;padding-top:30px;" class="input-group">  
            <input id="donorid" name="donorid" class="form-control" placeholder="Enter Donor ID" type="text" maxlength="9" pattern="[0-9]{9}" title="Number Only" required/>
            <span class="input-group-btn ">
            <button class="btn btn-danger" type="submit"><i class="fa fa-search"></i>&nbsp;OK</button>
            </span>
        </div>
</form>

          <?php 
          if(isset($_GET['sts']))
          {
            echo $_GET['sts'];
          echo '<script type="text/javascript">
                    window.onload = function () { alert("Data updated!!"); }
                     </script>';
          }
          ?>
<div id="txtHint">
    
</div>

</body>
</html>