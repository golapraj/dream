<?php
	session_start();
	include "db_connect.php";

	 $sl = urldecode(filter_var(trim($_GET['q'])));

	 $query = "SELECT * FROM `notice` where `sl`='$sl'";

	 $result = mysql_query($query);

	 $row = mysql_fetch_array($result);

	if($row['type']=='notice')
	{
      $path = $row['details'];

	  if(unlink($path))
	  {
	  	$delete="DELETE from notice where `sl`='$sl'";

	  if( mysql_query($delete))
	  {
	  	 header("location:view_publication.php");
	  }
	  }
	  else
	  {
	  	echo ("Could not remove $path");
	  }
	}

	else
	{
	  
	  $delete="DELETE from notice where `sl`='$sl'";

	  if( mysql_query($delete))
	  {
	  	 header("location:view_publication.php");
	  }

	}

?>