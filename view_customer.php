<?php include 'includes/dbconnect.php'; ?>
<html>
	<head>
		<title>View Customer</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="css/view_customer.css">
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
			</div>
			<div class="col-sm-9 col-md-10 cont">
				<?php
					$sql = "SELECT * FROM customers WHERE customer_id=".$_GET["vc_id"]." LIMIT 1;";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_assoc($result)){
						$name = $row["name"];
						$phone = $row["phone"];
						$email = $row["email"];
						$balance = $row["balance"];
						$add = $row["address"];
						$city = $row["city"];
						$state = $row["state"];
						$zip = $row["zip"];
						echo "<h1>".$name."</h1> <p>$".$balance."</p>";
						echo "<h4> Phone: <input type='text' name='phone' value='".$phone."' READONLY> </h4>";
						echo "<h4> Email: <input type='text' name='email' value='".$email."' READONLY> </h4>";
						echo "<h4>".$add.", ".$city." ".$state." ".$zip."<h4>";
					}
				?>
			  <table class="table">
				<thead>
				  <tr>
					<th>#</th>
					<th>Date</th>
					<th>Type</th>
					<th>Amount</th>
				  </tr>
				</thead>
				<tbody>
						<?php
							$sql = "SELECT * FROM orders WHERE customer_id=".$_GET["vc_id"].";";
							$result = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_assoc($result)){
								$id = $row["order_id"];
								$date = $row["date"];
								$type = $row["type"];
								$amount = $row["amount"];
								echo "<tr>";
								echo "<td><input type='text' class='clearThis' name='shown_id' value='".$id."' READONLY></td>";
								echo "<td><input type='text' class='clearThis' name='date' value='".$date."' READONLY ></td>";
								echo "<td><input type='text' class='clearThis' name='type' value='".$type."' READONLY></td>";
								echo "<td><input type='text' class='clearThis' name='amount' value='".$amount."' READONLY></td>";
								echo "<td><a href='view_order.php?id=".$id."'>View</a></td>";
								echo "</tr>";
							}
						?>
				</tbody>
			  </table>
			</div>
		</div>
	</body>
</html>	