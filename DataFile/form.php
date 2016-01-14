<?php
   session_start();
    include "db_connect.php";

    $query = "SELECT * FROM `donor`";
    $result = mysql_query($query);

     $sql="SELECT * FROM `donor` WHERE `role`='volunteer'";
      $rslt1 = mysql_query($sql);
      $rslt2 = mysql_query($sql);
      $rslt3 = mysql_query($sql);
      $rslt4 = mysql_query($sql);
      $rslt5 = mysql_query($sql);



      if (isset($_POST['submit'])) 
      {
          $donorid=$_POST['donorid'];

        while($row = mysql_fetch_array($result))
        { 
          if ($row['donor_id']==$donorid) 
          {
            $name=$row['name'];
            $weight=$row['weight'];
            $birthday=$row['birth_day'];
            $bloodgroup=$row['blood_group'];

            $now=date("Y-m-d");

            $diff = abs(strtotime($now) - strtotime($birthday));
        
            $age = floor($diff / (365*60*60*24));

          }
        }
      }

        $counter = mysql_query("SELECT COUNT(*) AS max FROM `transection`");
        $num = mysql_fetch_array($counter);
        $max = $num["max"];
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/normalize/normalize.css">
</head>
<body>
    <div>
    <form action="form_process.php" method="post">
    <fieldset>
    <center>
    <button type="button" class="btn btn-danger btn-lg ">Blood Group: <span class="badge"><?php echo $bloodgroup; ?></button><br/><br/>
            <div class="form-inline">
            <label class="label label-primary">Form-no</label>
        <input id="sl" class="form-control" name="sl" type="text" value="<?php echo $max+1; ?>" readonly="readonly">

            <label class="label label-danger">Date</label>
        <input id="date" class="form-control" name="date" type="date" value="<?php echo $now; ?>" required>

            <label class="label label-danger">Time</label>
        <input id="time" class="form-control" name="time" type="time" value="<?php echo date("h:i A"); ?>" required>
            </div>
    </center>

    <legend style="background:#E68F8D;text-align:center;color:#fff;">Dream, Voluntary Blood Donation Society, KUET <br/> Blood Requisition Form</legend>
        <br/><fieldset>
        <legend style="text-align:center;background:#777777;color:#fff">Donor info</legend>

        <div class="form-group col-md-3">
        <label class="label label-success">Name :</label>
    <input id="name" class="form-control" name="donorname" placeholder="Enter Name" type="text" value="<?php echo $name; ?>" title="e.g Asaf-Uddowla Golap" readonly="readonly">
        </div>

        <div class="form-group col-md-3">
        <label class="label label-success">Donar ID :</label>
    <input id="donorid" class="form-control" name="donorid" placeholder="Enter Donorid" type="text" value="<?php echo $donorid; ?>" maxlength="7" title="e.g 1207005" pattern="[0-9]{7}" readonly="readonly">
        </div>

        <div class="form-group col-md-3">
        <label class="label label-success">Age</label>
        <div class="input-group">
    <input id="donorage" class="form-control" name="donorage" placeholder="Enter Age" type="text" value="<?php echo $age; ?>" title="e.g 22" readonly="readonly">
        <div class="input-group-addon">Years</div>
        </div>
        </div>

        <div class="form-group col-md-3">
        <label class="label label-warning">Weight</label>
        <div class="input-group">
    <input id="donorweight" class="form-control" name="donorweight" placeholder="Enter Weight" type="text" value="<?php echo $weight; ?>" title="e.g 44">
        <div class="input-group-addon">Kg</div>
        </div>
        </div>   
        </fieldset>




        <br/><fieldset>
              
        <legend style="text-align:center;background:#777777;color:#fff">Patient info</legend>

        <div class="form-group col-md-6">
        <label class="label label-primary">Name :</label>
    <input id="patientname" class="form-control" name="patientname" placeholder="Enter Name" type="text" title="e.g Asaf-Uddowla Golap" >
        </div>

        <div class="form-group col-md-6">
        <label class="label label-primary">Hospital/Clinic</label>
    <input id="patienthospital" class="form-control" name="patienthospital" placeholder="Enter Hospital Name" type="text" >
        </div>

        <div class="form-group col-md-4">
        <label class="label label-primary">Age</label>
    <input id="patientage" class="form-control" name="patientage" placeholder="Enter Age" type="text" title="e.g 34" >
        </div>

        <div class="form-group col-md-4">
        <label class="label label-primary">Disease</label>
    <input id="patientdisease" class="form-control" name="patientdisease" placeholder="Enter Disease" type="text" title="e.g Lukemia" >
        </div>

        <div class="form-group col-md-4"> 
        <label class="label label-primary">Mobile</label>
    <input id="patientmobile" class="form-control" name="patientmobile" placeholder="Enter Mobile No" type="text" title="e.g 01735507902" >
        </div>

        <div class="form-group col-md-12">
        <label class="label label-primary">Address</label>
    <input id="patientaddress" class="form-control" name="patientaddress" placeholder="Enter Address" type="text" title="e.g Teligati,KUET,Khulna" >
        </div>
        </fieldset>


         <br/><fieldset>
              
        <legend style="text-align:center;background:#777777;color:#fff">Receiver info</legend>

        <div class="form-group col-md-6">
        <label class="label label-primary">Name :</label>
    <input id="receivername" class="form-control" name="receivername" placeholder="Enter Name" type="text" title="e.g Asaf-Uddowla Golap" >
        </div>
        
        <div class="form-group col-md-6">
        <label class="label label-primary">Address</label>
    <input id="receiveraddress" class="form-control" name="receiveraddress" placeholder="Enter Address" type="text" title="e.g Teligati,KUET,Khulna" >
        </div>

        <div class="form-group col-md-4">
        <label class="label label-primary">National ID</label>
    <input id="receivernationalid" class="form-control" name="receivernationalid" placeholder="Enter National ID No" type="text" title="e.g 199481189365478926" >
        </div>

        <div class="form-group col-md-4">
        <label class="label label-primary">Mobile</label>
    <input id="receivermobile" class="form-control" name="receivermobile" placeholder="Enter Mobile No" type="text" title="e.g 01735507902" >
        </div>

        <div class="form-group col-md-4">
        <label class="label label-primary">Relation With Patient</label>
    <input id="relation" class="form-control" name="relation" placeholder="Enter Relation" type="text" title="e.g Sister" >
        </div>
        </fieldset>


      <br/><fieldset>
              
        <legend style="text-align:center;background:#777777;color:#fff">Volunteer info</legend>

        <div class="form-group col-md-4">
        <label class="label label-warning">Volunteer & TK. Collector</label>
        <select id="select" class="form-control" name="volunteer1" ><br/>
            <option value="null" selected>Select Volunteer</option>
            <?php
                    while($row = mysql_fetch_array($rslt1))
                    { 
                     
                         echo "<option value=".$row['donor_id'].">"; echo $row['name']."(<b>".$row['donor_id']."</b>)"; echo "</option>";
                    }
            ?>
        </select>  
        
        <!--<input id="volunteername1" class="form-control" name="volunteername1" placeholder="Enter Name" type="text" title="e.g Asaf-Uddowla Golap" required>
        <input id="tk" class="form-control" name="tk1" type="checkbox">-->
        </div>
        
        <div class="form-group col-md-4">
        <label class="label label-primary">Volunteer 2</label>
        <select id="select" class="form-control" name="volunteer2" ><br/>
            <option value="null" selected>Select Volunteer</option>
            <?php
                    while($row = mysql_fetch_array($rslt2))
                    { 
                     
                         echo "<option value=".$row['donor_id'].">"; echo $row['name']."(<b>".$row['donor_id']."</b>)"; echo "</option>";
                    }
            ?>
        </select>  

        <!--<input id="volunteername2" class="form-control" name="volunteername2" placeholder="Enter Name" type="text" title="e.g Asaf-Uddowla Golap" required>
        <input id="tk" class="form-control" name="tk2" type="checkbox">-->
        </div>

        <div class="form-group col-md-4">
        <label class="label label-primary">Volunteer 3</label>
        <select id="select" class="form-control" name="volunteer3" ><br/>
            <option value="null" selected>Select Volunteer</option>
            <?php
                    while($row = mysql_fetch_array($rslt3))
                    { 
                     
                         echo "<option value=".$row['donor_id'].">"; echo $row['name']."(<b>".$row['donor_id']."</b>)"; echo "</option>";
                    }
            ?>
        </select>  
        
        <!--<input id="volunteername3" class="form-control" name="volunteername3" placeholder="Enter Name" type="text" title="e.g Asaf-Uddowla Golap" required>
        <input id="tk" class="form-control" name="tk3" type="checkbox">-->
        </div>

        <div class="form-group col-md-4">
        <label class="label label-primary">Volunteer 4</label>
        <select id="select" class="form-control" name="volunteer4" ><br/>
                <option value="null" selected>Select Volunteer</option>
                <?php
                        while($row = mysql_fetch_array($rslt4))
                        { 
                         
                             echo "<option value=".$row['donor_id'].">"; echo $row['name']."(<b>".$row['donor_id']."</b>)"; echo "</option>";
                        }
                ?>
            </select>  

        <!--<input id="volunteername4" class="form-control" name="volunteername4" placeholder="Enter Name" type="text" title="e.g Asaf-Uddowla Golap" required>
        <input id="tk" class="form-control" name="tk4" type="checkbox">-->
        </div>

        <div class="form-group col-md-4">
        <label class="label label-primary">Volunteer 5</label>
        <select id="select" class="form-control" name="volunteer5" ><br/>
            <option value="null" selected>Select Volunteer</option>
            <?php
                    while($row = mysql_fetch_array($rslt5))
                    { 
                     
                         echo "<option value=".$row['donor_id'].">"; echo $row['name']."(<b>".$row['donor_id']."</b>)"; echo "</option>";
                    }
            ?>
        </select>  
        
        <!--<input id="volunteername5" class="form-control" name="volunteername5" placeholder="Enter Name" type="text" title="e.g Asaf-Uddowla Golap" required>
        <input id="tk" class="form-control" name="tk5" type="checkbox">-->
        </div>

        <div class="form-group col-md-4">
        <label class="label label-danger">Medical Officer</label>
        <input id="medicalofficer" class="form-control" name="medicalofficer" placeholder="Enter Name" type="text" title="e.g Asaf-Uddowla Golap" >
        </div>
        </fieldset><br/>

        <input style="margin-left:450px;width:150px;" class="btn btn-success btn-lg" name="submit" type="submit" value="submit" onClick="return confirm('Are you sure to submit?');">

    </fieldset>    
    </form>
    </div>
</body>
</html>