<?php
        session_start();
        if ( !(isset($_SESSION['login_volunteer'])||isset($_SESSION['login_admin']))) {
            header("Location:index.php");
            die();
        }
?>
<?php
    include "db_connect.php";
    $query = "SELECT * FROM `donor` WHERE `role`='volunteer'";
	
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

     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        
		<script>
    function info(str) {
    	
   
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
        
        xmlhttp.open("GET","all_volunteer_process.php?q="+str,true);
        xmlhttp.send();
   
}

function details(str) {
        
   
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
        
        xmlhttp.open("GET","all_donor_detail_process.php?q="+str,true);
        xmlhttp.send();
   
}

</script>
	</head>
	<body style="padding:20px;">
	    <form name="frm" method="post">
	        
              <div style="padding-left:250px;padding-right:250px;padding-bottom:0px;padding-top:30px;" class="input-group">			
					<input type="text" class="form-control" onkeyup="info(this.value);" placeholder = "Enter search key Word">
					<span class="input-group-btn ">
						<button class="btn btn-default" type="button"><i class="fa fa-search"></i>&nbsp;Search</button>
					</span>
				</div>


	    </form>
	    <div id="txtHint">
	   	<table class="table table-hover">
        <tr><th>Serial</th><th>Donar Id</th> <th>Name</th> <th>Blood Group</th> <th>Dept.</th><th>Mobile</th><th>TK</th><td>Details</td></tr>
        <?php
                $serial=1;
                while($row = mysql_fetch_array($result))
                { 
                    $now=date("Y-m-d");

                    $diff = abs(strtotime($now) - strtotime($row['last_date_of_donation']));
        
                    $years = floor($diff / (365*60*60*24));
                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        
    
                    echo  "<tr><td>".$serial."</td><td>". $row['donor_id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['blood_group'] . "</td><td>" . $row['dept'] . "</td><td>".$row['mobile']."</td><td>".$row['tk'];
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
