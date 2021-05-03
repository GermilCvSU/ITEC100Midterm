<html>
	<head>
		<title>Code</title>
		<link rel='stylesheet' href='login.css'>
	</head>

	<body><center>

		<?php
		session_start();
		/*
			PHP String Function
		• strlen() - Return the Length of a String
		• The PHP strlen() function returns the length of a string.
		• The PHP str_word_count() function counts the number of 
		words in a string.
		• The PHP strrev() function reverses a string.
		• The PHP strpos() function searches for a specific text 
		within a string. If a match is found, the function returns 
		the character position of the first match. If no match is 
		found, it will return FALSE.
		• The PHP str_replace() function replaces some characters 
		with some other characters in a string.

		*/

		$host= "localhost";
		$user= "root";
		$pass= "";
		$db= "login";

		$con=mysqli_connect($host, $user, $pass, $db);

		if($con)
		{
			$query= "select * from user where username='".$_POST['usern']."';";
			$query2= "select * from user where password='".$_POST['passw']."';";
			$query3= "select * from user where username='".$_POST['usern']."' and password='".$_POST['passw']."';";
			$resultset=mysqli_query($con,$query);
			$resultset2=mysqli_query($con,$query2);
			$resultset3=mysqli_query($con,$query3);
			$rowcount=mysqli_num_rows($resultset);
			$rowcount2=mysqli_num_rows($resultset2);
			$user=mysqli_fetch_row($resultset3);
			$user_id=$user[0];
			$username=$user[1];
			if($rowcount>0)// count result with the same username
			{
				if($rowcount2>0)// count user with the same password
				{
					$auth_code=rand(100000,999999);
					$_SESSION['open_user_id']=$user_id; // permanent user id of a user
					$_SESSION['code']=$auth_code; // limited-time authentication code given

					// event log - activity:login
					include "log_event.php";
					logEvent("login",$user_id);// logEvent(activity,user_id)
					// end of event log - activity:login

					echo "
						<p id='welcome'>Hi ".$username."!</p>
						<p id='auth'>Here's Your Authentication Code:<br>
						".$auth_code."</p><br> 
						<input type='submit' id='auth_code' name='auth_code' value=".$auth_code." disabled hidden><br>
						<p id='countdown_timer'></p>
						<p id='status' name>

						<style>
						#welcome
						{
							margin-top:12%;
							font-family:arial;
							font-size:55px;
						}

						#auth, #countdown_timer
						{
							font-size:24px;
						}
						</style>
					";
				}
				else
				{
					echo("<script>alert ('Wrong Password, Please Try Again.');</script>");
					include "index.php";
				}
			}
			else
			{
				echo("<script>alert ('User does not exist');</script>");
				include "index.php";
			}
		}
		else
		{
			echo("failed connection");
		}
		?>

	<?php
	date_default_timezone_set("Asia/Manila");
		$created=date('Y-m-d h:i:s');
		$d=mktime(date('h'), date('i')+5, date('s'), date('m'), date('d'), date('Y'));
		$expiration=date('Y-m-d h:i:s',$d);
		$query4="insert into auth_code(user_id, code, created, expiration, status) values('".$user_id."','".$auth_code."','".$created."','".$expiration."','active');";
		mysqli_query($con,$query4);
		
	?>

	<script>
	var counter=31;

	var time=setInterval(
		function()
		{
			counter--;
			var minute=parseInt(((counter%3600)/60));
			var second=parseInt((counter%60));
			if(minute<10)
			{
				minute = "0" + minute;
			}
			if(second<10)
			{
				second = "0" + second;
			}

			if(counter>=0)
			{
				id=document.getElementById('countdown_timer');
				id.innerHTML="Code Expires in:<br>" + minute + ":" + second;
			}
			else
			{
				window.open("update_code_status.php");
				clearInterval(time);
			}
		},1000
	);
	</script>
</body>
</html>