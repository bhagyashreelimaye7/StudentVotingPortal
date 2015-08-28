<?php
include("newHeader.php");
require("security.php");
//session_start();
$name= $_SESSION['name'];
echo "Hello again &nbsp". $name."<br>";
echo" Here is your form <br> Good Luck :) <br> <br>";
?>
<html>
<body>
<form method="post" action="candidatephp.php" enctype="multipart/form-data">
	<table>
		<tr>
			<td><b>Write a quote you want to display under your name</b></td>
			<td><input type="textfield" name="quote"></td>
		</tr>
		<tr>
			<td>Select image to upload:<input type="file" name="fileToUpload" id="fileToUpload"></td>
			<!--<input type="submit" value="Upload Image" name="submit"></td>-->
		</tr>
		<tr>
			<td><input type="submit"></td>
		</tr>
	</table>
</form>
</body>
</html>
