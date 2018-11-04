<!DOCTYPE html>
<html> 
	<head>
		<link rel="stylesheet" href="css/maxcdn.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/uscbooking.css">
	    <script src="js/ajax.googleapis.jquery.min.js"></script>
	    <script src="js/maxcdn.bootstrap.min.js"></script>
	    <style>
	    	.loginlabel{
	    		float:left;
	    		margin-top: -25px;
	    		margin-left: 98px;
	    		font-color: pink;
	    	}
    		.login-checkbox{
    			float:left;
	    		margin-top: -18px;
	    		margin-left: 95px;
    		}
	   	</style>
	</head>
		<body>
			<center> <br> <br> <br> <br>	  
			<div class = "bookingFOrm" style="background-color:#FFFFFF;padding-top:20px;color:grey;border-radius:5px;margin-bottom: 20px;margin-top:15px;width: 50%"; >
				<h3 style="font-family: Century; margin-bottom:20px; margin-top: 5px"> <img src="images/uscusc.png" alt="USC LOGO"> <br> </h3> <br> <br> <br> 
				<form action="logincon.php" method="post">
					<div id="button">
						<label class="loginlabel"> Employee ID  </label> 
					</div> 
					<input class="booking" type="number" name="id" placeholder="Employee ID:" required>
					<div id="button"> <br> <br>		
						<label class="loginlabel"> Password </label> 
					</div> 
					<input class="booking" type="password" name="pword" placeholder="Password:" required> <br> <br> 
					<div class="login-checkbox">
						<label>
			            <input type="checkbox" alignment="left" name="remember"> &nbsp; Remember Me </label>
			        </div> <br> <br> <br>	
	   				<input type="submit" class="btn btn-success btn-lg width="80" height="80" btn-" value="LOG IN">
				</form> <br> <br> 
			</center>
			<div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 100%; width: 100%; z-index: -999999; position: fixed;">
				<img src="images/backbackground.jpg" style="position: absolute; margin: 0px; padding: 0px; border: none; width: 100%; height: 100%; max-height: none; max-width: none; z-index: -999999; left: 0px;"> 
			</div>	
		</body>

	<script type="text/javascript">
		$( document ).ready(function() {
			$("#sampleajax").click(function(){
				var empid = $("#employeeid").val();
				var emppass = $("#employeepass").val();
					if(empid !== '' && emppass !== ''){
						$.ajax({
							url: "ajaxsampler.php",
							data: { id : empid , pword : emppass },
							method: "POST",
							success: function(data){
								alert(JSON.stringify(data));
							},
							error: function(data){
								alert(JSON.stringify(data));
							}
					});
				}

			});
		});
</script>

</html>