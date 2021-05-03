<?php
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

/*
Registration. (username, password, confirm password, Email)
NOTE: Password contains 8 Characters(Password Needs, 8 Characters,uppercase,lowercase,(one)number,(one)special character. AND VALIDATION)

Password validation( kung may kulang)
Ex.
"Need Atleast One(1) Number"
"Need Atleast One(1) Special Character"
"Need Atleast One(1) Uppercase/Lowercase"
"Password didnt match"
"Password must be 8 characters"

Emal Validation(Dapat Email Format.)
*/

// digit counting algo
$passdigitcount=0;
for ($a=0;$a<10;$a++)
{
	$passdigitcount+=substr_count($_POST['inputpass'],$a);
}
// end of digit counting algo

if($passdigitcount>0)
{
if($_POST['inputpass']==$_POST['inputconfirmpass'])
{
	$host= "localhost";
	$user= "root";
	$pass= "";
	$db= "login";

	$con=mysqli_connect($host, $user, $pass, $db);

	if($con)
	{
		$query= "insert into user(username,password,email) values('".$_POST['inputuser']."','".$_POST['inputpass']."','".$_POST['inputemail']."');";
		mysqli_query($con,$query);
		echo("<html><script>alert('Registration Successful!');
		window.location.href='index.php';</script></html>");
	}
	else
	{
		echo("failed connection");
	}
}
else
{
	include 'register.html';
	echo("<html><center><p style='color:red;'>Password and confirm password do not match.</p></center></html>");
}
}
else
{
	
}
?>