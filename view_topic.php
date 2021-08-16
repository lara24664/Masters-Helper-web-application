<?php
session_start();
$_SESSION['forum'] = 1;

$dbc = mysqli_connect('localhost','root',''); 
$dbcc = mysqli_select_db($dbc, 'helpersmaster');
 
$id=$_GET['id'];
$sql="SELECT * FROM questions WHERE idQuestion='$id'";
$result = mysqli_query($dbc, $sql);
$rows = @mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<html>
<head>
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="assets/css/font-awesome.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel="stylesheet" type="text/css"/>
    <title>Masters Helper System</title>
    </head>
    <body>
        
        <?php if(isset($_SESSION['alogin']))
			include('admin/includes/header.php');
		else 
			include('includes/header.php');?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
        
         <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">ANSWERS FORM</h4>

                </div>

            </div>
    <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            TOPIC &amp; ANSWERS 
                        </div>
                        <div class="panel-body">
                            
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td>
        <table class="table table-striped table bordered table hover" width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
            <tr>
                <td class="form-control" bgcolor="#F8F7F1"><strong><?php echo $rows['type']; ?></strong></td>
            </tr>

            <tr>
                <td class="form-control" bgcolor="#F8F7F1"><?php echo $rows['questionText']; ?></td>
            </tr>

            <tr>
                <td class="form-control" bgcolor="#F8F7F1"><strong>By :</strong> <?php echo $rows['name']; ?> <strong>Email : </strong><?php echo $rows['email'];?></td>
            </tr>

            <tr>
                <td class="form-control" bgcolor="#F8F7F1"><strong>Date/time : </strong><?php echo $rows['dateQuestion']; ?></td>
            </tr>
        </table>
        </td>
    </tr>
</table>
                            
<BR>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="add_answer.php">
<td>
    <table class="table table-striped table bordered table hover" width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

    <!--<tr>
        <td width="18%"><strong>Name</strong></td>
        <td width="3%">:</td>
        <td width="79%"><input name="a_name" type="text" id="a_name" size="45"></td>
    </tr>-->
    
    <tr>
        <td><strong>Email</strong></td>
        <td>:</td>
        <td><input class="form-control" name="a_email" type="text" id="a_email" size="45"></td>
    </tr>
    
    <tr>
        <td><strong>Password</strong></td>
        <td>:</td>
        <td><input class="form-control" name="a_pass" type="password" id="a_pass" size="45"></td>
    </tr>
    
    <tr>
        <td valign="top"><strong>Answer</strong></td>
        <td valign="top">:</td>
        <td><textarea class="form-control"  name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>
    </tr>
    
    <tr>
        <td>&nbsp;</td>
        <td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
        <td><input class="btn btn-info" type="submit" name="Submit" value="Submit">
        <input class="btn btn-info" type="reset" name="Submit2" value="Reset"></td>
    </tr>
    </table>
</td>
</form>
</tr>
</table>
    </BR>
<BR>

<?php

$sql2="SELECT * FROM responses r, accounts a, students s WHERE r.idQuestion='$id' and r.idStudent = a.id and a.id = s.id";
    
$result2 = mysqli_query($dbc, $sql2);
while($rows= @mysqli_fetch_array($result2, MYSQLI_ASSOC)){
?>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table class="table table-striped table bordered table hover" width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1"><strong>ID</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['idResponse']; ?></td>
</tr>
<tr>
<td width="18%" bgcolor="#F8F7F1"><strong>Name</strong></td>
<td width="5%" bgcolor="#F8F7F1">:</td>
<td width="77%" bgcolor="#F8F7F1"><?php echo $rows['firstName']." ".$rows['lastName']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Email</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['email']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Answer</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['responseText']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Date/Time</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['dateResponse']; ?></td>
</tr>
</table></td>
</tr>
</table><br>

<?php
}

$sql3="SELECT view FROM questions WHERE idQuestion='$id'";
$result3=mysqli_query($dbc, $sql3);
$rows = @mysqli_fetch_array($result3, MYSQLI_ASSOC);
$view=$rows['view'];

// if have no counter value set counter = 1
if(!isset($view)){
$view=0;
$sql4="INSERT INTO questions(view) VALUES('$view') WHERE idQuestion='$id'";
$result4=mysqli_query($dbc, $sql4);
}

// count more value
$addview=$view + 1;
$sql5="update questions set view='$addview' WHERE idQuestion='$id'";
$result5=mysqli_query($dbc, $sql5);
mysqli_close($dbc);
?>


        </BR>
                            
</div>
</div>
</div>
        </div>
        </div>
    </body>
</html>

<?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>