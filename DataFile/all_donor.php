<?php
        session_start();
        if ( !(isset($_SESSION['login_volunteer'])||isset($_SESSION['login_admin']))) {
            header("Location:index.php");
            die();
        }
?>
<?php
    include "db_connect.php";
    $query = "SELECT * FROM `donor`";
	
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
        
        xmlhttp.open("GET","all_donor_process_sb.php?q="+str,true);
        xmlhttp.send();
   
}



function infobld(str) {
        
   
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
        
        xmlhttp.open("GET","all_donor_process_bld.php?q="+str,true);
        xmlhttp.send();
   
}


function infodpt(str) {
        
   
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
        
        xmlhttp.open("GET","all_donor_process_dpt.php?q="+str,true);
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

            <div class="form-group col-md-2">
            <select id="selectbld" class="form-control" onchange="infobld(this.value);" name="donorbloodgroup" required>
                <option value="" selected>Blood Group</option>
                <option value="AP">A+</option>
                <option value="A-">A-</option>
                <option value="BP">B+</option>
                <option value="B-">B-</option>
                <option value="ABP">AB+</option>
                <option value="AB-">AB-</option>
                <option value="OP">O+</option>
                <option value="O-">O-</option>
            </select>
            </div>

            <div class="form-group col-md-2">
            <select id="selectdpt" class="form-control" onchange="infodpt(this.value);" name="donorbloodgroup" required>
                <option value="" selected>Select Dept.</option>
                <option value="CSE">CSE</option>
                <option value="EEE">EEE</option>
                <option value="ECE">ECE</option>
                <option value="ME">ME</option>
                <option value="CE">CE</option>
                <option value="URP">URP</option>
                <option value="IPE">IPE</option>
                <option value="LE">LE</option>
                <option value="TE">TE</option>
                <option value="BECM">BECM</option>
                <option value="BME">BME</option>
            </select>
            </div>
            
	        
            <div class="form-group col-md-6">
					<input type="text" class="form-control" onkeyup="info(this.value);" placeholder = "Enter search key Word">
			</div>

             <div class="form-group col-md-2">
            <select id="select" class="form-control" name="donorbloodgroup" required>
                <option value="" disabled selected>Batch</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
            </select>
            </div>


	    </form>
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
