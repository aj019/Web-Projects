<?php
	
	require_once('mysqlconnect.php');

	function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/gif': return '.gif';
           case 'image/jpg' : return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }

     $user_id = 10;

     if(!empty($_FILES["meme"]["name"]) && !empty($_POST['title'])){

     	$mv = 1;//1 ->meme
     	$title = $_POST['title'];

     	if(isset($_POST['nsfw']))
			$nsfw=1;
		else
			$nsfw=0;


		if(!empty($_POST['tag1']))
			$tag1 = '#' . $_POST['tag1'];
		else
			$tag1 = '';


		if(!empty($_POST['tag2']))
			$tag2 = '#' . $_POST['tag2'];
		else
			$tag2 = '';


		if(!empty($_POST['tag3']))
			$tag3 = '#' . $_POST['tag3'];
		else
			$tag3 = '';


		if(isset($_POST['credit']))
			$credit = $_POST['credit'];
		else
			 $credit = '';




		$file_name=$_FILES["meme"]["name"];
		$temp_name=$_FILES["meme"]["tmp_name"];
		$imgtype=$_FILES["meme"]["type"];
		$ext= GetImageExtension($imgtype);
		
		if(!strcmp($ext,".gif")){
			$gif=1;
			$name = explode(".", $file_name);

			$imagename = date("d-m-Y")."-".time();
			$target_path = "uploads/".$imagename.$name[0].$ext;



			if(move_uploaded_file($temp_name, $target_path)) {

				$query_upload = "INSERT INTO `articles`(user_id,mv, url, title, nsfw, gif, tag1, tag2, tag3, credit, date_creation) 
				VALUES ( '".$user_id."' , '".$mv."' , '".$target_path."' , '".$title."' , '".$nsfw."' , '".$gif."' , '".$tag1."' , '".$tag2."' , '".$tag3."' , '".$credit."' , '".date('Y-m-d H:i:s')."')";			
				

				mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  

				echo "Successful";

			}
			else{
   				exit("Error While uploading image on the server");
			}

		}

		else{
			
			$gif = 0;

			$fileName = $_FILES["meme"]["name"]; // The file name
			$fileTmpLoc = $_FILES["meme"]["tmp_name"]; // File in the PHP tmp folder
			$fileType = $_FILES["meme"]["type"]; // The type of file it is
			$fileSize = $_FILES["meme"]["size"]; // File size in bytes
			$fileErrorMsg = $_FILES["meme"]["error"]; // 0 for false... and 1 for true
			$fileName = preg_replace('#[^a-z.0-9]#i', '', $fileName); // filter
			$kaboom = explode(".", $fileName); // Split file name into an array using the dot
			$fileExt = end($kaboom); // Now target the last array element to get the file extension


			// START PHP Image Upload Error Handling -------------------------------
			if (!$fileTmpLoc) { // if file not chosen
			    echo "ERROR: Please browse for a file before clicking the upload button.";
			    exit();
			} else if($fileSize > 1048576) { // if file size is larger than 1 Megabyte
			    echo "ERROR: Your file was larger than 5 Megabytes in size.";
			    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
			    exit();
			} else if (!preg_match("/.(gif|jpg|png|jpeg)$/i", $fileName) ) {
			     // This condition is only if you wish to allow uploading of specific file types    
			     echo "ERROR: Your image was not .gif, .jpg, or .png.";
			     unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
			     exit();
			} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
			    echo "ERROR: An error occured while processing the file. Try again.";
			    exit();
			}
			// END PHP Image Upload Error Handling ---------------------------------
			// Place it into your "uploads" folder mow using the move_uploaded_file() function

			$moveResult = move_uploaded_file($fileTmpLoc, "uploads/$fileName");
			// Check to make sure the move result is true before continuing
			if ($moveResult != true) {
			    echo "ERROR: File not uploaded. Try again.";
			    exit();
			}
		
			// Include the file that houses all of our custom image functions
			include_once("ak_php_img_lib_1.0.php");
			// ---------- Start Universal Image Resizing Function --------
			$target_file = "uploads/$fileName";
			$resized_file = "uploads/resized_$fileName";
			$wmax = 750;
			$hmax = 750;
			ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
			unlink($target_file);
			// ----------- End Universal Image Resizing Function ----------
			// ---------- Start Convert to JPG Function --------
			if (strtolower($fileExt) != "jpg") {
			    $target_file = "uploads/resized_$fileName";
			    $new_jpg = "uploads/resized_".$kaboom[0].".jpg";
			    ak_img_convert_to_jpg($target_file, $new_jpg, $fileExt);
			    unlink($target_file);
			}


			// ----------- End Convert to JPG Function -----------
			// ---------- Start Image Watermark Function --------
			$target_file = "uploads/resized_".$kaboom[0].".jpg";
			$wtrmrk_file = "memeveme_watermark.png";
			$imagename=date("d-m-y")."-".time();
			$new_file = "uploads/".$imagename.$kaboom[0].".jpg";
			ak_img_watermark($target_file, $wtrmrk_file, $new_file);
			// ----------- End Image Watermark Function -----------
			// Display things to the page so you can see what is happening for testing purposes
			unlink($target_file);
			echo "Successful";

			$query_upload = "INSERT INTO `articles`(user_id,mv, url, title, nsfw, gif, tag1, tag2, tag3, credit, date_creation) 
			VALUES ('$user_id' ,'$mv' ,'$new_file','$title' ,'$nsfw', '$gif' ,'$tag1', '$tag2','$tag3' ,'$credit' , '".date('Y-m-d H:i:s')."')";			
			mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  
			echo "Successful";

			
		}


		/*$imagename=date("d-m-Y")."-".time().$ext;
		$target_path = "images/".$imagename;

		if(move_uploaded_file($temp_name, $target_path)) {

			$query_upload = "INSERT INTO `articles`(`mv`, `url`, `title`, `nsfw`, `gif`, `tag1`, `tag2`, `tag3`, `credit`, `date`) 
			VALUES ('".$mv."' , '".$target_path."' , '".$title."' , '".$nsfw."' , '".$gif."' , '".$tag1."' , '".$tag2."' , '".$tag3."' , '".$credit."' , '".date('Y-m-d')."')";			
			

			mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  

			echo "Successful";

		}

		else{
   			exit("Error While uploading image on the server");
		} 
     */
     }

?>