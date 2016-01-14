<?php
    $key=$_GET['key'];
    $array = array();

    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("dream",$con);

    $query=mysql_query("SELECT * FROM `donor` WHERE `donor_id` LIKE '{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['donor_id'];
    }
    echo json_encode($array);
?>
