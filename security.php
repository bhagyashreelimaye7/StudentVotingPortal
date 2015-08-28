<?php
	
	//session_start();
	if(!isset($_SESSION['rollno']))
	{
			header("Location:loginhtml.php");
			die();
	}
?>
