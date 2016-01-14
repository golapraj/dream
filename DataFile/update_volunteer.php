
<?php
 include "db_connect.php";

 if(isset($_POST['make']))
    {
        $donor_id=$_POST['donorid'];

        
        if(mysql_query("UPDATE `donor` SET `role`='volunteer',`password`='$donor_id' WHERE `donor_id`='$donor_id'"))
        {
           header('Location: pre_add_volunteer.php');  
        }
     }

     if (isset($_POST['remove'])) 
     {
        $donor_id=$_POST['donorid'];
        
        if(mysql_query("UPDATE `donor` SET `role`='donor',`password`=NULL WHERE `donor_id`='$donor_id'"))
        {
            header('Location: pre_add_volunteer.php');
        }
     }

?>