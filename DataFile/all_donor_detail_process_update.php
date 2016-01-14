<?php
  session_start();
 include "db_connect.php";

 if(isset($_POST['change']))
    {
        $donor_id=$_POST['donorid'];

        $name=$_POST['name'];
        $nickname=$_POST['nickname'];
        $dept=$_POST['ndept'];
        $mobile=$_POST['mobile'];
        $birthday=$_POST['birthday'];
        $bloodgroup=$_POST['bloodgroup'];
        $hall=$_POST['hall'];
        $weight=$_POST['weight'];
        $lastdonationdate=$_POST['lastdonationdate'];
        $noofdonation=$_POST['noofdonation'];
        $entrydate=$_POST['entrydate'];
        $email=$_POST['email'];
        $currloc=$_POST['currloc'];
        $homdis=$_POST['homdis'];

        $password=$_POST['password'];
        $tk=$_POST['tk'];

        if(isset($_SESSION['login_volunteer']))
        $update_by=$_SESSION['login_volunteer'];
        else
        $update_by=$_SESSION['login_admin'];
        
        if(isset($_SESSION['login_admin']))
        {
        if(mysql_query("UPDATE `donor` SET `name`='$name',`nickname`='$nickname',`hall`='$hall',`dept`='$dept',`blood_group`='$bloodgroup',`mobile`='$mobile',`birth_day`='$birthday',`weight`='$weight',`last_date_of_donation`='$lastdonationdate',`no_of_donation`='$noofdonation',`email`='$email',`join_date`='$entrydate',`last_updated_by`='$update_by', `home_district`='$homdis', `current_location`='$currloc', `password`='$password',`tk`='$tk' WHERE `donor_id`='$donor_id'"))
        {
            header("location:all_donor_detail_process.php?q=$donor_id");
        }
        }
        else
        if(mysql_query("UPDATE `donor` SET `name`='$name',`nickname`='$nickname',`hall`='$hall',`dept`='$dept',`blood_group`='$bloodgroup',`mobile`='$mobile',`birth_day`='$birthday',`weight`='$weight',`last_date_of_donation`='$lastdonationdate',`no_of_donation`='$noofdonation',`email`='$email',`join_date`='$entrydate',`last_updated_by`='$update_by', `home_district`='$homdis', `current_location`='$currloc' WHERE `donor_id`='$donor_id'"))
        {
            header("location:all_donor_detail_process.php?q=$donor_id");
        }
     }

     if (isset($_POST['delete'])) 
     {
        $id=$_POST['donorid'];

     	$sqldelete="DELETE FROM `donor` WHERE `donor_id`='$id'";
        if(mysql_query($sqldelete))
        {
            header("location:all_donor.php");
        }
     }

?>