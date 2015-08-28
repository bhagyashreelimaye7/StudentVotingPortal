<?php
	include("newHeader.php");
	require("security.php");
	//session_start();
	$rollno=$_SESSION['rollno'];
	$name= $_SESSION['name'];
	$level = $_SESSION['level']; 
	$quote = $_POST['quote'];
	$image=$_POST['fileToUpload'];
	
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
	
	if($level==0)
	{
		
		//$query="update student set quote='$quote',isCandidate = 1 where name='$name'";
		$query="insert into candidate values(\"$rollno\",\"$quote\",\"\",\"\")";
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
		$query="update candidate set quote='$quote' where prn='$rollno'";
		$result=mysql_query($query);
		if($result)
		{
			echo"records updated";
		}
	}	
?>
