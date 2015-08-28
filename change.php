
<?php
	include("newHeader.php");
	//session_start();
	$name= $_SESSION['name'];
	$link= @mysql_connect(localhost,bhagyashree,Password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
	}
	if(!mysql_select_db("College_Election",$link))
	{
		die('Could not connect'.mysql_error());
	}
?>
