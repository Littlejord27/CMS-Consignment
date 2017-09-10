<?php 
//include '../includes/dbconnect.php'; 
?>

<?php
	for ($x = 1; $x < 10; $x++) {
		$sql = "INSERT INTO customers VALUES (default,'user".$x."', 'user".$x."@email.com', '717555002".$x."' , 0, '', '123 Fake Street', 'York', 'PA', 17402, 102343);";
		$conn->query($sql);
	}
	
	for ($y = 1; $y < 1000; $y++) {
		$cust_id =  rand(1, 25);
		if(rand(1,2) % 2 == 0){
			$type = 'credit';
		}
		else { $type = 'cash'; }
		$amount = rand(8,93);
		$sql = "INSERT INTO orders VALUES (default, '".$cust_id."', default, '".$type."', '".$amount."');";
		$conn->query($sql);
		echo $conn->error;	
	}
?>