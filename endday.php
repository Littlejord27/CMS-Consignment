<?php include 'includes/dbconnect.php'; ?>
<html>
	<head>
		<title>New Order</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="css/new_order.css">
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
		<div class="cont">
			<h2> End of Day </h2>
			<table class="table table-hover">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Clothing Sales</th>
					<th>Taxable Sales</th>
					<th>Sales Tax</th>
					<th>Totals</th>
				  </tr>
				</thead>
				<tbody>
					<form action="php/create_deposits.php" method="POST" class="form-signin">
						<?php
							$today = new DateTime("".date("Y/m/d"));
							$today_day = date("Y/m/d");
							$sql = "SELECT * FROM reports ORDER BY date DESC LIMIT 1";
							$result = mysqli_query($conn, $sql);
							$row = $result->fetch_array(MYSQLI_ASSOC);
							if (mysqli_num_rows($result) > 0) {
								$last_report_date = new DateTime("".$row["date"]);
								$interval = $last_report_date->diff($today);
								$days = $interval->days;
								
								if($days > 0){
									echo "<tr>";
									echo "<td>".date("Y/m/d")."</td>";
									echo "<td><input type='number' step='any' min='0' name='clothing'></td>";
									echo "<td><input type='number' step='any' min='0' name='taxable'></td>";
									echo "<td><input type='number' step='any' min='0' name='sales'></td>";
									echo "<td><input type='number' step='any' min='0' name='totals'></td>";
									echo "</tr>";
									echo "<input type='submit' >";
								}
								else {
									echo "<div class='alert alert-info'>";
									echo "<strong>You're done for today!</strong> Here's your last report.";
									echo "</div>";								
									echo "<tr>";
									echo "<td>".$row["date"]."</td>";
									echo "<td>".$row["clothing"]."</td>";
									echo "<td>".$row["taxable"]."</td>";
									echo "<td>".$row["sales"]."</td>";
									echo "<td>".$row["total"]."</td>";
									echo "</tr>";
								}
							} else {
							}
						?>
					</form>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>