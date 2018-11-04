<!DOCTYPE html>
<html> 
	<head>
		<link rel="stylesheet" href="css/maxcdn.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/uscbooking.css">
	    <script src="js/ajax.googleapis.jquery.min.js"></script>
	    <script src="js/maxcdn.bootstrap.min.js"></script>
		
		<style>
			.usertab {
			    font-size: 15px;
			}
	    	.label{
	    		color: gray;
    			font-size: 14px;
    			margin-left: 65px;
	    	}
	    	.modbtn{
    			float: left;
			    margin-top: -25px;
			    font-family: monospace;
			    border-radius: 6px;
			    padding: 16px 16px;
			    font-size: 20px;
			    margin-left: 70px;
			}
			.adddelbtn{
				font-family: monospace;
			}

			.h3{
  				font-size: 30px;
   				font-family: auto;
			}
	   	</style>

		<script type="text/javascript">
		    $(document).ready(function(){
		        $(".delete-row").click(function(){
		            $("table tbody").find('input[name="record"]').each(function(){
		            	if($(this).is(":checked")){
		                    $('#deleteuser').val($('#deleteuser').val() + "," + $(this).parent().siblings('#username').text());
		                }
		            });
		        });
		        $(".delete-dept").click(function(){
		            $("table tbody").find('input[name="buildingrecord"]').each(function(){
		            	if($(this).is(":checked")){
		                    $('#deletedepartment').val($('#deletedepartment').val() + "," + $(this).parent().siblings('#deptName').text());
		                }
		            });
		        });
		        $(".delete-guard").click(function(){
		            $("table tbody").find('input[name="guardrecord"]').each(function(){
		            	if($(this).is(":checked")){
		                    $('#deleteguard').val($('#deleteguard').val() + "," + $(this).parent().siblings('#guardNumber').text());
		                }
		            });
		        });
		        $("#updatemodal").on('show.bs.modal', function(e) {
					var id = $(e.relatedTarget).data('id');
					var name = $(e.relatedTarget).data('name');
					var password = $(e.relatedTarget).data('password');
					console.log(id + name + "" );
					$('#edituserId').val(id);
					$('#editusername').val(name);
					$('#edituserPassword').val(password);
				});
				$("#updatedept").on('show.bs.modal', function(e) {
					var id = $(e.relatedTarget).data('id');
					var name = $(e.relatedTarget).data('name');
					var floor = $(e.relatedTarget).data('floor');
					var room = $(e.relatedTarget).data('room');
					var building = $(e.relatedTarget).data('Building');
					console.log(id + " " + name + " " + floor + " " + room );
					$('#editdeptid').val(id);
					$('#editdeptname').val(name);
					$('#editdeptfloor').val(parseInt(floor));
					$('#editdeptroomno').val(parseInt(room));
				});
				$("#updateguard").on('show.bs.modal',function(e){
					var number = $(e.relatedTarget).data('id');
					var fname = $(e.relatedTarget).data('fname');
					var lname = $(e.relatedTarget).data('lname');
					var password = $(e.relatedTarget).data('password');
					var address =$(e.relatedTarget).data('address');
					var age = $(e.relatedTarget).data('age');
					console.log( password + lname + "" + address + age);
					$('#editguardNumber').val(number);
					$('#editguardFname').val(fname);
					$('#editguardLname').val(lname);
					$('#editguardPass').val(password);
					$('#editguardAddress').val(address);
					$('#editguardAge').val(age);

				});
		    });                                                                                                           
		</script>
		
	</head>
		<body>
			<center> <br> <br> <br>
			<img src="images/usctc.png" alt="USC LOGO">
			<div class = "bookingFOrm" style="background-color:#FFFFFF; padding-top:20px;color:black;border-radius:5px;margin-bottom: 20px;margin-top:15px;width: 75%">
			<h3 style="font-family: Century; margin-bottom:20px; margin-top: 5px">

			<?php
				require ('loginheader.php');
				require ('dbconn.php');
				if($_SESSION['utype'] != 0 ) {
				  header('Location: index.php');
				}
				$query="SELECT u.userID,u.userName,u.userPassword, d.deptName,u.userPosition FROM user u JOIN department d ON d.departmentId = u.deptId WHERE u.userType <> 0";
				$result=$conn->query($query);
			

				$deptquery="SELECT d.deptName, d.departmentId,b.buildingId, b.buildingName, d.deptFloor, d.deptRoomNo FROM department d JOIN building b ON b.buildingId=d.deptBuilding";
				$deptresultmain=$conn->query($deptquery);

				$guardquery="SELECT guardPass, guardNumber,guardFname, guardLname, guardAge, guardAddress, isActive FROM guard";
				$guardresult=$conn->query($guardquery);
				
			?>	

			</center> <br>
			<div class="container">
				<ul class="nav nav-tabs">
				    <li class="active"><a data-toggle="tab" href="#home">User</a></li>
				    <li><a data-toggle="tab" href="#menu1">Department</a></li>
				    <li> <a data-toggle="tab" href="#menu2">Guard </a> </li>
				</ul> <br> <br>
				<div class="tab-content">
				    <div id="home" class="tab-pane fade in active">
				      	<table class="usertab">
					        <thead>
					            <tr>
					                <th>Select</th>
					                <th>Name</th>
					                <th>Department</th>
					                <th>Position</th>
					                <th></th>
					            </tr>
					        </thead>
					        	<tbody>
					        		<?php
					        			while($row=mysqli_fetch_assoc($result)){
					        				echo "<tr class='usertab'>";
					        				echo "<td class='usertab'><input type='checkbox' name='record'></td>";
					        				echo "<td class='usertab' id='username'>".$row['userName']."</td>";
					        				echo "<td class='usertab' id='department'>".$row['deptName']."</td>";
					        				echo "<td class='usertab' id='position'>".$row['userPosition']."</td>";
					        				echo "<td class='usertab'> <input type='submit'class='btn btn-info btn-md' id='update-button' value='Update' data-toggle='modal' data-target='#updatemodal' data-name='".$row['userName']."' data-id='".$row['userID']."' data-password='".$row['userPassword']."' </td>";
					        				echo "</tr>";
					        			}
					        		?>

					        	</tbody>
					    </table> <br> <br>
					    <div id="updatemodal" class="modal fade">
						  	<div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <div class="h3">
							       		<h3>Edit Details</h3>
							       	</div>
							      </div> <br>
							      <div class="modal-body">
							        <form action="usercon.php" method="post" class="bookingInput">
								        <label class="label"> User ID</label> 
								        <center> <input class="booking" type="text" name="userid" id="edituserId" readonly> </center>  
								        <label class="label"> Username </label> 
								        <center> <input class="booking" type="text" name="username" id="editusername" value="accept"> </center> 
								        <label class="label"> Password </label> 
								        <center> <input class="booking" type="text" name="password" id="edituserPassword" placeholder="New Password"> </center> <br> <br>
								        <input type="text" name="operation" value="edit" style="visibility: hidden"> 
								    	<input type="submit" class="btn btn-success btn-lg modbtn" value="Submit Changes"> <br> <br> 
								    </form>
							      </div>
						  		</div>
						  	</div>
			  			</div>
					    <button type='button' class='btn btn-primary btn-lg adddelbtn ' data-toggle="modal" data-target="#add"> Add User</button>
					    <button type="button" class="delete-row btn btn-danger btn-lg adddelbtn" data-toggle="modal" data-target="#delete">Delete User</button> <br> <br> <br> <br>
				    </div>

				    <div id="menu1" class="tab-pane fade">
				      	<table class="usertab">
					        <thead>
					            <tr>
					                <th>Select</th>
					                <th>Name</th>
					                <th>Building</th>
					                <th>Floor</th>
					                <th>Room No.</th>
					                <th></th>
					            </tr>
					        </thead>
					        	<tbody>
					        		<?php
					        			while($row=mysqli_fetch_assoc($deptresultmain)){
					        				echo "<tr class='usertab'>";
					        				echo "<td class='usertab'><input type='checkbox' name='buildingrecord'></td>";
					        				echo "<td class='usertab' id='deptName'>".$row['deptName']."</td>";
					        				echo "<td class='usertab' id='deptbuilding'>".$row['buildingName']."</td>";
					        				echo "<td class='usertab' id='deptfloor'>".$row['deptFloor']."</td>";
					        				echo "<td class='usertab' id='deptroomno'>".$row['deptRoomNo']."</td>";
					        				echo "<td class='usertab'><input type='submit' class='btn btn-info btn-md' id='update-button' value='Update' data-toggle='modal' data-target='#updatedept' data-name='".$row ['deptName']."' data-id='".$row ['departmentId']."' data-floor='".$row['deptFloor']."' data-room='".$row['deptRoomNo']."' data-building='".$row['buildingId']."'</td>";
					        				echo "</tr>";
					        			}
					        		?>
					       		</tbody>
					    </table> <br> <br>
					    <button type='button' class='btn btn-primary btn-lg adddelbtn' data-toggle="modal" data-target="#adddept"> Add Department</button>
					    <button type="button" class="delete-dept btn btn-danger btn-lg adddelbtn" data-toggle="modal" data-target="#deletedept">Delete Department</button> <br> <br> <br> <br>
					</div>
					<div id="updatedept" class="modal fade">
						  	<div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <div class="h3">
							       		<h3>Edit Department</h3>
							       	</div>
							      </div> <br>
							      <div class="modal-body">
							        <form action="deptcon.php" method="post" class="bookingInput">
							        	<label class="label"> Department ID </label> 
							        	<center> <input class="booking" type="text" name="deptid" id="editdeptid" readonly> </center> 
							        	<label class="label"> Department Name </label> 
								        <center> <input class="booking" type="text" name="deptname" id="editdeptname"> </center> <br> 
								        <label class="label"> Department Floor </label> 
								        <center> <input class="booking" type="number" name="deptfloor" id="editdeptfloor"> </center> 
								        <label class="label"> Department Room No.  </label> 
								        <center> <input class="booking" type="number" name="deptroomno" id="editdeptroomno"> </center>

								        <label class="label"> Department Building  </label> 
								        <center> 
								        <?php
							        		$buildqueries="SELECT buildingId, buildingName FROM building";
											$buildresults= $conn->query($buildqueries);
										echo "<select style='width:75%;height:50px;margin-top:2px; margin-bottom: 11px;border-radius: 8px; padding-left: 4px' name='building'>"	;
											while($deptrow=mysqli_fetch_assoc($buildresults)){
												echo "<option value='".$deptrow['buildingId']."'>".$deptrow['buildingName']."</option>";
											}
										echo "</select><br>";
							       		?>
							       		</center> <br> <br> 
								        <input type="text" name="operation" value="edit" style="visibility: hidden" readonly> 
								    	<input type="submit" class="btn btn-success btn-lg modbtn" value="Submit Changes"> <br> <br> 
								    </form>
							      </div>
						  		</div>
						  	</div>
			  			</div>

					<div id="menu2" class="tab-pane fade">
				      	<table class="usertab">
					        <thead>
					            <tr>
					                <th>Select</th>
					                <th>Id</th>
					                <th>First Name</th>
					                <th>Last Name</th>
					                <th>Status</th>
					                <th></th>
					            </tr>
					        </thead>
					        	<tbody>
					        		<?php
					        			while($row=mysqli_fetch_assoc($guardresult)){
					        				echo "<tr class='usertab'>";
					        				echo "<td class='usertab'><input type='checkbox' name='guardrecord'></td>";
					        				echo "<td class='usertab' id='guardNumber'>".$row['guardNumber']."</td>";
					        				echo "<td class='usertab' id='guardFname'>".$row['guardFname']."</td>";
					        				echo "<td class='usertab' id='guardLname'>".$row['guardLname']."</td>";
					        				echo "<td class='usertab' id='isActive'>".$row['isActive']."</td>";
					        				echo "<td class='usertab'><input type='submit' class='btn btn-info btn-md' id='update-button' value='Update' data-toggle='modal' data-target='#updateguard' data-fname='".$row ['guardFname']."' data-lname='".$row ['guardLname']."' data-id='".$row ['guardNumber']."' data-address='".$row['guardAddress']."' data-age='".$row['guardAge']."' data-status='".$row['isActive']."' data-password='".$row['guardPass']."'</td>";
					        				echo "</tr>";
					        			}
					        		?>
					       		</tbody>
					    </table> <br> <br>
					    <button type='button' class='btn btn-primary btn-lg adddelbtn' data-toggle="modal" data-target="#addguard"> Add Guard</button>
					    <button type="button" class="delete-guard btn btn-danger btn-lg adddelbtn" data-toggle="modal" data-target="#delguardmodal">Delete Guard</button> <br> <br> <br> <br>
					</div>
					<div id="updateguard" class="modal fade">
						  	<div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <div class="h3">
							       		<h3>Edit Guard</h3>
							       	</div>
							      </div> <br>
							      <div class="modal-body">
							        <form action="guardcon.php" method="post" class="bookingInput">
							        	<label class="label"> Guard Number </label> 
							        	<center> <input class="booking" type="number" name="guardNumber" id="editguardNumber" readonly> </center> 
							        	<label class="label"> Firstname </label> 
								        <center> <input class="booking" type="text" name="guardFname" id="editguardFname"> </center> 
								        <label class="label"> Lastname </label> 
								        <center> <input class="booking" type="text" name="guardLname" id="editguardLname"> </center> 
								        <label class="label"> Password  </label> 
								        <center> <input class="booking" type="text" name="guardPass" id="editguardPass" readonly> </center>
								        <label class="label"> Address  </label> 
								        <center> <input class="booking" type="text" name="guardAddress" id="editguardAddress"> </center>
								        <label class="label"> Age </label> 
								        <center> <input class="booking" type="number" name="guardAge" id="editguardAge"> </center><br> 
							       		<br> <br> 
								        <input type="text" name="operation" value="edit" style="visibility: hidden" readonly> 
								    	<input type="submit" class="btn btn-success btn-lg modbtn" value="Submit Changes"> <br> <br> 
								    </form>
							      </div>
						  		</div>
						  	</div>
			  			</div>


			<div id="add" class="modal fade">
			  	<div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <div class="h3">
				       		<h3>Add User</h3>
				       	</div>
				      </div>
				      <center> <br> 
				      <div class="modal-body">
				        <form action="usercon.php" method="post" class="bookingInput">
					        <input class="booking" type="text" name="username" placeholder="Username" required><br>
					        <input class="booking" type="password" name="password" placeholder="Password" required><br>
					        <select class="booking" style='width:75%;height:50px;margin-top:2px; margin-bottom: 11px;border-radius: 8px; padding-left: 4px' name="usertype">
					        	<option value="1">VPAA</option>
					        	<option value="2">SECRETARY</option>
					        </select> <br>
					        <?php
					        	$deptquery="SELECT deptName, departmentId FROM department";
								$deptresult= $conn->query($deptquery);

							echo "<select style='width:75%;height:50px;margin-top:2px; margin-bottom: 11px;border-radius: 8px; padding-left: 4px' name='department'>"	;
								while($deptrow=mysqli_fetch_assoc($deptresult)){
									echo "<option value='".$deptrow['departmentId']."'>".$deptrow['deptName']."</option>";
								}
							echo "</select><br>";
					        ?> <br> <br> 
					        <input type="text" name="operation" value="add" style="visibility: hidden">
					    	<input type="submit" class="add-row btn btn-success btn-md modbtn" value="Add User"> <br> <br> 

					    </form>
				      </div>
			  		</div>
			  	</div>
  			</div>

  			<div id="delete" class="modal fade">
			  	<div class="modal-dialog">
			   		<div class="modal-content">
			     		<form action="usercon.php" method="get" class="bookingInput">
				     	<div class="modal-body">
				        <h2 class="deleteUser">Are you sure you want to delete the user/s?</h2>
				        	<input type="text" id="deleteuser" name="deleteus" style="visibility: hidden">
				      	</div>
				      	<div class="modal-footer">
				      		<input type="submit" class="btn btn-default" value="Delete User">
				       		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				     	</div>
			      		</form>
			    	</div>
			 	</div>
			</div>

			<div id="adddept" class="modal fade">
			  	<div class="modal-dialog">
				    <div class="modal-content">
				      	<div class="modal-header">
				       		<button type="button" class="close" data-dismiss="modal">&times;</button>
				       		<div class="h3">
				       			<h3>Add Department</h3>
				       		</div>
				      	</div>
				      	<center> <br> 
				     	<div class="modal-body">
				      		<form action="deptcon.php" method="post" class="bookingInput">
					       		<input class="booking" type="text" name="deptname" placeholder="Department Name" required><br>
					       		<?php
					        		$buildquery="SELECT buildingId, buildingName FROM building";
									$buildresult= $conn->query($buildquery);
								echo "<select style='width:75%;height:50px;margin-top:2px; margin-bottom: 11px;border-radius: 8px; padding-left: 4px' name='building'>"	;
									while($deptrow=mysqli_fetch_assoc($buildresult)){
										echo "<option value='".$deptrow['buildingId']."'>".$deptrow['buildingName']."</option>";
									}
								echo "</select><br>";
					       		?>
					       		<input class="booking"  type="number" name="floor" placeholder="Floor" maxlength="2" required> <br> 
					       		<input class="booking"  type="number" name="roomno" placeholder="Room No" maxlength="3" required> <br> <br> <br> 
					    		<input type="submit" class="add-row btn btn-success btn-md modbtn" value="Add Department"> <br> <br> 
					    	</form>
				      	</div>
			  		</div>
			  	</div>
  			</div>

  			<div id="deletedept" class="modal fade">
			  	<div class="modal-dialog">
			   		<div class="modal-content">
			     		<form action="deptcon.php" method="get" class="bookingInput">
				      		<div class="modal-body">
				      		 <h2 class="deletedept">Are you sure you want to delete the department/s?</h2>
				        		<input type="text" id="deletedepartment" name="deletedept" style="visibility: hidden">
				     	</div>
				    	<div class="modal-footer">
				      		<input type="submit" class="btn btn-default" value="Delete Department">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Close </button>
				      	</div>
			      		</form>
			    	</div>
			  	</div>
			</div>

			<div id="addguard" class="modal fade">
			  	<div class="modal-dialog">
				    <div class="modal-content">
				      	<div class="modal-header">
				       		<button type="button" class="close" data-dismiss="modal">&times;</button>
				       		<div class="h3">
				       			<h3>Add Guard</h3>
				       		</div>
				      	</div>
				      	<center> <br> 
				     	<div class="modal-body">
				      		<form action="guardcon.php" method="post" class="bookingInput">
					       		<input class="booking"  type="text" name="fname" placeholder="First Name" required> <br> 
					       		<input class="booking"  type="text" name="lname" placeholder="Last Name" required> <br>
					       		<input class="booking" type="text" name="password" placeholder="Password" required><br>
					       		<input class="booking"  type="address" name="address" placeholder="Address" required> <br>  
					       		<input class="booking"  type="number" min="18" max="99" name="age" placeholder="Age" required> <br> <br> <br>
					       		<input type="text" name="operation" value="new" style="visibility: hidden"> 
					    		<input type="submit" class="add-row btn btn-success btn-md modbtn" value="Add User"> <br> <br>
					    	</form>
				      	</div>
			  		</div>
			  	</div>
  			</div>

			<div id="delguardmodal" class="modal fade">
			  	<div class="modal-dialog">
			   		<div class="modal-content">
			     		<form action="guardcon.php" method="get" class="bookingInput">
				      		<div class="modal-body">
				      		 <h2 class="deletedept">Are you sure you want to delete the selected guard/s?</h2>
				        		<input type="text" id="deleteguard" name="deleteguard" style="visibility: hidden">
				        		<input type="text" name="operation" value="delete" style="visibility: hidden">
				     	</div>
				    	<div class="modal-footer">
				      		<input type="submit" class="btn btn-default" value="Delete Guard">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      	</div>
			      		</form>
			    	</div>
			  	</div>
			</div>
		</body>
</html>