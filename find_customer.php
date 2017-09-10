<?php include 'includes/dbconnect.php'; ?>
<html>
	<head>
		<title>Find Customer</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="css/find_customer.css">
		
		<script>
			
			$( document ).ready(function() {
				$(".hide-me").hide();
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
		<div class="col-sm-11 col-md-11 cont">
			<h1> Find Customer </h1>
			<form action="?" method="GET" class="form-signin">
				<label for="phone"  class="sr-only"> Phone: </label>
				<input type="numbers" name="phone" id="phone" class="form-control clearThis" placeholder="(xxx) xxx - xxxx" /><br/>
				
				<label for="name"  class="sr-only"> Name: </label>
				<input type="text" name="name" id="name" class="form-control clearThis" placeholder="Customer Name" /><br/>
				<input type='submit' value='Find'>
				<button onclick="return clearInputs()">Clear</button>
			</form>
			
			<div id="table-div" class="row <?php if(empty($_GET["phone"]) and empty($_GET["name"])){ echo 'hide-me'; } ?>">
				<div class="col-md-12 table-responsive">
				  <table class="table">
					<thead>
					  <tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th />
					  </tr>
					</thead>
					<tbody>
					  <?php
						$phoneBool = !empty($_GET["phone"]);
						$nameBool = !empty($_GET["name"]);
						
						if($phoneBool and $nameBool){
							$sql = "SELECT * FROM customers WHERE name LIKE '%".$_GET["name"]."%' AND phone=".$_GET["phone"];
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);
							do{
								echo "<tr>";
								echo "<td><input type='text' class='clearThis' name='shown_id' value='".$row["customer_id"]."' READONLY></td>";
								echo "<td><input type='text' class='clearThis' name='name' value='".$row["name"]."' READONLY ></td>";
								echo "<td><input type='text' class='clearThis' name='email' value='".$row["email"]."' READONLY></td>";
								echo "<td><input type='text' class='clearThis' name='shown_phone' value='".$row["phone"]."' READONLY></td>";
								echo "<td><a href='view_customer.php?vc_id=".$row["customer_id"]."' > View </a></td>";
								echo "</tr>";
							} while ($row = mysqli_fetch_assoc($result));
						}
						
						else if($phoneBool){
							$sql = "SELECT * FROM customers WHERE phone=".$_GET["phone"];
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);
							do{
								echo "<tr>";
								echo "<td><input type='text' class='clearThis' name='shown_id' value='".$row["customer_id"]."' READONLY></td>";
								echo "<td><input type='text' class='clearThis' name='name' value='".$row["name"]."' READONLY ></td>";
								echo "<td><input type='text' class='clearThis' name='email' value='".$row["email"]."' READONLY></td>";
								echo "<td><input type='text' class='clearThis' name='shown_phone' value='".$row["phone"]."' READONLY></td>";
								echo "<td><a href='view_customer.php?vc_id=".$row["customer_id"]."' > View </a></td>";
								echo "</tr>";
							} while ($row = mysqli_fetch_assoc($result));
						}
						
						else if($nameBool){
							$sql = "SELECT * FROM customers WHERE name LIKE '%".$_GET["name"]."%'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);
							do{
								echo "<tr>";
								echo "<td><input type='text' class='clearThis' name='shown_id' value='".$row["customer_id"]."' READONLY></td>";
								echo "<td><input type='text' class='clearThis' name='name' value='".$row["name"]."' READONLY ></td>";
								echo "<td><input type='text' class='clearThis' name='email' value='".$row["email"]."' READONLY></td>";
								echo "<td><input type='text' class='clearThis' name='shown_phone' value='".$row["phone"]."' READONLY></td>";
								echo "<td><a href='view_customer.php?vc_id=".$row["customer_id"]."' > View </a></td>";
								echo "</tr>";
							} while ($row = mysqli_fetch_assoc($result));
						}
					  ?>
					</tbody>
				  </table>
				</div>
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