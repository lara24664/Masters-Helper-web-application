<?php 
        

require_once("includes/config.php");
// code user name availablity

if(!empty($_POST["newpasswordd"])) {
	$pass= $_POST["newpasswordd"];
	if(strlen($pass) < 6)
	{
	echo "<span style='color:red'>Password should be 6 characters minimum.</span>";
	echo "<script>$('#changeoldpass').prop('disabled',true);</script>";
	} else {
		
	echo "<span style='color:green'>Password Accepted.</span>";
	echo "<script>$('#changeoldpass').prop('disabled',false);</script>";
	}

}
?>
