<?php include '../includes/dbconnect.php'; ?>
<?php

	$customer_name = $_POST["name"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	
	$add = $_POST["address"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zip = $_POST["zip"];
	
	$license = $_POST["license"];
	
	$notes = $_POST["note"];
	
	
	$sql = "INSERT INTO customers VALUES (default, '".$customer_name."', '".$email."', ".$phone.", default, '".$notes."', '".$add."', '".$city."', '".$state."', '".$zip."', '".$license."');";
	if ($conn->query($sql) === TRUE) {
		header('Location: ../view_customer.php?vc_id='.$conn->insert_id);
	} else {
		header('Location: ../new_customer.php?phone=taken');
	}
?>