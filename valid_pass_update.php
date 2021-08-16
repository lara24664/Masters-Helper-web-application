<?php 
        

require_once("includes/config.php");


if(!empty($_POST["confirmpass"])) {
	echo "<span style='color:green'>Passwords match :)</span>";
	echo "<script>$('#changeoldpass').prop('disabled',false);</script>";
}
?>
