<?php include '../includes/dbconnect.php'; ?>
<?php
	$date = date("Y-m-d");
	$deposit_sql = "UPDATE reports SET depo_date='".$date."' WHERE depo_date IS NULL OR depo_date = '' ;";
	
	if ($conn->query($deposit_sql) === TRUE) {
		header('Location: ../index.php?depositblock=created');
	}
	
	else { 
		header('Location: ../index.php?depositblock=error');
	}
?>