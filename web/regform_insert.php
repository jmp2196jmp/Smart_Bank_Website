<?php 
if(isset($_POST['register']))
{
include("../db/connection.php");
$query = "INSERT INTO registration(name,address,contact_no,email_id,dob,username,password) VALUES('$_POST[name]','$_POST[address]','$_POST[contact_no]','$_POST[email_id]','$_POST[dob]','$_POST[username]','$_POST[password1]')";
if (!mysqli_query($con,$query))
  {
  $status="Insertion not successfull";
  //echo "error".mysqli_error($con);
  header("location:reg_form.php?status=$status");
  }
else
  {  
  $status="Insertion successfull";
  header("location:reg_form.php?status=$status");
  }
}
?>

