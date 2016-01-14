<?php
        session_start();
        if ( !(isset($_SESSION['login_volunteer'])||isset($_SESSION['login_admin']))) {
            header("Location:index.php");
            die();
        }
?>
<?php
    include "db_connect.php";
    $query = "SELECT * FROM `transection` ORDER BY `transection`.`form_no` DESC";
	$result = mysql_query($query);

    function volname($volid)
    {
        $q = "SELECT * FROM `donor` WHERE `donor_id`='$volid'";
        $re = mysql_query($q);
        $r = mysql_fetch_array($re);
        return $r['nickname'];
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
        
        xmlhttp.open("GET","all_donor_process.php?q="+str,true);
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
	   	<table class="table table-bordered">
	   	<tr><th>Serial</th><th>Date</th> <th>Time</th> <th>Donor ID</th><th>Donor Name</th> <th>Blood Group</th><th>Mobile</th><th>Volunteers</th><th>Collector</th><th>Form No.</th><th>Remarks</th></tr>
	   	
        <?php
			    $serial=1;
				while($row = mysql_fetch_array($result))
				{ 
                    if($serial % 2 == 0){
                    ?>
                        <tr class="info">

                    <?php
                       } 
                    $q = "SELECT * FROM `donor` WHERE `donor_id`='$row[donor_id]'";
                    $re = mysql_query($q);
                    $r = mysql_fetch_array($re);

                    echo  "<td>".$serial."</td><td>".date("d/m/Y", strtotime($row['date'])). "</td><td>" . date("h:i A", strtotime($row['time'])) . "</td><td>" . $row['donor_id'] . "</td><td>".$r['nickname']."</td><td>". $r['blood_group'] . "</td><td>".$r['mobile']."</td><td><b>".volname($row['volunteer1_tk_collector'])."</b>,".volname($row['volunteer2']).",".volname($row['volunteer3']).",".volname($row['volunteer4']).",".volname($row['volunteer5'])."</td><td>".$row['medical_officer']."</td><td>".$row['form_no']."</td><td>"."Remarkss"."</td></tr>";
                 
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
