<?php include '../includes/dbconnect.php'; ?>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/functions.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script>
	function find() {
		var number = document.getElementById("phone").value;
		customer = new Array();
		if (number.length != 10) { 
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						customer = JSON.parse(xmlhttp.responseText);
						$("#cust_id").text(customer['customer_id']);
						$("#cust_name").text(customer['name']);
						$("#cust_phone").text(customer['phone']);
						$("#balance").val(customer['balance']);
						$("#note").text(customer['note']);
					}
				}
			};
		xmlhttp.open("GET", "findId.php?phone="+number, true);
		xmlhttp.send();
	}
	
	function sendBack(){
		var id = $("#cust_id").text();
		var name = $("#cust_name").text();
		var phone = $("#cust_phone").text();
		var balance = $("#balance").val();
		window.opener.returning(id, name, phone, balance);
		window.close();
	}
</script>
</head>
<body>
	<input type="text" class="clearThis" placeholder="(xxx) xxx - xxxx" name="phone" id="phone" />
	<input type="hidden" id="balance"/>
	<button onclick="find()">Find</button>
	<button onclick="return clearInputs()">Clear</button>
	
	
	<div class="row">
		<div class="col-sm-4">
		  <table class="table">
			<thead>
			  <tr>
				<th>Id</th>
				<th>Name</th>
				<th>Phone Number</th>
				<th />
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<td id="cust_id"></td>
				<td id="cust_name"></td>
				<td id="cust_phone"></td>
				<td id="sendButton">
					<button onclick="sendBack()">Select</button>
				</td>
			  </tr>
			</tbody>
		  </table>
		</div>
	</div>
	<p id="note"> </p>
</body>