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
	<div class="container-fluid" id="bs-example-navbar-collapse-1" >
	<!-- Nabvbar -->
	<nav class="navbar navbar-default">
		
		
		
		<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
					<a class="navbar-brand" href="adminhome.php">Home</a> 
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					
					<li><a href="viewCandidates.php">View Candidates</a></li>
					
					<?php if(isset($_SESSION['level']) && $_SESSION['level']==0 || $_SESSION['level']==1) { ?>
					
						<?php if(isset($_SESSION['level']) && $_SESSION['level']==0) { ?>
							<li><a href="candidateForm.php">Want to be a candidate?</a></li>
						<?php } ?>
					
						<?php 
							if(isset($_SESSION['level']) && $_SESSION['level']==1) {
							$link= @mysql_connect(localhost,bhagyashree,Password);
							if(!$link) {
								die('Could not connect'.mysql_error());
							}
							if(!mysql_select_db("School_Election",$link)) {
								die('Could not connect'.mysql_error());
							}
							$query="select flag from voteSetting";
							$result=mysql_query($query);
							
							while($row=mysql_fetch_array($result)) {
								$flag=$row[0];
							}
							if($flag==0) {
						?>
							<li><a href="candidateresign.php">Resign</a></li>
							<li><a href="candidateForm.php">Update data</a></li>
						<?php }	
						} 
						} ?>

						<?php if(isset($_SESSION['level']) && $_SESSION['level']==2) { ?>
							<li><a href="addStudent.php">Add Students</a></li>
							<li><a href="voteTime.php">Voting Settings</a></li>
							<li><a href="viewResults.php">View Result</a></li>
						<?php } ?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							if(isset($_SESSION['level'])) {
						?>
						<li><a href="changepassword.php">Change Password</a></li>
						<li><a href="logout.php">Logout</a></li>
						<?php } ?>
					</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
<hr>
</body>
</html>

