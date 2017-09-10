<?php include '../includes/dbconnect.php'; ?>
<?php
	$myfile = fopen("../Exports/customers".date("m.d.Y").".csv", "w+") or die("Unable to open file!");
	
	$sql = "SELECT * FROM customers";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
	while ($row = mysqli_fetch_assoc($result)){
		$txt = $row["email"]."\n";
		fwrite($myfile, $txt);
	}
	
	fclose($myfile);
	
	header('Location: ../index.php');
?>