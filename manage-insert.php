<!-- manage-insert.php -->
<?php
session_start();
include_once 'dbCon.php';
$con = connect();
if (isset($_POST['regascus'])) {
	$name = $_POST['name'];
	$email = $_POST['uname'];
	$phone = $_POST['phone'];
	$password = $_POST['psw'];
	$role = 2;



	// existing email chaeck
	$checkSQL = "SELECT * FROM `restaurant_info` WHERE uname = '$email';";
	$checkresult = $con->query($checkSQL);
	if ($checkresult->num_rows > 0) {
		echo '<script>alert("Email Is Exists.")</script>';
		echo '<script>window.location="register.php"</script>';
	} else {


		$iquery = "INSERT INTO `restaurant_info`(`name`, `uname`, `phone`, `psw`, `role`) 
			        		VALUES ('$name','$email','$phone','$password','$role');";
		if ($con->query($iquery) === TRUE) {
			echo '<script>alert("Registred successfully")</script>';
			echo '<script>window.location="register.php"</script>';
		} else {
			echo "Error: " . $iquery . "<br>" . $con->error;
		}
	}
}





//register as restaurant
if (isset($_POST['regasres'])) {
	$name = $_POST['name'];
	$email = $_POST['uname'];
	$phone = $_POST['phone'];
	// $bkashnumber = $_POST['bkashnumber'];
	$address = $_POST['address'];
	$password = $_POST['psw'];
	$role = 1;



	$checkSQL = "SELECT * FROM `restaurant_info` WHERE uname = '$email';";
	$checkresult = $con->query($checkSQL);
	if ($checkresult->num_rows > 0) {
		echo '<script>alert("Restaurant With This Email Is Already Exit.")</script>';
		echo '<script>window.location="register.php"</script>';
	} else {

		if (isset($_FILES['logo'])) {
			// files handle
			$targetDirectory = "images/";
			// get the file name
			$file_name = $_FILES['logo']['name'];
			// get the mime type
			$file_mime_type = $_FILES['logo']['type'];
			// get the file size
			$file_size = $_FILES['logo']['size'];
			// get the file in temporary
			$file_tmp = $_FILES['logo']['tmp_name'];
			// get the file extension, pathinfo($variable_name,FLAG)
			$extension = pathinfo($file_name, PATHINFO_EXTENSION);

			if ($extension == "jpg" || $extension == "png" || $extension == "jpeg") {
				move_uploaded_file($file_tmp, $targetDirectory . $file_name);
				$iquery = "INSERT INTO `restaurant_info`(`name`, `uname`, `phone`, `address`, `logo`, `psw`, `role`) 
			        		VALUES ('$name','$email','$phone', '$address','$file_name','$password','$role');";
				if ($con->query($iquery) === TRUE) {


					echo '<script>alert("Restaurant added successfully")</script>';
					echo '<script>window.location="login.php"</script>';

					// $id = $con->insert_id;



					//     		include 'dashboard/mailSender.php'; 
					// $mail->Body = '<html><body>
					//                Verify your account.. click the link below.
					//                http://localhost/tablereservation/verifyaccount.php?email='.$email.'&id='.$id.'&auth='.$password.'
					//               </body></html>'; 
					//           $mail->addAddress($email, "Booking Approve");
					//           if($mail->send()) {
					//           	 echo '<script>alert("Restaurant added successfully")</script>';
					//     				echo '<script>window.location="verifyaccount.php?view=verifyaccount&email='.$email.'&id='.$id.'&auth='.$password.'"</script>';
					//         //   	echo '<script>alert("Restaurant added successfully")</script>';
					//     				// echo '<script>window.location="login.php"</script>';
					//           }else{
					//             	echo '<script>alert("Restaurant added successfully")</script>';
					//     				echo '<script>window.location="login.php"</script>';
					//           } 





				} else {
					echo "Error: " . $iquery . "<br>" . $con->error;
				}
			} else {
				echo '<script>alert("Required JPG,PNG,GIF in Logo Field.")</script>';
				echo '<script>window.location="register.php"</script>';
			}
		} else {
			$file_name = "";

			$iquery = "INSERT INTO `restaurant_info`( `name`, `uname`, `phone`, `address`, `logo`, `psw`, `role`) 
		        		VALUES ('$name','$email','$phone', '$address', '$file_name','$password','$role');";
			if ($con->query($iquery) === TRUE) {
				echo '<script>alert("New faculty added successfully")</script>';
				echo '<script>window.location="login.php"</script>';
			} else {
				echo "Error: " . $iquery . "<br>" . $con->error;
			}
		}
	}
}












if (isset($_POST['book'])) {

	$bdinsert = false;
	$res_id = $_POST['res_id'];
	$reservation_name = $_POST['reservation_name'];
	$reservation_phone = $_POST['reservation_phone'];
	$reservation_date = $_POST['reservation_date'];
	$reservation_time = $_POST['reservation_time'];

	date_default_timezone_set("Asia/Kolkata");
	$booking_time = date("h:i:sa");
	$booking_date = date("Y-m-d");
	$booking_id = uniqid();

	$tbl_id = $_POST['table'];
	$tbl_id = implode(" ", $tbl_id);


	$iquery = "INSERT INTO `booking_details`(`booking_id`,`res_id`,`booked_date`, `booked_time`, `name`, `phone`, `booking_date`, `booking_time`, `table_id`) 
		    VALUES ('$booking_id','$res_id','$reservation_date','$reservation_time','$reservation_name','$reservation_phone','$booking_date','$booking_time', '$tbl_id');";
			
	if ($con->query($iquery) === TRUE) {
		$bdinsert = true;
	} else {
		echo "Error: " . $iquery . "<br>" . $con->error;
	}





	if ($bdinsert == true) {
		echo '<script>alert("Your booking is done. You will get an email soon.")</script>';
		echo '<script>window.location="index.php"</script>';
	} else {
		echo "Error: " . $iquery . "<br>" . $con->error;
	}
}
?>