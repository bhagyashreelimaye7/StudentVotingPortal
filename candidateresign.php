<?php
	include("newHeader.php");
	require("security.php");
	//session_start();
	$name= $_SESSION['name'];
	$rollno=$_SESSION['rollno'];
	$link= @mysql_connect(localhost,bhagyashree,Password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
	}
	if(!mysql_select_db("School_Election",$link))
	{
		die('Could not connect'.mysql_error());
	}
	
	$query="update student set level = 0 where prn='$rollno'";
	//$query= "update student set level = 0 where prn=1001";
	$_SESSION['level']=0;
	if(!mysql_query($query)){
			die(mysql_error());
		}
	$result=mysql_query($query);
	//echo $result;
	if($result)
	{
			$query1="delete from candidate where prn='$rollno'";
			$result1=mysql_query($query1);
			if($result1)
			{
					header('Location:home.php');
			}
	}
?>
