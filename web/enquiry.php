<?php include("main_header.php"); ?>

<?php
error_reporting(0);	
?>
<?php 
if(isset($_POST['register']))
{
include("db/connection.php");
$query = "INSERT INTO enquiry(name,contact_no,email_id,enquiry,description) VALUES('$_POST[name]','$_POST[contact_no]','$_POST[email_id]','$_POST[enquiry]','$_POST[description]')";
if (!mysqli_query($con,$query))
  {
  $status="Insertion not successfull";
  //echo "error".mysqli_error($con);
  header("location:enquiry.php?status=$status");
  }
else
  {  
  $status="Insertion successfull";
  header("location:enquiry.php?status=$status");
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

			$("#enq_form").validate({
				submitHandler:function(form) 
				{
					SubmittingForm();
				},
				rules: 
				{
					name: 
					{
						required: true,
						lettersonly: true			
					},// simple rule, converted to {required:true}
					description: 
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
					enquiry: 
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
<form action="#" method="post" name="enq_form" id="enq_form">
<table id="form_table" style="margin-top:30px;">
<tr>
<th colspan="2">ENQUIRY</th>
</tr>
<tr>
	<td>Name:</td>
	<td><input type="text" name="name"/></td>
</tr>
<tr>
	<td>Contact Number:</td>
	<td><input type="text" name="contact_no"/></td>
</tr>
<tr>
	<td>Email Id: </td>
	<td><input type="text" name="email_id"/></td>
</tr>
<tr>
	<td>Enquiry:</td>
	<td><input type="text" name="enquiry"/></td>
</tr>
<tr>
	<td>Description:</td>
	<td><textarea name="description"></textarea></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Submit" name="register" id="button" /></td>
</tr>
</table>
</form>
</body>
</html>



<?php include("main_footer.php"); ?>