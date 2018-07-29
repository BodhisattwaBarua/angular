<?php 
	include "db.php";
	$data = json_decode(file_get_contents("php://input"));

$first_name = '';
$last_name = '';
$first_name = $data->firstname;
$last_name = $data->lastname;
$email = $data->email;
$image = $data->image;
$btn_name= $data->btnName;
if ($btn_name == "ADD") {	
	$query = "INSERT INTO tbl_sample
			(first_name, last_name, email, image) VALUES
			(:first_name, :last_name, :email, :image)
			";
			$stmt = $con->prepare($query);
			$stmt->bindParam(':first_name', $first_name);
			$stmt->bindParam(':last_name', $last_name);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':image', $image);
			if($stmt->execute()){
				echo "Data Inserted Successfully";
			}
			else{
				echo "Error";
			}
	}
if ($btn_name == "Update") {
	$id = $data->id;
	
	$query = "update tbl_sample set 
	first_name = '$first_name',
	last_name = '$last_name',
	email = '$email',
	image = '$image'
	where id='$id'
	";
	$stmt = $con->prepare($query);
			$stmt->bindParam(':first_name', $first_name);
			$stmt->bindParam(':last_name', $last_name);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':image', $image);
			$stmt->bindParam(':id', $id);
			if($stmt->execute()){
				echo "Data Updated Successfully";
			}
			else{
				echo "Error";
			}	
}

?>