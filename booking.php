<?php

use PHPMailer\PHPMailer\PHPMailer;
require ('dbconn.php');
require ('phpmailer/vendor/autoload.php');

$recipient = "theaisleznaehr@gmail.com";
$recipientName = "Renali Joy Mata";

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPDebug = 2;
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "securum.usc@gmail.com";
$mail->Password = "uscsecurum2018";
$mail->setFrom('securum.usc@gmail.com', 'Vice-President for Academic Affairs-University of San Carlos');
$mail->addReplyTo('securum.usc@gmail.com', 'Rena Li Jy');
$mail->addAddress($recipient, $recipientName);
$mail->Subject = 'Welcome to University of San Carlos '.$recipientName.'';


session_start();
date_default_timezone_set('Asia/Singapore');
$operation=$_POST['operation'];


if($operation === 'insert'){
	$userid=$_SESSION["id"];
	$orgname=$_POST["name"];
	$datevisit=$_POST["datevisit"];
	$eadd=$_POST["emailadd"];
	$dept=$_POST["department"];
	$noperson=$_POST["noofpersons"];
	$purpose=$_POST["purpose"];
	$contact=$_POST["contact"];

	$current = date("Y-m-d");

	if($current >= $datevisit){
		echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <center> <center> <img src='images/cantdobookings.png' width='50%' height='50%' </center></center> <br>"; 

	    header('Refresh: 3; URL= guardpage.php');
	}else{
		$insertsql = "INSERT INTO booking (emailAddress,datevisit, contactNumber,status,purpose,departmentTo,noofPersons,bookername) 
		
		VALUES ($eadd',$datevisit, $contact, 'new', '$purpose', $dept, $noperson,'$orgname')";
		
		if ($conn->query($insertsql) === TRUE) {
		    echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <center> <center> <img src='images/newrecord.png' width='50%' height='50%' </center></center> <br>"; 

		    header('Refresh: 3; URL= guardpage.php'); 
		} else {
		    echo "Error: " . $conn->error; 
		}
	}
}else if($operation === 'accept'){
	$bookId=$_POST['bookingId'];

	$mail->Body = "Your request have been accepted. You can now proceed in visiting the premises of University of San Carlos. Thank you! ";
	
	if (!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	    $approvedsql = "UPDATE booking SET status='approved' WHERE bookingID = $bookId";

		if($conn->query($approvedsql) === TRUE){
			echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <center> <center> <img src='images/approvedbooking.png' width='50%' height='50%' </center></center> <br>"; 
		    header('Refresh: 3; URL= vpaapage.php'); 

		}else {
			echo "Error: " . $conn->error;
			header('Refresh: 3; URL= vpaapage.php');
		}
	}
}else if($operation === 'reject'){
	$bookId=$_POST['bookingId'];
	$rejectreason=$_POST['rejectreason'];
	
	$mail->Body= "Your request have been rejected for the reason/s of  " .$rejectreason. ".  Thank you!";

	if (!$mail->send()){
		echo "Mailer Error:".$mail->ErrorInfo;
	} else {
		$rejectsql = "UPDATE booking SET status='rejected' , comment='$rejectreason' WHERE bookingID = $bookId";

		if($conn->query($rejectsql) === TRUE){
			echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <center> <center> <img src='images/rejectedbooking.png' width='50%' height='50%' </center></center> <br>"; 
		    header('Refresh: 3; URL= vpaapage.php'); 
		}else {
			echo "Error: " . $conn->error;
			header('Refresh: 3; URL= vpaapage.php');
			
		}
	}
}else if($operation === 'query'){
	$bookId=$_POST['bookingId'];
	$query=$_POST['query'];

	$mail->Body="We would like to know more about your request. Specifically on  " .$query. ".  Thank you!";

	if (!$mail->send()){
		echo "Mailer Error:" .$mail->ErrorInfo;
	} else {
	$rejectsql = "UPDATE booking SET status='pending' , comment='$query' WHERE bookingID = $bookId";

	if($conn->query($rejectsql) === TRUE){
		echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <center> <center> <img src='images/aprovedbooking.png' width='50%' height='50%' </center></center> <br>"; 
	    header('Refresh: 3; URL= vpaapage.php'); 
	    
	}else {
		echo "Error: " . $conn->error;
		header('Refresh: 3; URL= vpaapage.php');
	}
}
}

$conn->close();
?>