<html>
	<head><link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"></head>
<body>
	<?php
		session_start();
		if(isset($_SESSION['level']))
		{
			echo $_SESSION['level'];
		}
		
	?>
	<h1 align=center> Student Election Portal</h1>
	<table border=1 align=center >
		<tr>
			<?php if(isset($_SESSION['level']) && $_SESSION['level']==0 || $_SESSION['level']==1)
				{?>
			<td><a href="home.php">Home</a></td>
			<td><a href="viewCandidates.php">View Candidates</a></td>
			<?php if(isset($_SESSION['level']) && $_SESSION['level']==0)
				{?>
			<td><a href="candidateForm.php">Want to be a candidate?</a></td>
			<?php
		}?>
			<?php
				if(isset($_SESSION['level']) && $_SESSION['level']==1)
				{?>
				
				
				<?php
					$link= @mysql_connect(localhost,bhagyashree,Password);
					if(!$link)
					{
						die('Could not connect'.mysql_error());
					}
					if(!mysql_select_db("School_Election",$link))
					{
						die('Could not connect'.mysql_error());
					}
					$query="select flag from voteSetting";
					$result=mysql_query($query);
					while($row=mysql_fetch_array($result))
					{
						$flag=$row[0];
					}
					if($flag==0)
					{
						echo"<td><a href=\"candidateresign.php\">Resign</a></td>";
						echo"<td><a href=\"candidateForm.php\">Update data</a></td>";
					}
				?>
			<?php
		}?>
	<?php
		}?>
			<?php
				if(isset($_SESSION['level']) && $_SESSION['level']==2)
				{?>
			<td><a href="adminhome.php">Home</a></td>
			<td><a href="viewCandidates.php">View Candidates</a></td>
			<td><a href="addStudent.php">Add Students</a></td>
			<td><a href="voteTime.php">Voting Settings</a></td>
			<td><a href="viewResults.php">View Result</a></td>
		<?php
		}?>
			<?php
				if(isset($_SESSION['level']))
				{?>
			<td><a href="changepassword.php">Change Password</a></td>
			<td><a href="logout.php">Logout</a></td>
			<?php
		}?>
		</tr>
	</table>
<hr>
</body>
</html>
