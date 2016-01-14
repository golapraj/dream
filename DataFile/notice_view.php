<?php
include "db_connect.php";

 $noticeid = $_GET['f'];
  $q = "SELECT * FROM `notice` WHERE `sl`='$noticeid'";
  $re = mysql_query($q);
 $r = mysql_fetch_array($re); 
       
?>
<html>
	<body bgcolor="#EDF0F5" style="color:#000;">
		<?php
			echo nl2br(stripslashes($r['details']));
		?>
	</body>
</html>