<?php include '../includes/dbconnect.php'; ?>
<?php
	$fileName = "customers".date("m.d.Y");
	$myfile = fopen("exports/".$fileName.".csv", "w+") or die("Unable to open file!");
	
	$sql = "SELECT * FROM customers";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
	while ($row = mysqli_fetch_assoc($result)){
		$txt = $row["email"]."\n";
		fwrite($myfile, $txt);
	}
	
	fclose($myfile);
	
	
	 header("Content-type: text/csv");
	header("Content-disposition: attachment; filename = ".$fileName.".csv ");
	readfile("/exports/".$fileName.".csv");
	
?>