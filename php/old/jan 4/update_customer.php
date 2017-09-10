<?php include '../includes/dbconnect.php'; ?>
<?php

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$balance = $_POST["balance"];
$note = $_POST["note"];

$update = "UPDATE customers";
$set = " SET name='".$name."' , email='".$email."' , phone=".$phone." , balance=".$balance." , note='".$note."'";
$where = " WHERE customer_id=".$id;
$sql = $update.$set.$where;
$result = mysqli_query($conn, $sql);

header('Location: ../view_customer.php?id='.$id);
?>