<?php include("main_header.php"); ?>

<?php
error_reporting(0);	
?>
<?php 
if(isset($_POST['apply']))
{
include("db/connection.php");
$account_no=$_POST['account_no'];
$match1="SELECT * FROM tbl_accounts WHERE acc_no='$account_no'";
		$qry1 = mysqli_query($con,$match1);
		$num_rows1 = mysqli_num_rows($qry1);
		if($num_rows1>0)
		{
$query = "INSERT INTO loan(account_no,applicant_name,father_name,loan_for,loan_amount,max_years) VALUES('$_POST[account_no]','$_POST[applicant_name]','$_POST[father_name]','$_POST[loan_for]','$_POST[loan_amount]','$_POST[max_years]')";
if (!mysqli_query($con,$query))
  {
  $status="Insertion not successfull";
  //echo "error".mysqli_error($con);
  header("location:loan.php?status=$status");
  }
else
  {  
  $status="Insertion successfull";
  header("location:loan.php?status=$status");
  }
		}
		else
		{
			$status="acc_no";
  			header("location:loan.php?status=$status");
			
		}
  
  
  
  
}
?>


<html>
<head>
<link rel="stylesheet" href="header.css">
<script type="text/javascript" src="validation/jquery_002.js"></script>
<script type="text/javascript" src="validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="validation/jquery.js"></script>
<script type="text/javascript">
jQuery.validator.addMethod("notEqual", function(value, element, param) {return this.optional(element) || value != param;}, "Please enter your name");

$(document).ready(function() {jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please");

			$("#loan_form").validate({
				submitHandler:function(form) 
				{
					SubmittingForm();
				},
				rules: 
				{
					applicant_name: 
					{
						required: true			
					},// simple rule, converted to {required:true}
					father_name: 
					{
						required: true		
					},
					account_no: 
					{
						required: true
					},
					contact_no: 
					{
						required: true,
					    number: true,
					 	rangelength: [10, 12]		
					},
					email_id: 
					{
						required: true,
					    email: true	
					},
					loan_for: 
					{
						required: true
					},
					
					loan_amount: 
					{
						required: true
					},
					
					max_years: 
					{
						required: true
					},
					comment: 
					{
						required: true
					}
					},
					messages: 
					{
						comment: "Please enter a comment.",
						password2: "Password Doesn't Matched"
					}
			});	
		});	
</script>
<title>Enquiry</title>
</head>
<form action="#" method="post" name="loan_form" id="loan_form">
<table id="form_table" style="margin-top:30px;">
<tr>
<th colspan="2">APPLY LOAN</th>
</tr>
<tr>
	<td>Account No:</td>
	<td><input type="text" name="account_no"/></td>
</tr>
<tr>
	<td>Name:</td>
	<td><input type="text" name="applicant_name"/></td>
</tr>
<tr>
	<td>Father Name:</td>
	<td><input type="text" name="father_name"/></td>
</tr>
<tr>
	<td>Loan for: </td>
	<td><select name="loan_for">
    <option value="Home">Home</option>
    <option value="Personal">Personal</option>
    <option value="Cars & Bikes">Cars & Bikes</option>
    <option value="Agriculture">Agriculture</option>
    </select>
    </td>
</tr>
<tr>
	<td>Amount:</td>
	<td><input type="text" name="loan_amount"/></td>
</tr>
<tr>
	<td>Max Years:</td>
	<td><input type="text" name="max_years"/></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Apply" name="apply" id="button" /></td>
</tr>



  <?php 
$status=$_REQUEST['status'];
if ($status == "acc_no")
{
?>
<tr><td colspan="2"><p id="try" style="font-size:18px; color:#F00; text-align:center;"><?php echo "Sorry, Invalid Account Number : Try again"; echo "<br />";?></p></td></tr>
<?php
}
if ($status == "Insertion successfull")
{
?>
<tr><td colspan="2"><p id="try" style="font-size:18px; color:#F00; text-align:center;"><?php echo "Applied Successfully"; echo "<br />";?></p></td></tr>
<?php	
}
?>


</table>
</form>
</body>
</html>



<?php include("main_footer.php"); ?>