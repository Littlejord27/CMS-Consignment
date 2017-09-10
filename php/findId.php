<?php include '../includes/dbconnect.php'; ?>
<?php
	$phone = $_REQUEST['phone'];
	$sql = "SELECT * FROM customers WHERE phone='".$phone."' LIMIT 1;";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	echo json_encode($row);
?>