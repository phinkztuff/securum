<!DOCTYPE html>
<html> 
	<head>
		<link rel="stylesheet" href="css/maxcdn.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/uscbooking.css">
	    <script src="js/ajax.googleapis.jquery.min.js"></script>
	    <script src="js/maxcdn.bootstrap.min.js"></script>
		<style> 
			.th {
   				padding: 10px;
    			text-align: left;
				border: 1px solid #cdcdcd;
			}
	    	.usertab {
			    font-size: 15px;
			}
			.h3{
  				font-size: 30px;
   				font-family: auto;
			}
			.modbtn {
			    float: left;
			    margin-top: -25px;
			    font-family: monospace;
			    border-radius: 6px;
			    padding: 16px 16px;
			    font-size: 20px;
			    margin-left: 70px;
			}
			.bookbutton{
				font-family: monospace;
			}
		</style>
	</head>
		<body>
			<center> <br> <br> <br>
			<img src="images/usctc.png" alt="USC LOGO">
			<div class = "bookingFOrm" style="background-color:#FFFFFF; padding-top:20px;color:black;border-radius:5px;margin-bottom: 20px;margin-top:15px;width: 75%">
				<h3 style="font-family: Century; margin-bottom:20px; margin-top: 5px">

			<?php
				require ('loginheader.php');
				require ('dbconn.php');
				if($_SESSION['utype'] != 10 ) {
				   header('Location: index.php');
				}

				$bookerid=$_SESSION["id"];

				date_default_timezone_set('Asia/Singapore');
				$currentdate= date("Y-m-d");

				$query="SELECT * FROM booking JOIN department ON booking.departmentTo=department.departmentId JOIN booker ON booker.id=booking.bookername 
				WHERE booker.id=$bookerid";
				$result=$conn->query($query);

				$bookerquery="SELECT b.bookingID, b.bookername,b.datevisit,b.noofPersons,v.timeIn,v.timeOut  FROM booking b  LEFT JOIN visitors v ON b.bookingID=v.BookingID WHERE b.status='approved' ORDER BY bookingID DESC";
				$bookerresult=$conn->query($bookerquery);

		
				$deptquery="SELECT deptName, departmentId FROM department WHERE deptName != 'administration'";
				$deptresult=$conn->query($deptquery);
			?>
				
			</center> <br> <br> 
			<div class="container">
				<ul class="nav nav-tabs"> </ul>
			<table class="usertab">
				<thead>
		            <tr>
					    <th>Booking ID </th>
					    <th>Name </th>
					    <th>Date of Visit </th>
					    <th>Number of Persons </th>
					    <th>Time In </th>
					    <th> QR Scan Time </th>
					    <th>Time Out</th>
					</tr>
				</thead>
					<tbody>
					    <?php
					      	while($row=mysqli_fetch_assoc($bookerresult)){
					        	echo "<tr class='usertab'>";
					        	echo "<td class='usertab' id='bookingID'>".$row['bookingID']."</td>";
					        	echo "<td class='usertab' id='bookername'>".$row['bookername']."</td>";
					        	echo "<td class='usertab' id='datevisit'>".$row['datevisit']."</td>";
					        	echo "<td class='usertab' id='numberofPersons'>".$row['noofPersons']."</td>";
					        	if(!isset($row['timeIn']) || $row['timeIn'] === '' )
					        		echo "<td class='usertab' id='timein'><button type='button' id='timeinbtn' class='btn btn-primary btn-md btn-' data-toggle='modal' data-id='".$row['bookingID']."' data-name='".$row['bookername']."'data-target='#visitormodal'>Time In</button></td>";
					        	else
					        		echo "<td class='usertab' id='timein'>".$row['timeIn']."</td>";

					        	echo "<td class='usertab' id='qrscan'> TODO </td>";
					        	if(!isset($row['timeOut']) || $row['timeOut'] === '')
					        		echo "<td class='usertab' id='timein'><a href='guardcon.php?operation=timeout&id=" .$row['bookingID']."'  class='btn btn-primary btn-md btn-'>Time Out</a></td>";
					        	else
					        		echo "<td class='usertab' id='timein'>".$row['timeOut']."</td>";
					        	echo "</tr>";
					        }
					    ?>
					</tbody>
			</table> <br> <br>
			<div class="bookingbutton">
			<button type='button' class='booking btn btn-danger btn-lg bookbutton' data-toggle="modal" data-target="#booking">Book Here</button>
			</div> 
			</div> <br> <br> 

			<div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 100%; width: 100%; z-index: -999999; position: fixed;">
			</div>


			<div id="booking" class="modal fade">
			  	<div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <div class="h3">
				       		<h3>Booking Form</h3>
				       	</div>
				      </div>
				      <div class="modal-body">
				        <form action="booking.php" method="post" class="bookingInput"> 
				        	<center> <input class="booking" type="text" name="name" placeholder="Name of Booker:" required> </center> 
				        	<center> <input class="booking" type="number" name="contact" placeholder="Contact No:" maxlength="11" required> </center> 
				        	<center> <input class="booking" type="email" name="emailadd" placeholder="Email Address:" required> </center>
				        	<center> <input class="booking"  type="number" name="noofpersons" placeholder="Expected No of Persons:" min="1" max=""required> </center> 
							<center> <input class="booking" type="date" name="datevisit" placeholder="Date of Visit:" $mydate = "year-month-day hour:minutes:PM/AM", $conerted=strtotime ($mydate); echo date ("F,j,Y",$converted);
							echo required> </center> 
							<center> <select name="department" style="width:75%;height:50px;margin-top:2px; margin-bottom:
							11px;border-radius: 8px; padding-left: 4px " placeholder="Department To:">			
								
								<?php 
									while($row=mysqli_fetch_assoc($deptresult)){
										echo "<option value='".$row['departmentId']."'>".$row['deptName']."</option>";
									}
								?>

							</select> </center> 
							<center> <textarea rows="5" cols="62" class="booking" name="purpose" placeholder="Purpose:" required></textarea> </center> <br> <br> 
							<input type="text" name="operation" value="insert" style="visibility: hidden">	
							<input type="submit" class="btn btn-success btn-lg modbtn" value="Submit Changes"> <br> <br>
						</form>
				      </div>
			  		</div>
			  	</div>
  			</div>

  			<div id="visitormodal" class="modal fade">
			  	<div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h3>Time-In Form</h3>
				      </div>
				      <div class="modal-body">
				        <form action="guardcon.php" method="post" class="bookingInput">
				        	<input class="booking" id="modalbookingid" type="number" name="bookingid" readonly  required> 
				        	<input class="booking" type="number" name="cardnumber" placeholder="Card Number" required>
				        	<input class="booking" type="text" name="idtype" placeholder="ID Type" required><br>
				        	<input class="booking" type="number" name="idNumber" placeholder="ID Number" required><br> 
							<input class="booking" id="modalbookingfname" name="fname" placeholder="First Name" required></textarea><br>
							<input class="booking" name="lname" placeholder="Last Name" required></textarea><br>
							<input type="text" name="operation" value="timein" style="visibility: hidden"><br>	
							<input type="submit" class="btn btn-success btn-lg btn-" value="Submit">
						</form>
				      </div>
			  		</div>
			  	</div>
  			</div>
		</body>
		<script>
			$(document).on("click", "#timeinbtn", function () {
			     var myBookId = $(this).data('id');
			     var myBookName = $(this).data('name');
			     $("#modalbookingid").val(myBookId);
			     $("#modalbookingfname").val(myBookName);
			});

		</script>
</html>