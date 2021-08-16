<?php 
        

require_once("includes/config.php");


if(!empty($_POST["mobileno"])) {
	echo "<span style='color:red'></span>";
	echo "<script>$('#submit').prop('disabled',false);</script>";
}
?>
