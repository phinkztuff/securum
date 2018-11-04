<?php
require ('dbconn.php');


if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $operation = $_POST['operation'];

  if($operation === 'new'){
      $pass=$_POST["password"];
      $fname=$_POST["fname"];
      $lname=$_POST["lname"];
      $gage=$_POST["age"];
      $gaddress=$_POST["address"];


      $insertsql = "INSERT INTO guard (guardPass,guardFname, guardLname,guardAge, guardAddress,isActive) VALUES('$pass','$fname', '$lname', '$gage', '$gaddress', 1)";
      $insertsqlresult = $conn->query($insertsql);

      if ($insertsqlresult === TRUE) {

        echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <center> <center> <img src='images/newdept.png' width='50%' height='50%' </center></center> <br>"; 
        header('Refresh: 3; URL= adminpage.php');

      } else {
        echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <center> <center> <img src='images/deptexisted.png' width='50%' height='50%' </center></center> <br>"; 
        header('Refresh: 3; URL= adminpage.php'); 
      }
  }else if($operation === 'timein'){
    $bookid = $_POST["bookingid"];
    $cardnumber = $_POST["cardnumber"];
    $idtype = $_POST["idtype"];
    $idnum = $_POST["idNumber"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $curdate = date("Y-m-d");
    $curtime = date("h:i");

    $query="INSERT INTO visitors(cardnumber,idType,idNumber,dateVisited,timeIn,visitorFirstname,visitorLastname,BookingID) VALUES ($cardnumber,'$idtype',$idnum,'$curdate', '$curtime', '$fname', '$lname', $bookid)";

    $update = $conn->query($query);

    if($update === TRUE){
      echo "Successful Time-In";
      header('Refresh: 3; URL= guardpage.php');
    }
  }
else if($operation === 'edit'){
    $number=$_POST['guardNumber'];
    $fname=$_POST['guardFname'];
    $lname=$_POST['guardLname'];
    $password=$_POST['guardPass'];
    $address=$_POST['guardAddress'];
    $age=$_POST['guardAge'];
    $updatequery = "UPDATE guard SET guardFname='$fname', guardLname='$lname', guardPass='$password', guardAddress='$address', guardAge=$age where guardNumber=$number";
   
    $upresult = $conn->query($updatequery);
    
    if($upresult === TRUE){
      echo "success";
    }else{
      echo "error in update";
    }
  }  

}else if($_SERVER['REQUEST_METHOD'] === 'GET'){
  $operation = $_GET['operation'];
  
  if($operation === 'delete'){
    $unames=$_GET["deleteguard"];
    $deleted=0; 

    if(!isset($unames) || $unames === '')
    header('Refresh: 5; URL= adminpage.php');

    $myArray = explode(',', $unames);
    
    foreach($myArray as $value){
      if ($value !== ''){
        $deletesql = "DELETE FROM guard WHERE guardNumber = '$value'";

        if($conn->query($deletesql) === TRUE){
        $deleted =1;
      }
    }
  }
  if ($deleted == 1){
    echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <center> <center> <img src='images/deletedept.png' width='50%' height='50%' </center></center> <br>"; 
    header('Refresh: 3; URL= adminpage.php');
  }
  else {
    echo "NO Users Deleted";
    header ('Refresh: 5; URL = adminpage.php');
    }

  }else if($operation === 'timeout'){
    $id = $_GET["id"];
    $curtime = date("h:i");
    $query="UPDATE visitors SET timeOut='$curtime' WHERE BookingID=$id";
    $update = $conn->query($query);

    if($update === TRUE){
      echo "Successful Time-Out";
      header('Refresh: 3; URL= guardpage.php');
    }
  }
}

$conn->close();

?>

