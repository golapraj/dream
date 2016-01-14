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
<body>
<form name="frm" method="post" action="form.php">
        <div style="padding-left:350px;padding-right:350px;padding-bottom:0px;padding-top:30px;" class="input-group">  
            <input id="donorid" name="donorid" class="form-control" placeholder="Enter Donor ID" type="text" maxlength="9" pattern="[0-9]{9}" title="Number Only" required/>
            <span class="input-group-btn ">
            <button class="btn btn-danger" name="submit" type="submit"><i class="fa fa-search"></i>&nbsp;OK</button>
            </span>
        </div>
</form>

          <?php 
          if(isset($_GET['sts']))
          {
            echo $_GET['sts'];
          echo '<script type="text/javascript">
                    window.onload = function () { alert("Data updated!!"); }
                     </script>';
          }
          ?>
<div id="txtHint">
    
</div>

</body>
</html>