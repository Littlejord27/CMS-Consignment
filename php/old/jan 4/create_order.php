<?php include '../includes/dbconnect.php'; ?>
<?php
	$id = $_POST['id'];
	$amount = $_POST["amount"];
	$balance = $_POST["balance"];
	$type = $_POST['type'];
	if($type == "credit"){
		$balance += $amount;
	}
	
	$order_sql = "INSERT INTO orders VALUES (default, ".$id.", default, '".$type."', ".$amount.");";
	$update_balance_sql = "UPDATE customers SET balance=".$balance." WHERE customer_id=".$id;
	
	if ($conn->query($order_sql) === TRUE) {
		if ($conn->query($update_balance_sql) === TRUE) {
			header('Location: ../view_order.php?id='.$conn->insert_id);
		} else {
			header('Location: ../view_customer.php?id='.$id);
		}
	} else {
		header('Location: ../new_order.php?error=new');
	}
?>