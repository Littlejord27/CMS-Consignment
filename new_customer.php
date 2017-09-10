
<html>
	<head>
		<title>New Customer</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="css/new_customer.css">
		
		<script>
			function validate(){
				var flag = 0;
				if($("#name").val() === ""){
					$("#name-error").show();
					flag++;
				}
				if($("#phone").val() === ""){
					$("#phone-error").show();
					flag++;
				}
				if($("#email").val() === ""){
					$("#email-error").show();
					flag++;
				}
				if($("#license").val() === ""){
					$("#license-error").show();
					flag++;
				}
				
				
				if($("#address").val() === ""){
					$("#address-error").show();
					flag++;
				}
				if($("#city").val() === ""){
					$("#city-error").show();
					flag++;
				}
				if($("#state").val() === ""){
					$("#state-error").show();
					flag++;
				}
				if($("#zip").val() === ""){
					$("#zip-error").show();
					flag++;
				}
				
				if(flag > 0){
					return false;
				} else {
					return true;
				}
			}
			
			$(document).ready(function(){
				$(".alert").hide();
			});
		</script>
	</head>

	<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Kids' Klothes | College Closet</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="php/export_cust.php">Export</a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<li><h4>Customers</h4></li>
						<li><a href="new_customer.php">New Customer</a></li>
						<li><a href="find_customer.php">Find Customer</a></li>
					</ul>
					<ul class="nav nav-sidebar">
						<li><h4>Cash for Clothes</h4></li>
						<li><a href="new_order.php">New Orders</a></li>
					</ul>
					<ul class="nav nav-sidebar">
						<li><h4>Metrics</h4></li>
						<li><a href="metrics.php">Cash for Clothes  Metrics</a></li>
					</ul>
					<ul class="nav nav-sidebar">
						<li><h4>Deposits</h4></li>
						<li><a href="endday.php">End of Day</a></li>
						<li><a href="depositblock.php">Create Deposit Block</a></li>
						<li><a href="search_deposits.php">Search Deposit Blocks</a></li>
					</ul>
					<ul class="nav nav-sidebar">
						<li><h4>Communications</h4></li>
						<li><a href="email.php">Email</a></li>
						<li><a href="text.php">SMS Messaging</a></li>
					</ul>
					</div>
				<div class="col-sm-9 col-md-10 cont">
				</div>
			</div>
			<div class="col-sm-9 col-md-10 cont">
			<h1> Create New Customer </h1>	
			<form action="php/create_customer.php" onsubmit="return validate()" method="POST" class="form-signin">
				<br />
				<h3> Contact </h3>
				
				<label for="name" class="sr-only"> Name: </label>
				<input type="text" id="name" name="name" placeholder="Name" class="form-control clearThis"/> 
				
				<div id="name-error" class="alert alert-danger">
				  <strong>Error!</strong> You did not enter a valid name.
				</div><br/>
				
				
				<label for="phone" class="sr-only"> Phone: </label>
				<input type="numbers" id="phone" name="phone" placeholder="(xxx) xxx - xxxx" class="form-control clearThis"/>
				
				<div id="phone-error" class="alert alert-danger">
				  <strong>Error!</strong> You did not enter a valid phone number.
				</div>
				
				<?php
					if (isset($_GET["phone"])){
						if($_GET["phone"] === "taken"){
							echo "<div id='taken-error' class='alert-danger'>";
							echo "<strong>Error!</strong> This number has been used already.";
							echo "</div>";
						}
					}
				?>
				
				<br/>
				
				
				<label for="email" class="sr-only"> Email: </label>
				<input type="text" id="email" name="email" placeholder="Email" class="form-control clearThis"/> 
				
				<div id="email-error" class="alert alert-danger">
				  <strong>Error!</strong> You did not enter a valid email.
				</div><br/>
				
				<label for="license" class="sr-only"> License: </label>
				<input type="text" id="license" name="license" placeholder="Driver's License #" class="form-control clearThis"/> 
				
				<div id="license-error" class="alert alert-danger">
				  <strong>Error!</strong> You did not enter a valid Driver's License.
				</div><br/>
				
				
				<h3> Address </h3>
				
				
				<label for="address" class="sr-only"> Address: </label>
				<input type="text" id="address" name="address" placeholder="Address" class="form-control clearThis"/> 
				
				<div id="address-error" class="alert alert-danger">
				  <strong>Error!</strong> You did not enter a valid address.
				</div><br/>
				
				<label for="city" class="sr-only"> City: </label>
				<input type="text" id="city" name="city" placeholder="City" class="form-control clearThis"/> 
				
				<div id="city-error" class="alert alert-danger">
				  <strong>Error!</strong> You did not enter a valid City.
				</div><br/>
				
				<label for="state" class="sr-only"> City: </label>
				<input type="text" id="state" name="state" placeholder="State" class="form-control clearThis"/>
				
				<div id="state-error" class="alert alert-danger">
				  <strong>Error!</strong> You did not enter a valid State.
				</div> <br/>
				
				<label for="zip" class="sr-only"> Zip: </label>
				<input type="text" id="zip" name="zip" placeholder="Zip-Code" class="form-control clearThis"/> 
				
				<div id="zip-error" class="alert alert-danger">
				  <strong>Error!</strong> You did not enter a valid Zip.
				</div><br/>
				
				
				<h3> Additional </h3>
				
				<label for="note" class="sr-only"> Note: </label>
				<input type="text" id="note" name="note" placeholder="Customer Note" class="form-control clearThis"/>
				
				<div id="note-error" class="alert alert-danger">
				  <strong>Error!</strong> You did not enter a valid note.
				</div><br/>
				
				
				<input type="submit" value="Create"/>
				<button onclick="return clearInputs()">Clear</button>
			</form>
		</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>