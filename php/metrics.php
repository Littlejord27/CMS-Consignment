<?php include '../includes/dbconnect.php'; ?>
<?php
	$start = $_REQUEST['s'];
	$end = $_REQUEST['e'];
	
	$sql1 = "SELECT SUM(amount) AS ca_amt, COUNT(*) AS ca_sales FROM orders WHERE type='cash' AND date >= '".$start."' AND date <= '".$end."' ;";
	$result1 = $conn->query($sql1);
	$row1 = $result1->fetch_row();
	
	//$row1[0] is cash amount
	//$row1[1] is cash sales
	
	
	$sql2 = "SELECT SUM(amount) AS cr_amt, COUNT(*) AS cr_sales FROM orders WHERE type='credit' AND date >= '".$start."' AND date <= '".$end."' ;";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_row();
	
	//$row2[0] is cash amount
	//$row2[1] is cash sales
	
	
	$sql3 = "SELECT SUM(amount), COUNT(*) AS ca_sales FROM orders WHERE date >= '".$start."' AND date <= '".$end."' ;";
	$result3 = $conn->query($sql3);
	$row3 = $result3->fetch_row();
	
	//$row3[0] is cash amount
	//$row3[1] is cash sales
	
	$array = array(
		"ca_amt" => $row1[0] ,
		"ca_sales" => $row1[1] ,
		"cr_amt" => $row2[0] ,
		"cr_sales" => $row2[1] ,
		"t_amt" => $row3[0] ,
		"t_sales" => $row3[1]
	);
	
	echo json_encode($array);
?>