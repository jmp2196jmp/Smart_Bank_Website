<?php
include("main_header.php"); 
error_reporting(0);	
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

			$("#emi_form").validate({
				submitHandler:function(form) 
				{
					SubmittingForm();
				},
				rules: 
				{
					P: 
					{
						required: true			
					},// simple rule, converted to {required:true}
					R: 
					{
						required: true
					},
					N: 
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
<title>Registration</title>
</head>
<form method="post" name="emi_form" id="emi_form">
<table id="form_table" style="margin-top:30px;">
<tr>
<th colspan="2">EMI CALCULATOR</th>
</tr>
<tr>
	<td>Principle Amount:</td>
	<td><input type="text" name="P"></td>
</tr>
<tr>
	<td>Rate of interest(percentage):</td>
	<td><input type="text" name="R"></td>
</tr>
<tr>
	<td>Loan Term(months):</td>
	<td><input type="text" name="N"></td>
</tr>
<tr>
<tr>

<td colspan="2" align="center"><input type="submit" value="Calculate!" name="calculate" id="button" /></td>
</tr>


<?php 
if(isset($_POST['calculate']))
{
$P=$_POST['P'];
$R=$_POST['R'];
$N=$_POST['N'];
$r=$R/100/12;
$a1=$P*$r;
$a2=(1+$r);
$a3=pow($a2,$N);

$a4=($a3-1);
$a5=$a3/$a4;
$E=$a1*$a5;
$value=substr("$E",0,6);

}
?>
<tr>
	<td> <p id="try" style="font-size:18px; color:#F00; text-align:center;">EMI Amount is:</p></td>
	<td><?php
	/*echo $r."<br>"; 
	echo $a1."<br>";
	echo $a2."<br>";
	echo $a3."<br>";
	echo $a4."<br>";
	echo $a5."<br>";
	echo "INR. ".$value; 
	*/
	?>
    <p id="try" style="font-size:18px; color:#F00; "><?php echo "INR. ".$value;?></p>
    
    
    </td>
</tr>











</table>
</form>
</body>
</html>