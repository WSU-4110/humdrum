<?php

// Include the database configuration file
include 'db_connect.php';
$statusMsg = '';



// File upload path
$targetDir = "profile_pics/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$user = $_SESSION["user_id"];
$pic_name = $user . '.jpeg';



if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
			
			
			$extension = strtolower($fileType); 
			switch ($extension) {
				case 'jpg':
					imagejpeg($filename, $pic_name);
				break;
				case 'jpeg':
				   
				case 'gif':
				   $image = imagecreatefromgif($filename);
				break;
				case 'png':
				   $image = imagecreatefrompng($filename);
				break;
			}
			
            $insert = $db->query("UPTATE images SET file_name = new-".$pic_name.", uploaded_on = new-NOW() [ WHERE file_name =  ".$pic_name." ]");
			
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }
		else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }
	else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}
else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;

?>