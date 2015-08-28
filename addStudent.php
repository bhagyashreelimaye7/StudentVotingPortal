<html>
<body>
	<?php include("newHeader.php"); 
	require("adminSecurity.php");
	?>
	<form method="post">
		<table>
			<tr>
				<td>Prn :-</td>
				<td> <input type="text" name="prn"></td>
			</tr>
			<tr>
				<td>Password :-</td>
				<td> <input type="text" name="pass"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td> <input type="text" name="fname"></td>
			</tr>
			<tr>
				<td>Surname</td>
				<td> <input type="text" name="lname"></td>
			</tr>
			<tr>
				<td><input type="submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
	
	//session_start();
	require("security.php");
	$name= $_SESSION['name'];
	
	//if prn is set , it indicates that the user is redirected to this page
	if(isset($_POST['prn']))
	{
		$prn=$_POST['prn'];
		$pass=$_POST['pass'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
	}

	$link= @mysql_connect(localhost,bhagyashree,Password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
	}
	if(!mysql_select_db("School_Election",$link))
	{
		die('Could not connect'.mysql_error());
	}
	
	//checks if all data is filled
	if(isset($prn) && isset($pass) && isset($fname) && isset($lname))	
	{
		$query="insert into student values('$prn','$pass','$fname','$lname','')";
		$result=mysql_query($query);
		if($result)
		{
			echo"records inserted";
		}
		else
		{
			echo"not done";
		}
	}
?>
