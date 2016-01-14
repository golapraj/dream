<?php
$mysql_host='localhost';
$mysql_user='*******';
$mysql_pass='*******';
$mysql_db='dreamkue_test';
$flag = mysql_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if ($flag) 
{	
	$db=mysql_select_db($mysql_db);
	if($db)
	{

	}
	else
	{
		echo "not connected with db";
	}
}
else
{
	echo "failed";
}
?>