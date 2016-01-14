<?php
    include "db_connect.php";
    $search_text = urldecode(filter_var(trim($_GET['q'])));
    echo "<b>Search Result For: </b>".$search_text;
	$query = "SELECT * FROM `donor` WHERE `name` LIKE '{$search_text}%' OR `donor_id` LIKE '%{$search_text}%' OR `blood_group` LIKE '{$search_text}%' OR `dept` LIKE '{$search_text}%' OR `hall` LIKE '{$search_text}%'";  
	$result = mysql_query($query);
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

	</head>
	<body style="padding:20px;">
	   
	    <div id="txtHint">
	       <table class="table table-hover">
        <tr><th>Serial</th><th>Donar Id</th> <th>Name</th> <th>Blood Group</th> <th>Dept.</th><th>Mobile</th><th>Pass After Donation</th><td>Details</td></tr>
        <?php
                $serial=1;
                while($row = mysql_fetch_array($result))
                { 
                    $now=date("Y-m-d");

                    $diff = abs(strtotime($now) - strtotime($row['last_date_of_donation']));
        
                    $years = floor($diff / (365*60*60*24));
                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        
    
                    echo  "<tr><td>".$serial."</td><td>". $row['donor_id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['blood_group'] . "</td><td>" . $row['dept'] . "</td><td>".$row['mobile']."</td><td>".$years." year<br/>".$months." month<br/>".$days." day";
                    if(($diff/(60*60*24))<180)
                    {
                    ?>
                    </td><td><button type="button" value="<?php echo $row['donor_id']; ?>" class="btn btn-danger" onclick="details(this.value);">+</button></td></tr>
                    <?php
                    }
                    else{
                    ?>
                     </td><td><button type="button" value="<?php echo $row['donor_id']; ?>" class="btn btn-success" onclick="details(this.value);">+</button></td></tr>   
                    <?php
                    }
                    $serial++;
                }
        ?>

        </table>

	   </div>
	</body>
</html>

<?php 
  mysql_close();
?>
