<?php
	require ('dbconn.php'); 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	if(isset($_POST["username"]))$uname=$_POST["username"];
	if(isset($_POST["password"]))$upass=$_POST["password"];
	$operation=$_POST["operation"];

	if($operation === 'add'){
		if(isset($_POST["usertype"]) && isset($_POST["department"])){
			$utype=$_POST["usertype"];
			$dept=$_POST["department"];

			if ($utype === '1'){
				$position = 'vpaa';
			} else{
				$position = 'secretary';
			}

			$selectprev = "SELECT * FROM user";
			$prevcount = mysqli_num_rows($conn->query($selectprev));


			$insertsql = "INSERT INTO user (usertype,userPassword, deptId,userName,userposition) 
			SELECT '$utype','$upass', '$dept', '$uname', '$position' FROM dual WHERE NOT EXISTS (SELECT userName FROM user
			WHERE userName = '$uname')";
			$insertsqlresult = $conn->query($insertsql);

			$selectcurrent = "SELECT * FROM user";
			$currentcount = mysqli_num_rows($conn->query($selectcurrent));

			if ($insertsqlresult === TRUE && $prevcount != $currentcount) {

			    echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <center> <center> <img src='images/newuser.png' width='50%' height='50%' </center></center> <br>"; 
			    header('Refresh: 3; URL= adminpage.php'); 

			} else {
			   	echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <center> <center> <img src='images/userexisted.png' width='50%' height='50%' </center></center> <br>"; 
				header('Refresh: 3; URL= adminpage.php'); 
			}
		}
	}else if($operation === 'edit'){
		$id=$_POST['userid'];
		$password=$_POST['password'];
		$updatequery = "UPDATE user SET userName='$uname',userPassword='$password' where userID=$id";
		$upresult = $conn->query($updatequery);
		
		if($upresult === TRUE){
			echo "success";
		}else{
			echo "error in update";
		}
	}
}else if($_SERVER['REQUEST_METHOD'] === 'GET'){
	$unames=$_GET["deleteus"];
	$deleted=0;

	if(!isset($unames) || $unames === '')
		header('Refresh: 5; URL= adminpage.php');

	$myArray = explode(',', $unames);

	foreach($myArray as $value){

		if($value !== ''){
			$deletesql = "DELETE FROM user WHERE userName = '$value'";

			if($conn->query($deletesql) === TRUE){
				$deleted =1;
			}
		}
	}
	
	if($deleted == 1){
		echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <center> <center> <img src='images/deleteduser.png' width='50%' height='50%' </center></center> <br>";
		header('Refresh: 5; URL= adminpage.php');
	}
	else{
		echo "No Users Deleted";
		header('Refresh: 5; URL= adminpage.php');
	}
	
}

$conn->close();

?>