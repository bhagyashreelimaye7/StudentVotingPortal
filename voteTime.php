<?php
	include("newHeader.php");
	//require("security.php");
	require("adminSecurity.php");
	
	?>
	
	<html>
	<body>
		<form action="" method="post">
		<input type="radio" name="flag" value="1" >ON
		<br>
		<input type="radio" name="flag" value="0" >OFF
		<br>
		<input type="submit">
	</body>
	</html>
<?php
	//session_start();
	$name= $_SESSION['name'];
	$rollno=$_SESSION['rollno'];
	$link= @mysql_connect("localhost","bhagyashree","Password");
	if(!$link)
	{
		die('Could not connect'.mysql_error());
	}
	if(!mysql_select_db("School_Election",$link))
	{
		die('Could not connect'.mysql_error());
	}
	if(isset($_POST['flag']))
	{
		$flag=$_POST['flag'];
		$query="update voteSetting set flag='$flag'";
		$result=mysql_query($query);
		if($result)
		{
			if($flag==1)
				echo"Vote status:ON";
			else
				echo"Vote status:OFF";
		}
	}
?>

