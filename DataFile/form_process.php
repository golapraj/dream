<?php
      session_start();
      include "db_connect.php";

      if (isset($_POST['submit'])) 
      {
          $date=$_POST['date'];
          $time=$_POST['time'];
          $donorid=$_POST['donorid'];
          $donorname=$_POST['donorname'];
          $donorage=$_POST['donorage'];
          $donorweight=$_POST['donorweight'];
          
          $patientname=$_POST['patientname'];
          $patienthospital=$_POST['patienthospital'];
          $patientage=$_POST['patientage'];
          $patientdisease=$_POST['patientdisease'];
          $patientaddress=$_POST['patientaddress'];
          $patientmobile=$_POST['patientmobile'];
          
          $receivername=$_POST['receivername'];
          $receiveraddress=$_POST['receiveraddress'];
          $receivernationalid=$_POST['receivernationalid'];
          $receivermobile=$_POST['receivermobile'];
          $relation=$_POST['relation'];
         
          $volunteer1=$_POST['volunteer1'];
          $volunteer2=$_POST['volunteer2'];
          $volunteer3=$_POST['volunteer3'];
          $volunteer4=$_POST['volunteer4'];
          $volunteer5=$_POST['volunteer5'];
          $medicalofficer=$_POST['medicalofficer'];

          transection($date,$time,$donorid,$donorage,$donorweight,$patientname,$patienthospital,$patientage,$patientdisease,$patientaddress,$patientmobile,$receivername,$receiveraddress,$receivernationalid,$receivermobile,$relation,$volunteer1,$volunteer2,$volunteer3,$volunteer4,$volunteer5,$medicalofficer);
          
          $sql="UPDATE `donor` SET `tk` = `tk` + 20 WHERE `donor_id` = '$volunteer1'";
          mysql_query($sql);

          $sqll="UPDATE `donor` SET `weight` = '$donorweight' WHERE `donor_id` = '$donorid'";
          mysql_query($sqll);

          $sqql="UPDATE `donor` SET `no_of_donation` = `no_of_donation` + 1 WHERE `donor_id` = '$donorid'";
          mysql_query($sqql);
      }

            function transection($date,$time,$donorid,$donorage,$donorweight,$patientname,$patienthospital,$patientage,$patientdisease,$patientaddress,$patientmobile,$receivername,$receiveraddress,$receivernationalid,$receivermobile,$relation,$volunteer1,$volunteer2,$volunteer3,$volunteer4,$volunteer5,$medicalofficer)
            {
                $sql = "INSERT INTO `dream`.`transection` (`date`, `time`, `donor_id`, `donor_age`, `donor_weight`, `patient_name`, `patient_hospital`, `patient_age`, `patient_disease`, `patient_address` ,`patient_mobile`, `receiver_name`, `receiver_address`, `receiver_national_id`, `receiver_mobile`, `relation`, `volunteer1_tk_collector`, `volunteer2`, `volunteer3`, `volunteer4`, `volunteer5`, `medical_officer`) VALUES ('$date', '$time', '$donorid', '$donorage', '$donorweight', '$patientname', '$patienthospital', '$patientage', '$patientdisease', '$patientaddress' ,'$patientmobile', '$receivername', '$receiveraddress', '$receivernationalid', '$receivermobile', '$relation', '$volunteer1', '$volunteer2', '$volunteer3', '$volunteer4', '$volunteer5', '$medicalofficer')";
                
                if(mysql_query($sql))
                {
                    
                    echo '<script type="text/javascript">
                  window.onload = function () { alert("Transection Added!!"); }
                   </script>';
                    
                }
                else
                {
                    $errx ="\n"+ mysql_errno()+ " : " +mysql_error();
                    //echo $errx;
                    echo '<script type="text/javascript">
                  window.onload = function () { alert("Failed!!!"); }
                   </script>';
                }
                
    }
?>
