
<?php

$host="localhost";  
$username="root";  
$db_name="helpersmaster"; 
$tbl_name="questions";

$dbc = mysqli_connect($host, $username, ''); 
if($dbc){
    $dbcc = mysqli_select_db($dbc,"$db_name");
if($dbcc){
    // get data that sent from form 
$topic=$_POST['topic'];
$text=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];

$datetime=date("d/m/y h:i:s"); //create date time

if($email == '' || $text == '' || $topic == ''){
    echo "<script>alert('please enter all details!');</script>";
    echo "<script type='text/javascript'> document.location ='new_topic.php?id=".$id."'; </script>";
}
    
else{
    $sql="INSERT INTO $tbl_name(dateQuestion, email, name, questionText, type)VALUES('$datetime', '$email', '$name', '$text', '$topic' )";
    $result=mysqli_query($dbc, $sql);

    if($result){
        echo "<script>alert('Your question is added successfuly!✔');</script>";
    echo "<script type='text/javascript'> document.location ='main_forum.php?id=".$id."'; </script>";
}
else {
echo "ERROR";
}
}
    

}
}


mysqli_close($dbc);
?>

