
<?php 
$errorMessage = (isset($_GET['msg']) && $_GET['msg'] != '') ? $_GET['msg'] : '&nbsp;';
$msgMessage = (isset($_GET['success']) && $_GET['success'] != '') ? $_GET['success'] : '&nbsp;';
?>
<h2>Bill Payment</h2>
<p>Bill Payment is a process of transfering funds from your account for Bill Payments.<br/>Please make sure that you have enough funds available in your account to transfer. </p>

<link href="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.js" type="text/javascript"></script>

<script src="<?php echo WEB_ROOT; ?>admin/library/jquery.min.js" type="text/javascript"></script>

<link href="<?php echo WEB_ROOT; ?>library/spry/textareavalidation/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/textareavalidation/SpryValidationTextarea.js" type="text/javascript"></script>

<link href="<?php echo WEB_ROOT; ?>library/spry/selectvalidation/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/selectvalidation/SpryValidationSelect.js" type="text/javascript"></script>
<link type="text/css" href="calendar/jquery.datepick.css" rel="stylesheet">
<script type="text/javascript" src="calendar/jquery.min.js"></script>
<script type="text/javascript" src="calendar/jquery.datepick.js"></script>
<script type="text/javascript">
$(function() {
	$('#dot').datepick();
});
function showDate(date) {
	alert('The date chosen is ' + accno);
}
</script>
<div id="errorCls" style="color:#FF0000 !important;font-size:14px;font-weight:bold;"><?php echo $errorMessage; ?></div>
<div style="color:#99FF00 !important;font-size:14px;font-weight:bold;"><?php echo $msgMessage; ?></div>

<form action="<?php echo WEB_ROOT; ?>view/process.php?action=bill" method="post" >
    <table width="550" border="0" cellpadding="5" cellspacing="1" class="entryTable">
      <tr id="listTableHeader">
        <th  colspan="2" >Bill Payment</th>
      </tr>
      
      
       <tr>
	<td width="200" height="30" class="label"><strong>Type of Bill</td></strong></td>
	<td><select name="Type_of_Bill">
    <option value="Mobile Phone BSNL">Mobile Phone BSNL</option>
    <option value="Mobile Phone Airtel">Mobile Phone Airtel</option>
    <option value="Mobile Phone Idea">Mobile Phone Idea</option>
    <option value="Telephone Bills">Telephone Bills</option>
    <option value="Credit Card">Credit Card</option>
    <option value="Electricity">Electricity</option>
    <option value="Life Insurance">Life Insurance</option>
    <option value="Magazine Subscription">Magazine Subscription</option>
    </select>
    </td>
</tr>
      
      
      
      <tr>
        <td width="200" height="30" class="label"><strong>Amount to Pay Rupees</strong></td>
        <td height="30" class="content">
		<span id="sprytf_amt">
            <input name="amt"  type="text"  size="20" maxlength="30" />
            <br/>
            <span class="textfieldRequiredMsg">Amount is required.</span>
		</span>
		</td>
      </tr>
      
      <tr>
        <td width="200" height="30" class="label"><strong>Account Number</strong></td>
        <td height="30" class="content">
          <input name="saccno" type="text" readonly="true"  id="saccno" 
		  	value="<?php echo $_SESSION['hlbank_user']['acc_no'] ?>" size="20"/>
		</td>
      </tr>
	  
	 
	  
      <tr>
        <td height="30">&nbsp;</td>
        <td height="30"><input name="submitButton" type="submit" id="submitButton" value="Pay Bill" /></td>
      </tr>
	</table>
</form>
  
<script type="text/javascript">
<!--

var sprytf_amt = new Spry.Widget.ValidationTextField("sprytf_amt", "integer", {validateOn:["blur", "change"]});

//-->
</script>

<script type="text/javascript">
$(document).ready(function(){
	$('#amt').keyup(function(e){
		$(this).val(format($(this).val()));
    });
	var format = function(num){
		var str = num.toString().replace("$", ""), parts = false, output = [], i = 1, formatted = null;
		if(str.indexOf(".") > 0) {
			parts = str.split(".");
			str = parts[0];
		}
		str = str.split("").reverse();
		for(var j = 0, len = str.length; j < len; j++) {
			if(str[j] != ",") {
				output.push(str[j]);
				if(i%3 == 0 && j < (len - 1)) {
					output.push(",");
				}
				i++;
			}
		}
		formatted = output.reverse().join("");
		return("$" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
	};

});//ready
</script>