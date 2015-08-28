<?php
	include("newHeader.php");
	require("security.php");
	//session_start();
	$rollno=$_SESSION['rollno'];
	$name= $_SESSION['name'];
	$level = $_SESSION['level']; 
	$quote = $_POST['quote'];
	//$image=$_POST['fileToUpload'];
	
	//establishing connection
	$link= @mysql_connect(localhost,bhagyashree,Password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
	}
	if(!mysql_select_db("School_Election",$link))
	{
		die('Could not connect'.mysql_error());
	}
	function uploadImage($rollno)
	{
		$target_dir = "uploads/";
		$target_file = $target_dir . $rollno.".jpg";

		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		/* Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}*/
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
	if($level==0)
	{
		uploadImage($rollno);
		//$query="update student set quote='$quote',isCandidate = 1 where name='$name'";
		$image='<img src="uploads/'.$rollno.'.jpg">';
		$query="insert into candidate values('$rollno','$quote','$image','')";
		//echo $query;
		$result=mysql_query($query);
		if($result)
		{
			echo"records are inserted <br>";
			$query1="update student set level = 1 where firstname='$name'";
			$result1=mysql_query($query1);
			if($result)
			{
				$_SESSION['level']=1;
				echo"records are updated <br>";
			//echo"<a href = 'home.php'>Check your name in the Candidates list</a>";
			}
			else
			{
				echo"error in level updation";
			}
		}
		else
		{
			echo mysql_error();
		}
	}
	else if($level==1)
	{
		uploadImage($rollno);
		$image='<img src="uploads/'.$rollno.'.jpg">';
		$query="update candidate set quote='$quote',image='$image' where prn='$rollno'";
		$result=mysql_query($query);
		if($result)
		{
			echo"records updated";
		}
	}	
?>
