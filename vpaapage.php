<!DOCTYPE html>
<?php 

require ('dbconn.php');

$query="SELECT b.bookingID, b.bookername, b.contactNumber, d.deptName , b.datevisit, b.noofPersons, b.purpose, b.comment FROM booking b
Join department d
ON d.departmentID=b.departmentTo
WHERE status = 'new' ORDER BY b.bookingID DESC";
$result= $conn->query($query);

?>

<html>
	<head>
		<link rel="stylesheet" href="css/maxcdn.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/uscbooking.css">
	    <script src="js/ajax.googleapis.jquery.min.js"></script>
	    <script src="js/maxcdn.bootstrap.min.js"></script>
	    <style>
	    	th.usertab {
			    font-size: 15px;
			}
			a.vpaabutton {
			    float: left;
			}
			.nav>li>a {
   				 position: relative;
    			 display: block;
    			 padding: 0.5px 2px;
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
				if($_SESSION['utype'] != 1 ) {
					header('Location: index.php');
				}
			?>

			<br>
			<div class = "headerbutton">
				<a class="vpaabutton btn btn-primary btn-md" href="vpaapage.php">Home</a>
				<a class="vpaabutton btn btn-success btn-md" href="acceptvpaa.php">Approved</a>
				<a class="vpaabutton btn btn-danger btn-md" href="queryvpaa.php">Pending</a>
				<a class="vpaabutton btn btn-info btn-md" href="rejectvpaa.php">Rejected</a>
			</div> <br> 
			<h3 style="font-family: Century; margin-bottom:20px; margin-top: 5px"> NEW BOOKINGS </h3> <br> <br> 
			<div class="container"> 
				<ul class="nav nav-tabs">
					 <li class="active">
				</ul>
			<table class="usertab">
				<thead>
		            <tr>
		                <th class='usertab'>Booking ID</th>
		                <th class='usertab'>Booker's Name </th>
		                <th class='usertab'>Date of Visit</th>
		                <th class='usertab'>No. of Persons</th>
		                <th class='usertab'>Department To</th>
		                <th class='usertab'>Purpose</th>
		                <th class='usertab'>Accept</th>
		                <th class='usertab'>Reject</th>
		                <th class='usertab'>Send Message</th>
		            </tr>
		        </thead>
			
			<?php 
				while($row=mysqli_fetch_assoc($result)){
					echo "<tbody>";
						echo "<td class='usertab'><b>".$row['bookingID']."</td>";
						echo "<td class='usertab'>".$row['bookername']."</td>";
						echo "<td class='usertab'>".$row['datevisit']."</td>";
						echo "<td class='usertab'>".$row['noofPersons']."</td>";
						echo "<td class='usertab'>".$row['deptName']."</td>";
						echo "<td class='usertab'>".$row['purpose']."</td>";
						echo "<td class='usertab'><input type='submit' class='btn btn-primary btn-md' id='accept-button' value='Accept' data-toggle='modal' data-target='#acceptmodal' data-id='".$row['bookingID']."'></td> ";
						echo "<td class='usertab'><input type='submit' class='btn btn-danger btn-md' id='reject-button' value='Decline' data-toggle='modal' data-target='#rejectmodal' data-id='".$row['bookingID']."'></td> ";
						echo "<td class='usertab'><input type='submit' class='btn btn-success btn-md' id='query-button' value='Send Query' data-toggle='modal' data-target='#querymodal' data-id='".$row['bookingID']."'> </td>";
					echo "</tbody>";	
				}
			?>

		 	</table>
			</center>
			<div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 100%; width: 100%; z-index: -999999; position: fixed;">	
			</div>
			
			
			<div id="acceptmodal" class="modal fade">
			  	<div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h3>Accept Booking</h3>
				      </div>
				      <div class="modal-body">
				      	<h4>Continue accepting this booking?</h4>
				        <form action="booking.php" method="post" class="bookingInput">
					        <input type="text" name="operation" value="accept" style="visibility: hidden">
					        <input type="text" name="bookingId" id="acceptbookingid" style="visibility: hidden">
					    	<input type="submit" class="accept" value="Accept">
					    </form>
				      </div>
			  		</div>
			  	</div>
  			</div>

  			<div id="rejectmodal" class="modal fade">
			  	<div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h3>Reject Booking</h3>
				      </div>
				      <div class="modal-body">
				        <form action="booking.php" method="post" class="bookingInput">
					        <input type="text" name="operation" value="reject" style="visibility: hidden">
					        <input type="text" name="bookingId" id="rejectbookingid" style="visibility: hidden">
					        <textarea rows="5" cols="62" class="booking" type="text" name="rejectreason" placeholder="Reject Reason:" required></textarea><br>
					    	<input type="submit" class="accept" value="OK">
					    </form>
				      </div>
			  		</div>
			  	</div>
  			</div>

  			<div id="querymodal" class="modal fade">
			  	<div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h3>Write Message Here</h3>
				      </div>
				      <div class="modal-body">
				        <form action="booking.php" method="post" class="bookingInput">
					        <input type="text" name="operation" value="query" style="visibility: hidden">
					        <input type="text" name="bookingId" id="querybookingid" style="visibility: hidden">
					        <textarea rows="5" cols="62" class="booking" type="text" name="query" placeholder="Query Here. THis will be sent as email body" required> </textarea><br>
					    	<input type="submit" class="accept" value="Send">
					    </form>
				      </div>
			  		</div>
			  	</div>
  			</div>
		</body>

		<script type="text/javascript">
	    	$(document).ready(function(){
		       	$("#acceptmodal").on('show.bs.modal', function(e) {
					var id = $(e.relatedTarget).data('id');
					$('#acceptbookingid').val(id);
				});

		        $("#rejectmodal").on('show.bs.modal', function(e) {
					var id = $(e.relatedTarget).data('id');
					$('#rejectbookingid').val(id);
				});

		        $("#querymodal").on('show.bs.modal', function(e) {
					var id = $(e.relatedTarget).data('id');
					$('#querybookingid').val(id);
				});
	    	});
	    </script>
	    <link rel="stylesheet" type="text/css" href="css/uscbooking.css">
</html>