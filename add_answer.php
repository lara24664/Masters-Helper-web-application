
<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="helpersmaster"; // Database name 
$tbl_name="responses"; // Table name 

// Connect to server and select databse.
$dbc = mysqli_connect($host, $username, $password); 
$dbcc = mysqli_select_db($dbc, $db_name);

// Get value of id that sent from hidden field 
$id=$_POST['id'];
//echo $_POST['id'];

// Find highest answer number. 
$sql="SELECT MAX(idResponse) AS MaxResponse_id FROM $tbl_name WHERE idQuestion=".$id;
$result=mysqli_query($dbc, $sql);
$rows = @mysqli_fetch_array($result, MYSQLI_ASSOC);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows['MaxResponse_id']) {
$Max_id = $rows['MaxResponse_id']+1;
}
else {
$Max_id = 1;
}

// get values that sent from form 
//$a_name=$_POST['a_name'];
$a_email=$_POST['a_email'];
$a_answer=$_POST['a_answer']; 
$a_pass = $_POST['a_pass'];
$idEmail = 0;

//echo "<br>".$a_email;
//echo "<br>";
$datetime=date("d/m/y H:i:s"); // create date and time

$whereId = "SELECT id from accounts where email = '$a_email' and password = '$a_pass'";
$resultt=mysqli_query($dbc, $whereId);
$rr = @mysqli_fetch_array($resultt, MYSQLI_ASSOC);
if($rr){
    $idEmail = $rr['id'];
}
else{
    echo"<script>alert('invalid informations!');</script>";
    echo "<script type='text/javascript'> document.location ='view_topic.php?id=".$id."'; </script>";
}

// Insert answer 
$sql2="INSERT INTO $tbl_name(dateResponse, idQuestion, idResponse, idStudent,  responseText)VALUES('$datetime',$id, $Max_id, $idEmail, '$a_answer')";
$result2=mysqli_query($dbc, $sql2);

if($result2){
//echo "Successful<BR>";
echo "<script>alert('Successful');</script>";
echo "<script type='text/javascript'> document.location ='view_topic.php?id=".$id."'; </script>";
//echo "<a href='view_topic.php?id=".$id."'>View your answer</a>";

// If added new answer, add value +1 in reply column 
$tbl_name2="questions";
$sql3="UPDATE $tbl_name2 SET replyNb='$Max_id' WHERE idQuestion='$id'";
$result3=mysqli_query($dbc, $sql3);
}
else {
echo "ERROR ".mysqli_error($dbc);
}

// Close connection
mysqli_close($dbc);
?>
