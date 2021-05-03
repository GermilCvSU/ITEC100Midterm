<!DOCTYPE html>
<html>
<head>
<title>login</title>
<link rel="stylesheet" href="login.css">
</head>
<body style="background-image:url(back.jpg);background-size:100%;">
	<!--
	Using PHP Create a login authenticator consist of Six(6) digit code.(you can use your existing login form)

	Use PHP random command rand() to generate a Six(6) digit Code.

	NOTE: 
	Authenticator code must have expiration of Five(5) minutes.(if the code expired, it cannot be use)
	Create a database table for Authentication code(ID,User ID,CODE,Created at,Expiration)

	Hirap mag english p*ta, mag kakaroon lang ng code kapag successful ang pag login.
	At kapag hindi nilagay ang code dapat mareredirect ulit sa login at hindi makakapag login.
	Paki lagay sa Another Page ang Authentication code. na kapag successful ang login mag oopen ng another web browser at don makikita ang Authentication code.(para di na titingin sa database table.)
	pero sa video recording dapat ipakita ninyo na same ang code na nasa database at nasa web page output.

	Para sa Isesend.
	Video Recording (TAGALOG!)
	PHP Files
	SQL File
	and Ebriting.
	-->

	<div id="container">
		<form action="login.php" method="POST">
			<p id="activitytitle"><b>LAB ACTIVITY 4</b></p>
			<input type="text" name="usern" id="inp" placeholder="Username" autocomplete="off" required/><br>
			<input type="text" name="passw" id="inp" placeholder="Password" autocomplete="off" required/><br>
			<button type="submit" id="loginButton" onclick="window.open('authentication.html')">Log In</button>
		</form>
		<a id="regButton" href="register.html">Register</a>
		<hr id="divider"><p id="fullname">Sagun, Germil John A. - 
		BSIT 3A</p>
	</div>

	<?php
		session_start();
		if($_SESSION['loginstatus']=="disabled")
		{
			echo "
			<script>
				document.getElementById('loginButton').disabled=true;
			</script>
			";
		}
	?>
</body>
</html>