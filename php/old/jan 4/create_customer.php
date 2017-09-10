<?php include '../includes/dbconnect.php'; ?>
<?php

	$customer_name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$notes = $_POST["note"];
	$balance = $_POST["balance"];
	
	$sql = "INSERT INTO customers VALUES (default, '".$customer_name."', '".$email."', ".$phone.", ".$balance.", '".$notes."');";
	if ($conn->query($sql) === TRUE) {
		echo "Customer created successfully";
	} else {
		echo "Error creating customer: " . $conn->error;
	}
	header('Location: ../index.php');
?>