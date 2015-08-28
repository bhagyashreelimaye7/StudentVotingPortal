<?php
		include("newHeader.php");
		require("security.php");
		
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
	
	
		$query="select prn from vote where prn='$rollno'";
		if(mysql_num_rows(mysql_query($query))>=1)
		{
			$hasVoted="yes";
			//echo $time;
		}
		else
		{
			$hasVoted="no";
		}
		
		$query1="select flag from voteSetting";
		$result1=mysql_query($query1);
		while($row=mysql_fetch_array($result1))
		{
			$flagValue=$row[0];
			echo$flagValue;
		}
		
		
			
		echo "<h2> <b>Here are our candidates :)</b></h2>";
		
		echo"<table border=1>
			<tr>
				<th>Name</th>
				<th>Quote</th>
				<th>Image</th>";
				if($hasVoted=="yes")
				{
					echo"
					<th>Vote</th>";
				}
		echo"</tr>";
			
		$querylist="select s.prn,s.firstname,c.quote,c.image from student s join candidate c where s.prn=c.prn;";
		$result=mysql_query($querylist);
		?>
		<form method="post" action="votestatus.php">
		<?php
		while($row = mysql_fetch_row($result))
		{
			echo "<tr>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			if($hasVoted=="no" && $flagValue==1)
			{
				echo "<td><input type=\"radio\" name=\"vote\" value=\"$row[0]\"></td>";
			}
			echo"</tr>";
		}
		if($hasVoted=="no" && $flagValue==1)
		{
			echo"<tr>
				<td><input type=\"submit\"></td>
				</tr>";
		}
		echo"</form> </table>";
?>
