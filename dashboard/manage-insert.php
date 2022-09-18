<!-- manage-insert.php -->
<?php
session_start();
include_once 'dbCon.php';
$con = connect();
    
    //add table
    if (isset($_POST['addtable'])){
        $tablename = $_POST['tablename'];
        $res_id = $_SESSION['id'];

    	$iquery="INSERT INTO `restaurant_tables`( `res_id`, `table_name`) 
            VALUES ('$res_id','$tablename');";
    	if ($con->query($iquery) === TRUE) {
    		echo '<script>alert("New table added successfully")</script>';
    		echo '<script>window.location="table-add.php"</script>';
    	}else {
            echo "Error: " . $iquery . "<br>" . $con->error;
        }
    }

?>