<!-- approve-reject.php -->
<?php
session_start();
include_once 'dbCon.php';
$con = connect();
//reject 
if (isset($_GET['breject_id'])) {
	$id = $_GET['breject_id'];
	$sql = "UPDATE booking_details SET status = 0 WHERE id = '$id';";

	$booking_number = $_GET['booking-number'];
	$sql2 = "SELECT * FROM `booking_details` where booking_id = '$booking_number';";
	$result2 = $con->query($sql2);
	foreach ($result2 as $r2) {
		$tbl_id = $r2['table_id'];
	}

	$tables = explode(" ", $tbl_id);



	foreach ($tables as $table) {
		$table = (int)$table;
		$sql3 = "UPDATE restaurant_tables SET booked = 0 WHERE id = $table;";
		$stmt = $con->query($sql3);
		echo $table;
	}



	if ($con->query($sql) === TRUE && $con->query($sql3)==TRUE) {
		echo '<script>alert("Rejected.")</script>';
		echo '<script>window.location="index.php"</script>';
	} else {
		echo "Error: " . $sql . "<br>" . $con->error;
	}
}

// approve booking request
if (isset($_GET['bapprove_id'])) {
	$id = $_GET['bapprove_id'];

	$sql = "UPDATE booking_details SET status = 1 WHERE id = '$id';";


	$booking_number = $_GET['booking-number'];
	$sql2 = "SELECT * FROM `booking_details` where booking_id = '$booking_number';";
	$result2 = $con->query($sql2);
	foreach ($result2 as $r2) {
		$tbl_id = $r2['table_id'];
	}

	$tables = explode(" ", $tbl_id);


	foreach ($tables as $table) {
		$table = (int)$table;
		$sql3 = "UPDATE restaurant_tables SET booked = 1 WHERE id = $table;";
		$stmt = $con->query($sql3);
		echo $table;
	}





	if ($con->query($sql) === TRUE && $con->query($sql3)==TRUE) {
		echo  '<script>alert("Booking Confirmed.")</script>';
		echo '<script>window.location="index.php"</script>';
	} else {
		echo "Error: " . $sql . "<br>" . $con->error;
	}
}


?>