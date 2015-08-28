<?php
	include("newHeader.php");
	//session_start();
	$rollno=$_SESSION['rollno'];
	//echo $rollno;
	
		$link= @mysql_connect(localhost,bhagyashree,Password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
	}
	if(!mysql_select_db("School_Election",$link))
	{
		die('Could not connect'.mysql_error());
	}
		$query = "select firstname from student where prn=".$rollno;
		$result=mysql_query($query);
		$row = mysql_fetch_row($result);
		
		echo "<b>Welcome &nbsp".$row[0]."</b>";
	
?>
