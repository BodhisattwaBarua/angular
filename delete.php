<?php
	include "db.php";
	$data = json_decode(file_get_contents("php://input"));
	$id = $data->id;
	$query = "delete from tbl_sample where id= '$id' ";
	$stmt = $con->prepare($query);
	$stmt->bindParam(':id', $id);
	if($stmt->execute()){
		echo "Data Deleted Successfully";
		}
		else{
		echo "Error";
		}	


?>