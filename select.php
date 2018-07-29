<?php
include "db.php";

	$query = "select * from tbl_sample ORDER BY id desc";
	$stmt = $con->prepare($query);
	if($stmt->execute()){
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$data[]= $row;
		}
		echo json_encode($data);
		/*var_dump($data);
		return;*/
	}
?>