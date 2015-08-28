<html>
<body>
	<?php include("newHeader.php"); 
		require("security.php");
	?>
	<form method="post" action="changepassword.php">
		<table>
			<tr>
				<td>Current Password:</td>
				<td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td>New Password:</td>
				<td><input type="password" name="newpass"></td>
			</tr>
			<tr>
				<td>Confirm Password:</td>
				<td><input type="password" name="newpass1"></td>
			</tr>
			<tr>
				<td colspace=2><input type="Submit"></td>
			</tr>
		</table>
		
	</form>
</body>
</html>

<?php
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
	if(isset($_POST['pass']))
	{
		$oldpass=$_POST['pass'];
		$newpass = $_POST['newpass'];
		$confpass = $_POST['newpass1'];
	}
	if(isset($oldpass) && isset($newpass) && isset($confpass))
	{
		$query="select password from student where prn = '$rollno'";
		$result=mysql_query($query);
		if($result)
		{
			if($newpass == $confpass)
			{
				$query1 = "update student set password='$newpass' where prn='$rollno'";
				$result1 = mysql_query($query1);
				if($result1)
				{
					echo " updated the password";
				}
			}
			else
				echo"new password and confirm password do not match";
		}
		else
			echo"Wrong password";
	}
?>

