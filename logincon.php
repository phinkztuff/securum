<?php
require ('dbconn.php');
session_start();

$id=$_POST ["id"];
$pword=$_POST ["pword"];
$selectsql= "SELECT userID, userName, userType FROM user WHERE userID='$id' AND userPassword='$pword'";
$result= $conn->query($selectsql);

if($result->num_rows > 0 ){
	while($row=mysqli_fetch_assoc($result)){
		$_SESSION["id"]=$row['userID'];
  	$_SESSION["name"]=$row['userName'];
    $_SESSION["utype"]=$row['userType'];
  		
  		if($row['userType'] == 0){
  			header('Location: adminpage.php');
  		}else if($row['userType'] == 1){
  			header('Location: vpaapage.php');
  		}else if($row['userType'] == 2){
  			header('Location: deptpage.php');
  		}
	}
}else{
	$selectguardsql= "SELECT guardNumber, guardFname FROM guard WHERE guardNumber=$id AND guardPass='$pword' AND isActive=1";

  $guardresult=$conn->query($selectguardsql);
  
	if($guardresult->num_rows > 0 ){
  	while($row=mysqli_fetch_assoc($guardresult)){
  		$_SESSION["id"]=$row['guardNumber'];
  		$_SESSION["name"]=$row['guardFname'];
      $_SESSION["utype"] = 10;
      header('Location: guardpage.php');
		}
	}else{
	  echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <center> <center> <img src='images/invalid.png' width='50%' height='50%' </center></center> <br>"; 

    header('Refresh: 3; URL= index.php'); 


	}
}
$conn-> close();
?>