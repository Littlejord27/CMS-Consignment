<?php include '../includes/dbconnect.php'; ?>
<?php
	
	$date = date("Y-m-d");
	$clothing = $_POST['clothing'];
	$taxable = $_POST['taxable'];
	$sales = $_POST['sales'];
	$totals = $_POST['totals'];
	
	$deposit_sql = "INSERT INTO reports VALUES ('".$date."', ".$clothing.", ".$taxable.", ".$sales.", ".$totals.", '');";
	
	if ($conn->query($deposit_sql) === TRUE) {
		header('Location: ../index.php?deposit=created');
	}
	
	else { 
		header('Location: ../index.php?deposit=error');
	}
?>