<?php
if (!defined('check_access')) 
{
        die("<font color='red' size='5'>(￣^￣)ゞ Hi Comrade, Something Wrong!</font>");
}
?>
<html>
	<title> L0g1n </title>
	<body>
		<h1><font color="purple">🔗 Register (Under maintenance)</font></h1>

<?php

echo '<h3>';

if(isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"]))
{
	if($_POST["username"] === "admin") 
	{
		print("<font color='red'>(っ•﹏•)っ</font> User already exists ");
	}
	else
	{
		print("Our register service is under maintenance so please come back later.<br><font color='blue'>ヾ(⌐■_■)ノ♪</font>");
	}
}

echo '</h3>';

?>
<form action="?page=register" method="POST">
		<br><strong>USERNAME</strong><br> <input disabled type="text" title="Something very wrong!!!" pattern="[a-z0-9]{4,10}" name="username"/><br>
		<strong>PASSWORD</strong><br> <input disabled type="password" title="Something very wrong!!!" pattern="[a-h0-9]{4,7}" name="password" /><br>
		<strong>ADDRESS</strong><br> <input disabled type="address" name="address"> (Optional)<br><br>
		<button type="submit" class="button1">Register</button>
		</form>
	</body>
</html>