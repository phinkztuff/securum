<?php
  
require ('../dbconn.php'); 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$operation = $_GET["operation"];


if($operation === 'deptin'){
	$time = $_GET["time"];
	$num = $_GET["cardnum"];
	if(preg_match("/^(?:2[0-4]|[01][1-9]|10):([0-5][0-9])$/", $time)){
		$sql = "UPDATE visitors SET deptin='$time' WHERE cardnumber=$num AND timeOut=''";
		$timeinresult = $conn->query($sql);


		if($timeinresult === TRUE){
			$result["message"] = $timeinresult;
			$result["time"] = $time;
			$result["cardnumber"] = $num;
			$result["sql"] = $sql;
		}else{
			$result["error"] = "Error in query";
			$result["time"] = $time;
			$result["cardnumber"] = $num;
			$result["sql"] = $sql;
		}
		http_response_code(200);
		echo json_encode($result);
	}
}else if($operation === 'deptout'){
	$time = $_GET["time"];
	$num = $_GET["cardnum"];
	if(preg_match("/^(?:2[0-4]|[01][1-9]|10):([0-5][0-9])$/", $time)){
		$sql = "UPDATE visitors SET deptout='$time' WHERE cardnumber=$num AND timeOut=''";
		$timeoutresult = $conn->query($sql);


		if($timeoutresult === TRUE){
			$result["message"] = $timeoutresult;
			$result["time"] = $time;
			$result["cardnumber"] = $num;
			$result["sql"] = $sql;
		}else{
			$result["error"] = "Error in query";
			$result["time"] = $time;
			$result["cardnumber"] = $num;
			$result["sql"] = $sql;
		}
		http_response_code(200);
		echo json_encode($result);
	}
}else{
	http_response_code(404);
 
    // tell the user no products found
    $result["error"] = "OPERATION Not Allowed";

    echo json_encode($result);
}
?>