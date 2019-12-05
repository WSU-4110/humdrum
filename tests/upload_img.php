<?php

// Include the database configuration file
include 'db_connect.php';
if(isset($_POST['profile_user'])) $profile_user=$_POST['profile_user'];
$statusMsg = '';



// File upload path
$targetDir = "../profile_pics/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$pic_path = $targetDir . $profile_user . '.jpeg';
$pic_name = $profile_user . '.jpeg';



if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database


			$extension = strtolower($fileType);
			switch ($extension) {
                case 'jpeg':
                case 'jpg':
				   $image = imagecreatefromjpeg($targetFilePath);
				break;
                case 'gif':
				   $image = imagecreatefromgif($targetFilePath);
				break;
				case 'png':
                $image = imagecreatefrompng($targetFilePath);
                break;
                case 'bmp':
                $image = imagecreatefrombmp($targetFilePath);
                break;
			}

            $pic_image = imagecreatetruecolor(128, 128);
            imagecopyresampled($pic_image, $image, 0, 0, 0, 0, 128, 128, imagesx($image), imagesy($image));
            unlink($targetFilePath);

            if(imagejpeg($pic_image, $pic_path)) {
                $statusMsg = $pic_name . " uploaded successfully.";
            }
			else
				$statusMsg = "Sorry, there was an error uploading your file.";
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
header("Location: ../profile.php");//redirects back to front page in the case of no registered users
    exit;

?>