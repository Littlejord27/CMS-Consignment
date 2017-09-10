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
		
		<script>
			$(document).on('click','.find-metrics', function() {
				var strt_dt = $("#strt_dt").val();
				var end_dt = $("#end_dt").val();
				
				if(validate_dates(strt_dt, end_dt)){
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							
							metrics = JSON.parse(xmlhttp.responseText);
							$("#ca_sales").text(metrics['ca_sales']);
							if(!metrics['ca_amt']){
								$("#ca_amt").text("$0"); 
							} else {$("#ca_amt").text("$" + metrics['ca_amt']); }
							$("#cr_sales").text(metrics['cr_sales']);
							if(!metrics['cr_amt']){
								$("#cr_amt").text("$0"); 
							} else {$("#cr_amt").text("$" + metrics['cr_amt']); }
							$("#t_sales").text(metrics['t_sales']);
							if(!metrics['t_amt']){
								$("#t_amt").text("$0"); 
							} else {$("#t_amt").text("$" + metrics['t_amt']); }
						}
					};
					xmlhttp.open("GET", "php/metrics.php?s=" + strt_dt + "&e= " + end_dt, true);
					xmlhttp.send();
				}
			});
			
			function validate_dates(date1, date2){
				if(date1 == '' || date2 == ''){
					return false;
				} else { $("#info_table").show(); return true; }
				
			}
			
			$(document).ready(function(){
				$("#info_table").hide();
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
			<div class="cont">
				<h2>Metrics</h2>
				<br />
				Start Date: <input type='date' name="strt_dt" id="strt_dt">
				<br /> <br />
				End Date: <input type='date' name="end_dt" id="end_dt">
				<br /> <br />
				<button class="find-metrics">Submit</button>
			</div>
			<div class="cont" id="info_table">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Cash Payouts (# of cash payouts)</th>
							<th>Cash for Clothes Payout (Cash)</th>
							<th>Store Credit Payouts (# of credit payouts)</th>
							<th>Cash for Clothes Payout (Store Credit)</th>
							<th>Total Payouts</th>
							<th>Cash for Clothes Total Payout</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th id="ca_sales"></th>
							<th id="ca_amt"></th>
							<th id="cr_sales"></th>
							<th id="cr_amt"></th>
							<th id="t_sales"></th>
							<th id="t_amt"></th>
						</tr>
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