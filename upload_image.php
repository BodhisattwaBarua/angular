<?php

if(isset($_REQUEST['folder'])){//if file is selected

  try{
        $ts = date('YmdHis');
        $ms =  microtime(true);
        $alpha_array = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        $alpha_index = mt_rand(0,25);
        $alpha = $alpha_array[$alpha_index];
        $path = $_FILES['file']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $fn = urlencode(pathinfo($path, PATHINFO_FILENAME));
        $new_file_name = $alpha . $ms . "." .$ext;

        move_uploaded_file($_FILES["file"]["tmp_name"],
      "images/" . $new_file_name);
        echo $new_file_name;  
        
    }catch(PDOException $e){
        echo "ERROR: Failed to upload file! " . $e->getMessage();
    }
    
      
    
}else{
	echo 'error';
}


?>
