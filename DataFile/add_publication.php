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
    function addpub(str) {
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

        if (str == "event") 
        {
           xmlhttp.open("GET","add_newsevent.php?q=event",true);
        }
         else if (str == "news") 
        {
           xmlhttp.open("GET","add_newsevent.php?q=news",true);
        }
        else
        {
           xmlhttp.open("GET","add_notice.php",true);
        }
        xmlhttp.send();
    }
}
</script>

</head>
<body>
<form name="frm" method="post" action="#">
         <div style="padding-left:450px;padding-right:250px;padding-bottom:0px;padding-top:30px;" class="input-group">  
           <label class="label label-success">Notice/News/Event:</label>
           <select id="select" class="form-control" name="donorbloodgroup" onchange="addpub(this.value);">
            
            <option value="0" disabled selected>Select Type</option>
            <option value="notice">Notice</option>
            <option value="news">News</option>
            <option value="event">Event</option>
          
          </select>
</div>          
</form>
<div id="txtHint">
    
</div>

</body>
</html>