<?php
	
	require_once('mysqlconnect.php');

     echo "reached page";
	function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }

  if(!isset($_POST['submit']))
  {
	$title = $_POST['title'];

	$tag1 = $_POST['tag1'];
	$tag2 = $_POST['tag2'];
	$tag3 = $_POST['tag2'];

	$credit = $_POST['credit'];
	
	$gif=0;//0->not gif   1->gif
	$mv = 1; //1->meme 2->video

	if (!empty($_FILES["meme"]["name"]) && !empty($title)) {

		echo "entered if";
		$file_name=$_FILES["meme"]["name"];
		$temp_name=$_FILES["meme"]["tmp_name"];
		$imgtype=$_FILES["meme"]["type"];
		$ext= GetImageExtension($imgtype);
		if(!strcmp($ext,".gif")){
			$gif=1;
		}
		$imagename=date("d-m-Y")."-".time().$ext;
		$target_path = "images/".$imagename;
		
		if(!empty($_POST['nsfw']))
			$nsfw = 1;
		else
			$nsfw = 0;

		if(move_uploaded_file($temp_name, $target_path)) {

			//$query_upload = "INSERT INTO `images_tbl`(`images_path`, `submission_date`) VALUES ('".$target_path."','".date("Y-m-d")."' )";
		 	//$query_upload="INSERT INTO 'images_tbl' ('images_path','submission_date') VALUES ('".$target_path."','".date("Y-m-d")."')";

			$query_upload = " INSERT INTO 'articles' ('mv' , 'url' , 'title' , 'nsfw' , 'gif' , 'tag1' , 'tag2' , 'tag3' , 'credit' , 'date') VALUES
			('".$mv."' , '".$target_path."' , '".$title."' , '".$nsfw."' , '".$gif."' , '".$tag1."' , '".$tag2."' , '".$tag3."' , '".$credit."' , 
			'".date(d-m-Y)."')" ; 
			

			echo "Successful";
			mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  
			
		}

		else{
   			exit("Error While uploading image on the server");
		} 
}

}
 
?>