<?php
	/*$rollno=$_SESSION['rollno'];
	$votedRollNo=$_POST['vote'];
	echo $votedRollNo;*/
			include("newHeader.php");
			require("security.php");
			$rollno=$_SESSION['rollno'];
			$votedRollNo=$_POST['vote'];
			//echo $votedRollNo;
			if(isset($votedRollNo))
			{
					//echo "You have selected :".$_POST['vote'];
					
					$link = @mysql_connect(localhost,bhagyashree,Password);
					if(!$link)
					{
						die('Could not connect'.mysql_error());
					}
					if(!mysql_select_db("School_Election",$link))
					{
						die('Could not connect'.mysql_error());
					}
					
					$query="insert into vote values('$rollno','$votedRollNo')";
					//echo $query;
					$result=mysql_query($query);
					if($result)
					{
						$query1="update candidate set votes=votes+1 where prn='$votedRollNo'";
						$result1=mysql_query($query1);
						if($result1)
						{
							echo "Thank you for your vote";
						}
					}
			}
?>
