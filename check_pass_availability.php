<?php 
        

require_once("includes/config.php");
// code user name availablity

if(!empty($_POST["upass"])) {
	$pass= $_POST["upass"];
	if(strlen($pass) < 6)
	{
	echo "<span style='color:red'>Password should be 6 characters minimum.</span>";
	echo "<script>$('#submit').prop('disabled',true);</script>";
	} else {
		
	echo "<span style='color:green'>Password Accepted.</span>";
	echo "<script>$('#submit').prop('disabled',false);</script>";
	}

}
?>
