<?php
include('../calendar.php');
error_reporting(0);	
?>
<html>
<head>
<link rel="stylesheet" href="../header.css">
<script type="text/javascript" src="../validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="../validation/jquery.js"></script>
<script type="text/javascript">
jQuery.validator.addMethod("notEqual", function(value, element, param) {return this.optional(element) || value != param;}, "Please enter your name");

$(document).ready(function() {jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please");

			$("#reg_form").validate({
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
					address: 
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
					username: 
					{
						required: true
					},
					password1: 
					{
						required: true
					},
					password2: 
					{
						required: true,
						equalTo:'#password1'
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
<title>Registration</title>
</head>
<form action="regform_insert.php" method="post" name="reg_form" id="reg_form">
<table id="form_table">
<tr>
	<td>Name:</td>
	<td><input type="text" name="name"/></td>
</tr>
<tr>
	<td>Address:</td>
	<td><textarea name="address"></textarea></td>
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
	<td>DOB:</td>
	<td><input type="text" name="dob" id="dob"/></td>
</tr>
<tr>
	<td>Username:</td>
	<td><input type="text" name="username"/></td>
</tr>
<tr>
	<td>Password:</td>
	<td><input type="password" name="password1" id="password1"/></td>
</tr>
<tr>
	<td>Confirm Password:</td>
	<td><input type="password" name="password2" id="password2"/></td>
</tr>
<tr>
<td colspan="6" align="center"><input type="submit" value="Register" name="register" id="button" />
<button type="button" name="cancel" id="button" onClick="window.location.href='locationtogo.php'">Cancel</button></td>
</tr>
</table>
</form>
</body>
</html>