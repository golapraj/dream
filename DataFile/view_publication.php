<?php
    include "db_connect.php";
    $query = "SELECT * FROM `notice`";
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
    function delete_pub(str) {
    	
   
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
        
        xmlhttp.open("GET","delete_publication.php?q="+str,true);
        xmlhttp.send();
   
}

</script>
	</head>
	<body style="padding:20px;">
	   
	    <div id="txtHint">
	   	<table class="table table-hover">
	   	<tr><th>Serial</th><th>Tittle</th> <th>Last Date</th> <th>Type</th> <th></th></tr>
	   	<?php
			    $serial=1;
				while($row = mysql_fetch_array($result))
				{ 
        ?>
                <tr> <td> <?php echo $serial; ?> </td> <td> <?php echo $row['tittle'];  ?> </td> <td> <?php echo $row['last_date']; ?> </td><th><?php echo $row['type']; ?></th>
                    <td>
                    <button type="button" value="<?php echo $row['sl']; ?>" class="btn btn-danger" onclick="delete_pub(this.value);"><i class="glyphicon glyphicon-trash"></i></button></td>
                    </td>
                 </tr>
        <?php
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
