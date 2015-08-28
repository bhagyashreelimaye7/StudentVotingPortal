<?php
	include("newHeader.php");
	//require("security.php");
	require("adminSecurity.php");
	
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
	echo"<table border=1>
			<tr>
				<th>Name</th>
				<th>Quote</th>
			</tr>";
	
	
	$query="select prn,voted_for from vote";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
		echo "</tr>";
	}
	echo"</table>";
	
	echo"<br>";
	echo"<table border=1>
			<tr>
				<th>Name</th>
				<th>Total number of votes</th>
			</tr>";
	
	
	$query1="select s.firstname,c.votes from student s,candidate c where s.prn=c.prn";
	echo $query1;
	if($result1=mysql_query($query1))
	{
		while($row=mysql_fetch_row($result1))
		{
			echo "<tr>";
				echo "<td>$row[0]</td>";
				echo "<td>$row[1]</td>";
			echo "</tr>";
		}
	}
	else
		echo mysql_error();
		echo"</table>";
		
?>
