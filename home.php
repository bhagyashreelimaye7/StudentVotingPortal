<?php
	include("newHeader.php");
	require("security.php");
	//session_start();
	$link = @mysql_connect(localhost,bhagyashree,Password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
	}
	if(!mysql_select_db("School_Election",$link))
	{
		die('Could not connect'.mysql_error());
	}
	if(!isset($_SESSION['rollno'])) {
		header('Location: loginhtml.php');
	}
	else
	{
		$rollno=$_SESSION['rollno'];
		$query = "select firstname from student where prn=".$rollno;
		$result=mysql_query($query);
		$row = mysql_fetch_row($result);
		$_SESSION['name'] = $row[0];
		
		echo "<b>Welcome &nbsp".$row[0]."</b>";
		echo"<br>";
		
		//to show whether to update information or to ask them to fill the form for the first time
		/*$queryy = "select isCandidate from student where name='".$row[0]."'";
		
		
		$resultt=mysql_query($queryy);
		$roww = mysql_fetch_row($resultt);
		
		if((int)$roww[0] == 0)
		{
			echo"<a href='candidateForm.php'>Wanna be a candidate? :D </a>";
		}
		else
		{
			echo"<br><a href = 'candidateForm.php'><b>Update your information</b></a> ";
			echo"<br><a href = 'candidateresign.php'><b>Resign from being a candidate</b></a>";
		}
		echo"<br>";
		
		
		echo "<h> <b>Here are our candidates :)</b></h>";
		
		echo"<table border=1>
			<tr>
				<th>Name</th>
				<th>Class</th>
				<th>Quote</th>
			</tr>
			";
		$querylist="select name,class,quote from student where isCandidate=1";
		$result=mysql_query($querylist);
		while($row = mysql_fetch_row($result))
		{
			echo "<tr>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo"</tr>";
		}
		echo"</table>";
		//echo"<br><a href = 'changepassword.php'>Change the password</a>";
		//echo "<br><a href='loginhtml.php'>Logout</a>";*/
	}
	
?>
