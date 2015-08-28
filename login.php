<?php
	$link = @mysql_connect(localhost, bhagyashree, Password);
	if(!$link) {
                die('Could not connect: '.mysql_error());
        }
        if(!mysql_select_db("School_Election", $link)) {
                die('Could not select specified db: '. mysql_error());
        }
       $rollno=$_POST['prn'];
       $pass=$_POST['password'];
       echo $rollno;
       echo $pass;
       if(isset($rollno) && isset($pass))
       {
		 	
			 echo "hellooo";
			 $query="select * from student where prn='$rollno' and password = '$pass'";
			 $result = mysql_query($query);
			 if(mysql_num_rows($result) == 1) 
			 {
					session_start();
					$_SESSION['rollno'] = $rollno;
					
					
					while($x= mysql_fetch_row($result))
					{
						$no=$x[4];
						$_SESSION['level']=$no;
						/*echo $no;
						if($no == 2)
						{
							header("location:home.php");
						}
						else
						{
							header("location:home.php");
						}*/
						header("location:home.php");
					}
					
			}
			 else
			 {
				echo"the details are wrong";
				header("location:loginhtml.php");
				
			 }
		
       }
	   mysql_close($link);

?>
